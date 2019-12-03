<div class="blog_user_profile_deshboard padding_top_4 widthall"><?php echo $request_cnt ?> <?php echo __('blockerade användare') ?></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" summary="fav_article_listing">
    <tr class="blog_table_head">
        <th id="sortby_srno"  class="cursor padding_right_11 padding_left_10" scope="col" width="264" align="left">Namn</th>
        <th id="sortby_article"  class="cursor padding_right_11" scope="col" width="20" align="left">Verkställ</th>
    </tr>
    <?php foreach ($pager->getResults() as $data): ?>
        <tr class="classnot">
            <td class="blog_table_user pad_lft_10"><?php echo $profile->getFullUserName($data->contactor_id) ?></td>
            <td><a class="cursor prof_table_act" onclick="reply_to_request('4', '<?php echo $data->id ?>')">Avblockera</a></td>
        </tr>
    <?php endforeach; ?>	
</table>
