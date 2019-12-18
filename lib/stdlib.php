<?php
class stdlib
{
	//-----------------------------------------------------------------------------------------
	// These features come from my little forum
	//-----------------------------------------------------------------------------------------

	function bbcode($string)
	{
		global $settings;
		$string = preg_replace("#\[p\](.+?)\[/p\]#is", "<p>\\1</p>", $string);
		$string = preg_replace("#\[b\](.+?)\[/b\]#is", "<b>\\1</b>", $string);
		$string = preg_replace("#\[i\](.+?)\[/i\]#is", "<i>\\1</i>", $string);
		$string = preg_replace("#\[u\](.+?)\[/u\]#is", "<u>\\1</u>", $string);
		$string = preg_replace("#\[link\]www\.(.+?)\[/link\]#is", "<a href=\"https://www.\\1\">www.\\1</a>", $string);
		$string = preg_replace_callback("#\[link\](.+?)\[/link\]#is", "shorten_link", $string);
		//$string = preg_replace("#\[link=(.+?)\](.+?)\[/link\]#is", "<a href=\"\\1\" name=\"\\2\">\\2</a>", $string);
		$string = preg_replace("#\[link=(.+?)\](.+?)\[/link\]#is", "<a href=\"\\1\">\\2</a>", $string);
		$string = preg_replace("#\[url\]www\.(.+?)\[/url\]#is", "<a href=\"https://www.\\1\">www.\\1</a>", $string);
		$string = preg_replace_callback("#\[url\](.+?)\[/url\]#is", "shorten_link", $string);
		$string = preg_replace("#\[url=(.+?)\](.+?)\[/url\]#is", "<a href=\"\\1\">\\2</a>", $string);
		$string = preg_replace_callback("#\[code\](.+?)\[/code\]#is", "parse_code", $string);
		$string = preg_replace("#\[msg\](.+?)\[/msg\]#is", "<a href=\"".basename($_SERVER['PHP_SELF'])."?id=\\1\">\\1</a>", $string);
		$string = preg_replace("#\[msg=(.+?)\](.+?)\[/msg\]#is", "<a href=\"".basename($_SERVER['PHP_SELF'])."?id=\\1\">\\2</a>", $string);
		
		// if ($settings['bbcode_img'] == 1)
		// {
		$string = preg_replace("#\[img\](.+?)\[/img\]#is", "<img src=\"\\1\" alt=\"[image]\" style=\"margin: 0px 0px 0px 0px\" />", $string);
		$string = preg_replace("#\[img\|left\](.+?)\[/img\]#is", "<img src=\"\\1\" alt=\"[image]\" style=\"float: left; margin: 3px 10px 8px 0px\" />", $string);
		$string = preg_replace("#\[img\|right\](.+?)\[/img\]#is", "<img src=\"\\1\" alt=\"[image]\" style=\"float: right; margin: 6px 0px 4px 8px\" />", $string);
		// }
		return $string;
	}

	function remove_img($string)  
	{
		$string = preg_replace("#\[img\](.+?)\[/img\]#is", "", $string);
		$string = preg_replace("#\[img\|left\](.+?)\[/img\]#is", "", $string);
		$string = preg_replace("#\[img\|right\](.+?)\[/img\]#is", "", $string);
		return $string;
	}

	function make_link($string)
	{
		$string = ' ' . $string;
		$string = preg_replace_callback("#(^|[\n ])([\w]+?://.*?[^ \"\n\r\t<]*)#is", "shorten_link", $string);
		$string = preg_replace("#(^|[\n ])((www|ftp)\.[\w\-]+\.[\w\-.\~]+(?:/[^ \"\t\n\r<]*)?)#is", "\\1<a href=\"https://\\2\">\\2</a>", $string);
		$string = preg_replace("#(^|[\n ])([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1<a href=\"mailto:\\2@\\3\">\\2@\\3</a>", $string);
		$string = substr($string, 1);

		return $string;
	}

	function shorten_link($string)
 	{
 		global $settings;
 		if(count($string) == 2) { $pre = ""; $url = $string[1]; }
	 	else { $pre = $string[1]; $url = $string[2]; }
 		$shortened_url = $url;
  		
		if (strlen($url) > $settings['text_word_maxlength']) $shortened_url = substr($url, 0, ($settings['text_word_maxlength']/2)) . "..." . substr($url, - ($settings['text_word_maxlength']-3-$settings['text_word_maxlength']/2));

  		return $pre."<a href=\"".$url."\">".$shortened_url."</a>";
 	}

	function parse_code($string)
 	{
 		if(basename($_SERVER['PHP_SELF'])=='board_entry.php' || basename($_SERVER['PHP_SELF'])=='mix_entry.php') $p_class='postingboard'; else $p_class='posting';
 		$string = $string[1];
 		$string = str_replace('<br />','',$string);
  		$string = '</p><pre><span class="code">'.$string.'</span></pre><p class="'.$p_class.'">';
  		return $string;
 	}

	function zitat($string)
	{
		global $settings;
		$string = preg_replace("/^".htmlspecialchars($settings['quote_symbol'])."\\s+(.*)/", "<span class=\"citation\">".htmlspecialchars($settings['quote_symbol'])." \\1</span>", $string);
		$string = preg_replace("/\\n".htmlspecialchars($settings['quote_symbol'])."\\s+(.*)/", "<span class=\"citation\">".htmlspecialchars($settings['quote_symbol'])." \\1</span>", $string);
		$string = preg_replace("/\\n ".htmlspecialchars($settings['quote_symbol'])."\\s+(.*)/", "<span class=\"citation\">".htmlspecialchars($settings['quote_symbol'])." \\1</span>", $string);

		return $string;
	}

