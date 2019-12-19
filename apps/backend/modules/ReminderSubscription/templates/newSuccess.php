<style type="text/css">
.listing table td{ border:0px;}
.listing table#remind_table2 th{ background-color:#99CCFF;}
.listing table td{ font-weight:normal;}
#subscription_other_links a {color:#114993;}
</style>
<div class="maincontentpage">
  <div class="forumlistingleftdiv">
   <div class="forumlistingleftdivinner" style="width:915px;">
   
	<div id="subscription_other_links" class="float_left widthall" style="width:900px; margin-bottom:20px;">
		<a href="<?php echo 'http://'.$host_str.'/backend.php/borst/subscriptionList' ?>">Subscription List</a>&nbsp;&nbsp;
		<a style="font-weight:bold;" href="<?php echo 'http://'.$host_str.'/backend.php/borst/sendSubscription' ?>">Send Subscription</a>&nbsp;&nbsp;
		<a href="<?php echo 'http://'.$host_str.'/backend.php/borst/commaSeperatedList' ?>">Lista komma-separerad</a>&nbsp;&nbsp;
		<a href="<?php echo 'http://'.$host_str.'/backend.php/borst/filteredSubscriberList' ?>">Lista semicolon-separerad</a>&nbsp;&nbsp;
                <a href="<?php echo 'http://'.$host_str.'/backend.php/ReminderSubscription' ?>">Subscription Reminder List</a>&nbsp;&nbsp;
	</div>
<?php use_helper('I18N', 'Date') ?>
<?php include_partial('reminderSubscription/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Subscription Reminder', array(), 'messages') ?></h1>

  <?php include_partial('reminderSubscription/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('reminderSubscription/form_header', array('reminder_subscription' => $reminder_subscription, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('reminderSubscription/form', array('reminder_subscription' => $reminder_subscription, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('reminderSubscription/form_footer', array('reminder_subscription' => $reminder_subscription, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
   </div>
  </div>
</div>
