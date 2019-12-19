<style>.art_price{display: none;} .art_price .error_list{ float: right; position: relative; right:250px;}
    .btshop_id_tr .error_list{ float: right; position: relative; right:250px;}
</style>
<script language="javascript">
     tinyMCE.init({
        selector: '#article_text',  // change this value according to your HTML
        resize: 'both',
        height: 358,
        width: 500,
        plugins: [
        "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
    ],
    toolbar1: "bold italic underline | alignleft aligncenter alignright alignjustify | outdent indent | link unlink image | emoticons", 
    browser_spellcheck: true,        
    });
function insert(id, what)
{ 
	if(id=='ingress_bild')
	{
		document.getElementById(id).value = what;
		var str = '<img id="article_short_img" class="float_right" src="https://'+window.location.hostname+'/uploads/articleIngressImages/'+what.replace(".","_semimid.")+'"/>';
		document.getElementById('preview_art_img').innerHTML = str;
	}
	else
	{
		var detail_text = tinyMCE.activeEditor.getContent();
		tinyMCE.activeEditor.setContent(detail_text+what);
	}
}

function showUploadMessage(msg_div_id,message,field_id,field_val)
{
	document.getElementById(field_id).value = field_val;
	document.getElementById(msg_div_id).innerHTML = message;
	
	var str = '<img id="article_short_img" class="float_right" src="https://'+window.location.hostname+'/uploads/articleIngressImages/'+field_val.replace(".","_semimid.")+'"/>';
	document.getElementById('preview_art_img').innerHTML = str;
}

