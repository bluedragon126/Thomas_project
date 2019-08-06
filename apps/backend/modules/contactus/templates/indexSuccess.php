<?php use_helper('I18N', 'Date') ?>
<?php include_partial('contactus/assets') ?>
<?php $sf_context->getResponse()->addStylesheet('admin.css')?>
<div id="sf_admin_container">
  <h1><?php echo __('Contactus List', array(), 'messages') ?></h1>
To use created code, insert "?code=" into link, like this example: https://www.borstjanaren.se/borst/contactUs?code=fredagstrejding<br />
  <?php include_partial('contactus/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('contactus/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_bar">
    <?php include_partial('contactus/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('contact_us_contactus_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('contactus/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('contactus/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('contactus/list_actions', array('helper' => $helper)) ?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('contactus/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
