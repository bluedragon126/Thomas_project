<?php
class mymarket
{
	function is_logged_in() 
	{
		/* this function will return true if the user has logged in.  a user is logged
		 * in if the $_SESSION["user"] is set (by the login.php page) and also if the
		 * remote IP address matches what we saved in the session ($_SESSION["ip"])
		 * from login.php -- this is not a robust or secure check by any means, but it
		 * will do for now */

		//global $_SESSION, $REMOTE_ADDR;
		//return isset($_SESSION) && isset($_SESSION["user"]);
		//if ($this->getUser()->isAuthenticated() && $this->getUser()->getAttribute('isAdmin')=='yes')
		if ($this->getUser()->isAuthenticated())
			$flag = true;
		else
			$flag = false;
		
		return $flag;
	}

	function require_login(&$wantsurl) 
	{
		/* this function checks to see if the user is logged in.  if not, it will show
	 	* the login screen before allowing the user to continue */
	
		global $CFG, $_SESSION;
	
		if (! sfContext::getInstance()->getUser()->isAuthenticated()) 
		{
			$stdlib = new stdlib();
			$wantsurl = $stdlib->me_with_querystring();
			$this->redirect('user/loginWindow');	
		}
	}

	function check_article_access($art_statID) 
	{
		$boo = false;

		//Abonnent
		if ($art_statID == 1) 
		{
			//Om inloggad och ny eller betald
			if (sfContext::getInstance()->getUser()->isAuthenticated()) 
			{
				if (sfContext::getInstance()->getUser()->getAttribute('userstatID','','userProperty') == 1 or sfContext::getInstance()->getUser()->getAttribute('userstatID','','userProperty') == 2 or sfContext::getInstance()->getUser()->getAttribute('userstatID','','userProperty') == 3)
					$boo=true;
				else 
					$this->redirect('borst/borstArticleDetails/article_id/241');
					//echo "Detta r en abbonentartikel. Du mste ha ett giltigt abonemang fr att kunna lsa artikeln!";
			}
			else $this->redirect('user/loginWindow');	
		}	
		
		//Intern
		elseif ($art_statID == 2) 
		{
			if (sfContext::getInstance()->getUser()->isAuthenticated() && sfContext::getInstance()->getUser()->getAttribute('isSuperAdmin','','userProperty')=='1')
				$boo=true;
			/*else
				echo "Denna artikel r under bearbetning.";*/
		}
			
		//Publik
		elseif ($art_statID == 3) 
			$boo=true;
			
		//Registrerad
		elseif ($art_statID == 4) 
		{
			if (mymarket::is_logged_in()) 
				$boo=true;
			else 
				$this->redirect('user/loginWindow');	
				//echo "Du mste vara inloggad fr att lsa denna artikel!";
		}
		
		else $this->redirect('user/loginWindow');	
		
		return $boo;
	}

	function has_priv($priv) 
	{
		/* returns true if the user has the privilege $priv */
		return $_SESSION["user"]["priv"] == $priv;
	}

