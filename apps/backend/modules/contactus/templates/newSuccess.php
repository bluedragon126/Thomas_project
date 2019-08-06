<?php use_helper('I18N', 'Date') ?>
<?php include_partial('contactus/assets') ?>
<?php $sf_context->getResponse()->addStylesheet('admin.css')?>
<div id="sf_admin_container">
  <h1><?php echo __('New Contactus', array(), 'messages') ?></h1>

  <?php include_partial('contactus/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('contactus/form_header', array('contact_us' => $contact_us, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('contactus/form', array('contact_us' => $contact_us, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('contactus/form_footer', array('contact_us' => $contact_us, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
