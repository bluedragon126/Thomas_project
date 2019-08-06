<style type="text/css">
.for_table{font-family: Arial, Helvetica, sans-serif; font-size:10pt; float:left; position:relative;}
.bluefont {color: #275A9D; font-weight:bold; font-size:12px; float:left; position:relative; width:109px; word-wrap: break-word; text-align:left;}
.width_110{ width:110px;}
.bottom_border{ border-bottom:1px solid #bdc5cd; font-size:12px;}
.top_border{ border-top:1px solid #bdc5cd; font-size:12px;}
.column_heading{ color:#999999; font-weight:normal; font-size:12px; }
.bold_black{ font-weight:bold; font-size:12px;}
.pleft_10{ padding-left:2px; font-size:12px;}
.pbottom_50{ padding-bottom:50px;}
.pbottom_30{ padding-bottom:30px;}
.font_arial{ font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; }
.break { page-break-before: always; }
.rub_1{ color:#d6dde2; font-weight:normal; font-size:41px; letter-spacing:1px;}
</style>
<!--<div id="invoice_data">-->
	<div style="float:left; position:relative; width:100%; padding-top:140px; border:0px solid red; ">
		<div style="float:left; position:relative; border:0px solid green;width:100%;">
			<table class="for_table" border="0" align="center" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td colspan="2" style="padding-left:27%;">
						<table class="for_table" border="0" style="width:500px;" cellpadding="0" cellspacing="0">
						<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
						
						<tr><td class="rub_1" colspan="3">FAKTURA</td></tr>
						<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
						<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
						<tr>
							<td class="width_130 column_heading" style="width:110px; height:22px;">Datum: </td>
							<td class="top_border bottom_border font_arial" style="width:290px;"><?php echo substr($purchase_rec->created_at,0,10)?></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="column_heading" style="width:110px; height:22px;">Kund: </td>
							<td class="bottom_border font_arial" style="width:290px;"><?php echo $purchase_rec->firstname.' '.$purchase_rec->lastname ?></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
								<td class="column_heading" style="width:110px; height:22px;">Adress: </td>
								<td class="bottom_border font_arial" style="width:290px;"><?php echo $purchase_rec->street.','.$purchase_rec->city.' , '.$purchase_rec->zipcode .' , '.$purchase_rec->country  ?></td>
								<td>&nbsp;</td>
						</tr>
							<tr>
							<td class="column_heading" style="width:110px; height:22px;">E-post: </td>
							<td class="bottom_border font_arial" style="width:290px;"><?php echo $purchase_rec->email; ?></td>
							<td>&nbsp;</td>
					    </tr>
						<tr>
							<td class="column_heading" style="width:110px; height:22px;">Kundnr: </td>
							<td class="bottom_border font_arial" style="width:290px;"><?php echo $profile->fndKundnr($purchase_rec->user_id) ?></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="column_heading" style="width:110px; height:22px;">Er ref: </td>
							<td class="bottom_border font_arial" style="width:290px;"><?php echo $purchase_rec->firstname.' '.$purchase_rec->lastname ?></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="column_heading" style="width:110px; height:22px;">Vår ref: </td>
							<td class="bottom_border font_arial" style="width:290px;">Thomas Sandström</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="column_heading" style="width:110px; height:22px;">Org. nr:</td>
							<td class="bottom_border font_arial" style="width:290px;">556724-4735</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="column_heading" style="width:110px; height:22px;">Taxeringsstatus:</td>
							<td class="bottom_border font_arial" style="width:290px;">Innehar F-skattsedel</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="column_heading" style="width:110px; height:22px;">Fakturanr:</td>
							<td class="bottom_border font_arial" style="width:290px;"><?php echo $purchase_rec->id ?></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="column_heading" style="width:110px; height:22px;">Betalning:</td>
							<td class="bottom_border font_arial" style="width:290px;">20 dagar</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="column_heading" style="width:110px; height:22px;">Förfallodatum:</td>
							<td class="bottom_border font_arial" style="width:290px;"><?php echo date('Y-m-d',strtotime("20 day")) ?></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="column_heading" style="width:110px; height:22px;">Fakturerat belopp:</td>
							<td class="bottom_border font_arial" style="width:290px;"><?php echo $purchase_rec->total_price ?>:-</td>
							<td>&nbsp;</td>
						</tr>
						<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
						</table>
					</td>
				</tr>
			</table>
			
			<?php $total=0; $j = $i = 0; $brk_flag = 1; foreach($item_list as $data): ?>
			
			<?php if($j > $brk_flag):?>
				<p class="break"><!--Appendix 2 (continued)--></p>
				</div></div>
				<div style="float:left; position:relative; width:100%; height:30px; border:0px solid blue; "></div>
				<div style="float:left; position:relative; width:100%; margin-top:140px; border:0px solid red; ">
				<div style="float:left; position:relative; border:0px solid green;width:100%;">
	        <?php $j=0; $brk_flag = 4; endif; ?>
			
			<table class="for_table" border="0" align="center" width="100%" cellpadding="0" cellspacing="0">
    		<tr>
    			<td colspan="2" style="padding-left:27%;">
        			<table class="for_table" border="0" style="width:500px;" cellpadding="0" cellspacing="0">		
					
						<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
						
						<?php if($i==0):?><?php $shipping = $data->shipping; $vat = $data->vat; ?><?php endif; ?>
						<?php $art_data = $product_article->getShopArticleSpecificDetails($data->product_id);?>
						<?php $mul = $data->quantity * $data->total_price; ?>
						<tr>
							<td class="column_heading" style="width:110px; height:22px;">&nbsp;</td>
							<td class="top_border bottom_border" style="width:290px;"><?php echo $art_data[0]['p_title']; ?></td>
							<td class="bold_black  pleft_10" align="right"><?php echo $mul; ?>:-</td>
						</tr>
						<tr>
							<td class="column_heading" style="width:110px; height:22px;">&nbsp;</td>
							<td class="bottom_border" style="width:290px;"><?php echo $data->product_text ?></td>
							<td class="bold_black  pleft_10">&nbsp;</td>
						</tr>
						
						<?php if($art_data[0]['p_type'] == 6):?>
						<?php $sub = $subscription->getStartEndDateOfSubscription($data->purchase_id,$data->product_id); ?>
						<?php $start_date = $sub->id ? $sub->start_date : '-'; ?>
						<?php $end_date = $sub->id ? $sub->end_date : '-'; ?>
						<tr>
							<td class="column_heading" style="width:110px; height:22px;">&nbsp;</td>
							<td class="bottom_border" style="width:290px;">Abonnemangsperiod <?php echo $start_date.' - '.$end_date ?></td>
							<td>&nbsp;</td>
						</tr>
						<?php endif;?>
						
						<?php $total = $total + $mul; ?>
					</table>
				</td>
			</tr>
			</table>
            <?php $j++; $i++; endforeach; ?>
						
			<?php $total_wth_shipping = $total + $shipping; ?>
			
			<table class="for_table" border="0" align="center" width="100%" cellpadding="0" cellspacing="0">
    		<tr>
    			<td colspan="2" style="padding-left:27%;">
        			<table class="for_table" border="0" style="width:500px;" cellpadding="0" cellspacing="0">				
						<tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        </tr>
						<tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        </tr>
						<?php if($shipping > 0): ?>
						<tr>
							<td class="column_heading" style="width:110px; height:22px;">&nbsp;</td>
							<td class="bold_black" style="width:290px;">Frakt:</td>
							<td class="pleft_10" align="right"><?php echo $shipping ?>:-</td>
						</tr>
						<?php endif; ?>
						<tr>
							<td class="column_heading" style="width:110px; height:22px;">&nbsp;</td>
							<td class="bold_black" style="width:290px;">Belopp:</td>
							<td class="pleft_10" align="right"><?php echo $total_wth_shipping ?>:-</td>
						</tr>
						<tr>
							<td class="column_heading" style="width:110px; height:22px;">&nbsp;</td>
							<td class="bold_black" style="width:290px;">Varav moms 25%:</td>
							<td class="pleft_10" align="right"><?php echo str_replace(',', ' ', number_format($vat)); ?>:-</td>
						</tr>
						<tr>
							<td class="column_heading" style="width:110px; height:22px;">&nbsp;</td>
							<td class="bold_black" style="width:290px;">Summa att betala:</td>
                                                        <td class="pleft_10" align="right"><?php echo $total_wth_shipping ?>:-</td>
						</tr>
						
					</table>
				</td>
			</tr>
			</table>
		</div>
	</div>
<!--</div>-->
