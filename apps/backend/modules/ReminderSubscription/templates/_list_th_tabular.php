<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_id">
  <?php if ('id' == $sort[0]): ?>
    <?php echo link_to(__('Id', array(), 'messages'), '@reminder_subscription', array('style' => 'color: #363637;font-weight: bold;', 'query_string' => 'sort=id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Id', array(), 'messages'), '@reminder_subscription', array('style' => 'color: #363637;font-weight: bold;', 'query_string' => 'sort=id&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_subscription_type" width="12%">
  <?php if ('subscription_type' == $sort[0]): ?>
    <?php echo link_to(__('Subscription type', array(), 'messages'), '@reminder_subscription', array('style' => 'color: #363637;font-weight: bold;','query_string' => 'sort=subscription_type&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Subscription type', array(), 'messages'), '@reminder_subscription', array('style' => 'color: #363637;font-weight: bold;','query_string' => 'sort=subscription_type&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_nof_days" width="8%">
  <?php if ('nof_days' == $sort[0]): ?>
    <?php echo link_to(__('Nof days', array(), 'messages'), '@reminder_subscription', array('style' => 'color: #363637;font-weight: bold;','query_string' => 'sort=nof_days&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Nof days', array(), 'messages'), '@reminder_subscription', array('style' => 'color: #363637;font-weight: bold;','query_string' => 'sort=nof_days&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_subject" width="20%">
  <?php if ('subject' == $sort[0]): ?>
    <?php echo link_to(__('Subject', array(), 'messages'), '@reminder_subscription', array('style' => 'color: #363637;font-weight: bold;', 'query_string' => 'sort=subject&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Subject', array(), 'messages'), '@reminder_subscription', array('style' => 'color: #363637;font-weight: bold;', 'query_string' => 'sort=subject&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_email_contain" width="30%">
  <?php if ('email_contain' == $sort[0]): ?>
    <?php echo link_to(__('Email contain', array(), 'messages'), '@reminder_subscription', array('style' => 'color: #363637;font-weight: bold;', 'query_string' => 'sort=email_contain&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Email contain', array(), 'messages'), '@reminder_subscription', array('style' => 'color: #363637;font-weight: bold;', 'query_string' => 'sort=email_contain&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_date sf_admin_list_th_created_at">
  <?php if ('created_at' == $sort[0]): ?>
    <?php echo link_to(__('Created at', array(), 'messages'), '@reminder_subscription', array('style' => 'color: #363637;font-weight: bold;', 'query_string' => 'sort=created_at&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Created at', array(), 'messages'), '@reminder_subscription', array('style' => 'color: #363637;font-weight: bold;', 'query_string' => 'sort=created_at&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>