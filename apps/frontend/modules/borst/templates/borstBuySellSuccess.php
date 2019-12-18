<style type="text/css">
.adheading{ width:237px;}
.adheadinggreen{ width:237px;}
.adheading_v{ width:237px;}

</style>
<div class="maincontentpage">
<div class="homeleftdiv">

  <!-- 1 to 3 start -->
  <?php $i=0; for($a=0; $a < count($one_2_three); $a++):?>
  <?php $date = explode('-',substr($one_2_three[$a]['article_date'],0,10));?>
	<div class="articleftdiv autoheight">
		<div class="dattimeinfo"> 
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$one_2_three[$a]['article_id']; ?>" class="cursor">
				<span class="date"><?php echo $date[2].' '.$month[$date[1]] ?></span> 
				<span class="update"><?php echo $cat_arr[$one_2_three[$a]['category_id']] ? $cat_arr[$one_2_three[$a]['category_id']] : '' ?></span> 
				<span class="bluefont"><?php echo $type_arr[$one_2_three[$a]['type_id']] ? $type_arr[$one_2_three[$a]['type_id']] : '' ?></span> 
			</a>
			<a href="<?php echo 'https://'.$host_str.'/borst/commentOnBorstArticle/article_id/'.$one_2_three[$a]['article_id']; ?>" class="cursor">
				<span class="chaticon"><?php echo $comment_cnt->getTotalCommentCount($one_2_three[$a]['article_id']) ?></span>
			</a>
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$one_2_three[$a]['article_id']; ?>" class="bluelink cursor"> 
				<span class="colorband"><img src="/images/smallcolorstrip.jpg" alt="strip" /> </span> 
			</a>
		</div>
		<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$one_2_three[$a]['article_id']; ?>" class="blackcolor cursor">
			<?php echo html_entity_decode($col1_13_heading_style_start[$i]) ?><?php echo $one_2_three[$a]['title'] ?><?php echo html_entity_decode($col1_13_heading_style_end[$i]) ?>
		</a>
		<div class="articleinfo">
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$one_2_three[$a]['article_id']; ?>" class="blackcolor cursor">
			<img src="/images/arrowright.jpg" alt="arrow" />
			<?php echo $one_2_three[$a]['image_text'] ?>
			</a>
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$one_2_three[$a]['article_id']; ?>" class="bluelink cursor"> Läs mer ></a>
		</div>
		<div class="artdiv">
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$one_2_three[$a]['article_id']; ?>" class="bluelink cursor">
			<?php /*?><img src="/images/<?php echo $image_arr_13[$i] ?>" alt="photo" /><?php */?>
			<img src="/uploads/articleIngressImages/<?php echo str_replace('.','_large.',$one_2_three[$a]['image']); ?>" />
			</a>
		</div>
	</div>
  <div class="artlineleftdiv">&nbsp;</div>
  <?php $i++; endfor; ?>
  <!-- 1 to 3 end -->
  
  <!-- 4 to 5 start -->
  <div class="articleftdiv">
	<div class="blank_10h widthall"></div>
	<?php $j=0; $id_arr= array(); $img45_arr = array();
	for($b=0; $b < count($four_2_five); $b++):?>
	<?php $id_arr[] = $four_2_five[$b]['article_id']; ?>
	<?php $img45_arr[] = $four_2_five[$b]['image']; ?>
	<?php $j++; endfor; ?>
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="float_left">
	  <tr>
		<td width="198" valign="bottom">
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$id_arr[0]; ?>" class="cursor">
<!--				<img src="/images/smallphoto.jpg" alt="photo" width="198" height="148" />
-->				<img src="/uploads/articleIngressImages/<?php echo str_replace('.','_semimid.',$img45_arr[0]); ?>" />
			</a>
		</td>
		<td width="10">&nbsp;</td>
		<td width="198" valign="bottom">
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$id_arr[1]; ?>" class="cursor">
<!--				<img src="/images/smallphoto.jpg" alt="photo" width="198" height="148" />
-->				<img src="/uploads/articleIngressImages/<?php echo str_replace('.','_semimid.',$img45_arr[1]); ?>" />
			</a>
		</td>
	  </tr>
	  <tr>
		<?php $j=0; for($b=0; $b < count($four_2_five); $b++):?>
		<?php $date = explode('-',substr($four_2_five[$b]['article_date'],0,10));?>
		<td valign="top">
		<div class="dattimeinfo"> 
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$four_2_five[$b]['article_id']; ?>" class="cursor">
				<span class="date"><?php echo $date[2].' '.$month[$date[1]] ?></span> 
				<span class="update"><?php echo $cat_arr[$four_2_five[$b]['category_id']] ? $cat_arr[$four_2_five[$b]['category_id']] : '' ?></span> 
				<span class="bluefont"><?php echo $type_arr[$four_2_five[$b]['type_id']] ? $type_arr[$four_2_five[$b]['type_id']] : '' ?></span> 
			</a>
			<a href="<?php echo 'https://'.$host_str.'/borst/commentOnBorstArticle/article_id/'.$four_2_five[$b]['article_id']; ?>">
				<span class="chaticon"><?php echo $comment_cnt->getTotalCommentCount($four_2_five[$b]['article_id']) ?></span>
			</a>
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$four_2_five[$b]['article_id']; ?>" class="bluelink">  
				<span class="colorband"><img src="/images/smallcolorstrip.jpg" alt="strip" /> </span> 
			</a>
		</div>
		<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$four_2_five[$b]['article_id']; ?>" class="cursor">
			<div class="<?php echo $col1_45_div_style[$j] ?>"><?php echo $four_2_five[$b]['title']?></div>
		</a>
		<div class="articleinfo"> 
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$four_2_five[$b]['article_id']; ?>" class="blackcolor cursor">
			<img src="/images/arrowright.jpg" alt="arrow" />
			<?php echo $four_2_five[$b]['image_text']?>
			</a>
			<a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/<?php echo $four_2_five[$b]['article_id']; ?>" class="bluelink"> Läs mer ></a>
		</div>
		</td>
		<?php if($j==0):?><td>&nbsp;</td><?php endif; ?>
		<?php $j++; endfor; ?>
	  </tr>
	</table>
  </div>
  <!-- 4 to 5 start -->
  
  
  <div class="artlineleftdiv">&nbsp;</div>
  
  <!-- 6 to 8 start -->
  <?php $i=0; for($c=0; $c < count($six_2_eight); $c++):?>
  <?php $date = explode('-',substr($six_2_eight[$c]['article_date'],0,10));?>
	<div class="articleftdiv autoheight">
		<div class="dattimeinfo"> 
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$six_2_eight[$c]['article_id']; ?>" class="cursor">
				<span class="date"><?php echo $date[2].' '.$month[$date[1]] ?></span> 
				<span class="update"><?php echo $cat_arr[$six_2_eight[$c]['category_id']] ? $cat_arr[$six_2_eight[$c]['category_id']] : '' ?></span> 
				<span class="bluefont"><?php echo $type_arr[$six_2_eight[$c]['type_id']] ? $type_arr[$six_2_eight[$c]['type_id']] : '' ?></span> 
			</a>
			<a href="<?php echo 'https://'.$host_str.'/borst/commentOnBorstArticle/article_id/'.$six_2_eight[$c]['article_id']; ?>" class="cursor">
				<span class="chaticon"><?php echo $comment_cnt->getTotalCommentCount($six_2_eight[$c]['article_id']) ?></span>
			</a>
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$six_2_eight[$c]['article_id']; ?>" class="bluelink cursor"> 
				<span class="colorband"><img src="/images/smallcolorstrip.jpg" alt="strip" /> </span> 
			</a>
		</div>
		<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$six_2_eight[$c]['article_id']; ?>" class="blackcolor cursor">
			<?php echo html_entity_decode($col1_13_heading_style_start[$i]) ?><?php echo $six_2_eight[$c]['title'] ?><?php echo html_entity_decode($col1_13_heading_style_end[$i]) ?>
		</a>
		<div class="articleinfo">
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$six_2_eight[$c]['article_id']; ?>" class="blackcolor cursor">
			<img src="/images/arrowright.jpg" alt="arrow" />
			<?php echo $six_2_eight[$c]['image_text'] ?>
			</a>
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$six_2_eight[$c]['article_id']; ?>" class="bluelink cursor"> Läs mer ></a>
		</div>
		<div class="artdiv">
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$six_2_eight[$c]['article_id']; ?>" class="bluelink cursor">
			<?php /*?><img src="/images/<?php echo $image_arr_13[$i] ?>" alt="photo" /><?php */?>
			<img src="/uploads/articleIngressImages/<?php echo str_replace('.','_large.',$six_2_eight[$c]['image']); ?>" />
			</a>
		</div>
	</div>
  <div class="artlineleftdiv">&nbsp;</div>
  <?php $i++; endfor; ?>
  <!-- 6 to 8 end -->
  
  <!-- 9 to 10 start -->
  <div class="articleftdiv">
	<div class="blank_10h widthall"></div>
	<?php $j=0; $id_arr= array();$img45_arr = array();
	 for($d=0; $d < count($nine_2_ten); $d++):?>
    <?php $id_arr[] = $nine_2_ten[$d]['article_id']; ?>
    <?php $img45_arr[] = $nine_2_ten[$d]['image']; ?>
    <?php $j++; endfor; ?>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="float_left">
      <tr>
        <td width="198" valign="bottom">
            <a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$id_arr[0]; ?>" class="cursor">
