<div>
<form action="" method="POST">
    <div class="savebtndiv">
        <input type="submit" value="Save"  class="registerbuttontext save_news" style="width:50px" />
    </div>
<input type="hidden" name="action_mode" id="action_mode" value="purchase_update">
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="update_purchaseorder_list_table" class="paginationwrapper ">
    <thead>
        <tr id="update_user_form_column_row">
            <th scope="col" width="1%" class="equal_spacing"><b>Nr</b></th>
            <th scope="col" width="5%" class="equal_spacing"><b>Name</b></th>
            <th scope="col" width="10%" class="equal_spacing"><b>Article</b>&nbsp;</th>
            <th scope="col" width="10%" class="equal_spacing"><b>Sbt Articles</b></th>
            <th scope="col" width="10%" class="equal_spacing"><b>Ads</b></th>
            <th scope="col" width="9%" class="equal_spacing"><b>Blog </b></th>
            <th scope="col" width="5%" class="equal_spacing"><b>Publish</b></th>
            <th scope="col" width="4%" class="equal_spacing"><b>Edit</b></th>
            <th scope="col" width="4%" class="equal_spacing"><b>Delete</b></th>
            <th scope="col" width="5%" class="equal_spacing"><b>Preview</b></th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($pager)): ?>

        <?php foreach ($pager->getResults() as $obj): ?>
                <tr class="classnot " valign="top">
                    <td><a class="lightbluefont" href="newsletterManager?<?php print NewsLetterTable::getLinkParameter($obj) ?>"><?php print $obj->getId() ?></a></td>
                    <td><a class="lightbluefont" href="newsletterManager?<?php print NewsLetterTable::getLinkParameter($obj) ?>"><span class ="word_wrap" style="width: 80px; "><?php print $obj->getName() ?></span></a></td>
                    <td><?php $records = NewsLetterTable::getArticleFromDB($obj->getArticle(),"article"); ?>
                        <input type="hidden" name="id[<?php echo $obj->getId()?>]">
                <?php $pos=0;?>
                <?php foreach ($records as $record): ?>
                    <p style="width: 140px;" class="word_wrap <?php echo ($pos)%2?"odd_color":"even_color"?>"><?php print $record['title']; ?></p>
                    <?php $pos++;?>
                <?php endforeach; ?>
                </td>
                <td>
                <?php $records = NewsLetterTable::getArticleFromDB($obj->getArticle(),"sbtArticle");  ?>
                <?php $pos=0;?>
                <?php foreach ($records as $record): ?>
                        <p style="width: 140px; " class="word_wrap <?php echo ($pos)%2?"odd_color":"even_color"?>"><?php print $record['title']; ?></p>
                          <?php $pos++;?>
                <?php endforeach; ?>
                    </td>
                    <td>
                <?php $records = NewsLetterTable::getAdsTitle($obj->getAds()); ?>
                 <?php $pos=0;?>
                <?php foreach ($records as $record): ?>
                            <p style="width: 140px; " class="word_wrap <?php echo ($pos)%2?"odd_color":"even_color"?>"><?php print $record['title']; ?></p>
                            <?php $pos++;?>
                <?php endforeach; ?>
                        </td>
                        <td><span style="width: 140px; " class="word_wrap"> <?php $blog = NewsLetterTable::getBlogTitle($obj->getBlog()); ?></span>
                <?php print $blog['title']; ?>
                        </td>
                        <td><input type="checkbox" name="publish[<?php print $obj->getId() ?>]" <?php print $obj->getPublish() ? 'checked=checked' : '' ?> /></td>
                        <td>
                
                                <a class="cursor lightbluefont" href="newsletterManager?<?php print NewsLetterTable::getLinkParameter($obj) ?>"  >[E]</a>
                
                                </td>
                                <td>
                                    <a class="cursor redcolor" href="javascript:void(0)" onclick="deleteNewsletter(<?php echo $obj->id.",".$pager->getPage()?>)" >[X]</a>
                                </td>
                                <td>

                                    <a class="cursor lightbluefont" href="javascript:void(0)" onclick="window.open('<?php print "newsletterAutomation?" . NewsLetterTable::getLinkParameter($obj) ?>','_blank')"  >[Preview]</a>

                                </td>
                            </tr>
        <?php endforeach; ?>
                                    <tr>
                                        <td colspan="10">
                                            <div class="pagination"><?php print PagerNavigation::pager_navigation($pager, 'newsletterListBlock', 'newsletter_page') ?></div> </td></tr>
                                    <tr>
                                        <td colspan="10"><input type="submit" value="Save"  class="registerbuttontext" /></td>
                                    </tr>
                                </form>
    <?php else: ?>
                                        <tr><td colspan="10">No NewsLetter list found</td></tr>
    <?php endif; ?>
</tbody>
</table>
</form>
</div>
<form target="_blank" id="" method="post"> </form>