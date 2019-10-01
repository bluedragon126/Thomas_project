<div class="maincontentpage">
  <div class="forumlistingleftdiv">
  <div class="forumlistingleftdivinner">

	<div id="sbtinactiveuserlist_outer" class="forumlistingleftdivinner font_11">
      <div class="shoph3 widthall">Purchase Order Details</div>
	  <div class="float_left listing">
        <div class="float_left width_520">
        
		<?php if($purchase_data):?>
			<div class="spacer"></div>
			<div class="float_left widthall"><b><?php echo 'Purchaser Detail' ?></b></div>
			<div class="spacer"></div>
			<div class="float_left widthall"><b><?php echo 'Orderdatum: ' ?></b><?php echo substr($purchase_data->created_at,0,10) ?></div>
			<div class="float_left widthall"><b><?php echo 'Ordernummer: ' ?></b><?php echo $purchase_data->id ?></div>
			<div class="float_left widthall"><b><?php echo 'Betalsätt: ' ?></b><?php echo $purchase_data->payment_method ?></div>
			<div class="float_left widthall"><b><?php echo 'Betalt den: ' ?></b><?php echo $purchase_data->checkout_status == 0 ? 'Ej betald' : 'betald'; ?></div>
			<div class="float_left widthall"><b><?php echo 'Namn: ' ?></b><?php echo $purchase_data->firstname.' '.$purchase_data->lastname ?></div>
			<div class="float_left widthall"><b><?php echo 'Adress: ' ?></b><?php echo $purchase_data->street.','.$purchase_data->zipcode.' '.$purchase_data->city.','.$purchase_data->country ?></div>
			<div class="float_left widthall"><b><?php echo 'E-post: ' ?></b><?php echo $purchase_data->email ?></div>
		<?php endif;?>
		
		<div class="spacer"></div>
		<div class="my_order_text">Din beställning:</div>
		<div class="spacer"></div>
		
		<?php if($item_list):?>
		<?php $total=0; $str=''; $i=0; foreach($item_list as $data):
                    //echo "<pre>"; print_r($data->toarray());
                    ?>
		<?php if($i==0):?><?php $shipping = $data->shipping; $vat = $data->vat; ?><?php endif; ?>
		<?php 
                if($data->articleornot){
                $art_data = $article->getPerticularArticle($data->product_id);
                $tiltle = $art_data->title;
                }else{
                $art_data = $product_article->getShopArticleSpecificDetails($data->product_id);
                $tiltle = $art_data[0]['p_title'];
                }?>
		<?php $mul = $data->quantity * $data->price_per_unit; //original code
                      //$mul = $data->quantity * $data->total_price; //code change by sandeep?>
		
		<div class="my_order_rec_row">
			<div class="my_order_sub_row">
				<strong><?php  if(!$data->articleornot){ echo $product_article->getShopArticleTypeName($art_data[0]['p_type']).':';}?></strong>
				<?php echo $tiltle ?>
			</div>
			<div class="my_order_sub_row">
				<div class="float_left">
					<strong>Antal: </strong><?php echo $data->quantity; ?> st á <?php echo $data->price_per_unit; ?>
				</div>
				<div class="float_right">
					<?php echo number_format($mul, 2 , ",", " ") ?>
				</div>
			</div>
		</div>
		<?php $total = $total + $mul; ?>
		<?php $i++; endforeach; ?>
		
		<?php $final_total = 0;  ?>
		<?php $total_wth_shipping = $total + $shipping; ?>
		<?php //$final_total = $total_wth_shipping + $vat; ?>
		
		<div class="my_order_rec_row">
			<div class="my_order_sub_row">
				<div class="float_left"><strong>Frakt:</strong></div>
				<div class="float_right"><?php echo number_format($shipping, 2 , ",", " ") ?></div>
			</div>
			<div class="my_order_sub_row">
				<div class="float_left"><strong>Total:</strong></div>
				<div class="float_right"><?php echo number_format($total_wth_shipping, 2 , ",", " ") ?></div>
			</div>
			<div class="my_order_sub_row">
				<div class="float_left">Varav moms:</div>
				<div class="float_right"><?php echo number_format($vat, 2 , ",", " ") ?></div>
			</div>
			<div class="my_order_sub_row">
				<div class="float_left red_text"><strong>Att betala SEK:</strong></div>
				<div class="float_right red_text"><?php echo number_format($total_wth_shipping, 2 , ",", " ") ?></div>
			</div>
		</div>
		
	
		<div class="my_order_rec_row" id="link_as_per_status">
			<div class="spacer"></div>
			<?php if($purchase_data->checkout_status == 0): ?>
				<a id="save_invoice" class="save_mail_bill" name="<?php echo $purchase_id ?>"><?php echo __('faktura på din beställning')?></a>
			<?php endif;?>
			<?php if($purchase_data->checkout_status == 1): ?>
				<a id="save_receipt" class="save_mail_bill" name="<?php echo $purchase_id ?>"><?php echo __('kvitto för din beställning')?></a>
			<?php endif;?>
			<!--<a id="print_receipt" class="save_mail_bill" name="<?php //echo $purchase_id ?>"><?php //echo __('Skriv ut kvitto')?></a> /--> 
		</div>
		<div id="pdf_send_report"></div>
		
		<div class="float_left" id="update_purchase_btn">
		<?php if($purchase_data->checkout_status == 0): ?>
		<input type="button" name="update_article_button" class="registerbuttontext submit" onClick="javascript:open_confirmation('Är du säker på att du vill uppdatera posten?', '', 'update_purchaserecord_box', 'update_purchaserecord_msg')" value="Change Status to Complete"/>
		<?php endif;?>
		</div>
		<div class="spacer"></div>
    
    <?php endif; ?>

		</div>
      </div>
	  
    </div>
  </div>
</div>
</div>

<!-- ui-dialog-update-user -->
<div id="update_purchaserecord_box" title="Update Purchase Record Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td><input type="hidden" id="pur_id"  name="pur_id" value="<?php echo $purchase_id ?>"/></td>
	</tr>
	<tr>
		<td id="update_purchaserecord_msg">Message:</td>
	</tr>
 </table>
</div>

<div id="p_container" style="display:none;">
<?php include_partial('global/invoice',array('item_list'=>$item_list,'product_article'=>$product_article,'purchase_rec'=>$purchase_rec,'profile'=>$profile,'subscription'=>$subscription)) ?>
</div>
