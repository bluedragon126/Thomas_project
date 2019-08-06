<td class="sf_admin_text sf_admin_list_td_id" style="border-top: 1px solid #C2C5D4;font-weight: normal;padding: 5px 3px 4px 0;">
  <?php echo link_to($reminder_subscription->getId(), 'reminder_subscription_edit', $reminder_subscription) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_subscription_type"  style="border-top: 1px solid #C2C5D4;font-weight: normal;padding: 5px 3px 4px 0;">
  <?php //echo $reminder_subscription->getSubscriptionType()
  $getSubscriptionType = Doctrine::getTable('BtShopArticle')->getArticleNameById($reminder_subscription->getSubscriptionType());  
  echo $getSubscriptionType['btshop_article_title'];
  ?>
</td>
<td class="sf_admin_text sf_admin_list_td_nof_days"  style="border-top: 1px solid #C2C5D4;font-weight: normal;padding: 5px 3px 4px 0;">
  <?php echo $reminder_subscription->getNofDays() ?> days
</td>
<td class="sf_admin_text sf_admin_list_td_subject" style="border-top: 1px solid #C2C5D4;font-weight: normal;padding: 5px 3px 4px 0;">
  <?php echo $reminder_subscription->getSubject() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_email_contain"  style="border-top: 1px solid #C2C5D4;font-weight: normal;padding: 5px 3px 4px 0;">
  <?php echo $reminder_subscription->getEmailContain() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at"  style="border-top: 1px solid #C2C5D4;font-weight: normal;padding: 5px 3px 4px 0;">
  <?php echo false !== strtotime($reminder_subscription->getCreatedAt()) ? format_date($reminder_subscription->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
</td>