$(document).ready(function(){
    $('#article_art_statid').live('change', function(){
       if($(this).val() == 5){
           $('.art_price').show();
       }else{
           $('.art_price').hide();
       }
    });
   
    if($('#article_art_statid').length && $('#article_art_statid').val()!='') {
        if($('#article_art_statid').val() == 5){
            $('.art_price').show();
        }
    }
});
</script>
<div class="maincontentpage">
  <div class="forumlistingleftdiv">
    <div class="forumlistingleftdivinner">
        <?php if($isSaved):?>
        <div class="float_left" style="width:800px"><span class="float_left " style="border:1px solid rgb(0, 204, 51);width:100%"><font color="#00CC33">Artikeln är sparad!</font></span></div>
        <?php endif;?>
      <div class="shoph3 widthall"><?php echo __('Lägg till artikel')?></div>
      <div class="float_left listing">
        <div class="create_article_form_container">
		   <?php $url_part = $tmplt_id ? '/template_id/'.$tmplt_id : '/action_mode/edit_article/article_id/'.$article_id; ?>
          <form name="entryform" action="<?php echo url_for('borst/createArticle').(!$form->getObject()->isNew() ? $url_part : '') ?>" method="POST" enctype="multipart/form-data" onsubmit="return check_template_name()">
			<input type="hidden" name="form_mode" value="insert">
			<input type="hidden" name="edit_id" value="<?php echo $article_id ? $article_id : '' ?>">
			<input type="hidden" name="save_temp" id="save_temp">
			<input type="hidden" name="saveOnly" id="saveOnly">
			<input type="hidden" name="temp_switch" id="temp_switch" value="<?php echo $tmplt_id ? $tmplt_id : '' ?>">
			<?php echo $form->renderHiddenFields()?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="create_article_form">
              <tr>
                <td>&nbsp;&nbsp;Template-Name</td>
                <td><select name="filenames" id="filenames" onchange="change_template()">
                    <option value="0"></option>
                    <?php foreach($all_templates as $template): ?>
                    <option value="<?php echo $template->template_id; ?>" <?php if($template->template_id==$tmplt_id) echo 'selected="selected"'?>><?php echo $template->template_name ?></option>
                    <?php endforeach; ?>
                  </select>
				  <input type="hidden" name="template_name" id="template_name" value="<?php echo $template_name_list ?>">
				  <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/deleteTemplate/template_id/'.$tmplt_id ?>">&nbsp;&nbsp;Delete Template</a></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;&nbsp;Artikelstatus</td>
                <td><?php
				echo $form['art_statid']->renderError();
				echo $form['art_statid']->render(array('class'=>'selectmenu width_100'));
				?>
                        <span class="art_price"> &nbsp;&nbsp;Price
                                <?php
                                    echo $form['price']->renderError();
                                    echo $form['price']->render(array('class'=>'selectmenu width_100'));
				?>
                        </span>
                    </td>
                <td>&nbsp;</td>
              </tr>
			  <tr>
                <td>&nbsp;&nbsp;Kategori</td>
                <td><?php
				echo $form['category_id']->renderError();
				echo $form['category_id']->render(array('class'=>'selectmenu width_100'));
				?></td>
                <td>&nbsp;</td>
              </tr>
			  <tr>
                <td>&nbsp;&nbsp;Typ</td>
                <td><?php
				echo $form['type_id']->renderError();
				echo $form['type_id']->render(array('class'=>'selectmenu width_100'));
				?></td>
                <td>&nbsp;</td>
              </tr>
			  <tr>
                <td>&nbsp;&nbsp;Objekt</td>
                <td><?php
				echo $form['object_id']->renderError();
				echo $form['object_id']->render(array('class'=>'selectmenu width_100'));
				?></td>
                <td>&nbsp;</td>
              </tr>
              <!--<tr class="btshop_id_tr">;
                <td>&nbsp;&nbsp;Plus BtShop Article</td>
                <td><?php
				//echo $form['btshop_id']->renderError();
				//echo $form['btshop_id']->render(array('class'=>'selectmenu width_100'));
				?>                    
                </td>
                <td>&nbsp;</td>
              </tr>-->
			  <tr>
                <td>&nbsp;&nbsp;Nytt Objekt</td>
                <td><input id="object_name" class="float_left" type="text" name="objekt" value="" size="15" width="100" />
					<div class="float_left" style="padding:5px; border:0px solid green;">land</div>
					<input id="object_country" class="float_left" type="text" name="land" value="" size="3" maxlength="3" /><!--&nbsp;logga-->
					<div id="art_obj_error" class="float_left redcolor" style="padding-left:5px;"></div>
					<!--<input id="object_logo" type="text" name="logga" value="" size="15" />--></td>
                <td>&nbsp;</td>
              </tr>
			  <tr>
                <td>&nbsp;&nbsp;Datum</td>
                <td><?php
				echo $form['article_date']->renderError();
				echo $form['article_date']->render(array('size'=>'16'));
				?></td>
                <td>&nbsp;</td>
              </tr>
			  <tr>
                <td>&nbsp;&nbsp;Rubrik</td>
                <td><?php
				echo $form['title']->renderError();
				echo $form['title']->render(array('id'=>'rubrik','size' => 60));
				?></td>
                <td>&nbsp;</td>
              </tr>
			  <tr>
                <td>&nbsp;&nbsp;Ingress-bild</td>
                <td><?php
				echo $form['image']->renderError();
				echo $form['image']->render(array('id'=>'ingress_bild', 'onblur'=>'take_new_image()', 'style'=>'width:165px;float:left;position:relative;'));
				?>
				<a name="imgupload" class="float_left" style="cursor:pointer; font-family:Verdana,Arial,Helvetica,sans-serif; font-size:11px; margin-left:10px;" onclick="upload_img_for_bt('ingress');">Upload Image</a>
				<div id="bt_art_ingress_upload_msg" class="float_left" style="margin-left:10px; color:#FF0000;"></div>
				<div class="float_right" id="preview_art_img"><?php if($form['image']->getValue()): ?><img id="article_short_img" class="float_right" src="<?php echo 'https://'.$host_str.'/uploads/articleIngressImages/'.str_replace('.','_semimid.',$form['image']->getValue()); ?>"/><?php endif; ?></div></td>
                <td>&nbsp;</td>
              </tr>
			  <tr>
                <td valign="top">&nbsp;&nbsp;Ingress</td>
                <td><?php
				echo $form['image_text']->renderError();
				echo $form['image_text']->render(array('cols'=>'75'));
				?></td>
                <td>&nbsp;</td>
              </tr>
			  <tr>
                <td valign="top">&nbsp;&nbsp;Text</td>
                <td>
				<div class="detail_img_container">
					<a name="bt_detail" style="cursor:pointer; font-family:Verdana,Arial,Helvetica,sans-serif; font-size:11px;" onclick="upload_img_for_bt('bt_detail');">Upload Image in Detail</a>
				</div>
				<?php
				echo $form['text']->renderError();
				echo $form['text']->render(array('class'=>'float_left;','style'=>'border:0px;width: 500px; height: 358px;overflow:hidden;background:url("/images/tinyMCE_back.png") repeat scroll 0 0 transparent'));
				?>
				</td>
                <td>&nbsp;</td>
              </tr>
			  <tr>
                <td>&nbsp;&nbsp;Html</td>
                <td><input type="text" name="external_file" id="external_file" size="60" value="<?php echo $sf_params->get('external_file') ? $sf_params->get('external_file') : ($html_rec ? $html_rec->html_file_path : '') ?>"></td>
                <td>&nbsp;</td>
              </tr>
			  <tr>
                <td>&nbsp;&nbsp;F&ouml;rfattare</td>
                <td><?php
				echo $form['author_id']->renderError();
				echo $form['author_id']->render(array('id'=>'forfattare','class'=>'selectmenu','style'=>'width:150px'));
				?>
				<input type="text" name="author_name" id="author_name" size="20" value="<?php echo $sf_params->get('author_name') ? $sf_params->get('author_name') : '' ?>"></td>
                <td>&nbsp;</td>
              </tr>
			  <?php if(!$tmplt_id): ?>
			  <tr>
                <td>&nbsp;&nbsp;Mallnamn</td>
                <td><input type="text" name="tplt_name" id="tplt_name" size="30" value="<?php echo $sf_params->get('tplt_name') ? $sf_params->get('tplt_name') : '' ?>">
				<input type="checkbox" name="tplt_chk" id="tplt_chk" value="tplt_chk"><span style="font-size:11px;">Spara mall</span></td>
                <td>&nbsp;</td>
              </tr>
			  <?php else:?>
			  <tr>
                <td>&nbsp;&nbsp;<?php echo __('Lägg till som artikel')?></td>
                <td><input type="checkbox" name="add_as_article" id="add_as_article" value="add_as_article" checked="checked"></td>
                <td>&nbsp;</td>
              </tr>
			  <?php endif; ?>
			  <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Spara" name="submit_form" />
				<?php if($article_id): ?>
				<input type="submit" value="Verkstall" name="save_form" onclick="setSaveFlag()"/>
			 	<?php endif; ?>
				</td>
                <td>&nbsp;</td>
              </tr>
			  <?php if($article_id > 0): ?>
			  <tr>
                <td>&nbsp;</td>
                <td><b><a href="<?php echo 'https://'.$host_str.'/borst/borstArticleDetails/article_id/'.$article_id ?>"><?php echo __('GÅ TILL ARTIKEL (spara först!)')?></a></b></td>
                <td>&nbsp;</td>
              </tr>
			  <?php endif; ?>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Please fill the article title -->
<div id="article_title_confirm_box" title="Article Title Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="article_title_msg">Message:</td>
	</tr>
 </table>
</div>