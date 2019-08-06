
<div class="float_left listing article_div">
    <div class="float_left width_1020 article_div_list">
        <table cellpadding="0" cellspacing="0" border="0" class="paginationwrapper">
            <thead>
                <tr>
                    <th>
                        <b>Id</b>
                    </th>

                    <th>
                        <b>Title</b>
                    </th>
                    <th>
                        <b>Type</b>
                    </th>
                    <th>
                        <b>Enable</b>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($pager)): ?>
                <?php foreach ($pager->getResults() as $obj): ?>
                        <tr id="<?php echo $obj->getId() ?>" class="article_div_list_tr">
                            <td>
                        <?php echo $obj->getId() ?>
                    </td>

                    <td>
                        <?php echo $obj->getAdTitle(); ?>
                    </td>
                    <td>
                        <?php echo $obj->getAdType(); ?>
                    </td>
                    <td>
                        <?php echo $obj->getIsEnabled() == 'Y' ? "YES" : 'NO'; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                        <tr>
                            <td colspan="6">
                                <div class="pagination">
                            <?php echo PagerNavigation::pager_navigation($pager, '/backend.php/borst/adsDialog', 'newsletter_dialog'); ?>
                        </div></td>
                </tr>
                <?php else: ?>
                                <tr>
                                    <td colspan="6">
                                        <span>Ad list is empty</span>
                                    </td>
                                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $('.article_div_list_tr').bind('click',function(){
        getNewsletterForValue("ads",$(this).attr('id'));
    });
    
</script>