<form name="update_sbtinactiveuser_form" id="update_sbtinactiveuser_form" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" id="update_user_list_table">
    <thead>
      <tr id="update_user_form_column_row">
        <th scope="col" width="5%"><b>Nr</b></th>
        <th scope="col" width="25%"><b>Förnamn</b></th>
		<th scope="col" width="25%"><b>Efternamn</b></th>
		<th scope="col" width="30%"><b>E-mail</b></th>
		<th scope="col" width="15%"><b>Aktion</b></th>
      </tr>
    </thead>
	<?php
	$page_num = $pager->getPage() - 1;
	$page_num = $page_num * $rec_per_page;
	$page_num = $page_num + 1;
	?>
	<?php $i = $pager->getPage() == 1 ? 1 : $page_num;  ?>
    <?php foreach ($pager->getResults() as $user): ?>
    <tr class="classnot">
		<td><?php echo $i; ?></td>
		<td><?php echo substr($user->firstname, 0, 10); ?></td>
		<td><?php echo substr($user->lastname, 0, 15); ?></td>
		<td><a class="<?php echo $class ?>" title="Email this user" href="mailto:<?php echo $user->email ?>"><?php echo substr($user->email, 0, 20) ?></a></td>
		<td><input type="checkbox" name="activateme[<?php echo $user->user_id; ?>]" /></td>
    </tr>
    <?php $i++; endforeach; ?>
  </table>
</form>