<!--                <img src="/images/smallphoto.jpg" alt="photo" width="198" height="148" />
-->                <img src="/uploads/articleIngressImages/<?php echo str_replace('.','_semimid.',$img45_arr[0]); ?>" />
            </a>
        </td>
        <td width="10">&nbsp;</td>
        <td width="198" valign="bottom">
            <a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$id_arr[1]; ?>" class="cursor">
<?php /*?>                <img src="/images/smallphoto.jpg" alt="photo" width="198" height="148" />
<?php */?>                <img src="/uploads/articleIngressImages/<?php echo str_replace('.','_semimid.',$img45_arr[1]); ?>" />
            </a>
        </td>
      </tr>
      <tr>
        <?php $j=0; for($d=0; $d < count($nine_2_ten); $d++):?>
        <?php $date = explode('-',substr($nine_2_ten[$d]['article_date'],0,10));?>
        <td valign="top">
        <div class="dattimeinfo"> 
            <a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$nine_2_ten[$d]['article_id']; ?>" class="cursor">
                <span class="date"><?php echo $date[2].' '.$month[$date[1]] ?></span> 
                <span class="update"><?php echo $cat_arr[$nine_2_ten[$d]['category_id']] ? $cat_arr[$nine_2_ten[$d]['category_id']] : '' ?></span> 
                <span class="bluefont"><?php echo $type_arr[$nine_2_ten[$d]['type_id']] ? $type_arr[$nine_2_ten[$d]['type_id']] : '' ?></span> 
            </a>
            <a href="<?php echo 'https://'.$host_str.'/borst/commentOnBorstArticle/article_id/'.$nine_2_ten[$d]['article_id']; ?>">
                <span class="chaticon"><?php echo $comment_cnt->getTotalCommentCount($nine_2_ten[$d]['article_id']) ?></span>
            </a>
            <a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$nine_2_ten[$d]['article_id']; ?>" class="bluelink">  
                <span class="colorband"><img src="/images/smallcolorstrip.jpg" alt="strip" /> </span> 
            </a>
        </div>
        <a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$nine_2_ten[$d]['article_id']; ?>" class="cursor">
            <div class="<?php echo $col1_45_div_style[$j] ?>"><?php echo $nine_2_ten[$d]['title']?></div>
        </a>
        <div class="articleinfo"> 
            <a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$nine_2_ten[$d]['article_id']; ?>" class="blackcolor cursor">
            <img src="/images/arrowright.jpg" alt="arrow" />
            <?php echo $nine_2_ten[$d]['image_text']?>
            </a>
            <a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/<?php echo $nine_2_ten[$d]['article_id']; ?>" class="bluelink"> Läs mer ></a>
        </div>
        </td>
        <?php if($j==0):?><td>&nbsp;</td><?php endif; ?>
        <?php $j++; endfor; ?>
      </tr>
    </table>
  </div>
  <!-- 9 to 10 end -->
  
  <div class="artlineleftdiv">&nbsp;</div>
  
  <!-- 11 to 13 start -->
  <?php $i=0; for($e=0; $e < count($eleven_2_thirteen); $e++):?>
  <?php $date = explode('-',substr($eleven_2_thirteen[$e]['article_date'],0,10));?>
	<div class="articleftdiv autoheight">
		<div class="dattimeinfo"> 
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$eleven_2_thirteen[$e]['article_id']; ?>" class="cursor">
				<span class="date"><?php echo $date[2].' '.$month[$date[1]] ?></span> 
				<span class="update"><?php echo $cat_arr[$eleven_2_thirteen[$e]['category_id']] ? $cat_arr[$eleven_2_thirteen[$e]['category_id']] : '' ?></span> 
				<span class="bluefont"><?php echo $type_arr[$eleven_2_thirteen[$e]['type_id']] ? $type_arr[$eleven_2_thirteen[$e]['type_id']] : '' ?></span> 
			</a>
			<a href="<?php echo 'https://'.$host_str.'/borst/commentOnBorstArticle/article_id/'.$eleven_2_thirteen[$e]['article_id']; ?>" class="cursor">
				<span class="chaticon"><?php echo $comment_cnt->getTotalCommentCount($eleven_2_thirteen[$e]['article_id']) ?></span>
			</a>
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$eleven_2_thirteen[$e]['article_id']; ?>" class="bluelink cursor"> 
				<span class="colorband"><img src="/images/smallcolorstrip.jpg" alt="strip" /> </span> 
			</a>
		</div>
		<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$eleven_2_thirteen[$e]['article_id']; ?>" class="blackcolor cursor">
			<?php echo html_entity_decode($col1_13_heading_style_start[$i]) ?><?php echo $eleven_2_thirteen[$e]['title'] ?><?php echo html_entity_decode($col1_13_heading_style_end[$i]) ?>
		</a>
		<div class="articleinfo">
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$eleven_2_thirteen[$e]['article_id']; ?>" class="blackcolor cursor">
			<img src="/images/arrowright.jpg" alt="arrow" />
			<?php echo $eleven_2_thirteen[$e]['image_text'] ?>
			</a>
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$eleven_2_thirteen[$e]['article_id']; ?>" class="bluelink cursor"> Läs mer ></a>
		</div>
		<div class="artdiv">
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$eleven_2_thirteen[$e]['article_id']; ?>" class="bluelink cursor">
			<?php /*?><img src="/images/<?php echo $image_arr_13[$i] ?>" alt="photo" /><?php */?>
			<img src="/uploads/articleIngressImages/<?php echo str_replace('.','_large.',$eleven_2_thirteen[$e]['image']); ?>" />
			</a>
		</div>
	</div>
  <div class="artlineleftdiv">&nbsp;</div>
  <?php $i++; endfor; ?>
  <!-- 11 to 13 end -->
  
  <!-- 14 to 15 start -->
  <div class="articleftdiv">
	<div class="blank_10h widthall"></div>
	<?php $j=0; $id_arr= array(); $img45_arr = array();
	for($f=0; $f < count($fourteen_2_fifteen); $f++):?>
	<?php $id_arr[] = $fourteen_2_fifteen[$f]['article_id']; ?>
	<?php $img45_arr[] = $fourteen_2_fifteen[$f]['image']; ?>
	<?php $j++; endfor; ?>
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="float_left">
	  <tr>
		<td width="198" valign="bottom">
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$id_arr[0]; ?>" class="cursor">
<?php /*?>				<img src="/images/smallphoto.jpg" alt="photo" width="198" height="148" />
<?php */?>				<img src="/uploads/articleIngressImages/<?php echo str_replace('.','_semimid.',$img45_arr[0]); ?>" />
			</a>
		</td>
		<td width="10">&nbsp;</td>
		<td width="198" valign="bottom">
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$id_arr[1]; ?>" class="cursor">
				<?php /*?><img src="/images/smallphoto.jpg" alt="photo" width="198" height="148" /><?php */?>
				<img src="/uploads/articleIngressImages/<?php echo str_replace('.','_semimid.',$img45_arr[1]); ?>" />
			</a>
		</td>
	  </tr>
	  <tr>
		<?php $j=0; for($f=0; $f < count($fourteen_2_fifteen); $f++):?>
		<?php $date = explode('-',substr($fourteen_2_fifteen[$f]['article_date'],0,10));?>
		<td valign="top">
		<div class="dattimeinfo"> 
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$fourteen_2_fifteen[$f]['article_id']; ?>" class="cursor">
				<span class="date"><?php echo $date[2].' '.$month[$date[1]] ?></span> 
				<span class="update"><?php echo $cat_arr[$fourteen_2_fifteen[$f]['category_id']] ? $cat_arr[$fourteen_2_fifteen[$f]['category_id']] : '' ?></span> 
				<span class="bluefont"><?php echo $type_arr[$fourteen_2_fifteen[$f]['type_id']] ? $type_arr[$fourteen_2_fifteen[$f]['type_id']] : '' ?></span> 
			</a>
			<a href="<?php echo 'https://'.$host_str.'/borst/commentOnBorstArticle/article_id/'.$fourteen_2_fifteen[$f]['article_id']; ?>">
				<span class="chaticon"><?php echo $comment_cnt->getTotalCommentCount($fourteen_2_fifteen[$f]['article_id']) ?></span>
			</a>
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$fourteen_2_fifteen[$f]['article_id']; ?>" class="bluelink">  
				<span class="colorband"><img src="/images/smallcolorstrip.jpg" alt="strip" /> </span> 
			</a>
		</div>
		<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$fourteen_2_fifteen[$f]['article_id']; ?>" class="cursor">
			<div class="<?php echo $col1_45_div_style[$j] ?>"><?php echo $fourteen_2_fifteen[$f]['title']?></div>
		</a>
		<div class="articleinfo"> 
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$fourteen_2_fifteen[$f]['article_id']; ?>" class="blackcolor cursor">
			<img src="/images/arrowright.jpg" alt="arrow" />
			<?php echo $fourteen_2_fifteen[$f]['image_text']?>
			</a>
			<a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/<?php echo $fourteen_2_fifteen[$f]['article_id']; ?>" class="bluelink"> Läs mer ></a>
		</div>
		</td>
		<?php if($j==0):?><td>&nbsp;</td><?php endif; ?>
		<?php $j++; endfor; ?>
	  </tr>
	</table>
  </div>
  <!-- 14 to 15 start -->