	function generate_password($maxlen=10) 
	{
		/* returns a randomly generated password of length $maxlen.  inspired by
		 * http://www.phpbuilder.com/columns/jesus19990502.php3 */
	
		global $CFG;
	
		$fillers = "1234567890!@#$%&*-_=+^";
		$wordlist = file($CFG->wordlist);
		//$wordlist = file("wordlist.txt",".;$CFG->dirroot\lib\"");
		$wordlist = explode(" ","characters charset chat checkbox checker checking chicagos child children cidr citizens class classless classroom clear clearinghouse clickable client clock close cnidr code collages collaterals colleagues collected college come comes command commerce commercial commissioned common communicate compact company competed competing competitive compiler complex compliant compression compuserve computer computing conclusions concurrent conditioned configuration connection consortium content contenttype contest context contracted control controlled controlling controls convention conversion copyleft corporate corporation cots could counterproductive course crawler crawlers creative creatively creativity crlf cron csh csu cvs d daemon darpa data database datagram dbms debugger deci declines decomposition dedicated default defense definitely definition delimiter demonstrated denizens department deprecated descriptive desktop destructive devalued development develops devises dialup did difference different digital directory discouraging discovery disk diskreadonly dislike dividers dns do document documentbased dod does doing dollar domain done dos doubt down draw drawing drop dropped dsu dtd dumb dvi each eagerly early easily editor edward effect effective effectively effects elderly electronic element elementary emacs email emphasizes employees emulation encapsulation encoded encoding encourage encryption encyclopedia end engage engaging engineering engines enjoy enjoyable enjoyed enjoyment entities entity environment equally erikson erode error errors especially ethernet europeen even exception executables execution existence exists expectations experience experienced experiment experiments experts explanation explanations expression extension extensions extent external extracting extrinsic facto factory faith faqs fee feed feedback feel few field fifth file fillin filtering finally find finding findings finger firewall first flat focus footer for force forced forget fork form format formatted formerly forms formula forth fortran found free frequently from front frustrated ftp fun fuzzy gabarino games gateway general generalized get getting gif girls given giving gnu going good gopher got grades graduate graphic graphical graphics grep group groups growing gui guide gzip had handbook handle handling happen harassed has hash have he head header heading her hexadecimal hierarchical hierarchy higherlevel him his history home homepage host hotlist hourly how however hqx html htmlonthefly http httpd hurt hyperlink hypermedia hypertext iab iana ica icr ideas identifier ietf if illustrates im image imagemap impact impressing in including independent index infobahn information informationally informed innovation inputhandling instance institute instruction insulted insults integrated intelligent interchange interdocument interdomain interest interesting interface interfere interlaced international internaut internet interpreter into intradocument intrinsic intrinsically invalidated invent involves involving ip irc ironclad is isdn iso iso8879 isp it its itself iway james java job joint joke jpeg judged jump");
		srand((double) microtime() * 1000000);
		$word1 = trim($wordlist[rand(0, count($wordlist) - 1)]);
		$word2 = trim($wordlist[rand(0, count($wordlist) - 1)]);
		$filler1 = $fillers[rand(0, strlen($fillers) - 1)];
	
		return substr($word1 . $filler1 . $word2, 0, $maxlen);
	}


	function err(&$errorvar) 
	{
		/* if $errorvar is set, then print an error marker << */
		if (isset($errorvar)) 
		{
			echo "<font color=#ff0000>&lt;&lt;</font>";
		}
	}

	function username_exists($username) 
	{
		$q = Doctrine_Query::create()
    		->from('SfGuardUser u')
    		->where('u.username = ?', $username);
		$userData = $q->fetchOne();
		if($userData)
			return 1;
		else
			return 0;
	}

	function email_exists($email) 
	{
		$q = Doctrine_Query::create()
    		->from('SfGuardUserProfile u')
    		->where('u.email = ?', $email);
			
		$userData = $q->fetchOne();
		if($userData)
			return 1;
		else
			return 0;
	}
	
	function usernamealias_exists($email) 
	{
		$q = Doctrine_Query::create()
    		->from('SfGuardUserProfile u')
    		->where('u.usernamealias = ?', $email);
			
		$userData = $q->fetchOne();
		if($userData)
			return 1;
		else
			return 0;
	}

	function is_valid_email($email) 
	{ 
		if(ereg("([[:alnum:]\.\-]+)(\@[[:alnum:]\.\-]+\.+)", $email))
                //if(ereg('/^([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,})$/i', $email))
		{
			return 1;
		}
		else
		{
			return 0;
		} 
	}
	
	function align_position($host_str,$str,$width) 
	{
		$apos = $without_align = $from_align = $align_pos = 'left';
		$image_details = array();
		$local_img = 0;

		if(strstr($str,'artiklar'))
		{ 
			$str = str_replace('artiklar','images/analysis_images',strstr($str,'artiklar'));
			$local_img = 1;
		}
		
		if(strstr($str,'analysis_images'))
			$local_img = 1;
		
		if($local_img == 1)
		{ 
			if(strstr($str, 'align'))
			{
				$apos = strpos($str, '"');
				$without_align = trim(substr($str,0,$apos)); 
				
				if(strstr($str, 'left'))
					$align_pos = 'left';
				if(strstr($str, 'right'))
					$align_pos = 'right';
			}
			else
				$without_align = trim($str); 
				
			$path = 'http://'.$host_str.'/'.$without_align;
		}
		else
		{
			$without_align	= $str;
			$path = $str;
		}

		
		$size = getimagesize($path);
		$arr = mymarket::giveImageData($size,$width);
		$image_details['img'] = $path;
		$image_details['align'] = $align_pos;
		$image_details['width'] = $arr[0] ? $arr[0] : 0;
		$image_details['height'] = $arr[1] ? $arr[1] : 0;
		$image_details['local_img'] = $local_img;
		
		return $image_details;
	}
	
