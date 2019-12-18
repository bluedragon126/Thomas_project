<?php
$pos=array('top_mid'=>'Top Center','Right_top1'=>'Right Top 1','Right_top2'=>'Right Top 2','Right_top3'=>'Right Top 3','Right_top4'=>'Right Top 4');
$typ=array('img'=>'Image File','swf'=>'Flash file(swf)','iframe'=>'Iframe','script'=>'JavaScript');
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="sbt_ads_list_table">
    <thead>
      <tr id="sbt_ads_list_column_row">
        <th scope="col" width="10%"><a id="sortby_ad_position" style="cursor:pointer;width:105px;" class="float_left"><span class="float_left" style="width:85px; border:0px solid red;">Ad Position<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
        <th scope="col" width="10%"><a id="sortby_ad_name" style="cursor:pointer;width:90px;" class="float_left"><span class="float_left" style="width:70px; border:0px solid red;">Ad Name<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
        <th scope="col" width="10%"><a id="sortby_ad_path" style="cursor:pointer;" class="float_left"><span class="float_left" style="width:64px; border:0px solid red;">Ad Path<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
        <th scope="col" width="10%"><a id="sortby_ad_type" style="cursor:pointer;width:85px;" class="float_left"><span class="float_left" style="width:66px; border:0px solid red;">Ad Type<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
        <th scope="col" width="10%"><a id="sortby_ad_enable" class="float_left" style="cursor:pointer;width:105px;"><span class="float_left" style="width:83px; border:0px solid red;">Ad Enabled<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
        <th scope="col" width="10%"><a id="sortby_ad_target" style="cursor:pointer;width:100px;" class="float_left"><span class="float_left" style="width:75px; border:0px solid red;">Ad Target<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
        <th scope="col" width="10%"><a id="sortby_ad_click" style="cursor:pointer;width:100px;" class="float_left"><span class="float_left" style="width:100px; border:0px solid red;">CCount Id<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
        <th scope="col" width="10%"><a id="sortby_ad_total_clicks" style="cursor:pointer;width:100px;" class="float_left"><span class="float_left" style="width:86px; border:0px solid red;">Total Clicks<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
        <th scope="col" width="10%"><a id="sortby_ad_displayed" style="cursor:pointer;width:100px;" class="float_left"><span class="float_left" style="width:100px; border:0px solid red;">Displ. Count<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
        <th scope="col" width="5%"><a id="sortby_ad_priority" style="cursor:pointer;width:80px;" class="float_left"><span class="float_left" style="width:62px; border:0px solid red;">Priority<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
<th scope="col" width="5%">Action</th>
      </tr>
    </thead>
    <?php $i=1; foreach ($pager->getResults() as $ads): ?>
    <tr class="classnot">
    <td class="blackcolor"><?php echo $pos[$ads->ad_position]?></td>
    <td><?php echo $ads->ad_title ?></td>
    <td width="40%"><?php echo $ads->ad_name ? $ads->ad_name : '&nbsp;' ?></td>
    <td><?php echo $typ[$ads->ad_type] ? $typ[$ads->ad_type] : '&nbsp;'?></td>
    <td><?php echo $ads->is_enabled ?></td>
    <td><?php echo $ads->ad_target=='B'?"_blank":"None"?></td>
    <td><?php echo $ads->ccounter_id ? $ads->ccounter_id :'&nbsp;' ?></td>
    <td><?php echo $ccount_link[$ads->id] ? $ccount_link[$ads->id] : '&nbsp;' ?></td>
    <td><?php echo $ads->getDisplayCount(); ?></td>
    <td><?php echo $ads->priority ?></td>
    <td><a href="<?php echo 'https://'.$host_str.'/backend.php/borst/createAd/editAd_id/'.$ads->id ?>">Edit</a>&nbsp;&nbsp;&nbsp;<?php if($ads->is_archive == 0)  { ?><a href="javascript:open_confirmation('Do you want to delete this ad <?php echo $ads->ad_title ?>','<?php echo $ads->id; ?>','delete_sbt_ad_confirm_box','delete_sbt_ad_msg')">Delete</a><?php } else { ?><a href="javascript:open_confirmation('Do you want to unarchive this ad <?php echo $ads->ad_title ?>','<?php echo $ads->id; ?>','unarchive_sbt_ad_confirm_box','unarchive_sbt_ad_msg')">UnArchive</a><?php } ?></td>
    </tr>
    <?php endforeach; ?>
</table>