</div>

<div class="homemiddiv autoheight">
  
  <!-- 16 to 19 start -->
  <?php $l=0; for($g = 0; $g < count($sixteen_2_nineteen); $g++):?>
  <?php $date = explode('-',substr($sixteen_2_nineteen[$g]['article_date'],0,10));?>
	<div class="articleftdivmid">
		<div class="artmiddiv">
		<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$sixteen_2_nineteen[$g]['article_id']; ?>" class="bluelink cursor">
			<?php /*?><img src="/images/<?php echo $image_arr_814[$l] ?>" alt="photo" /><?php */?>
			<img src="/uploads/articleIngressImages/<?php echo str_replace('.','_mid.',$sixteen_2_nineteen[$g]['image']); ?>" />
		</a>
		</div>
		<div class="dattimeinfo">
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$sixteen_2_nineteen[$g]['article_id']; ?>" class="cursor"> 
				<span class="date"><?php echo $date[2].' '.$month[$date[1]] ?></span> 
				<span class="update"><?php echo $cat_arr[$sixteen_2_nineteen[$g]['category_id']] ? $cat_arr[$sixteen_2_nineteen[$g]['category_id']] : '' ?></span> 
				<span class="bluefont"><?php echo $type_arr[$sixteen_2_nineteen[$g]['type_id']] ? $type_arr[$sixteen_2_nineteen[$g]['type_id']] : '' ?></span> 
			</a>
			<a href="<?php echo 'https://'.$host_str.'/borst/commentOnBorstArticle/article_id/'.$sixteen_2_nineteen[$g]['article_id']; ?>" class="cursor">
				<span class="chaticon"><?php echo $comment_cnt->getTotalCommentCount($sixteen_2_nineteen[$g]['article_id']) ?></span>
			</a>
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$sixteen_2_nineteen[$g]['article_id']; ?>" class="bluelink cursor">
				<span class="colorband"><img src="/images/smallcolorstrip.jpg" alt="strip" /> </span> 
			</a>
		</div>
		<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$sixteen_2_nineteen[$g]['article_id']; ?>" class="blackcolor cursor">
			<h4 class="<?php echo $col1_814_heading_style[$l] ?>"><span><?php echo $sixteen_2_nineteen[$g]['title']?></span></h4>
		</a>
		<div class="articleinfo"> 
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$sixteen_2_nineteen[$g]['article_id']; ?>" class="blackcolor cursor">
				<img src="/images/arrowright.jpg" alt="arrow" />
				<?php echo $sixteen_2_nineteen[$g]['image_text']?>
			</a>
			<a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/<?php echo $sixteen_2_nineteen[$g]['article_id']; ?>" class="bluelink"> Läs mer ></a>
		</div>
		<?php if($l<6):?><div class="artline">&nbsp;</div><?php endif; ?>
	</div>  
  <?php $l++; endfor; ?>
  <!-- 16 to 19 end -->
  
  <!-- 20 to 23 start -->
  <?php $x=0; for($h = 0; $h < count($twenty_2_twentythree); $h++):?>
  <?php $date = explode('-',substr($twenty_2_twentythree[$h]['article_date'],0,10));?>
	<div class="articleftdivmid">
		<div class="artmiddiv">
		<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$twenty_2_twentythree[$h]['article_id']; ?>" class="bluelink cursor">
			<?php /*?><img src="/images/<?php echo $image_arr_814[$x] ?>" alt="photo" /><?php */?>
			<img src="/uploads/articleIngressImages/<?php echo str_replace('.','_mid.',$twenty_2_twentythree[$h]['image']); ?>" />
		</a>
		</div>
		<div class="dattimeinfo">
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$twenty_2_twentythree[$h]['article_id']; ?>" class="cursor"> 
				<span class="date"><?php echo $date[2].' '.$month[$date[1]] ?></span> 
				<span class="update"><?php echo $cat_arr[$twenty_2_twentythree[$h]['category_id']] ? $cat_arr[$twenty_2_twentythree[$h]['category_id']] : '' ?></span> 
				<span class="bluefont"><?php echo $type_arr[$twenty_2_twentythree[$h]['type_id']] ? $type_arr[$twenty_2_twentythree[$h]['type_id']] : '' ?></span> 
			</a>
			<a href="<?php echo 'https://'.$host_str.'/borst/commentOnBorstArticle/article_id/'.$twenty_2_twentythree[$h]['article_id']; ?>" class="cursor">
				<span class="chaticon"><?php echo $comment_cnt->getTotalCommentCount($twenty_2_twentythree[$h]['article_id']) ?></span>
			</a>
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$twenty_2_twentythree[$h]['article_id']; ?>" class="bluelink cursor">
				<span class="colorband"><img src="/images/smallcolorstrip.jpg" alt="strip" /> </span> 
			</a>
		</div>
		<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$twenty_2_twentythree[$h]['article_id']; ?>" class="blackcolor cursor">
			<h4 class="<?php echo $col1_814_heading_style[$h] ?>"><span><?php echo $twenty_2_twentythree[$h]['title']?></span></h4>
		</a>
		<div class="articleinfo"> 
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$twenty_2_twentythree[$h]['article_id']; ?>" class="blackcolor cursor">
				<img src="/images/arrowright.jpg" alt="arrow" />
				<?php echo $twenty_2_twentythree[$h]['image_text']?>
			</a>
			<a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/<?php echo $twenty_2_twentythree[$h]['article_id']; ?>" class="bluelink"> Läs mer ></a>
		</div>
		<?php if($x<6):?><div class="artline">&nbsp;</div><?php endif; ?>
	</div>  
  <?php $x++; endfor; ?>
  <!-- 20 to 23 end -->
  
  <!-- 24 to 27 start -->
  <?php $z=0; for($k = 0; $k < count($twentyfour_2_twentyseven); $k++):?>
  <?php $date = explode('-',substr($twentyfour_2_twentyseven[$k]['article_date'],0,10));?>
	<div class="articleftdivmid">
		<div class="artmiddiv">
		<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$twentyfour_2_twentyseven[$k]['article_id']; ?>" class="bluelink cursor">
			<?php /*?><img src="/images/<?php echo $image_arr_814[$z] ?>" alt="photo" /><?php */?>
			<img src="/uploads/articleIngressImages/<?php echo str_replace('.','_mid.',$twentyfour_2_twentyseven[$k]['image']); ?>" />
		</a>
		</div>
		<div class="dattimeinfo">
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$twentyfour_2_twentyseven[$k]['article_id']; ?>" class="cursor"> 
				<span class="date"><?php echo $date[2].' '.$month[$date[1]] ?></span> 
				<span class="update"><?php echo $cat_arr[$twentyfour_2_twentyseven[$k]['category_id']] ? $cat_arr[$twentyfour_2_twentyseven[$k]['category_id']] : '' ?></span> 
				<span class="bluefont"><?php echo $type_arr[$twentyfour_2_twentyseven[$k]['type_id']] ? $type_arr[$twentyfour_2_twentyseven[$k]['type_id']] : '' ?></span> 
			</a>
			<a href="<?php echo 'https://'.$host_str.'/borst/commentOnBorstArticle/article_id/'.$twentyfour_2_twentyseven[$k]['article_id']; ?>" class="cursor">
				<span class="chaticon"><?php echo $comment_cnt->getTotalCommentCount($twentyfour_2_twentyseven[$k]['article_id']) ?></span>
			</a>
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$twentyfour_2_twentyseven[$k]['article_id']; ?>" class="bluelink cursor">
				<span class="colorband"><img src="/images/smallcolorstrip.jpg" alt="strip" /> </span> 
			</a>
		</div>
		<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$twentyfour_2_twentyseven[$k]['article_id']; ?>" class="blackcolor cursor">
			<h4 class="<?php echo $col1_814_heading_style[$z] ?>"><span><?php echo $twentyfour_2_twentyseven[$k]['title']?></span></h4>
		</a>
		<div class="articleinfo"> 
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$twentyfour_2_twentyseven[$k]['article_id']; ?>" class="blackcolor cursor">
				<img src="/images/arrowright.jpg" alt="arrow" />
				<?php echo $twentyfour_2_twentyseven[$k]['image_text']?>
			</a>
			<a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/<?php echo $twentyfour_2_twentyseven[$k]['article_id']; ?>" class="bluelink"> Läs mer ></a>
		</div>
		<?php if($z<6):?><div class="artline">&nbsp;</div><?php endif; ?>
	</div>  
  <?php $z++; endfor; ?>
  <!-- 24 to 27 end -->
  
