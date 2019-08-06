<div class="float_left listing">
    <div class="spacer"></div>
    <div class="float_left widthall" style="width:913px;">
<form id="update_subscription_form" name="update_subscription_form" method="POST" action="">
    <div id="filters">
        &nbsp;&nbsp;<?php echo $filterform; ?>
    </div>
<div class="spacer"></div>
<input type="hidden" id="Cpage" value="<?php echo $Cpage;?>"  />
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="subscriber_list_table">
    <thead>
            <tr id="coupon_list_column_row1">
                <th scope="col" width="5%"><input name="coupon_ids_check_uncheck" type="checkbox" value="" id="coupon_ids_check_uncheck">Nr</th>
                <th scope="col" width="15%" id="product" title="<?php echo $sort_message ?>" onclick="doSortingColumnCoupons('<?php echo url_for($moduleurl) ?>', 'product')" >Product<span class="<?php echo ($sortBy == 'product') ? (($sortOrder == 'ASC') ? 'sort_asc' : 'sort_dsc') : 'sort' ?>"></span></th>
                <th scope="col" width="15%" id="coupon_code" title="<?php echo $sort_message ?>" onclick="doSortingColumnCoupons('<?php echo url_for($moduleurl) ?>', 'coupon_code')" >Coupon Code<span class="<?php echo ($sortBy == 'coupon_code') ? (($sortOrder == 'ASC') ? 'sort_asc' : 'sort_dsc') : 'sort' ?>"></span></th>
                <th scope="col" width="15%" id="email" title="<?php echo $sort_message ?>"  onclick="doSortingColumnCoupons('<?php echo url_for($moduleurl) ?>', 'email')" >Email<span class="<?php echo ($sortBy == 'email') ? (($sortOrder == 'ASC') ? 'sort_asc' : 'sort_dsc') : 'sort' ?>"></span></th>
                <th scope="col" width="10%" id="active" title="<?php echo $sort_message ?>" onclick="doSortingColumnCoupons('<?php echo url_for($moduleurl) ?>', 'active')" >Activ/InActive<span class="<?php echo ($sortBy == 'active') ? (($sortOrder == 'ASC') ? 'sort_asc' : 'sort_dsc') : 'sort' ?>"></span></th>
                <th scope="col" width="10%" id="status" title="<?php echo $sort_message ?>" onclick="doSortingColumnCoupons('<?php echo url_for($moduleurl) ?>', 'status')" >Status<span class="<?php echo ($sortBy == 'status') ? (($sortOrder == 'ASC') ? 'sort_asc' : 'sort_dsc') : 'sort' ?>"></span></th>
                <th scope="col" width="15%" id="date" title="<?php echo $sort_message ?>" onclick="doSortingColumnCoupons('<?php echo url_for($moduleurl) ?>', 'date')" >Date<span class="<?php echo ($sortBy == 'date') ? (($sortOrder == 'ASC') ? 'sort_asc' : 'sort_dsc') : 'sort' ?>"></span></th>
                <th scope="col" width="15%">Action</th>
            </tr>
        </thead>
    <?php $i = 1;
    if ($ResFinal) {
        foreach ($ResFinal as $j => $FinalVal) {
            ?>
            <tr class="classnot">
                <td><input name="coupon_ids[]" class="checkbox_coupon" type="checkbox" value="<?php echo $FinalVal['cd_id']; ?>"><?php echo $i; ?></td>
                <td><?php echo $FinalVal['bt_btshop_article_title']; ?></td>
                <td><?php echo $FinalVal['c_coupon_code'] ?></td>
                <td><?php echo $FinalVal['cd_email']; ?></td>
                <td><?php echo ($FinalVal['cd_IS_INACTIVE'] == 0) ? "Active" : "Inactive"; ?></td>
                <td><?php echo $FinalVal['cd_status']; ?></td>
                <td><?php echo $FinalVal['cd_CREATED_AT']; ?></td>
                <td><a class="edit_icon" href="/backend.php/borst/sendCouponCode/id/<?php echo $FinalVal['cd_id']; ?>">Edit</a> &nbsp;&nbsp; 
                    <a class="delete_icon" href="javascript:open_confirmation('Do you want to delete this code <?php echo $FinalVal['c_coupon_code'] ?>','<?php echo $FinalVal['cd_id']; ?>','delete_send_code_confirm_box','unarchive_sbt_ad_msg')">Delete</a></td>
            </tr>            
            <?php
            $i++;
        }
    } else {
        ?>
        <tr rowspan="9"><td class="errormsg">No record found</td></tr>
<?php } ?>
        <tr>
            <td colspan="10"><input style="margin-right: 10px;" type="button" name="update_coupon_button" id="update_coupon_button" class="registerbuttontext submit" onclick="javascript:open_confirmation('Vill du uppdatera listan?', '', 'updateCoupondetail_list_confirm_box', 'subscription_list_msg')" value="Uppdatera lista"/>
                        
        </tr>
</table>

    <div class="pagination">
        <?php
        $page_limit = 1;
        $current = $Cpage;
        $num_page = $NumPage;
        $nb_links = 5;
        $links = array();
        $tmp = $Cpage - floor($nb_links / 2);
        $check = $num_page - $nb_links + 1;
        $limit = $check > 0 ? $check : 1;
        $begin = $tmp > 0 ? ($tmp > $limit ? $limit : $tmp) : 1;
        $i = (int) $begin;
        while ($i < $begin + $nb_links && $i <= $num_page) {
            $links[] = $i++;
        }
        if ($Cpage == 1) {
            $Ppage = 1;
        } else {
            $Ppage = $Cpage - 1;
        }
        if ($Cpage == $num_page) {
            $Npage = $num_page;
        } else {
            $Npage = $Cpage + 1;
        }
        $currentMaxLink = count($links) ? $links[count($links) - 1] : 1;
        ?>
        <?php if ($Rtotal > $PageLimit): ?>
            <a href="javascript:;" onClick="javascript:jQuery('#renderPart').load('<?php echo url_for($moduleurl) ?>?page=1<?php echo $queryString ?>');"><< </a>
            <a href="javascript:;" onClick="javascript:jQuery('#renderPart').load('<?php echo url_for($moduleurl) ?>?page=<?php echo $Ppage; ?><?php echo $queryString ?>');">< </a>

            <?php foreach ($links as $p): ?>
                <?php if ($p == $Cpage) { ?>
                    <span><?php echo $p ?></span>
                <?php } else { ?>
                    <a href="javascript:;"  onclick="javascript:jQuery('#renderPart').load('<?php echo url_for($moduleurl) ?>?page=<?php echo $p ?><?php echo $queryString ?>');"><?php echo $p ?></a>
                <?php } ?>
            <?php endforeach; ?>

            <a href="javascript:;" onClick="javascript:jQuery('#renderPart').load('<?php echo url_for($moduleurl) ?>?page=<?php echo $Npage; ?><?php echo $queryString ?>');">> </a>		
            <a href="javascript:;" onClick="javascript:jQuery('#renderPart').load('<?php echo url_for($moduleurl) ?>?page=<?php echo $num_page; ?><?php echo $queryString ?>');">>> </a>
        <?php endif; ?>
    </div>
</div>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td colspan="10"><a class="new_icon" href="/backend.php/borst/sendCouponCode">Send Coupon Code</a></td>
    </tr>
</table>