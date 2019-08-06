<script type="text/javascript" language="javascript">
    $(window).load(function () {

        var hArray = new Array();
        hArray[0] = $(".btshopleftdiv").height();
        hArray[1] = $(".rightbanner").height();

        if (hArray[0] > hArray[1])
            var maxHeight = hArray[0];
        else
            var maxHeight = hArray[1];


        $(".forumlistingleftdiv").css({"height": maxHeight + "px"});
        $(".rightbanner").css({"height": maxHeight + "px"});        
    });
    $('.selectBox').jqTransform();
</script>
<div class="blank_26h widthall">&nbsp;</div>
<div class="width_120 float_left comment_content_img_wrapper mrg_top_15">&nbsp;</div>
<div class="float_left width_600 widthall margin_lft_110">
    <form name="create_forumtopic_form" id="create_forumtopic_form" method="post" action="<?php echo url_for(!$forumForm->getObject()->isNew() ? 'forum/createForumTopic' . '?id=' . $forumForm->getObject()->getId() : 'forum/createForumTopic') ?>" onsubmit="return validateForumTopic();">
        <?php echo $forumForm->renderHiddenFields() ?>
        <div class="float_left widthall">
            <div class="forum_post_head"><?php echo __('Skapa nytt ämne') ?></div>
            <div class="blank_10h widthall">&nbsp;</div>
            <div id="btforum_category_div">
                <div class="float_left selectBox"><?php echo $forumForm['btforum_category_id']->render(array('class' => 'forum_category_selectbox width158 height25', 'onChange' => 'getSubCategory()')) ?></div>
                <div class="float_left">&nbsp; <?php //echo __('Kategori')  ?></div>
                <div id="btforum_category_error"></div>
            </div>

            <div id="btforum_subcategory_div">
                <div class="float_left"><?php echo $forumForm['btforum_subcategory_id']->render(array('class' => 'forum_subcategory_selectbox width158 height25')) ?><?php echo $forumForm['btforum_subcategory_id']->renderError() ?></div>
                <div class="float_left">&nbsp; <?php //echo __('Kategori')  ?></div>
            </div>
            <div class="blank_1h widthall">&nbsp;</div>
            <div class="blank_12h widthall">&nbsp;</div>
            <div><span class="forum_input_title float_left"><?php echo __('Rubrik') . ": "; ?></span><span class=""><?php echo $forumForm['rubrik']->render(array('class' => 'forum_topic_textfield width440 height20 blog_invisible_input forum_new_topic form_input')) ?></span><div id="btforum_subject_error"></div></div>
            <div class="blank_10h widthall float_left">&nbsp;</div>
            <div class="blank_8h">&nbsp;</div>
            <div class="float_left widthall">
                <div class="float_left forum_input_title"><?php echo __('Nytt inlägg') ?></div>
                <div id="btforum_desc_error"></div>
            </div>

            <div class="upload_forum_img_outer">
                <div class="float_left"><a onclick="upload('forum');" class="cursor" name="forum_image"><?php echo __('Ladda upp bild') ?></a></div>
                <div id="forum_detail_img_upload_msg"></div>
            </div>
        </div>
        <div class="testimonial forum_btn_set">
            <div id="textarea_div">
                <?php echo $forumForm['textarea']->render(array('class' => 'forum_input_bread', 'style' => 'z-index: 9999;border:0px;width: 425px; height: 258px;overflow:hidden;background:url("/images/tinyMCE_back.png") repeat scroll 0 0 transparent'));?>
            </div>			
            <input type="submit" name="post_data" class="comment_forum_save submit save_forum_topic_btn" value="" />

            <input type="button" name="preview_data" id="preview_data" class="forum_show submit preview_forum_topic_btn" value="" onclick="show_forum_preview()"/></div>
    </form>
</div>
<script type="text/javascript">
    /*tinyMCE.init({
        selector: 'textarea',  // change this value according to your HTML
        width : 425
    });*/
    tinyMCE.init({
        selector: 'textarea',  // change this value according to your HTML
        height: 258,
        width: 425,
        plugins: [
        "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
    ],
    toolbar1: "bold italic underline | alignleft aligncenter alignright alignjustify | outdent indent | link unlink image | emoticons", 
    browser_spellcheck: true,
    resize: "both",
    });
    if ($('#btforum_btforum_category_id').val())
    {
        $.get("/forum/getSbtSubCategory?cat_id=" + $('#btforum_btforum_category_id').val(), function (data1) {
            $('#btforum_subcategory_div').css({'display': 'block', 'visibility': 'visible'});
            $('#btforum_category_error').html('');
            $('#btforum_subcategory_div').html(data1);

            $('#btforum_btforum_subcategory_id').val(<?php echo $forumForm->getObject()->getBtforumSubcategoryId(); ?>);
        });
    }
</script>
