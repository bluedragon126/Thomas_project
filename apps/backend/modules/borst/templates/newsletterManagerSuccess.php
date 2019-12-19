<div id="n_parent">
    <div id="n_filter float_left ">
        <form id="newsletter_form" method="post" action="saveNewsLetter">
        <table border="0" cellpadding="0" cellspacing="3" class="float_left backend_search_section" style="width:702px;left:4px;">
            <tbody style="width: 100%">
                <tr style="width: 500px;float: left;">
                <td>Newsletter name</td>
                <td><input type="text" name="newsletter_name" value="<?php echo $newsletter_name?>"/></td>
                <td>
                    <b>Article number</b>
                </td>
                <td>
                    <select id="article_option">
                        <?php $count = 1; ?>
                        <?php while ($count  <=20): ?>
                        <?php print '<option ' . ($count == count($article) ? 'selected="selected"' : '') . '>' . $count . '</option>'; ?>
                        <?php $count++; ?>
                        <?php endwhile; ?>

                        </select>
                    </td>
                    
                   
                        <td>
                            
                        <?php $count = 1; ?>
                       

                        <?php $count = 1; ?>


                        <?php $count = 1; ?>
                        <?php foreach ($ads as $obj): ?>
                        <?php //print '<input type="hidden" name="ads[]" id="ads' . $count++ . '" value="' . $obj . '">' ?>
                        <?php endforeach; ?>
                            <div id="article_ids">
                                 <?php foreach ($article as $obj): ?>
                                  <?php print '<input type="hidden" name="article[]" value="'.$obj.'">' ?>
                              <?php endforeach; ?>
                              
                            </div>

                            
                                            <input type="hidden" name="ads[]" id="ads_1" value="<?php print $ads[0] ?>">
                                            <input type="hidden" name="ads[]" id="ads_2" value="<?php print $ads[1] ?>">
                                            <input type="hidden" name="blog" id="blog_1" value="<?php print $blog ?>">
                                            <input type="hidden" name="current_val" id="current_val" value="">
                                            <input type="hidden" name="adsCount" id="adsCount" value="<?php print count($ads) ?>">
                                            <input type="hidden" name="sbtArticleCount" id="sbtArticleCount" value="<?php print count($sbtArticle) ?>">
                                            <input type="hidden" name="articleCount" id="articleCount" value="<?php print count($article) ?>">
                                            <input type="hidden" name="id" value="<?php print $id; ?>">
                                           
                        <input type="submit" value="Save" class="registerbuttontext">
                   
                </td>
                </tr></tbody>
        </table>
 </form>
    </div>

    <div id="n_newletter">

    </div>
</div>
<div id="newsletter_dialog">

</div>
<script type="text/javascript">
    loadNewsletter();
    $(document).ready(function(){
        $('#article_option').bind('change',function(){
          //  if($("#articleCount").val()>$(this).val())
         //       removeOptions($("#articleCount").val()-$(this).val());
           $("#articleCount").val($(this).val());
            loadNewsletter();
        });

        function removeOptions(cnt){
            if(cnt<=0)
                return;
            removeOptions(cnt-1);
            if($("input[value^='article_']").last().attr("id")!="current_val")
                $("input[value^='article_']").last().remove();
        }
    
    });
</script>