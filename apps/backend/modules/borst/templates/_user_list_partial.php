<form name="update_user_form" id="update_user_form" method="post" action="">
  <input type="hidden" name="update_selected_users" value="update_selected_users">
  <input type="hidden" name="delete_user_id" id="delete_user_id">
  <input type="hidden" name="reset_pass_user_id" id="reset_pass_user_id">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" id="update_user_list_table">
    <thead>
      <tr id="update_user_form_column_row">
        <th scope="col" width="2%">Nr</th>
        <th scope="col" width="3%">Aktion</th>
        <th scope="col" width="5%"><a id="sortby_regdate" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Reg<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
        <th scope="col" width="2%">&nbsp;</th>
		<th scope="col" width="5%"><a id="sortby_betdate" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Bet<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
        <th scope="col" width="5%"><a id="sortby_stopdate" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Stop<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
        <th scope="col" width="5%"><a id="sortby_kundnr" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Kundnr<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
        <th scope="col" width="5%"><a id="sortby_username" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">User<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
        <th scope="col" width="5%"><a id="sortby_firstname" style="cursor:pointer; width:90px;" class="float_left"><span class="float_left">Förnamn<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
		<th scope="col" width="7%"><a id="sortby_lastname" style="cursor:pointer; width:95px;" class="float_left"><span class="float_left">Efternamn<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
		<th scope="col" width="3%"><a id="sortby_city" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Ort<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
		<th scope="col" width="10%"><a id="sortby_email" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">E-mail<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
		<th scope="col" width="5%"><a id="sortby_abonid" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Abonn<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
		<th scope="col" width="5%"><a id="sortby_userstatid" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Status<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
		<th scope="col" width="3%"><a id="sortby_inlog" style="cursor:pointer; width:65px;" class="float_left"><span class="float_left">Inlog<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
		<th scope="col" width="10%"><a id="sortby_inlogdate" style="cursor:pointer; width:110px;" class="float_left"><span class="float_left">Senaste inlog<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
		<th scope="col" width="10%"><a id="sortby_total" style="cursor:pointer; width:70px;" class="float_left"><span class="float_left">Totalt<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
		<th scope="col" width="10%"><a id="sortby_regdate" style="cursor:pointer; width:75px;" class="float_left"><span class="float_left">Belopp<!--<img src="/images/bg.gif" alt="down" width = '20' />--></span></a></th>
		<th scope="col" width="10%"><a id="sortby_regdate" style="cursor:pointer; width:75px;" class="float_left"><span class="float_left">SBT Active<!--<img src="/images/bg.gif" alt="down" width = '20' />--></span></a></th>
      </tr>
    </thead>
	<?php
	$page_num = $pager->getPage() - 1;
	$page_num = $page_num * $rec_per_page;
	$page_num = $page_num + 1;
	?>
	<?php $i = $pager->getPage() == 1 ? 1 : $page_num;  ?>
    <?php foreach ($pager->getResults() as $user): ?>
	<?php
		//ny 
		if ($user->userstatid == 1) $class = "blackcolor";
		// Pmind
		elseif ($user->userstatid == 2) $class = "orangetext";
		// Betald
		elseif ($user->userstatid == 3) $class = "blackcolor"; 
		// Obetald
		elseif ($user->userstatid == 4) $class = "redcolor"; 
		//Avtackad
		elseif ($user->userstatid == 5) $class = "greycolor";
	?>
    <tr class="classnot">
		<td class="<?php echo $class ?>"><?php echo $i; ?><input name="user_ids[]" type="hidden" value="<?php echo $user->user_id; ?>">
			<input name="email[]" type="hidden" value="<?php echo $user->email; ?>"></td>
		
		<td class="<?php echo $class ?>"><div class="float_left"><a class="<?php echo $class ?> cursor" title="Delete <?php echo $user->username ?>" onclick="javascript:open_confirmation('Vill du verkligen ta bort Anvndare <?php echo $user->firstname.' '.$user->lastname ?>','<?php echo $user->user_id; ?>','delete_user_confirm_box','delete_user_msg')">DEL</a></div> &nbsp;<div class="float_left"><a class="<?php echo $class ?> cursor" title="Reset <?php echo $user->username ?>'s password" onclick="javascript:open_confirmation('Är du säker på att du vill återställa lösenordet för <?php echo $user->firstname.' '.$user->lastname ?>','<?php echo $user->user_id; ?>','reset_user_password_confirm_box','reset_password_msg')">RES</a></div> </td>
		
		
		
		<td class="<?php echo $class ?>">
        <?php $reg = substr($user->regdate,0,10); ?>
        <input name="regdate[]" type="text" class="<?php echo $class ?>" style="width: 70px" value="<?php echo $reg; ?>"></td>
		<td class="<?php echo $class ?>">
        <input type="checkbox" name="chb_update_to_betald[]" class="<?php echo $class ?>" onclick="setNewDate(<?php echo $user->user_id ?>)" value="<?php echo $user->user_id; ?>"></td>
		<td class="<?php echo $class ?>">
        <?php $style = "color: #000";
		if ($user->betdate != '0000-00-00') {
			$betdate = $user->betdate; 
			$plus_30_days = strtotime("-30 days");
			$check_date = date('Y-m-d', $plus_30_days);
			if ($betdate < $check_date) $style = "font-weight: bold; color: #F00"; 
		}
		else $betdate = "";
		?>
        <input class="<?php echo $class ?>" id="bet_id<?php echo $user->user_id ?>" name="betdate[]" type="text" style="width: 70px; <?php $style ?>" value="<?php echo $betdate; ?>"></td>
		<td class="<?php echo $class ?>">
        <?php $style = "color: #000";
		if ($user->stopdate != '0000-00-00') {
			$stopdate = $user->stopdate; 
			if ($stopdate <= date('Y-m-d')) $style = "font-weight: bold; color: #F00"; 
		}
		else $stopdate = "";
		?>
        <input class="<?php echo $class ?>" name="stopdate[]" type="text" style="width: 70px; <?php $style ?>" value="<?php echo $stopdate; ?>"></td>
		<td class="<?php echo $class ?>"><a class="<?php echo $class ?>" title="Edit this user" href="<?php echo 'http://'.$host_str.'/backend.php/borst/editProfile/edit_user_id/'.$user->user_id?>"><?php echo $user->kundnr ?></a></td>
		<td class="<?php echo $class ?>"><a class="<?php echo $class ?>" title="Edit this user" href="<?php echo 'http://'.$host_str.'/backend.php/borst/editProfile/edit_user_id/'.$user->user_id?>"><?php echo substr($user->username, 0, 10) ?></a></td>
		<td class="<?php echo $class ?>"><?php echo substr($user->firstname, 0, 10); ?></td>
		<td class="<?php echo $class ?>"><?php echo substr($user->lastname, 0, 15); ?></td>
		<td class="<?php echo $class ?>"><?php echo $user->city ?></td>
		<td class="<?php echo $class ?>"><a class="<?php echo $class ?>" title="Email this user" href="mailto:<?php echo $user->email ?>"><?php echo substr($user->email, 0, 20) ?></a></td>
		<td class="<?php echo $class ?>"><input name="abonID[]" type="hidden" value="<?php echo $user->abonid ?>">
		<?php if($abon_arr):?>
        <select class="<?php echo $class ?>" name="sel_abonID[]" style="width: 75px" >
          <?php foreach($abon_arr as $key=>$value): ?>
          <option value="<?php echo $key; ?>" <?php if($key==$user->abonid) echo 'selected="selected"'?>><?php echo $value ?></option>
          <?php endforeach; ?>
        </select>
        <?php endif; ?>
		</td>
		<td class="<?php echo $class ?>"><input name="userstatID[]" type="hidden" value="<?php echo $user->userstatid ?>">
		<?php if($user_status_arr):?>
        <select class="<?php echo $class ?>" name="sel_userstatID[]" style="width: 75px" >
          <?php foreach($user_status_arr as $key=>$value): ?>
          <option value="<?php echo $key; ?>" <?php if($key==$user->userstatid) echo 'selected="selected"'?>><?php echo $value ?></option>
          <?php endforeach; ?>
        </select>
        <?php endif; ?>		
		</td>
		<td class="<?php echo $class ?>"><?php echo $user->getInlog() ?></td>
		<td class="<?php echo $class ?>"><?php echo substr($user->inlogdate, 0, 16) ?><?php echo $user->priv ?></td>
		<td class="<?php echo $class ?>"><?php $amount = $transaction_data->userPayment($user->user_id);  echo $amount ?></td>
		<td class="<?php echo $class ?>"><input id="payment<?php echo $user->user_id ?>" name="pay_amount[]" type="text" style="width: 31px; <?php $style ?>" value="0"></td>
		<td class="<?php echo $class ?>"><?php if($user->from_sbt == 1 && $user->sbt_active == 1){ echo 'Yes';}else{ echo 'No';}?></td>
    </tr>
    <?php $i++; endforeach; ?>
  </table>
</form>