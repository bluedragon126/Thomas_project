<script language="javascript">
    function showUploadMessage(field_id,msg_div_id,field_val,message)
    {
        document.getElementById(field_id).value = field_val;
        document.getElementById(msg_div_id).innerHTML = message;
    }

    function uploadMessage(msg_div_id,message,filename)
    {
        document.getElementById(msg_div_id).innerHTML = message;
	
        var text = tinyMCE.activeEditor.getContent();
        var dest_path = window.location.hostname+'/uploads/analysisDetailImage/'+filename;

        var str = "<img src='http://"+dest_path+"' alt='img' />";
        tinyMCE.activeEditor.setContent(text+str);
    }

    function insert(id, what, align)
    { 
        if(id=='sbt_image')
        {
            document.getElementById(id).value = what;
        }
        else
        {
            var tt = tinyMCE.activeEditor.getContent();
            var str1 = window.location.hostname+what;

            var newImg = new Image();
            newImg.src = 'http://'+str1;
            var height = newImg.height;
            var width = newImg.width;
            //alert ('The image size is '+width+'*'+height);

            var str = "<img src='http://"+str1+"' width='"+width+"' height='"+height+"' align='"+align+"'/>";
            tinyMCE.activeEditor.setContent(tt+str);
        }
    }
</script>
<div class="maincontentpage" id="edit_analysis"> 
    <div class="forumlistingleftdiv"> 
        <div class="mrg_left_70"> 
            <div class="blog_heading shoph3 widthall">Edit Article</div>

            <?php if ($allow_view == 1): ?>
                <?php if ($last_suggestion): ?>
                    <div id="info" class="float_left widthall edit_analysis_img_div">
                        <img id="close_message cursor float_right" src="/images/cross.png" />
                        <?php echo html_entity_decode($last_suggestion->analysis_suggestion); ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <div class="float_left widthall" id="outer_div"> 
                <?php if ($allow_view == 1): ?>
                    <form name="edit_analysis_form" id="edit_analysis_form" method="post" action="">
                        <input type="hidden" name="combined_author_names" id="combined_author_names" value="<?php echo $combine_author_names ?>">
                        <input type="hidden" name="edit_analysis_desc_hid" id="edit_analysis_desc_hid" />
                        <input type="hidden" name="edit_has_publication_rights" id="edit_has_publication_rights" value="<?php echo $show_publish_button; ?>" />
                        <?php echo $form->renderHiddenFields(); ?>	
                        <div class="editaddArticle">
                            <div class="editaddArticle"> Content Information</div>
                            <div class="article_top_right"></div>

                            <div class="article_content">
                                <span class="row">
                                    <span class="label_text">Artikeltitel:</span>
                                    <span class="input_box"><?php echo $form['analysis_title']->render(array('style' => 'width:250px')) ?></span>
                                    <span class="error_box" id="analysis_title_error"></span>
                                </span>

                                <span class="column">
                                    <span class="row"> 
                                        <span class="label_text">Kategori:</span>
                                        <span class="input_box"><?php echo $form['analysis_category_id']->renderError() ?><?php echo $form['analysis_category_id']->render() ?></span>
                                    </span> 

                                    <span class="row"> 
                                        <span class="label_text">Type:</span>
                                        <span class="input_box"><?php echo $form['analysis_type_id']->renderError() ?><?php echo $form['analysis_type_id']->render(array('id' => 'analysis_type')) ?></span>
                                        <span class="error_box" id="type_error"></span>
                                    </span> 

                                    <div id="combo_outer" class="blog_combo_outer">
                                        <?php if ($analysis_data->analysis_market_id >= 1): ?>
                                            <span class="row"> 
                                                <span class="label_text">Market:</span>
                                                <span class="input_box"><?php echo $form['analysis_market_id']->renderError() ?><?php echo $form['analysis_market_id']->render(array('id' => 'analysis_market')) ?></span>
                                            </span> 
                                        <?php endif; ?>

                                        <?php if ($analysis_data->analysis_stocklist_id >= 1): ?>
                                            <span class="row"> 
                                                <span class="label_text">Lista:</span>
                                                <span class="input_box"><?php echo $form['analysis_stocklist_id']->renderError() ?><?php echo $form['analysis_stocklist_id']->render(array('id' => 'analysis_stocklist')) ?></span>
                                            </span> 
                                        <?php endif; ?>

                                        <?php if ($analysis_data->analysis_sector_id >= 1): ?>
                                            <span class="row"> 
                                                <span class="label_text">Sektor:</span>
                                                <span class="input_box"><?php echo $form['analysis_sector_id']->renderError() ?><?php echo $form['analysis_sector_id']->render(array('id' => 'analysis_sector')) ?></span>
                                            </span> 
                                        <?php endif; ?>

                                        <?php if ($analysis_data->analysis_object_id >= 1): ?>
                                            <span class="row"> 
                                                <span class="label_text">Object:</span>
                                                <span class="input_box"><?php echo $form['analysis_object_id']->renderError() ?><?php echo $form['analysis_object_id']->render() ?></span>
                                            </span> 
                                        <?php endif; ?>
                                    </div> 

                                    <span class="img_upload_outer">
                                        <div class="upload_img_div">
                                            <a onclick="uploadIngressImage();" name="ingressImgupload" class="cursor">
                                                <img class="float_left" src="/images/upload.png" width="50" height="50" alt="Upload" border="0" />
                                            </a>
                                        </div>

                                        <div class="upload_img_text"><a onclick="uploadIngressImage();" name="ingressImgupload" class="cursor">Upload Ingress-bild</a></div>
                                        <div id="upload_msg" class="upload_img_report"></div>                    
                                    </span>

                                    <span class="row"> 
                                        <span class="label_text">Ingress:</span>
                                        <span class="input_box"></span>
                                    </span> 

                                    <span class="row"> 
                                        <span class="label_text"><?php echo $form['image_text']->renderError() ?><?php echo $form['image_text']->render(array('cols' => '60', 'rows' => '4')) ?></span>
                                    </span>
                                </span>

                                <span class="column">
                                    <span class="img_upload_outer">
                                        <div class="upload_img_div">
                                            <a onclick="upload('analysis');" name="analysis_image" class="cursor">
                                                <img class="float_left" src="/images/upload.png" width="50" height="50" alt="Upload" border="0" />
                                            </a>
                                        </div>
                                        <div class="upload_img_text"><a onclick="upload('analysis');" name="analysis_image" class="cursor">Upload Image for Details</a></div>
                                        <div id="detail_img_upload_msg" class="upload_img_report"></div>                    
                                    </span>
                                </span>

                                <span class="column">
                                    <span class="row"> 
                                        <span class="label_text">Details:</span>
                                        <span class="input_box"><span class="error_box" id="article_desc_error"></span></span>
                                    </span>
                                </span>

                                <span class="row"> 
                                    <span class="detail_section"><?php echo $form['analysis_description']->renderError() ?><?php echo $form['analysis_description']->render() ?></span>
                                </span>

                                <span class="column article_status">
                                    <span class="row"> 
                                        <span class="label_text">Artikel Status:</span>
                                        <span class="input_box">
                                            <select name="edit_analysis_status" id="edit_analysis_status">
                                                <option value="6" <?php echo $analysis_data->published == 6 ? 'selected' : '' ?>>Intern</option>
                                                <option value="7" <?php echo $analysis_data->published == 7 ? 'selected' : '' ?>>Profil</option>
                                                <option value="1" <?php echo $analysis_data->published == 1 ? 'selected' : '' ?>>Publik</option>
                                            </select>
                                        </span>
                                    </span> 
                                </span>

                                <ul>
                                    <li><a id="save_article_changes" class="cursor edit_article_save">&nbsp</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                <?php else: ?>
                    <div class="float_left widthall margin_bottom_20">Access not allowed</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="rightbanner">
        <div class="home_ad_r float_left font_size_12">Annons</div>
        <div class="advertdiv"><img src="/images/1advert.jpg" alt="adv"/></div>
        <div class="advertdiv"><img src="/images/spxad.jpg" alt="adv"/></div>
    </div>
</div>

<!-- Used for conformation before sending a publishing a article. -->
<div id="edit_request_for_publish_analysis_box_1" title="Confirmation Message" class="hide_div">
    <table width="100%"  border="0" cellspacing="3" cellpadding="0">
        <tr>
            <td>Message:</td>
        </tr>
        <tr>
            <td><span id="edit_publish_analysis_box_1_message display-none"></span></td>
        </tr>
    </table>
</div>

<!-- Used for conformation before sending a publishing a article. -->
<div id="edit_request_for_publish_analysis_box_2" title="Confirmation Message" class="hide_div">
    <table width="100%"  border="0" cellspacing="3" cellpadding="0">
        <tr>
            <td>Message:</td>
        </tr>
        <tr>
            <td><span id="edit_publish_analysis_box_2_message display-none"></span></td>
        </tr>
    </table>
</div>

<!-- Used for conformation before sending a publishing a article. -->
<div id="edit_confirmation_before_publish_box" title="Confirmation Message" class="hide_div">
    <table width="100%"  border="0" cellspacing="3" cellpadding="0">
        <tr>
            <td>Message:</td>
        </tr>
        <tr>
            <td><span id="edit_confirmation_before_publish_box_message display-none"></span></td>
        </tr>
    </table>
</div>