</div>

<div class="rightbanner autoheight padding_0 font_0">
  <?php include_partial('global/ad_message') ?>
  <?php include_partial('global/right_top_ads',array('ad'=>$ad_1)) ?>
  <?php include_partial('global/right_top_ads',array('ad'=>$ad_2)) ?>
  
  <!-- 28 to 35 start -->
  <?php $m=0; for($l = 0; $l < count($twentyeight_2_thirtyfive); $l++):?>
  <?php $date = explode('-',substr($twentyeight_2_thirtyfive[$l]['article_date'],0,10));?>
	<div class="home_right_column">
		<?php if($m==0):?>
		<?php include_partial('global/sponsorer_ad') ?>
		<?php //include_partial('global/bulk_ads',array('bulk_ads'=>$ad_3)) ?>
		<div class="adline"></div>
		<?php endif; ?>
		<div class="dattimeinfo"> 
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$twentyeight_2_thirtyfive[$l]['article_id']; ?>" class="cursor">
				<span class="date"><?php echo $date[2].' '.$month[$date[1]] ?></span> 
				<span class="update"><?php echo $cat_arr[$twentyeight_2_thirtyfive[$l]['category_id']] ? $cat_arr[$twentyeight_2_thirtyfive[$l]['category_id']] : '' ?></span> 
				<span class="bluefont"><?php echo $type_arr[$twentyeight_2_thirtyfive[$l]['type_id']] ? $type_arr[$twentyeight_2_thirtyfive[$l]['type_id']] : '' ?></span> 
			</a>
			<a href="<?php echo 'https://'.$host_str.'/borst/commentOnBorstArticle/article_id/'.$twentyeight_2_thirtyfive[$l]['article_id']; ?>" class="cursor">
				<span class="chaticon"><?php echo $comment_cnt->getTotalCommentCount($twentyeight_2_thirtyfive[$l]['article_id']) ?></span>
			</a>
			<span class="colorband">
				<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$twentyeight_2_thirtyfive[$l]['article_id']; ?>" class="bluelink cursor"> <img src="/images/smallcolorstrip.jpg" alt="strip" /></a>
			</span> 
		</div>
		<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$twentyeight_2_thirtyfive[$l]['article_id']; ?>" class="blackcolor cursor">
		<div  class="advrtdheading">
		  <h3 class="<?php echo $last_column_style[$m] ?>"><?php echo $twentyeight_2_thirtyfive[$l]['title'] ?></h3>
		</div>
		</a>
		<div class="advertinfo font_12"> 
			<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$twentyeight_2_thirtyfive[$l]['article_id']; ?>" class="blackcolor cursor">
			<img src="/images/arrowright.jpg" alt="arrow" />
			<?php echo $twentyeight_2_thirtyfive[$l]['image_text']?>
			</a>
			<a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/<?php echo $twentyeight_2_thirtyfive[$l]['article_id']; ?>" class="bluelink"> Läs mer ></a>
		</div>
		<div class="advertdiv photo">
		<a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$twentyeight_2_thirtyfive[$l]['article_id']; ?>" class="bluelink cursor">
			<?php /*?><img src="/images/<?php echo $last_column_img[$m] ?>" alt="photo1" /><?php */?>
			<img src="/uploads/articleIngressImages/<?php echo str_replace('.','_small.',$twentyeight_2_thirtyfive[$l]['image']); ?>" />
		</a>
		</div>
	</div>
  <?php $m++; endfor; ?>
  <!-- 28 to 35 start -->
  
  <?php include_partial('global/bulk_ads',array('bulk_ads'=>$ad_3)) ?>
  <div class="blank_10h">&nbsp;</div>
  <?php include_partial('global/right_top_ads',array('ad'=>$ad_4,''=>'padding-top:10px;')) ?>
</div>
<div class="colorstrip">&nbsp;</div>
<?php include_partial('global/six_cube_footer',array('host_str'=>$host_str,'bottom_commodities_links'=>$bottom_commodities_links,'bottom_currencies_links'=>$bottom_currencies_links,'bottom_buysell_links'=>$bottom_buysell_links,'bottom_statistics_links'=>$bottom_statistics_links,'bottom_aktier_links'=>$bottom_aktier_links,'bottom_kronika_links'=>$bottom_kronika_links)) ?>
</div>