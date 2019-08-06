<style type="text/css">
#add_advertisement td{ padding-left:5px;}
</style>
<div class="maincontentpage">
  <div class="forumlistingleftdiv">
    <div id="sbt_adslist_outer" class="forumlistingleftdivinner" style="width:915px; border:0px solid red; font-size:11px;">
      <div class="shoph3 widthall">Manage Advertisement</div>
     
      <div class="float_left listing">
        <div class="float_left widthall" style="width:513px; border-left:1px solid #CED2D0; border-right:1px solid #CED2D0; border-bottom:1px solid #CED2D0;">
          <form action="" method="post">
		  <?php echo $form->renderHiddenFields()?>
            <table id="add_advertisement" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td width="20%">Ad Position</td>
                <td width="80%"><?php echo $form['ad_position']->render(); ?></td>
              </tr>
              <tr>
                <td>Ad Name</td>
                <td><?php echo $form['ad_title']->render(array('style'=>'width:99%')); ?></td>
              </tr>
              <tr>
                <td>Ad Path</td>
                <td><?php echo $form['ad_name']->render(array('style'=>'width:99%')); ?></td>
              </tr>
              <tr>
                <td>Ad Type</td>
                <td><?php echo $form['ad_type']->render(); ?></td>
              </tr>
              <tr>
                <td>Ad Enabled</td>
                <td><input type="checkbox" name="co_enabled" value="Y" <?php echo $data->is_enabled == 'Y' ? 'checked=checked' : ''?>></td>
              </tr>
              <tr>
                <td>Ad Target</td>
                <td><input type="checkbox" name="co_target" value="B" <?php echo  $data->ad_target == 'B' ? 'checked=checked' : ''?>></td>
              </tr>
              <tr>
                <td>Click Counter Id</td>
                <td><?php echo $form['ccounter_id']->render(); ?></td>
              </tr>
              <tr>
                <td>Displayed Count</td>
                <td><?php echo $form['display_count']->render(); ?></td>
              </tr>
              <tr>
                <td>Priority</td>
                <td><?php echo $form['priority']->render(array('class'=>'float_left','style'=>'width:30px')); ?><span class="float_left">&nbsp;%</span><span><?php echo $form['priority']->renderError(); ?></span></td>
              </tr>
            </table>
            
            <table cellpadding="0" cellspacing="0" border="0">
              <tr>
			    <td colspan="2">&nbsp;</td>
              </tr>
			  <tr>
			    <td style="padding-left:5px;"><a href="<?php echo 'http://'.$host_str.'/backend.php/borst/adList' ?>">List</a></td>
                <td style="text-align:right;"><input type="submit" class="button" name="submitme" value="save">
                  <input type="reset" class="button"></td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
