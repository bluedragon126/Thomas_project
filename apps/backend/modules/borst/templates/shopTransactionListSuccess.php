<div class="maincontentpage">
    <div class="forumlistingleftdiv">
        <div class="forumlistingleftdivinner">

            <form id="search_purchaseorder_form" class="width_1020 backend_search_section" name="search_purchaseorder_form" method="POST">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td><b>Order By:</b></td>
                        <td>
                            <select name="purchase_order" id="purchase_order">
                                <option value="1"><?php echo 'Ordernummer' ?></option>
                                <option value="2"><?php echo 'Order Date' ?></option>
                                <option value="3"><?php echo 'Payment Method' ?></option>
                                <option value="4"><?php echo 'Status' ?></option>
                                <option value="5"><?php echo 'Namn' ?></option>
                                <option value="6"><?php echo 'Betaldatum' ?></option>
                                <option value="7"><?php echo 'Is Processed' ?></option>
                            </select>
                        </td>
                        <td>&nbsp;</td>
                       
                        <td>
                            <select name="purchase_sort_order" id="purchase_sort_order">
                                <option value="1">ASC</option>
                                <option value="2" selected="selected">DESC</option>
                            </select>
                        </td>
                         <td>
                            <?php $article_types = BtShopArticleType::fecthAllShopArticleType()?>
                            <select name="article_type" id="article_type" class="width_80">
                                 <option value="0">Product</option>
                                <?php foreach($article_types as $key=>$value):?>
                                <option value="<?php echo $key?>"><?php echo $value?></option>
                                <?php endforeach;?>
                            </select>
                        </td>
                        <td>
                            <select name="purchase_status" id="purchase_status" class="width_60">
                                <option value="0" ><?php echo 'Status' ?></option>
                                <option value="1" ><?php echo 'Incomplete' ?></option>
                                <option value="2" ><?php echo 'Done' ?></option>
                            </select>
                        </td>
                       
                        <td>
                            <select name="order_processed_status" id="order_process_status">
                                <option value="0" ><?php echo 'Is Processed' ?></option>
                                <option value="1"><?php echo 'Not Processed' ?></option>
                                <option value="2"><?php echo 'Processed' ?></option>
                            </select></td>
                        <td><b>Order No:</b></td>
                        <td><input type="text" name="order_number_txt" class="width_60" id="ono"></td>
                        <td><b>First Name:</b></td>
                        <td><input type="text" name="first_name_txt" class="width_80" id="fname"></td>
                        <td><b>Last Name:</b></td>
                        <td><input type="text" name="last_name_txt" class="width_80" id="lname"></td>
                        <td class="float_right"><input type="button" onclick="searchPurchaseOrder(1)" name="submit" id="search_subcription" value="Search"></td>
                    </tr>
                </table>
            </form>

            <div id="showpurchaselist_outer" class="forumlistingleftdivinner font_11">
                <div class="shoph3 widthall">Shop Transaction List</div>
                <div class="float_left listing">
                    <div class="float_left width_1020">
<?php include_partial('borst/transactionlist_partial', array('pager' => $pager, 'host_str' => $host_str, 'purchasedItem' => $purchasedItem, 'product_article' => $product_article, 'rec_per_page' => $rec_per_page)) ?>
                    </div>
                </div>
                <div class="user_list_pager">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td colspan="11"><div class="paginationwrapper width_1020">
                                    <div class="pagination" id="purchaseorder_list_listing">
<?php include_partial('global/backpager_for_all', array('pager' => $pager)) ?>
                                    </div>
                                </div></td>
                        </tr>
                        <tr>
                            <td colspan="11"><input type="button" name="update_article_button" id="update_article_button" class="registerbuttontext submit" onClick="javascript:open_confirmation('Ska listan med uppdateras?', '', 'updatePurchaseList_confirm_box', 'update_purchase_record_msg')" value="Uppdatera lista"/>
                                <span class="float_left redcolor ptop_4 pleft_5" id="purchase_update_msg"></span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ui-dialog-update-article -->
<div id="updatePurchaseList_confirm_box" title="Update Purchase List Confirmation">
    <table width="100%"  border="0" cellspacing="3" cellpadding="0">
        <tr>
            <td id="update_purchase_record_msg">Message:</td>
        </tr>
    </table>
</div>
<div id="deletePurchaseOrder_confirm_box">
    <input type="hidden" id="delete_order_id_page" value="">
    <table width="100%"  border="0" cellspacing="3" cellpadding="0">
        <tr>
            <td id="deletePurchaseOrder_message">Message:</td>
        </tr>
    </table>
</div>