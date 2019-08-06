<li class="sf_admin_batch_actions_choice">
  <select name="batch_action" style="float: left">
    <option value=""><?php echo __('Choose an action', array(), 'sf_admin') ?></option>
    <option value="batchDelete"><?php echo __('Delete', array(), 'sf_admin') ?></option>
  </select>
  <?php $form = new BaseForm(); if ($form->isCSRFProtected()): ?>
    <input type="hidden" name="<?php echo $form->getCSRFFieldName() ?>" value="<?php echo $form->getCSRFToken() ?>" />
  <?php endif; ?>
  <input type="button" value="<?php echo __('Go', array(), 'sf_admin') ?>" onclick="checkrecordoraction();" class="btnclass"/>
</li>
 <style TYPE="text/css"> 
   .btnclass { background: url("../images/registerbtn_bg.jpg") no-repeat scroll right top transparent;
    color: #202021;
    cursor: pointer;
    display: block;
    float: left;
    font-size: 11px;
    font-weight: normal;
    letter-spacing: 1px;
    overflow: visible;
    position: relative;
    text-transform: capitalize;
    width: auto;}
 </style>