	function giveImageData($data,$n_width) 
	{
		$wdt_ht = array();
		if($data[0] >= $n_width)
		{
			$new_img_width = $n_width;
			$w = $data[0];
			$h = $data[1];
			$new_img_height=(($h / $w) * $new_img_width);
		}
		else
		{
			$new_img_width = $data[0];
			$new_img_height = $data[1];
		}
		
		$wdt_ht[0] = round($new_img_width);
		$wdt_ht[1] = round($new_img_height);
		
		return $wdt_ht;
	}
	
	function specCharCheck($str)
	{
		//preg_match("|<[^>]+>(.*)</[^>]+>|U", $str);
		//Allowed '-'
		$symb = array("<", ">", "{", "}", "[", "]", "^", "+", "*", "#", "$", "%", "(", ")", "~", "!", "=", "|","//","\\", "script","SCRIPT");
		str_replace($symb, "", $str, $symb_count);
		
		return $symb_count;
		
	}
	
	function script_check($str)
	{
		$symb = array("script", "SCRIPT", "<", ">", "{", "}", "(", ")");
		str_replace($symb, "", $str, $symb_count);
		
		return $symb_count;
	}
	
	function modified_text($str)
	{
		$host_str = $_SERVER['HTTP_HOST'];
	    //echo $str; 
		$find = array("artiklar/index.php?kat=","artiklar/index.php?land=","artiklar/index.php?t_id=","artiklar/index.php?k_id=","artiklar/index.php?o_id=","artiklar/index.php?id=", "www.borstjanaren.se","/reklam","artiklar/img2","artiklar/img3","artiklar/img4","artiklar/img5","artiklar/img6","artiklar/img7","artiklar/img8","artiklar/img9","artiklar/img10","artiklar/img11","artiklar/img12","artiklar/img13","artiklar/img_ing","artiklar/img_mb","artiklar/img_portfoljer","artiklar/img","grafik/","userss/edu_signup.php","userss/change_settings.php","autogiro/fullmakt.pdf","artiklar/forum.php","images//images","images/images","article/index.php/id/","/article/index/id/");
	
	$replace = array("article/listArticle/kat/","article/listArticle/land/","article/listArticle/t_id/","article/listArticle/k_id/","article/listArticle/o_id/","borst/borstArticleDetails/article_id/", $host_str,$borst_img."/images/reklam",$borst_img."images/article_images/img2",$borst_img."images/article_images/img3",$borst_img."images/article_images/img4",$borst_img."images/article_images/img5",$borst_img."images/article_images/img6",$borst_img."images/article_images/img7",$borst_img."images/article_images/img8",$borst_img."images/article_images/img9",$borst_img."images/article_images/img10",$borst_img."images/article_images/img11",$borst_img."images/article_images/img12",$borst_img."images/article_images/img13",$borst_img."images/article_images/img_ing",$borst_img."images/article_images/img_mb",$borst_img."images/article_images/img_portfoljer",$borst_img."images/article_images/img",$borst_img."images/grafik/","user/eduSignUpForm","user/changeSetting","fullmakt.pdf","forum/commentOnTopic",$borst_img."images",$borst_img."images","borst/borstArticleDetails/article_id/","/borst/borstArticleDetails/article_id/");
	
	
		return str_replace($find,$replace,$str);
	}
	
	function getExtension($param)
	{
		$ext = http_build_query($param);
		$search_arr = array("&", "=");
		$ext = str_replace($search_arr, "/", $ext);

		return $ext;
	}

	function getPagerForAll($table,$rec_per_page,$query,$page)
	{
	    //echo $query;
		$pager = new sfDoctrinePager($table,$rec_per_page);
		$pager->setQuery($query);	
		$pager->setPage($page);
		$pager->init();
		
		return $pager;
	}
	
