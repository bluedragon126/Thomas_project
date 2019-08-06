<div class="maincontentpage" id="minsid">
  <div class="mainconetentinner">
    <div class="blogleft2_divpart">
      <div class="float_left widthall">
        <div class=" blank_10h widthall">&nbsp;</div>
        <h1 class="minsid_heading widthall"><font  color="#d9dadb">Namnge </font> din blogg</h1>
        <div class=" blank_15h widthall">&nbsp;</div>
        <div class="float_left pa"><img src="/images/bigphoto.gif" alt="photo" /></div>
        <div class="blueinfo"> Jag bloggar om<br />
          mina fantastiska
          aktieaffärer samt
          konstiga saker. </div>
        <div class="float_left blank_15h widthall">&nbsp;</div>
      </div>
      <div class="curverect_topbg"></div>
      <div class="curverect_midbg">
        <div class="bloginner_rect">
          <?php $i=0; foreach($blog_one_five as $data):?>
		  	<div class="blog1advrt">
            <div class="float_right viocolor"><?php echo $data->created_at ?></div>
            <h2><?php echo $data->ublog_title ?></h2>
			<?php $para = html_entity_decode($data->ublog_description)?>
			<?php 
			$pos=0;
			$count=2;
			while($count)
			{
				$pos = strpos($para,' ',$pos+1);
				$count--;
			}
			?>
			<?php $start_str = substr($para,0,$pos)?>
            <div class="bloginfo"><b class=" greenfont"><?php echo $start_str ?></b>
			  <?php echo substr($para,$pos)?><br />
              <!--<img src="/images/blogad_1.gif" alt="omg"  class="advrtimg_l float_left"/> <span class="viocolorinfo float_left">Player in the Web software
              space, WordPress
              wields a powerful influence
              in the marketplace.
              When you’re in a position
              of such importance,
              it is your res</span> --><span class="float_left widthall clear_l"><span class="main_link_color float_left">Kommentarer &nbsp;</span> <img src="/images/chaticon_violet.jpg" alt="icon"  class="float_left padtop_10"/>&nbsp;<font size="1" color="#c50063">87</font> <b class="main_link_color">Läs mer ></b></span> </div>
            <div class="blank_10h widthall">&nbsp;</div>
            <div class="grayline">&nbsp;</div>
            <div class="blank_10h widthall">&nbsp;</div>
          </div>
		  <?php $i++; endforeach; ?>
        </div>
      </div>
      <!-- <div class="curverect_bottombg"></div>-->
    </div>
    <div class="blogright2_divpart">
      <?php include_partial('global/blogpage_right')?>
    </div>
  </div>
</div>
