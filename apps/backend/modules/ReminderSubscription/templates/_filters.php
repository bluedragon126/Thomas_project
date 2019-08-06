<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="sf_admin_filter">
  <?php if ($form->hasGlobalErrors()): ?>
    <?php echo $form->renderGlobalErrors() ?>
  <?php endif; ?>

  <form action="<?php echo url_for('reminder_subscription_collection', array('action' => 'filter')) ?>" method="post">
    <table cellspacing="0" style="background-color: #7986B8;margin: 5px;position: relative;width: 100%;">
      <tfoot style="float: right;width: 120px;">
        <tr style="float: left; width:100%">
          <td colspan="2">
            <?php echo $form->renderHiddenFields() ?>
            <?php echo link_to(__('Reset', array(), 'sf_admin'), 'reminder_subscription_collection', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post', 'style' => 'color: #363637;float: left;font-weight: bold;outline-style: none;outline-width: 0;padding: 0 10px;text-decoration: none;')) ?>
            <input type="submit" value="<?php echo __('Filter', array(), 'sf_admin') ?>" style="background: url('../images/registerbtn_bg.jpg') no-repeat scroll right top transparent;color: #202021;cursor: pointer;display: block;font-size: 11px;font-weight: normal;letter-spacing: 1px;overflow: visible;position: relative;text-transform: capitalize;width: auto;float: left;" />
          </td>
        </tr>
      </tfoot>
      <tbody style="float: left;">
        <?php foreach ($configuration->getFormFilterFields($form) as $name => $field): ?>
        <?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?>
          <?php include_partial('reminderSubscription/filters_field', array(
            'name'       => $name,
            'attributes' => $field->getConfig('attributes', array()),
            'label'      => $field->getConfig('label'),
            'help'       => $field->getConfig('help'),
            'form'       => $form,
            'field'      => $field,
            'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_filter_field_'.$name,
          )) ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </form>
</div>
