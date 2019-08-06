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
<div class="article_wrapper">
    <form name="create_analysis_form" id="create_analysis_form" method="post" action="<?php //echo url_for('sbt/sbtAddAnalysis')  ?>">
        <input type="hidden" name="form_type" id="form_type">
        <input type="hidden" name="combined_author_names" id="combined_author_names">
        <input type="hidden" name="analysis_desc_hid" id="analysis_desc_hid" />
        <input type="hidden" name="has_publication_rights" id="has_publication_rights" value="<?php echo $show_publish_button; ?>" />
        <?php echo $form->renderHiddenFields() ?>
        <div class="addArticle">
            <div class="article_top blog_input_title"> Artikelns inneh&aring;ll</div>
            <div class="article_top_right"></div>
            <div class="article_content">
                <span class="row">
                    <span class="label_text blog_input_title">Titel:</span>
                    <span class="input_box"><?php echo $form['analysis_title']->render(array('style' => 'width:250px','class' => 'form_input width_277 contactus-inputs')) ?></span>
                    <span class="error_box" id="analysis_title_error"></span>
                </span> 

                <span class="column">
                    <span class="row"> 
                        <span class="label_text blog_input_subtitle">Kategori:</span>
                        <span class="input_box selectBox"><?php echo $form['analysis_category_id']->renderError() ?><?php echo $form['analysis_category_id']->render(array('style'=>'width:285px;padding-left:1px;', 'class' => 'border-radius-5px form_input width_277 contactus-inputs')) ?></span>
                    </span> 

                    <span class="row"> 
                        <span class="label_text blog_input_subtitle">Typ:</span>
                        <span class="input_box selectBox"><?php echo $form['analysis_type_id']->renderError() ?><?php echo $form['analysis_type_id']->render(array('id' => 'analysis_type','style'=>'width:285px;padding-left:1px;', 'class' => 'border-radius-5px form_input width_277 contactus-inputs')) ?><span id="type_analysis" class="indicator"><img align="absmiddle"  src="/images/indicator.gif"></span></span>
                        <span class="error_box" id="type_error"></span>
                    </span> 

                    <div id="combo_outer" class="blog_combo_outer"></div> 

                    <span class="img_upload_outer">
                        <div class="upload_img_div">
                            <a onclick="uploadIngressImage();" name="ingressImgupload" class="cursor">
                                <img class="float_left" src="/images/upload.png" width="50" height="50" alt="Upload" border="0" />
                            </a>
                        </div>

                        <div class="upload_img_text blog_input_subtitle"><a onclick="uploadIngressImage();" name="ingressImgupload" class="cursor">Ladda upp ingressbild</a></div>
                        <div id="upload_msg" class="upload_img_report"></div>                    
                    </span>

                    <span class="row"> 
                        <span class="label_text blog_input_subtitle">Ingress:</span>
                        <span class="input_box"></span>
                    </span> 

                    <span class="row"> 
                        <span class="padding_left_28px"><?php echo $form['image_text']->renderError() ?><?php echo $form['image_text']->render(array('cols' => '58', 'rows' => '4', 'class'=>'contactus-inputs', 'style'=>'width:492px;')) ?></span>
                    </span>


                </span>

                <span class="column">
                    <span class="img_upload_outer">
                        <div class="upload_img_div">
                            <a onclick="upload('analysis');" name="analysis_image" class="cursor">
                                <img class="float_left" src="/images/upload.png" width="50" height="50" alt="Upload" border="0" />
                            </a>
                        </div>
                        <div class="upload_img_text blog_input_subtitle" style="width:168px;"><a onclick="upload('analysis');" name="analysis_image" class="cursor">Ladda upp bild f&ouml;r detaljer</a></div>
                        <div id="detail_img_upload_msg" class="upload_img_report"></div>                    
                    </span>
                </span>

                <span class="column">
                    <span class="row"> 
                        <span class="label_text blog_input_subtitle">Detaljer:</span>
                        <span class="input_box"><span class="error_box" id="article_desc_error"></span></span>
                    </span>
                </span>

                <span class="row"> 
                    <span class="detail_section" style="padding-left: 28px;"><?php echo $form['analysis_description']->renderError() ?><?php echo $form['analysis_description']->render(array('style' => 'margin:0;padding:0;border:0;widht:0;height:0;')) ?></span>
                </span>

                <span class="combine_article_div" style="display:none">
                    <input type="checkbox" name="is_combined" value="Butter" onclick="showTextDiv()">
                    Gemensam artikel?</span>
                <span class="combined_author_names_error" id="combined_author_names_error"></span>
                <span id="author_name_div" class="author_name_div">
                    <span class="combine_author_note"><?php echo __('You can add Max 5 users in the list') ?></span>
                    <span class="combine_author_input_container">
                        <span class="combine_author_input">
                            <input class="float_left" id="name_list" />
                            <input id="add_to_author_list" style="margin-left:10px;" type="button" name="Add" value="ADD" class="registerbuttontext" />
                        </span>
                        <span id="author_limit_error"></span>
                    </span>
                    <span id="list_div" class="list_div"></span>
                </span>

                <span class="column article_status">
                    <span class="row"> 
                        <span class="label_text blog_input_subtitle">Artikelstatus:</span>
                        <span class="input_box selectBox">
                            <select name="analysis_status" id="analysis_status" style='width:285px;padding-left:1px;' class = 'border-radius-5px form_input width_277 contactus-inputs'>
                                <option value="6">Intern</option>
                                <option value="7">Profil</option>
                                <option value="1">Publik</option>
                            </select>
                        </span>
                    </span> 
                </span>

                <ul>
                    <li class='padding_left_24px'><a class="cursor send_article" onclick="check_type()"><!--<img src="/images/save.png" width="32" height="32" alt="Save" /><span>Spara</span></a>--></li>
                    <?php /* ?><li><a href="#"><img src="/images/preview.png" alt="Preview" /><span>Frhandsgranska</span></a></li><?php */ ?>
                </ul>
            </div>

        </div>
    </form>
</div>

<!-- Used for conformation before sending a publishing a article. -->
<div id="request_for_publish_analysis_box_1" title="Confirmation Message" class="hide_div">
    <table width="100%"  border="0" cellspacing="3" cellpadding="0">
        <tr>
            <td>Message:</td>
        </tr>
        <tr>
            <td><span id="publish_analysis_box_1_message" style="color:#000000; display:none;"></span></td>
        </tr>
    </table>
</div>

<!-- Used for conformation before sending a publishing a article. -->
<div id="request_for_publish_analysis_box_2" title="Confirmation Message" class="hide_div">
    <table width="100%"  border="0" cellspacing="3" cellpadding="0">
        <tr>
            <td>Message:</td>
        </tr>
        <tr>
            <td><span id="publish_analysis_box_2_message" style="color:#000000; display:none;"></span></td>
        </tr>
    </table>
</div>

<!-- Used for conformation before sending a publishing a article. -->
<div id="confirmation_before_publish_box" title="Confirmation Message" class="hide_div">
    <table width="100%"  border="0" cellspacing="3" cellpadding="0">
        <tr>
            <td>Message:</td>
        </tr>
        <tr>
            <td><span id="confirmation_before_publish_box_message" style="color:#000000; display:none;"></span></td>
        </tr>
    </table>
</div>