<div class="maincontentpage"  id="newRegistrationDone">
<div class="forumlistingleftdiv">
  <div class="forumlistingleftdivinner">
   <div class="shoph3 widthall">Konto skapat!</div>
	<div class="float_left listing">
	  <div class="float_left widthall">
		<?php if($user_profile_data->from_sbt == 1 && $user_profile_data->sbt_active == 0): ?>
			<p>Du är nu registerad på Börstjänaren. <br />Ditt användarnamn är: <b><?php echo $username; ?></b></p>
			<p>Användarnamn och lösenord har mejlats till: <b><?php echo $email; ?></b></p>
	    <p>För att aktivera ditt konto, klicka på aktiveringslänken i mejlet.<br />
        (Om du inte hittar mejlet kolla skräpkorg och ev. spamfilter.)
	      <br />
        Om du vill ändra lösenord, gör det här: <a href="<?php echo 'https://'.$host_str.'/user/changePasswordForm';?>">Ändra lösenord.</a><br></p>
			<p>Välkommen att <a href="<?php echo 'https://'.$host_str.'/user/loginWindow';?>">logga in!</a></p>

		<?php else: ?>
			<p>Du är nu registerad på Börstjänaren. <br />Ditt användarnamn är: <b><?php echo $username; ?></b></p>
			<p>Användarnamn och lösenord har mejlats till: <b><?php echo $email; ?></b></p>
			<p>Om du vill ändra lösenord, gör det här: <a href="<?php echo 'https://'.$host_str.'/user/changePasswordForm';?>">Ändra lösenord.</a><br></p>
			<p>Välkommen att <a href="<?php echo 'https://'.$host_str.'/user/loginWindow';?>">logga in!</a></p>
		<?php endif; ?>
	  </div>
	</div>
	</div>
</div>
</div>