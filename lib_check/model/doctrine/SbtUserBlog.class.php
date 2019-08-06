<?php

/**
 * SbtUserBlog
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sisterbt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class SbtUserBlog extends BaseSbtUserBlog
{
	/*
	*
	* This function returns information of a selected blog.
	*
	*/

	public function getSelectedBlog($index) 
	{ 
		$selected_blog_cri = Doctrine_Query::create()
	   					      ->from('SbtUserBlog sub')
						      ->where('sub.id = ?', $index);

		$selected_blog_data = $selected_blog_cri->fetchOne();
		return $selected_blog_data;
	}
	
	/*
	*
	* This function returns all blog post of a perticular user.
	*
	*/

	public function getAllBlogPostOfUserQuery($user_id) 
	{ 
		$selected_blog_cri = Doctrine_Query::create()
	   					      ->from('SbtUserBlog sub')
						      ->where('sub.author_id = ?', $user_id)
							  ->orderBy('sub.created_at DESC');

		return $selected_blog_cri;
	}
	
   /*
	*
	* This function increment blog view count.
	*
	*/
	
	public function IncrementBlogViewCount($index) 
	{ 
		$selected_blog_cri = Doctrine_Query::create()
	   					      ->from('SbtUserBlog sub')
						      ->where('sub.id = ?', $index);

		$selected_blog_data = $selected_blog_cri->fetchOne();
		
		if($selected_blog_data)
		{
			$views = $selected_blog_data->ublog_views;
			$views = $views + 1;
			
			$update_cnt_cri = Doctrine_Query::create()
								->update('SbtUserBlog sub')
								->set('sub.ublog_views', '?', $views)
								->where('sub.id = ?', $index);
	
			$updated = $update_cnt_cri->execute();
		}
	}
	
	/*
	*
	* This function updates the vote count of a perticular blog. 
	*
	*/
	
	public function updateVoteCountForBlog($blog_id) 
	{ 
		$find_blog_cri = Doctrine_Query::create()
	   					      ->from('SbtUserBlog sub')
						      ->where('sub.id = ?', $blog_id);

		$one_blog_data = $find_blog_cri->fetchOne();
		
		if($one_blog_data)
		{
			$total = $one_blog_data->ublog_votes;
			$total = $total + 1;
			
			$one_blog_data->ublog_votes = $total;
			$one_blog_data->save();
		}
		else
		{
			$total = '';
		}
		
		return $total;
	}
	
	/*
	*
	* This function fetches blog creation dates from a perticular month and year.
	*
	*/
	
	public function fetchtBlogCreationDates($year,$month,$last_date,$user_id) 
	{ 
		$beginDate = $year.'-'.$month.'-1';
		$endDate = $year.'-'.$month.'-'.$last_date;
		$i=0; $str ='';
		$arr = array();
		
		$find_blog_cri = Doctrine_Query::create()
	   					      ->from('SbtUserBlog sub')
							  ->where('sub.created_at BETWEEN ? AND ? AND sub.author_id = ? ', array($beginDate, $endDate, $user_id));

		$selected_blog_data = $find_blog_cri->execute();

		foreach($selected_blog_data as $blog)
		{
			$dt = substr($blog->created_at,8,2);
			if(!in_array($dt,$arr))
			{
				$arr[] = $dt;
				if($i!= 0) 
					$str = $str.",".$dt;
				else
					$str = $dt;
					
				$i++;	
			}
		}
		
		return $str;
	}
	
	/*
	*
	* This function fetches blog creation dates from a perticular month and year.
	*
	*/
	
	public function fetchtBlogOfMonth($year,$month,$last_date,$user_id) 
	{ 
		$beginDate = $year.'-'.$month.'-1';
		$endDate = $year.'-'.$month.'-'.$last_date;
		$i=0; $str ='';
		$arr = array();
		
		$query = Doctrine_Query::create()
	   					      ->select('sub.id,sub.ublog_title')
							  ->from('SbtUserBlog sub')
							  ->where('sub.created_at BETWEEN ? AND ? AND sub.author_id = ? ', array($beginDate, $endDate, $user_id))
							  ->orderBy('sub.created_at DESC');

		$data = $query->fetchArray();
		return $data;
	}

   /*
	*
	* This function returns all blog post of a specific user.
	*
	*/
	
	public function getBlogWrittenByUser($id) 
	{ 
		$all_blog_post_cri = Doctrine_Query::create()
						  ->from('SbtUserBlog sub')
						  ->where('sub.author_id = ?', $id)
						  ->orderBy('sub.created_at DESC');
			  		
		return $all_blog_post_cri;
	}
	
   /*
	*
	* This function returns all blog post of a specific date.
	*
	*/
	
	public function getBlogWrittenOnDate($year,$month,$last_date,$column_id,$order,$user_id) 
	{ 
		$month_arr = array('January'=>'1','February'=>'2','March'=>'3','April'=>'4','May'=>'5','June'=>'6','July'=>'7','August'=>'8','September'=>'9','October'=>'10','November'=>'11','December'=>'12');
		
		$first_date = $year.'-'.$month_arr[$month].'-'.$last_date.' 00:00:00';
		$second_date = $year.'-'.$month_arr[$month].'-'.$last_date.' 23:59:59';
		
		$query = Doctrine_Query::create()->from('SbtUserBlog sub');
		$query = $query->where('sub.created_at BETWEEN ? AND ? AND sub.author_id = ? ', array($first_date, $second_date,$user_id));
		
		
		switch($column_id)
		{
			case 'title':  $query = $query->orderBy('sub.ublog_title '.$order); break;
			case 'category': //$query = $query->orderBy('sub.ublog_category_id '.$order); break;
							 $query = $query->innerJoin('sub.SbtArticleCategory acat'); 
							 $query = $query->orderBy('acat.sbt_category_name '.$order); break;
			
			case 'author':  $query = $query->innerJoin('sub.sfGuardUser sUser')->innerJoin('sUser.SfGuardUserProfile profile'); 
			                $query = $query->orderBy('concat(profile.firstname," ",profile.lastname) '.$order); break;
			
			case 'reply':  $query = $query->leftJoin('sub.SbtBlogComment subcom'); 
			               $query = $query->groupBy('sub.id'); 
						   $query = $query->orderBy('count(subcom.blog_id) '.$order);
						   break;
			
			case 'view':  $query = $query->orderBy('sub.ublog_views '.$order); break;
			case 'date':  $query = $query->orderBy('sub.created_at '.$order); break;
			case 'default':  $query = $query->orderBy('sub.created_at DESC'); break;
		}
		//echo $query->getSqlQuery();
		return $query;
	}
    
   /*
	*
	* Function for green font
	*
	*/
    public static function filterMyString($str){
      $str2=$str;
      $regex = "/<\/?\w+((\s+(\w|\w[\w-]*\w)(\s*=\s*(?:\".*?\"|'.*?'|[^'\">\s]+))?)+\s*|\s*)\/?>/i";
      preg_match_all($regex, $str, $matches);
      $cnt = 0;
      $keywords = array();
      foreach($matches[0] as $match){
          $keywords[$cnt] = $match;
          $str = preg_replace($regex,"_rplc".$cnt."_",$str,1);
          $cnt++;            
      }
      $tt = preg_replace($regex,'',$str2);
      $tt = str_replace('&nbsp;','',$tt);
      $tt = trim($tt);
      $str2 = $tt;
      $wordArr = preg_split('/[\s,]+/',preg_replace($regex,'',$str2));
      $wordArr2 = $wordArr;
      
      $j=0;
      while($wordArr[$i]=='nbsp'){
        $j++;
      }
      $replace_count=0;
      $posArr = array();
      $word_to_replace = array();
      for($i=0; $i<count($wordArr);$i++){
        if($i>=$j){
            if($wordArr[$i]!='nbsp'){
                if($replace_count<2){
                    /*$wordArr[$i] = "<b class=' greenfont'>".$wordArr[$i]."</b>";*/
                    $wordArr[$i] = $wordArr[$i];
                    $posArr[] = $i;
                    $replace_count++;
                }
            }
        }  
      }
      $str = preg_replace("/".$wordArr2[$posArr[0]]."/",$wordArr[$posArr[0]],$str,1);
      $str = preg_replace("/".$wordArr2[$posArr[1]]."/",$wordArr[$posArr[1]],$str,1);
      $cnt=0;
      foreach($keywords as $keyword){
          $rplc = "_rplc".$cnt."_";        
          $str = str_replace($rplc,$keywords[$cnt],$str); 
          $cnt++;
      }
      $pos = strpos($str,"<b class=' greenfont'>");
      $pos2 = strpos(substr($str,0,$pos),'color: #',0);
      if($pos2){
        $str = str_replace("<b class=' greenfont'>","",$str);
      }
      
	  $str = sbtUserBlog::closeTags($str);
      return $str;
   }
   
	/*
	*
	* Function to close unclosed tags
	*
	*/
	public static function closeTags($html)
	{
	  $tidy = new tidy();
	  $tidy->parseString($html,array('show-body-only'=>true),'utf8');
	  $tidy->cleanRepair();
	  return $tidy;
	}
	/*
	*
	* This function returns list of last blogs for display in charts.
	*
	*/
	public function getListOfSimilarBlogsForChart($stock_name,$limit) 
	{ 
		$similar_article_cri = Doctrine_Query::create()
	   					      ->from('SbtUserBlog sub')
						      ->where('sub.ublog_title LIKE ?', "%".$stock_name."%")
							  ->orderBy('sub.id DESC')
							  ->limit($limit);

		$similar_article_data = $similar_article_cri->execute();
		$str = '';
		foreach($similar_article_data as $list)
		{
			$str .= '<span style="color:#000000;">'.substr($list->created_at,0,10).'</span> <a href="http://'.$_SERVER['HTTP_HOST'].'/sbt/sbtBlogDetails/blog_id/'.$list->id.'" style="color:#174E96;">'.$list->ublog_title.'<a/><br/>';
		}
		return $str;
	}
	
   /*
	*
	* Function for green font
	*
	*/
    public static function filterMyStringBlack($str){
      $str2=$str;
      $regex = "/<\/?\w+((\s+(\w|\w[\w-]*\w)(\s*=\s*(?:\".*?\"|'.*?'|[^'\">\s]+))?)+\s*|\s*)\/?>/i";
      preg_match_all($regex, $str, $matches);
      $cnt = 0;
      $keywords = array();
      foreach($matches[0] as $match){
          $keywords[$cnt] = $match;
          $str = preg_replace($regex,"_rplc".$cnt."_",$str,1);
          $cnt++;            
      }
      $tt = preg_replace($regex,'',$str2);
      $tt = str_replace('&nbsp;','',$tt);
      $tt = trim($tt);
      $str2 = $tt;
      $wordArr = preg_split('/[\s,]+/',preg_replace($regex,'',$str2));
      $wordArr2 = $wordArr;
      
      $j=0;
      while($wordArr[$i]=='nbsp'){
        $j++;
      }
      $replace_count=0;
      $posArr = array();
      $word_to_replace = array();
      for($i=0; $i<count($wordArr);$i++){
        if($i>=$j){
            if($wordArr[$i]!='nbsp'){
                if($replace_count<2){
                    $wordArr[$i] = "<b class=' blackcolor'>".$wordArr[$i]."</b>";
                    $posArr[] = $i;
                    $replace_count++;
                }
            }
        }  
      }
      $str = preg_replace("/".$wordArr2[$posArr[0]]."/",$wordArr[$posArr[0]],$str,1);
      $str = preg_replace("/".$wordArr2[$posArr[1]]."/",$wordArr[$posArr[1]],$str,1);
      $cnt=0;
      foreach($keywords as $keyword){
          $rplc = "_rplc".$cnt."_";        
          $str = str_replace($rplc,$keywords[$cnt],$str); 
          $cnt++;
      }
      $pos = strpos($str,"<b class=' blackcolor'>");
      $pos2 = strpos(substr($str,0,$pos),'color: #',0);
      if($pos2){
        $str = str_replace("<b class=' blackcolor'>","",$str);
      }
      
	  $str = sbtUserBlog::closeTags($str);
      return $str;
   }
   
   /*
	*
	* This function return top most voted blog.
	*
	*/
	public function getTopVotedBlog($limit) 
	{ 
		$query = Doctrine_Query::create()->from('SbtUserBlog sub');
		$query = $query->orderBy('sub.ublog_votes DESC');
		$query = $query->offset(0);
		$query = $query->limit($limit);	
	
		$data = $query->execute();
		return $data;
	}        
	
   /*
	*
	* This function return top most viewed blog.
	*
	*/
	public function getTopViewedBlog($limit) 
	{ 
		$query = Doctrine_Query::create()->from('SbtUserBlog sub');
		$query = $query->orderBy('sub.ublog_views DESC');
		$query = $query->offset(0);
		$query = $query->limit($limit);	
	
		$data = $query->execute();
		return $data;
	}  
	
   /*
	*
	* This function return latest blog id written by perticualr user.
	*
	*/
	public function getLatestBlogId($arr) 
	{ 
		$id_arr = array(); 
		$j = 0;
		
		for($i=0; $i<count($arr); $i++)
		{ 
			$query = Doctrine_Query::create()->from('SbtUserBlog sub');
			$query = $query->where('sub.author_id = ?',$arr[$i]);
			$query = $query->orderBy('sub.id DESC');
			$data = $query->fetchOne();
			
			if($data) { $id_arr[$j] = $data->id; $j++; }
		}
		
		return $id_arr;
	} 
	
   /*
	*
	* This function return blog in specified order.
	*
	*/
	public function getBlogInOrder($arr) 
	{ 
		if(count($arr) > 0)
		{
			$id_str = implode(",", $arr);
			$query = Doctrine_Query::create()->from('SbtUserBlog sub');
			$query = $query->whereIn('sub.id', $arr); 
			$query = $query->orderBy('FIELD(id, '.$id_str.')');
			$data = $query->execute();
			
			return $data;
		}
		else return '';
	} 
	
   /*
	*
	* This function returns count of blog written by a perticular user.
	*
	*/
	public function getBlogCnt($user_id)
	{
		$query = Doctrine_Query::create()
		       ->select('count(sub.id) as cnt')
			   ->from('SbtUserBlog sub')
			   ->where('sub.author_id = ?',$user_id);
			   
	    $data = $query->fetchArray();
		return  $data[0]['cnt'];
	}
	
   /*
	*
	* This function deletes the selected blog.
	*
	*/
	public function deleteBlogTopic($blog_id)
	{
		$data = $this->getSelectedBlog($blog_id);	
		
		if($data)
		{
			$data->delete();
		}
	}
}