	function setPagerForAll($article_pager,$analysis_pager,$blog_pager,$forum_pager,$btchart_pager,$btshop_pager,$userlist_pager)
	{
		$sort_arr = array();
		
		$sort_arr["article_pager"] = $article_pager ? $article_pager->getNbResults() : 0;
		$sort_arr["analysis_pager"] = $analysis_pager ? $analysis_pager->getNbResults() : 0;
		$sort_arr["blog_pager"] = $blog_pager ? $blog_pager->getNbResults() : 0;
		$sort_arr["forum_pager"] = $forum_pager ? $forum_pager->getNbResults() : 0;
        $sort_arr["btchart_pager"] = $btchart_pager ? $btchart_pager->getNbResults() : 0;
        $sort_arr["btshop_pager"] = $btshop_pager ? $btshop_pager->getNbResults() : 0;
        $sort_arr["userlist_pager"] = $userlist_pager ? $userlist_pager->getNbResults() : 0;
		
        $max_value = max($sort_arr);
        $pager = '';
        foreach($sort_arr as $key=>$value)
        {
                if($value==$max_value)
                    $pager = $key;
        }
        switch($pager)
        {
            case 'article_pager':
                $return_pager = $article_pager; break;
            case 'analysis_pager':
                $return_pager = $analysis_pager; break;
            case 'blog_pager':
                $return_pager = $blog_pager; break;
            case 'forum_pager':
                $return_pager = $forum_pager; break;                                                
            case 'btchart_pager':
                $return_pager = $btchart_pager; break;                                                                
            case 'btshop_pager':
                $return_pager = $btshop_pager; break;                                                                                
            case 'userlist_pager':
                $return_pager = $userlist_pager; break;                                                                                
        }
        return $return_pager;
	}
	
	function correctTitle($title)
	{
		$title_arr = explode(" ", $title);
		$find_arr = $replace_arr = array();
		$j = 0;
		$replace_str = '';
		
		for($i=0; $i<count($title_arr); $i++)
		{
			if(strlen($title_arr[$i]) > 22)
			{
				$find_arr[$j] = $title_arr[$i];
				
				$breaked_str_arr = str_split($title_arr[$i], 22);
				$breaked_str_arr_len = count($breaked_str_arr);
				for($k=0;$k<$breaked_str_arr_len;$k++)
				{
					if($k == $breaked_str_arr_len-1) $replace_str = $replace_str.$breaked_str_arr[$k];
					else $replace_str = $replace_str.$breaked_str_arr[$k].'-';
				}
				
				$replace_arr[$j] = $replace_str;	
				$j++;
			}
		}
		
		$title = str_replace($find_arr, $replace_arr, $title);
		return $title;
	}
	
	function correctDetailTitle($title)
	{
		$title_arr = explode(" ", $title);
		$find_arr = $replace_arr = array();
		$j = 0;
		$replace_str = '';
		
		for($i=0; $i<count($title_arr); $i++)
		{
			if(strlen($title_arr[$i]) > 27)
			{
				$find_arr[$j] = $title_arr[$i];
				
				$breaked_str_arr = str_split($title_arr[$i], 27);
				$breaked_str_arr_len = count($breaked_str_arr);
				for($k=0;$k<$breaked_str_arr_len;$k++)
				{
					if($k == $breaked_str_arr_len-1) $replace_str = $replace_str.$breaked_str_arr[$k];
					else $replace_str = $replace_str.$breaked_str_arr[$k].'- ';
				}
				
				$replace_arr[$j] = $replace_str;	
				$j++;
			}
		}
		
		$title = str_replace($find_arr, $replace_arr, $title);
		return $title;
	}
	
	public function make_links_clickable($text,$target){
		return preg_replace('!((http\:\/\/|ftp\:\/\/|https\:\/\/)|www\.)([-a-zA-Zа-яА-Я0-9\~\!\@\#\$\%\^\&\*\(\)_\-\=\+\\\/\?\.\:\;\'\,]*)?!ism', 
		'<a class="'.$class.'" href="//$3" target="'.$target.'">$1$3</a>',$text);
	}
}
?>
