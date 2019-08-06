<?php
//use_helper('jQuery');
//use_helper('Pagination');
?>
<div class="float_left listing article_div">
    <div>
        <span class="cursor" id="load_sbt_aticle">Load Sbt Articles</span>
    </div>
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
                <?php foreach ($pager->getResults() as $obj): ?>
                        <tr id="<?php echo $obj->getArticleId() ?>" class="article_div_list_tr">
                            <td>
                        <?php echo $obj->getArticleId() ?>
                    </td>
                    <td>
                        <?php echo date("Y-m-d", strtotime($obj->getArticleDate())); ?>
                    </td>
                    <td>
                        <?php echo $obj->getTitle(); ?>
                    </td>
                    <td>
                        <?php echo $obj->author; ?>
                    </td>
                    <td>
                       <?php echo $obj->getArticleCategory()->getCategoryName(); ?>
                    </td>
                    <td>
                        <?php echo $obj->getArticleType()->getTypeName(); ?>
                    </td>


                    <td>
                        <?php echo $obj->getArticleStatus()->getArtStatus(); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                        <tr>
                            <td colspan="7">
                                <div class="pagination">
                            <?php echo PagerNavigation::pager_navigation($pager, '/backend.php/borst/articleDialog'.$params, 'newsletter_dialog'); ?>
                        </div>
                    </td>
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
        getNewsletterForValue("article",$(this).attr('id'));
    });
    $("#load_sbt_aticle").click(function(){
       
        $( "#newsletter_dialog" ).dialog("close");
       loadDailogBox("sbtArticle");
    });
</script>