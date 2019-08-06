<?php
//use_helper('jQuery');
//use_helper('Pagination');
?>
<div class="float_left listing article_div">
     <span class="cursor" id="load_sbt_aticle">Load Articles</span>
    <div class="float_left width_1020 article_div_list">
        <table cellpadding="0" cellspacing="0" border="0" class="paginationwrapper">
            <thead>
                <tr>
                    <th>
                        <b>Id</b>
                    </th>
                    <th>
                        <b>Date</b>
                    </th>
                     <th>
                        <b>Title</b>
                    </th>
                    <th>
                        <b>Author</b>
                    </th>
                    <th>
                        <b>Category</b>
                    </th>
                    <th>
                        <b>Type</b>
                    </th>
                    <th>
                        <b>Status</b>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($pager)): ?>
                <?php $profile = new SfGuardUserProfile();?>
                <?php foreach ($pager->getResults() as $obj): ?>
                        <tr id="<?php echo $obj->getId() ?>" class="article_div_list_tr">
                            <td>
                        <?php echo $obj->getId() ?>
                    </td>
                    <td>
                        <?php echo $obj->getCreatedAt(); ?>
                    </td>
                    <td>
                        <?php echo $obj->getAnalysisTitle(); ?>
                    </td>
                    <td>
                        <?php echo $obj->author_id?$profile->getFullUserName($obj->author_id):'&nbsp;'; ?>
                    </td>
                    <td>
                       <?php echo $obj->getSbtArticleCategory()->getSbtCategoryName(); ?>
                    </td>
                    <td>
                        <?php echo $obj->getSbtArticleType()->getTypeName(); ?>
                    </td>
                    <td>
                        <?php echo $obj->getSbtAnalysisStatus()->getStatusName(); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                        <tr>
                            <td colspan="7">
                                <div class="pagination">
                            <?php echo PagerNavigation::pager_navigation($pager, '/backend.php/borst/sbtArticleDialog'.$params, 'newsletter_dialog'); ?>
                        </div></td>
                </tr>
                <?php else: ?>
                                <tr>
                                    <td colspan="7">
                                        <span>Article list is empty</span>
                                    </td>
                                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $('.article_div_list_tr').bind('click',function(){
        getNewsletterForValue("sbtArticle",$(this).attr('id'));
    });
      $("#load_sbt_aticle").click(function(){
       
        $( "#newsletter_dialog" ).dialog("close");
       loadDailogBox("article");
    });
</script>