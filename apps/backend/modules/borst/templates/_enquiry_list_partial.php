<form name="update_borst_enquiry" id="update_borst_enquiry" method="post" action="">
  <input name="update_enquiry" type="hidden" value="1">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" id="borst_enquiry_list_table">
    <thead>
      <tr id="update_borst_enquiry_column_row">
        <th scope="col" width="3%">Nr</th>
		<th scope="col" width="22%"><span class="float_left" style="width:80px;"><a id="sortby_subject" style="cursor:pointer;" class="float_left"><span style="width:54px;" class="float_left">Ämne<img src="/images/bg.gif" alt="down" /></span></a></span></th>
        <th scope="col" width="15%"><a id="sortby_enq_type" style="cursor:pointer;" class="float_left"><span style="width:110px;" class="float_left">Typ av förfrågan<img src="/images/bg.gif" alt="down" /></span></a></th>
        <th scope="col" width="11%"><a id="sortby_firstname" style="cursor:pointer;" class="float_left"><span style="width:71px;" class="float_left">Förnamn<img src="/images/bg.gif" alt="down" /></span></a></th>
        <th scope="col" width="12%"><a id="sortby_lastname" class="float_left" style="cursor:pointer;"><span style="width:79px;" class="float_left">Efternamn<img src="/images/bg.gif" alt="down" /></span></a></th>
        <th scope="col" width="17%"><a id="sortby_email" style="cursor:pointer;" class="float_left"><span style="width:57px;" class="float_left">E-post<img src="/images/bg.gif" alt="down" /></span></a></th>
        <th scope="col" width="7%">Status</th>
        <th scope="col" width="13%"><a id="sortby_date" style="cursor:pointer;" class="float_left"><span style="width:46px;" class="float_left">Date<img src="/images/bg.gif" alt="down" /></span></a></th>
      </tr>
    </thead>
    <?php $i=1; foreach ($pager->getResults() as $enq): ?>
    <tr class="classnot">
      <td><input name="enquiry_ids[]" type="hidden" value="<?php echo $enq->id; ?>"><?php echo $i; ?></td>
	  <td><a href="<?php echo 'http://'.$host_str.'/backend.php/borst/enquiryDetails/enq_id/'.$enq->id ?>"><?php echo $enq->enq_subject; ?></a></td>
	  <td><?php echo $enq->enq_type; ?></td>
	  <td><?php echo $enq->firstname; ?></td>
	  <td><?php echo $enq->lastname; ?></td>
	  <td><?php echo $enq->email; ?></td>
      <td><select name="enq_status[]" class="selectmenu">
			 <option value=""><?php echo 'Ändra status' ?></option>
			 <option value="0" <?php if($enq->is_answered == 0) echo "selected"; ?>><?php echo 'UnAnswered' ?></option>
			 <option value="1" <?php if($enq->is_answered == 1) echo "selected"; ?>><?php echo 'Answered' ?></option>
			 <option value="2" <?php if($enq->is_answered == 2) echo "selected"; ?>><?php echo 'Disabled' ?></option>
			</select></td>
      <?php  /* ?><td><?php echo $enq->enq_date; ?></td><?php */?>
      <td><?php if($enq['maxreplydate'] == null) { echo $enq->enq_date; } else { echo $enq['maxreplydate']; } ?></td>
     
    </tr>
    <?php $i++; endforeach; ?>
  </table>
</form>