	function ov(&$var) 
	{
		/* returns $var with the HTML characters (like "<", ">", etc.) properly quoted,
	 	 * or if $var is undefined, will return an empty string.  note this function
	 	 * must be called with a variable, for normal strings or functions use o() */
		return isset($var) ? htmlSpecialChars(stripslashes($var)) : "";
	}

	function pv(&$var) 
	{
		/* prints $var with the HTML characters (like "<", ">", etc.) properly quoted,
		 * or if $var is undefined, will print an empty string.  note this function
		 * must be called with a variable, for normal strings or functions use p() */
		 echo isset($var) ? htmlSpecialChars(stripslashes($var)) : "";
	}

	function me_with_querystring() 
	{
		/* returns the name of the current script, without the querystring portion.
		 * this function is necessary because PHP_SELF and REQUEST_URI and PATH_INFO
		 * return different things depending on a lot of things like your OS, Web
		 * server, and the way PHP is compiled (ie. as a CGI, module, ISAPI, etc.) */
	
		if (getenv("REQUEST_URI")) {
			$me = getenv("REQUEST_URI");
		} elseif (getenv("PATH_INFO")) {
			$me = getenv("PATH_INFO");
		} elseif ($_SERVER["SCRIPT_NAME"]) {
			$me = $_SERVER["SCRIPT_NAME"];
		}
		
		$query_string = str_replace(array('&amp;', '&'), array('&', '&amp;'),$_SERVER['QUERY_STRING']);
		$me = $me . "?" . $query_string;
		
		return $me;
	}

	function read_template($filename, &$var) 
	{
		/* return a (big) string containing the contents of a template file with all
		 * the variables interpolated.  all the variables must be in the $var[] array or
		 * object (whatever you decide to use).
		 *
		 * WARNING: do not use this on big files!! */
	
		$temp = str_replace("\\", "\\\\", implode(file($filename), ""));
		$temp = str_replace('"', '\"', $temp);
		eval("\$template = \"$temp\";");
		return $template;
	}

	function accessed_url() 
	{
		/* returns the name of the current script, without the querystring portion.
		 * this function is necessary because PHP_SELF and REQUEST_URI and PATH_INFO
		 * return different things depending on a lot of things like your OS, Web
		 * server, and the way PHP is compiled (ie. as a CGI, module, ISAPI, etc.) */
	
		if (getenv("REQUEST_URI")) 
		{
			$me = getenv("REQUEST_URI");
		} 
		elseif (getenv("PATH_INFO")) 
		{
			$me = getenv("PATH_INFO");
		} 
		elseif ($_SERVER["SCRIPT_NAME"]) 
		{
			$me = $_SERVER["SCRIPT_NAME"];
		}
		
		return $me;
	}
	
	function resize($uploaded_file, $file, $new_width, $new_height, $compression=80)
 	{ 
                ini_set('memory_limit', '-1');
		if(file_exists($file))
		{
			@chmod($file, 0777);
			@unlink($file);
		}
		
		$image_info = getimagesize($uploaded_file);
		if(!is_array($image_info) || $image_info[2] != 1 && $image_info[2] != 2 && $image_info[2] != 3) $error = true;
		if(empty($error))
		{ 
			if($image_info[2]==1) // GIF
			{ 
				$current_image = @ImageCreateFromGIF($uploaded_file) or $error = true;
				if(empty($error)) $new_image = @ImageCreate($new_width,$new_height) or $error = true;
				if(empty($error)) @ImageCopyResized($new_image,$current_image,0,0,0,0,$new_width,$new_height,$image_info[0],$image_info[1]) or $error=true;
				if(empty($error)) @ImageGIF($new_image, $file) or $error = true;
			}
			elseif($image_info[2]==2) // JPG
			{
				$current_image = @ImageCreateFromJPEG($uploaded_file) or $error = true;
				if(empty($error)) $new_image=@imagecreatetruecolor($new_width,$new_height) or $error = true;
				if(empty($error)) @ImageCopyResized($new_image,$current_image,0,0,0,0,$new_width,$new_height,$image_info[0],$image_info[1]) or $error = true;
				if(empty($error)) @ImageJPEG($new_image, $file, $compression) or $error = true;
			}
			elseif($image_info[2]==3) // PNG
			{
				$current_image=ImageCreateFromPNG($uploaded_file) or $error = true;
				if(empty($error)) $new_image=imagecreatetruecolor($new_width,$new_height) or $error = true;
				if(empty($error)) ImageCopyResized($new_image,$current_image,0,0,0,0,$new_width,$new_height,$image_info[0],$image_info[1]) or $error = true; 
				if(empty($error)) ImagePNG($new_image, $file) or $error = $true;
			}
			elseif($image_info[2]==6) // BMP
			{
				$current_image=ImageCreateFromBMP($uploaded_file) or $error = true;
				if(empty($error)) $new_image=imagecreatetruecolor($new_width,$new_height) or $error = true;
				if(empty($error)) ImageCopyResized($new_image,$current_image,0,0,0,0,$new_width,$new_height,$image_info[0],$image_info[1]) or $error = true;
				if(empty($error)) ImageBMP($new_image, $file) or $error = $true;
			}
		}
		
		if(empty($error)) return true;
		else return false;
 	}

}
?>