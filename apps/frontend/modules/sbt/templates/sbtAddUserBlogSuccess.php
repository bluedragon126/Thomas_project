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
<div class="article_wrapper width_600px">
<form name="create_blog_form" id="create_blog_form" method="post" action="<?php echo url_for('sbt/sbtAddUserBlog') ?>">
  <input type="hidden" name="form_type" id="form_type">
  <input type="hidden" name="blog_desc_hid" id="blog_desc_hid" />
  <?php echo $userBlogForm->renderHiddenFields()?>
  <div class="addArticle width_600px">
      <div class="article_top blog_table_head"><span class="add_blog_head"> Bloggpostens inneh&aring;ll</span></div>
    <div class="article_top_right"></div>
    <div class="article_content mrg_top_25">
        
        <span class="row" style='padding-bottom: 15px;'>
        	<span class="label_text_blogtitle blog_input_title"><?php echo __('Bloggrubrik') ?>:</span>
            <span class="input_box invisible_input"><?php echo $userBlogForm['ublog_title']->render(array('style'=>'width:277px; border-width: 0', 'placeholder'=> 'Skriv rubriken här ...','class'=>'blog_art_heading')) ?></span>
            <span class="error_box" id="blog_title_error"></span>
        </span> 
        
        <span class="column">
            <span class="row"> 
            	<span class="label_text blog_input_subtitle"><?php echo __('Kategori') ?>:</span>
                <span class="float_left selectBox"><?php echo $userBlogForm['ublog_category_id']->renderError() ?><?php echo $userBlogForm['ublog_category_id']->render(array('style'=>'width:285px;padding-left:1px;', 'class' => 'border-radius-5px form_input width_277 contactus-inputs')) ?></span>
            </span> 
            
            <span class="row"> 
            	<span class="label_text blog_input_subtitle">Typ:</span>
                <span class="input_box selectBox"><?php echo $userBlogForm['ublog_type_id']->renderError() ?><?php echo $userBlogForm['ublog_type_id']->render(array('style'=>'width:285px;padding-left:1px;', 'class' => 'border-radius-5px form_input width_277 contactus-inputs')) ?></span>
                <span class="error_box" id="blog_type_error"></span>
            </span>
            
            <div id="blog_combo_outer" class="blog_combo_outer"></div> 
            
            <span class="img_upload_outer">
                <div class="upload_img_div">
                    <a onclick="upload('blog');" name="blog_image" class="cursor"><img class="float_left" src="/images/upload.png" width="50" height="50" alt="Upload" border="0" /></a>
                </div>
                
                <div class="upload_img_text blog_input_subtitle"><a onclick="upload('blog');" name="blog_image" class="cursor">Ladda upp bild</a></div>
				<div id="detail_img_upload_msg" class="upload_img_report"></div>                    
        	</span>
            
            <span class="row"> 
            	<span class="label_text blog_input_subtitle">Detaljinneh&aring;ll:</span>
                <span class="input_box"><span class="error_box" id="blog_desc_error"></span></span>
            </span>
            
        </span>
        
        <span class="row"> 
            <span class="detail_section" style="padding-left: 28px;"><?php echo $userBlogForm['ublog_description']->renderError() ?><?php echo $userBlogForm['ublog_description']->render(array('style'=>'margin:0;padding:0;border:0;widht:0;height:0;')) ?></span>
        </span>
            
         
    
       <ul>
        <li class='padding_left_24px'><a class="cursor send_blog" onclick="check_type()" style="padding-left: 28px;">&nbsp;</a></li>
        <?php /*?><li><a class="cursor" onclick="preview_analysis()"><img src="/images/preview.png" alt="Preview" /><span>Preview</span></a></li><?php */?>
      </ul>
    </div>
       
  </div>
</form>
</div>
