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
		<a href="<?php echo 'https://'.$host_str.'/backend.php/borst/subscriptionList' ?>">Subscription List</a>&nbsp;&nbsp;
		<a style="font-weight:bold;" href="<?php echo 'https://'.$host_str.'/backend.php/borst/sendSubscription' ?>">Send Subscription</a>&nbsp;&nbsp;
		<?php /* <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/commaSeperatedList' ?>">Lista komma-separerad</a>&nbsp;&nbsp; */?>
		<a href="<?php echo 'https://'.$host_str.'/backend.php/borst/filteredSubscriberList' ?>">Lista semicolon-separerad</a>&nbsp;&nbsp;
                <a href="<?php echo 'https://'.$host_str.'/backend.php/ReminderSubscription' ?>">Subscription Reminder List</a>&nbsp;&nbsp;
	</div>
<?php use_helper('I18N', 'Date') ?>
<?php include_partial('reminderSubscription/assets') ?>

<div id="sf_admin_container">
  <span class="shoph3 widthall" style="float: none;"><?php echo __('Subscription Reminder List', array(), 'messages') ?></span>

  <?php include_partial('reminderSubscription/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('reminderSubscription/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_bar">
    <?php include_partial('reminderSubscription/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('reminder_subscription_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('reminderSubscription/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions" style="list-style: none outside none; padding: 0px">
      <?php include_partial('reminderSubscription/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('reminderSubscription/list_actions', array('helper' => $helper)) ?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('reminderSubscription/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
   </div>
  </div>
</div>