<!--CART starts -->
<?php if(isset($designType) && $designType == 2){?>
	<div class="cart cartDesign1">
		<div class="info2"> 
			<span class="floatLeftNew width_34_per">
			<?php if($step == 1): ?><img class='width_31_25 floatLeftNew' src="/images/new_home/shop_1_active.png" /> <p class='floatLeftNew shop_guide_active'>Granska och skicka</p><br />
				<?php else: ?><img class='width_31_25 floatLeftNew' src="/images/new_home/shop_1_passive.png" /> <p class='floatLeftNew shop_guide_passive'>Granska och skicka</p><br />
				<?php endif; ?>
			</span>
			<span class="floatLeftNew width_26_per">
				<?php if($step == 2): ?><img class='width_31_25 floatLeftNew' src="/images/new_home/shop_2_active.png" /> <p class='floatLeftNew shop_guide_active'>Välj betalsätt</p><br />
				<?php else: ?><img class='width_31_25 floatLeftNew' src="/images/new_home/shop_2_passive.png" /> <p class='floatLeftNew shop_guide_passive'>Välj betalsätt</p><br />
				<?php endif; ?>
			</span>
			<span class="floatLeftNew width_38_per">
				<?php if($step == 3): ?><img class='width_31_25 floatLeftNew' src="/images/new_home/shop_3_active.png" /> <p class='floatLeftNew shop_guide_active'>Bekräftelse av betalning</p><br />
				<?php else: ?><img class='width_31_25 floatLeftNew' src="/images/new_home/shop_3_passive.png" /> <p class='floatLeftNew shop_guide_passive'>Bekräftelse av betalning</p><br />
				<?php endif; ?>
			</span>
		</div>
	 </div>
<?php } else if(isset($designType) && $designType == 1){?>
	<div class="cart cartDesign1">
		<div class="info2"> 
			<span class="left width_100_per" style="color:<?php echo $step == 1 ? '#637281;' : '#d4d3e1; font-family: ITC Franklin Gothic Medium Regular;'; ?>">
			<div class="blank_3h widthall">&nbsp;</div>
			<?php if($step == 1): ?>1 Granska och skicka<br />
				<?php else: ?>1 Granska och skicka<br />
				<?php endif; ?>
			</span>
			<span class="left width_100_per" style="color:<?php echo $step == 2 ? '#637281;' : '#d4d3e1; font-family: ITC Franklin Gothic Medium Regular;'; ?>">
				<?php if($step == 2): ?>2 Välj betalsätt<br />
				<?php else: ?>2 Välj betalsätt<br />
				<?php endif; ?>
			</span>
			<span class="left width_100_per" style="color:<?php echo $step == 3 ? '#637281;' : '#d4d3e1; font-family: ITC Franklin Gothic Medium Regular;'; ?>">
				<?php if($step == 3): ?>3 Bekräftelse av betalning<br />
				<?php else: ?>3 Bekräftelse av betalning<br />
				<?php endif; ?>
			</span>
		</div>
	 </div>
 <?php } else {?>
  <div class="cart">
    <div class="title">BETALA 1-3</div>
	<hr  class="yellow_line" />
    <div class="info2"> 
		<span class="left width_100_per" style="color:<?php echo $step == 1 ? '#272a31;' : '#bbc1c2;'; ?>">
        <div class="blank_3h widthall">&nbsp;</div>
		<?php if($step == 1): ?>1 Granska och skicka<br />
			<?php else: ?>1 Granska och skicka<br />
			<?php endif; ?>
		</span>
		<span class="left width_100_per" style="color:<?php echo $step == 2 ? '#272a31;' : '#bbc1c2;'; ?>">
			<?php if($step == 2): ?>2 Välj betalsätt<br />
			<?php else: ?>2 Välj betalsätt<br />
			<?php endif; ?>
		</span>
		<span class="left width_100_per" style="color:<?php echo $step == 3 ? '#272a31;' : '#bbc1c2;'; ?>">
			<?php if($step == 3): ?>3 Bekräftelse av betalning<br />
			<?php else: ?>3 Bekräftelse av betalning<br />
			<?php endif; ?>
		</span>
	</div>
	<hr  class="yellow_line" />
  </div>
<?php } ?>
<!--CART ends -->