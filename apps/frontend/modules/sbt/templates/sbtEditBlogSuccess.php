<style type="text/css">
    .form_out{float:left; position:relative; border:0px solid red; margin:10px 0 10px 0;}
    .first_row_outer_blue{float:left; position:relative;border:0px solid blue; width:560px;}
    .first_block1{float:left; position:relative;border:0px solid brown; width:100px; height:20px;}
    .analysis_labels{float:left; position:relative;border:0px solid brown; width:70px; height:20px;}
    .analysis_textfield{float:left; position:relative;border:0px solid brown; width:156px;}
    .analysis_ingressbild_textfield{float:left; position:relative;border:0px solid brown; width:262px;}
    .error_list {color:#FF0000;list-style-type:none;margin:0 0 0 10px;padding:0;
    }
</style>
<script language="javascript">
    function uploadMessage(msg_div_id,message,filename)
    {
        document.getElementById(msg_div_id).innerHTML = message;
	
        var text = tinyMCE.activeEditor.getContent();
        var dest_path = window.location.hostname+'/uploads/blogDetailImage/'+filename;

        //var newImg = new Image();
        //newImg.src = 'http://'+dest_path;
        //var height = newImg.height;
        //var width = newImg.width;
        //alert ('The image size is '+width+'*'+height);

        //var str = "<img src='http://"+dest_path+"' width='"+width+"' height='"+height+"' align='"+align+"'/>";
        var str = "<img src='http://"+dest_path+"' alt='img' />";
        tinyMCE.activeEditor.setContent(text+str);
    }
</script>
<div class="maincontentpage">

    <div class="blogleft2_divpart">
        <div style="margin-bottom: 20px;"><img src="/images/new_home/blog_logo.png" width="190"></div>
        <div class="home_ad_r float_left" style="margin-left: 0px;">Annons</div>
        <div class="advertdiv" style="margin-left: 0px;"><img src="/images/1advert.jpg" alt="adv"/></div>
        <div class="advertdiv" style="margin-left: 0px;"><img src="/images/spxad.jpg" alt="adv"/></div>
    </div>

    <div class="blogright2_divpart"> 
        <div class="forumlistingleftdivinner"> 
            <div class="blog_heading widthall mrg_btm_10 mrg_lft_10">Edit Blog</div>
            <?php if ($allow_edit) { ?>
                <form name="edit_blog_form" id="edit_blog_form" method="post" action="<?php echo url_for('sbt/sbtEditBlog') . "/blog_id/" . $blog_data->id; ?>" onsubmit="return check_type('EditBlogSubmit')">
                    <input type="hidden" name="form_type" id="form_type" />
                    <input type="hidden" name="blog_desc_hid" id="blog_desc_hid" />
                    <?php echo $form->renderHiddenFields() ?>
                    <div class="addArticle">
                        <div class="mrg_lft_10"> Content Information</div>
                        <div class="article_top_right"></div>

                        <div class="article_content mrg_top_20">
                            <span class="row">
                                <span class="label_text"><?php echo __('Bloggrubrik') ?>:</span>
                                <span class="input_box"><?php echo $form['ublog_title']->render(array('style' => 'width:250px')) ?></span>
                                <span class="error_box" id="blog_title_error"></span>
                            </span> 

                            <span class="column">
                                <span class="row"> 
                                    <span class="label_text"><?php echo __('Kategori') ?>:</span>
                                    <span class="input_box"><?php echo $form['ublog_category_id']->renderError() ?><?php echo $form['ublog_category_id']->render() ?></span>
                                </span> 

                                <span class="row"> 
                                    <span class="label_text">Type:</span>
                                    <span class="input_box"><?php echo $form['ublog_type_id']->renderError() ?><?php echo $form['ublog_type_id']->render() ?></span>
                                    <span class="error_box" id="blog_type_error"></span>
                                </span>

                                <div id="blog_combo_outer" class="blog_combo_outer">
                                    <?php if ($blog_data->ublog_market_id >= 1): ?>
                                        <span class="row">
                                            <span class="label_text"><?php echo __('Market:') ?>:</span>
                                            <span class="input_box"><?php echo $form['ublog_market_id']->renderError() ?><?php echo $form['ublog_market_id']->render() ?></span>
                                        </span> 
                                    <?php endif; ?>

                                    <?php if ($blog_data->ublog_stocklist_id >= 1): ?>
                                        <span class="row">
                                            <span class="label_text"><?php echo __('Lista:') ?>:</span>
                                            <span class="input_box"><?php echo $form['ublog_stocklist_id']->renderError() ?><?php echo $form['ublog_stocklist_id']->render() ?></span>
                                        </span> 
                                    <?php endif; ?>

                                    <?php if ($blog_data->ublog_sector_id >= 1): ?>
                                        <span class="row">
                                            <span class="label_text"><?php echo __('Sektor:') ?>:</span>
                                            <span class="input_box"><?php echo $form['ublog_sector_id']->renderError() ?><?php echo $form['ublog_sector_id']->render() ?></span>
                                        </span> 
                                    <?php endif; ?>

                                    <?php if ($blog_data->ublog_object_id >= 1): ?>
                                        <span class="row">
                                            <span class="label_text"><?php echo __('Object:') ?>:</span>
                                            <span class="input_box"><?php echo $form['ublog_object_id']->renderError() ?><?php echo $form['ublog_object_id']->render() ?></span>
                                        </span> 
                                    <?php endif; ?>
                                </div> 

                                <span class="img_upload_outer">
                                    <div class="upload_img_div">
                                        <a onclick="upload('blog');" name="blog_image" class="cursor"><img class="float_left" src="/images/upload.png" width="50" height="50" alt="Upload" border="0" /></a>
                                    </div>

                                    <div class="upload_img_text"><a onclick="upload('blog');" name="blog_image" class="cursor">Upload Image for Details</a></div>
                                    <div id="detail_img_upload_msg" class="upload_img_report"></div>                    
                                </span>

                                <span class="row"> 
                                    <span class="label_text">Details:</span>
                                    <span class="input_box"><span class="error_box" id="blog_desc_error"></span></span>
                                </span>

                            </span>

                            <span class="row"> 
                                <span class="detail_section"><?php echo $form['ublog_description']->renderError() ?><?php echo $form['ublog_description']->render() ?></span>
                            </span>

                            <ul>
                                <li><input type="submit" name="post_data" id="post_data" class="save_btn edit_block_save" value="" /></li>
                                    <?php /* ?><li><a class="cursor" onclick="preview_analysis()"><img src="/images/preview.png" alt="Preview" /><span>Preview</span></a></li><?php */ ?>
                            </ul>
                        </div>


                    </div>





                </form>
            <?php } else { ?>
                <div>Access not allowed</div>
            <?php } ?>
        </div>
    </div>
</div>