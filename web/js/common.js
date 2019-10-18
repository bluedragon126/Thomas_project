var month_arr = day_arr = new Array();
month_arr['January'] = 1;
month_arr['February'] = 2;
month_arr['March'] = 3;
month_arr['April'] = 4;
month_arr['May'] = 5;
month_arr['June'] = 6;
month_arr['July'] = 7;
month_arr['August'] = 8;
month_arr['September'] = 9;
month_arr['October'] = 10;
month_arr['November'] = 11;
month_arr['December'] = 12;

$(window).load(function() { //Workdaround for document read function
    var jQbrowser = navigator.userAgent.toLowerCase();
    jQuery.os = {
        mac: /mac/.test(jQbrowser),
        win: /win/.test(jQbrowser),
        linux: /linux/.test(jQbrowser)
    };
    $('#captcha1').simpleCaptcha();
    if (jQuery.os.mac) {
        $(".colorband").css({
            "padding-top": "2px"
        });
        $(".line14").css({
            "line-height": "11px"
        });


        $(".chaticon").css({
            "margin-top": "1px"
        });


    }
    //hack for Safari
    if ($.browser.safari) {
        $(".loginmenu").css({
            "padding-top": "3px"
        });
        $(".ieadj").css({
            "margin-top": "-2px"
        });
    }

    if (jQuery.os.mac) {
        if (jQuery.browser.safari) {
            $(".ieadj").css({
                "margin-top": "0px"
            });
        }
    }

    //Amit changes 31-1-2011	
    /*Code for fixing Height of 3 columns on all pages*/
    var heightArray = new Array();
    heightArray[0] = $(".rightbanner").height();
    heightArray[1] = $(".homemiddiv").height() + $(".innerleftdiv").height();
    heightArray[2] = $(".homeleftdiv").height() + $(".innerleftdiv").height();

    heightArray.sort(); //sorting the array here
    heightArray.reverse(); //array reverse here

    var maxHeightArray = Math.max(heightArray[0], heightArray[1], heightArray[2]);

    //applying the height
    if (maxHeightArray != 0) {
        $(".rightbanner").css({
            "height": maxHeightArray + "px"
        });
        $(".homemiddiv").css({
            "height": (maxHeightArray - $(".innerleftdiv").height()) + "px"
        });
        $(".homeleftdiv").css({
            "height": (maxHeightArray - $(".innerleftdiv").height()) + "px"
        });
    }

    initQty();

});

$(document).ready(function() {
    var breadcrum_modulename_str = $(location).attr('href');
    if (/borst_shop/i.test(breadcrum_modulename_str)) {
        $('.breadcrumb').css({
            'width': 'auto'
        });
        $('.breadcrumb ul li').css({
            'width': 'auto'
        });
    }
    setEmbedObject();
    $('#datepicker').datepicker({
        onChangeMonthYear: function(year, month, inst) {
            show_blog_dates(month, year);
        },
        onSelect: function(dateText, inst) {

            var arr = dateText.split('/');
            var one_date = arr[1];
            var month = $('.ui-datepicker-month').html();
            var year = $('.ui-datepicker-year').html();
            //var user_id = $('#user_all_blog_post').attr("name");
            var user_id = $('#blog_user_id').val();

            $('#blog_detail_div').html('<span class="float_left" style="text-align:center; width:100%; height:20px;"><img src="/images/indicator.gif" /></span>');

            show_blog_dates(month, year);

            $.get("/sbt/getBlogListOnDateData?month=" + month + "&year=" + year + "&last_date=" + one_date + "&user_id=" + user_id, function(data) {
                $("#blog_detail_div").html(data);
            });
        }
    });


    if ($.browser.msie) initQty();

    /* To apply width and height to table in iframe. */
    var theFrame = $('.ads_iframe', parent.document.body);
    var wth = theFrame.height();
    var ht = theFrame.width() + 50;
    //alert(ht+' = '+wth);
    $('.ads_table').attr("width", wth);
    $('.iframe_outer').css({
        'width': wth + 'px'
    });
    $('.iframe_outer').css({
        'height': ht + 'px'
    });

    $('.iframe_inner_trans').attr("width", wth);
    $('.iframe_inner_trans').attr("height", ht);

    $('.ads_iframe').attr("width", wth);
    $('.ads_iframe').attr("height", ht);

    /* To BT Shop read more topic.*/
    $("#bt_shop_plus").toggle(
        function() {
            $("#BT_Shop_more_section").toggle();
            var img_name = $('#bt_shop_plus').attr('src');
            if (img_name == '/images/minusicon.jpg') $('#bt_shop_plus').attr('src', '/images/new_home/addplusicon_shop.png');
            else $('#bt_shop_plus').attr('src', '/images/new_home/minusicon_btshop.png');
        },
        function() {
            $("#BT_Shop_more_section").toggle();
            var img_name = $('#bt_shop_plus').attr('src');
            if (img_name == '/images/new_home/minusicon_btshop.png') {
                $('#bt_shop_plus').attr('src', '/images/new_home/addplusicon_shop.png');
            } else {
                $('#bt_shop_plus').attr('src', '/images/new_home/minusicon_btshop.png');
            }
        }
    );

    $("#bt_shop_readmore").toggle(
        function() {
            $("#BT_Shop_more_section").toggle();
            var img_name = $('#bt_shop_plus').attr('src');
            if (img_name == '/images/minusicon.jpg') $('#bt_shop_plus').attr('src', '/images/new_home/addplusicon_shop.png');
            else $('#bt_shop_plus').attr('src', '/images/new_home/minusicon_btshop.png');
        },
        function() {
            $("#BT_Shop_more_section").toggle();
            var img_name = $('#bt_shop_plus').attr('src');
            if (img_name == '/images/new_home/minusicon_btshop.png') {
                $('#bt_shop_plus').attr('src', '/images/new_home/addplusicon_shop.png');
            } else {
                $('#bt_shop_plus').attr('src', '/images/new_home/minusicon_btshop.png');
            }
        }
    );

    /* To Show-Hide Registration read more */

    $("#reg_read_more").toggle(
        function() {
            $("#registration_help_section").toggle();
            var img_name = $('#reg_help_plus').attr('src');
            console.log(img_name);
            if (img_name == '/images/minusicon_btshop.png') $('#reg_help_plus').attr('src', '/images/new_home/addplusicon_shop.png');
            else $('#reg_help_plus').attr('src', '/images/new_home/minusicon_btshop.png');
        },
        function() {
            $("#registration_help_section").toggle();
            var img_name = $('#reg_help_plus').attr('src');
            console.log(img_name);
            if (img_name == '/images/addplusicon_shop.png') $('#reg_help_plus').attr('src', '/images/new_home/minusicon_btshop.png');
            else $('#reg_help_plus').attr('src', '/images/new_home/addplusicon_shop.png');
        }
    );

    $("#reg_help_plus").toggle(
        function() {
            
            $("#registration_help_section").toggle();
            var img_name = $('#reg_help_plus').attr('src');
            if (img_name == '/images/minusicon_btshop.png') $('#reg_help_plus').attr('src', '/images/new_home/addplusicon_shop.png');
            else $('#reg_help_plus').attr('src', '/images/new_home/minusicon_btshop.png');
        },
        function() {
            $("#registration_help_section").toggle();
            var img_name = $('#reg_help_plus').attr('src');
            if (img_name == '/images/addplusicon_shop.png') $('#reg_help_plus').attr('src', '/images/new_home/minusicon_btshop.png');
            else $('#reg_help_plus').attr('src', '/images/new_home/addplusicon_shop.png');
        }
    );

    /* To Show-Hide Registration Blog Rights Section.*/
    $("#blog_rights_plus").toggle(
        function() {
            $(".blog_rights").toggle();
            $(this).attr('src', '/images/minusicon.jpg');
            $('#blog_info_div').val('show');
        },
        function() {
            $(".blog_rights").toggle();
            $(this).attr('src', '/images/addplusicon.jpg');
            $('#blog_info_div').val('hide');
        }
    );

    /* To Maintain Show-Hide Registration Blog Rights Section.*/
    var blog_info_status = $('#blog_info_div').val();
    if (blog_info_status == 'show') {
        $('#blog_rights_plus').trigger('click');
    }

    /* To disable - enable username textfield. */
    $('#use_email_as_username').unbind('click');
    $('#use_email_as_username').click(function() {
        if ($("#use_email_as_username").is(':checked'))
            $("input[name='sf_guard_user[username]']").attr('disabled', 'disabled');
        else
            $("input[name='sf_guard_user[username]']").removeAttr("disabled");
    });


    /* To Show-Hide Advance Search Section.*/
    $("#adv_ser_section").toggle(function() {
            //$(".blog_rights").toggle();
            addSearchComboData();
            $("#adv_search_combo_set").toggle();
            $(this).attr('src', '/images/minusicon.jpg');
        },
        function() {
            //$(".blog_rights").toggle();
            $("#adv_search_combo_set").toggle();
            $(this).attr('src', '/images/addplusicon.jpg');
            removeSearchComboData()
        }
    );

    function addSearchComboData() {
        $.get("/borst/getTypeCategory", function(data) {
            $("#adv_search_cat_type_combo").html(data);
            $("#adv_search_type").bind('change', '', showSearchCombos);
            update_adv_search_combo()
        });
    };

    function removeSearchComboData() {
        $('#adv_search_combo_set').html('');
        $("#adv_search_cat_type_combo").html('')
    };

    switch_create_div();
    //update_blogtyperow_combo();
    //update_typerow_combo();

    /* For Captcha */
    $("#recaptcha_widget_div").css({
        'float': 'left'
    });

    /* Initailise after every Analysis update. */
    initCombos('analysis');

    /* Initailise after every Blog update. */
    initCombos('blog');

    /* Highlight latest article Title of logged In user on articlle list page for a perticular time.*/
    var art_id = $('#art_id').val();
    if (art_id != '') {
        setTitleColor(1, art_id);
    }

    // This is used on Dialog box close button, to erase the previous errors and text entered by user		
    $('.ui-dialog-titlebar-close').click(function() {
        $('#message_error').css({
            'display': 'none',
            'visibility': 'hidden'
        });
        $('#sbt_messages_message_detail').val('');
    });

    /*!
     *
     * Used on user makes a friend request.
     *
     */
    $('#friend_request').unbind('click');
    $('#friend_request').live("click", function() {
        var current_user = $('#current_user').val();

        if (current_user == '') {
            window.location = 'http://' + window.location.hostname + '/user/loginWindow';
        } else {
            showFriendRequest();
            return false;
        }
    });

    // Datepicker
    $('#datepicker').datepicker({
        inline: true
    });

    $("#start_date_text").datepicker({
        showOn: 'button',
        buttonImage: '/images/calender.jpg',
        buttonImageOnly: true,
        altField: '#start_date_text',
        altFormat: 'yy-mm-dd'
    });

    $("#end_date_text").datepicker({
        showOn: 'button',
        buttonImage: '/images/calender.jpg',
        buttonImageOnly: true,
        altField: '#end_date_text',
        altFormat: 'yy-mm-dd'
    });

    if ($('.ui-datepicker-year').html()) {
        if ($('.ui-datepicker-year').html() > 0) {
            var month = $('.ui-datepicker-month').html();
            var year = $('.ui-datepicker-year').html();

            show_blog_dates(month, year);
        }
    }

    // Append datepicker's next, previous button.
    //append_next_prev_button();

    initAdvSearchCombos();

    pathArray = window.location.pathname.split('/');
    for (var i = 0; i < pathArray.length; i++) {
        if ('borstAdvanceSearch' == pathArray[i]) {
            //update_adv_search_combo();
            //break;
        }

        if ('editAnalysis' == pathArray[i]) {
            set_combine_author();
            break;
        }

        if ('sbtUserProfile' == pathArray[i]) {
            var user_id = $('#current_user').val();
            $.get("/sbt/getBlogCntOfUser?user_id=" + user_id, function(data) {
                if (data == '0') {
                    $('#profile_top_menu #sbtMinProfileBlogPost').removeAttr("href");
                    $('#profile_top_menu #sbtMinProfileBlogPost').addClass("for_profile_menu");
                }
            });
        }
        if ('sbtMinProfile' == pathArray[i]) {
            var user_id = $('#current_user').val();
            $.get("/sbt/getBlogCntOfUser?user_id=" + user_id, function(data) {
                if (data == '0') {
                    $('#profile_top_menu #sbtMinProfileBlogPost').removeAttr("href");
                    $('#profile_top_menu #sbtMinProfileBlogPost').addClass("for_profile_menu");

                    $('#profile_top_menu_other_user #sbtMinProfileBlogPost').removeAttr("href");
                    $('#profile_top_menu_other_user #sbtMinProfileBlogPost').addClass("for_profile_menu");
                }
            });
        }

        if ('sbt' == pathArray[i]) $('.footerwrapper img').attr('src', '/images/violetbottomarow.png');
        if ('borst' == pathArray[i]) {
            $('.footerwrapper img').attr('src', '/images/bluebottomarow.png');
            $('.footerwrapper img').attr('height', '23');
            $('.footerwrapper img').attr('width', '23');
        };
        if ('borst_shop' == pathArray[i]) {
            $('.footerwrapper img').attr('src', '/images/mustardbottomarow.png');
            $('.footerwrapper img').attr('height', '23');
            $('.footerwrapper img').attr('width', '23');
        }
        if ('borst_charts' == pathArray[i]) $('.footerwrapper img').attr('src', '/images/darkbottomarow.png');
        if ('forum' == pathArray[i]) {
            $('.footerwrapper img').attr('src', '/images/orangebottomarow.png');
            $('.footerwrapper img').attr('height', '23');
            $('.footerwrapper img').attr('width', '23');
        }

        if ('' == pathArray[i]) {
            $('.footerwrapper img').attr('src', '/images/bluebottomarow.png');
            $('.footerwrapper img').attr('height', '23');
            $('.footerwrapper img').attr('width', '23');
        };

    }

    /* Used when logged In user want to edit any forum post.*/
    $('a.edit_forum_anchor').unbind('click');
    $('a.edit_forum_anchor').live("click", function() {
        var editpost_id = $(this).attr("id");
        var is_topic = $(this).attr("name");
        if (is_topic == 'topic') $('#is_forum_topic').val(1);
        else $('#is_forum_topic').val(0);

        $.get("/forum/getForumPostData?editpost_id=" + editpost_id, function(data) {
            tinyMCE.activeEditor.setContent(data);
            var pagination_numbers = $('.forum_comment_list_listing:last').html();
            $('#forum_comment_list_listing, .forum_comment_list_listing').html(pagination_numbers);
            $('#postid').val(editpost_id);
            goToLastPageOnForum();
        });
    })

    /* Used for sorting forum topics according to column */
    $('#forum_topic_listing_column_row a, .forum_topic_listing_column_row span').unbind('click');
    $('#forum_topic_listing_column_row a, .forum_topic_listing_column_row span').live("click", function() {

        var para_str = '';
        var column_id = $(this).attr("id");
        var column_name = $(this).html();
        var cat_id = $('#forum_parent_tab').val();
        var sub_cat_id = $('#forum_sub_cat_id').val();

        $(".forum_sorting_wrapper .forum_drop-down-menus").hide();
        //$('#'+column_id).html(column_name+'<span class="float_left"><img src="../images/indicator.gif" /></span>');
        $(".forum_sorting_wrapper").css("margin-right", 2);
        //$('.forun_sorting_arrow').html('<span class="float_right"><img src="../images/indicator.gif" /></span>');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        para_str = para_str + '&forum_parent_tab=' + cat_id;
        para_str = para_str + '&forum_sub_cat_id=' + sub_cat_id;

        $.post("/forum/getForumContentByOrder?column_id=" + column_id + para_str, function(data) {
            $('#forum_content').html(data);
            $('.indicator').hide();
            $('#pop-box-over').hide();
            var order = $('#sbt_forum_column_order').val();
            //$(".forum_sorting_wrapper").css("margin-right",19);
            //setForumTopicListOrderImage(column_id,order);
        });
    });

    /* Used for forum page pagination. */
    $('#forum_listing a, .forum_listing a').unbind('click');
    $('#forum_listing a, .forum_listing a').live("click", function() {
        //$('.dummy1').hide();
        var column_id = $('#column_id').val();
        var current_column_order = $('#sbt_forum_column_order').val();
        var cat_id = $('#forum_parent_tab').val();
        var sub_cat_id = $('#forum_sub_cat_id').val();
        var page = $(this).attr("id");

        $('#forum_topic_list').find("tr.classnot").each(function(index) {
            $(this).addClass('withOpacity');
        });

        var pagination_numbers = $('#forum_listing , .forum_listing').html();
        //$('#forum_listing,.forum_listing').html('<span class="">'+pagination_numbers+'</span> <span class="" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        $('#forum_listing,.forum_listing').html('<span class="">' + pagination_numbers + '</span>');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $.post("/forum/getForumContentByOrder?column_id=" + column_id + "&page=" + page + "&sbt_forum_column_order=" + current_column_order + "&forum_parent_tab=" + cat_id + '&forum_sub_cat_id=' + sub_cat_id, function(data) {
            $('#forum_content').html(data);
            //setHeightOnForum();
            $('.indicator').hide();
            $('#pop-box-over').hide();
            var order = $('#sbt_forum_column_order').val();
            setForumTopicListOrderImage('sortby_' + column_id, order);
        });
    });

    /* Used for forum similar article pagination. */
    $('.similar_article_listing_pager a').unbind('click');
    $('.similar_article_listing_pager a').live("click", function() {
        var object_id = $('#object_id').val();
        var page = $(this).attr("id");
        var pagination_numbers = $('.similar_article_listing_pager').html();
        //$('.similar_article_listing_pager').html('<span class="">'+pagination_numbers+'</span> <span class="" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        $('.similar_article_listing_pager').html('<span class="">' + pagination_numbers + '</span>');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $.post("/borst/getSimilarArticles?object_id=" + object_id + "&page=" + page, function(data) {
            $('.similar_article_listing').html(data);
            $('.indicator').hide();
            $('#pop-box-over').hide();
        });
    });

    /* Used for fetching data and showing on forum page. */
    $('#forum_tabs a,.forum_tabs a').unbind('click');
    $('#forum_tabs a,.forum_tabs a').live("click", function() {
        $(".forum-menu-active-logo").removeClass("forum-menu-active-logo-activated");
        $(this).addClass('selectedtab');

        var cat_id = $(this).attr("id");
        $('#forum_parent_tab').val(cat_id);
        $('#forum_sub_cat_id').val('');

        var para_str = '';
        para_str = para_str + '?forum_parent_tab=' + cat_id;

        var arr = ['cat_1', 'cat_2', 'cat_3', 'cat_4', 'cat_5', 'cat_6', 'cat_7', 'cat_8', 'cat_9'];

        for (var j = 0; j < arr.length; j++) {
            var class_name = $('#' + arr[j]).attr("class");
            if (cat_id == arr[j]) $('#' + arr[j]).removeClass(class_name).addClass('selectedtab');
            else $('#' + arr[j]).removeClass(class_name);
        }

        $('#forum_content').html('<span class="float_left" style="text-align:center; width:100%;"><img src="/images/indicator.gif" /></span>');

        $.post("/forum/getForumSubCategoryMenu?cat_id=" + cat_id, function(data) {
            $('#forumsubmenu_outer').html(data);

            /*if($('.forumsubmenu').children().length > 0)
                $("#forumsubmenu_outer").show();
            else $("#forumsubmenu_outer").hide();*/
            if ($('#forumsubmenu_outer').find("li").length > 0)
                $("#forumsubmenu_outer").show();
            else $("#forumsubmenu_outer").hide();
        });

        $.post("/forum/getForumContentByOrder" + para_str, function(data1) {
            $('#forum_content').html(data1);
            //setHeightOnForum();
        });



    });

    /* Used for fetching data of a specific category. */
    $('.forum_topic_category_row a').unbind('click');
    $('.forum_topic_category_row a').live("click", function() {

        var cat_id = $(this).attr("id");
        var sub_cat_id = $(this).attr("name");
        $('#forum_parent_tab').val(cat_id);
        $('#forum_sub_cat_id').val('');

        var para_str = '';
        para_str = para_str + '?forum_sub_cat_id=' + sub_cat_id;
        para_str = para_str + '&forum_parent_tab=' + cat_id;

        var arr = ['cat_1', 'cat_2', 'cat_3', 'cat_4', 'cat_5', 'cat_6', 'cat_7', 'cat_8', 'cat_9'];

        for (var j = 0; j < arr.length; j++) {
            var class_name = $('#' + arr[j]).attr("class");
            if (cat_id == arr[j]) $('#' + arr[j]).removeClass(class_name).addClass('selectedtab');
            else $('#' + arr[j]).removeClass(class_name);
        }

        $('#forum_content').html('<span class="float_left" style="text-align:center; width:100%;"><img src="/images/indicator.gif" /></span>');

        $.post("/forum/getForumSubCategoryMenu?cat_id=" + cat_id + '&forum_sub_cat_id=' + sub_cat_id, function(data) {
            $('#forumsubmenu_outer').html(data);
            $("#forumsubmenu_outer").show();
        });

        $.post("/forum/getForumContentByOrder" + para_str, function(data1) {
            $('#forum_content').html(data1);
        });


    });

    /* Used for fetching data and showing on forum page. */
    $('#forumsubmenu_outer a').unbind('click');
    $('#forumsubmenu_outer a').live("click", function() {
        $(".forum-menu-active-logo").removeClass("forum-menu-active-logo-activated");
        var sub_cat_id = $(this).attr("id");
        var cat_id = $('#forum_parent_tab').val();

        var para_str = '';
        para_str = para_str + '?forum_sub_cat_id=' + sub_cat_id;
        para_str = para_str + '&forum_parent_tab=' + cat_id;

        $('#forumsubmenu_outer').find("a").each(function(index) {
            var anchor_id = $(this).attr("id");
            var class_name = $(this).attr("class");
            if (anchor_id == sub_cat_id) {
                $('#' + anchor_id).removeClass(class_name).addClass('select');
                $('#forumsubmenu_outer li').css('display', 'block');
                $('#forumsubmenu_outer li a.select').parent().prev('li').css('display', 'none');
            } else $('#' + anchor_id).removeClass(class_name);
        });

        $('#forum_content').html('<span class="float_left" style="text-align:center; width:100%;"><img src="/images/indicator.gif" /></span>');

        $.post("/forum/getForumContentByOrder" + para_str, function(data1) {
            $('#forum_content').html(data1);
            //setHeightOnForum();
        });

    });

    /* Used for enquiry page pagination. */
    $('#enquiry_listing a, .enquiry_listing a').unbind('click');
    $('#enquiry_listing a, .enquiry_listing a').live("click", function() {
        //$('.dummy1').hide();
        var column_id = $('#column_id').val();
        var current_column_order = $('#sbt_forum_column_order').val();
        var cat_id = $('#forum_parent_tab').val();
        var sub_cat_id = $('#forum_sub_cat_id').val();
        var page = $(this).attr("id");

        $('#enquiry_topic_list').find("tr.classnot").each(function(index) {
            $(this).addClass('withOpacity');
        });

        var pagination_numbers = $('#enquiry_listing , .enquiry_listing').html();
        $('#enquiry_listing,.enquiry_listing').html('<span class="">' + pagination_numbers + '</span>');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $.post("/borst/getEnquiryContentByOrder?column_id=" + column_id + "&page=" + page + "&sbt_forum_column_order=" + current_column_order + "&forum_parent_tab=" + cat_id + '&forum_sub_cat_id=' + sub_cat_id, function(data) {
            $('.enquiry_listing_data_div').hide();
            $('#enquiry_content').html(data);
            //setHeightOnForum();
            $('.indicator').hide();
            $('#pop-box-over').hide();
            var order = $('#sbt_forum_column_order').val();
            setForumTopicListOrderImage('sortby_' + column_id, order);
        });
    });


    /* Used for sorting enquiry topics according to column */
    $('#enquiry_topic_listing_column_row a, .enquiry_topic_listing_column_row span').unbind('click');
    $('#enquiry_topic_listing_column_row a, .enquiry_topic_listing_column_row span').live("click", function() {

        var para_str = '';
        var column_id = $(this).attr("id");
        var column_name = $(this).html();
        var cat_id = $('#forum_parent_tab').val();
        var sub_cat_id = $('#forum_sub_cat_id').val();

        $(".forum_sorting_wrapper .forum_drop-down-menus").hide();
        //$('#'+column_id).html(column_name+'<span class="float_left"><img src="../images/indicator.gif" /></span>');
        $(".forum_sorting_wrapper").css("margin-right", 2);
        //$('.forun_sorting_arrow').html('<span class="float_right"><img src="../images/indicator.gif" /></span>');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        para_str = para_str + '&forum_parent_tab=' + cat_id;
        para_str = para_str + '&forum_sub_cat_id=' + sub_cat_id;

        $.post("/borst/getEnquiryContentByOrder?column_id=" + column_id + para_str, function(data) {
            $('.enquiry_listing_data_div').hide();
            $('#enquiry_content').html(data);
            $('.indicator').hide();
            $('#pop-box-over').hide();
            var order = $('#sbt_forum_column_order').val();
            //$(".forum_sorting_wrapper").css("margin-right",19);
            //setForumTopicListOrderImage(column_id,order);
        });
    });

    /* Used for enquiry fetching data as per the category. */
    $('#enquiry_tabs a, .enquiry_tabs a').unbind('click');
    $('#enquiry_tabs a, .enquiry_tabs a').live("click", function() {
        $(".forum-menu-active-logo").removeClass("forum-menu-active-logo-activated");
        $(this).addClass('selectedtab');

        var cat_id = $(this).attr("id");
        $('#forum_parent_tab').val(cat_id);
        $('#forum_sub_cat_id').val('');

        var para_str = '';
        para_str = para_str + '?forum_parent_tab=' + cat_id;

        var arr = ['cat_1', 'cat_2', 'cat_3', 'cat_4', 'cat_5', 'cat_6', 'cat_7', 'cat_8', 'cat_9', 'cat_10', 'cat_11'];

        for (var j = 0; j < arr.length; j++) {
            var class_name = $('#' + arr[j]).attr("class");
            if (cat_id == arr[j]) $('#' + arr[j]).removeClass(class_name).addClass('selectedtab');
            else $('#' + arr[j]).removeClass(class_name);
        }

        $('#enquiry_content').html('<span class="float_left" style="text-align:center; width:100%;"><img src="/images/indicator.gif" /></span>');

        $.post("/borst/getEnquirySubCategoryMenu?cat_id=" + cat_id, function(data) {
            $('#forumsubmenu_outer').html(data);

            /*if($('.forumsubmenu').children().length > 0)
                $("#forumsubmenu_outer").show();
            else $("#forumsubmenu_outer").hide();*/
            if ($('#forumsubmenu_outer').find("li").length > 0)
                $("#forumsubmenu_outer").show();
            else $("#forumsubmenu_outer").hide();
        });

        $.post("/borst/getEnquiryContentByOrder" + para_str, function(data1) {
            $('.enquiry_listing_data_div').hide();
            $('#enquiry_content').html(data1);
            //setHeightOnForum();
        });
    });


    /* Used for showing search result on different tabs. */
    $('#search_tabs a').unbind('click');
    $('#search_tabs a').live("click", function() {
        var search_tab_id = $(this).attr("id");
        var tab_name = $('#' + search_tab_id).html();
        $('#loader_li').html('<img src="../images/indicator.gif" />');

        setOpacity();

        var normal_search_para = $('#normal_search_para').val();
        var result_per_page = $('#result_per_page').val();

        $.post("/borst/getSearchData?search_tab_id=" + search_tab_id + "&normal_search_para=" + normal_search_para + "&result_per_page=" + result_per_page, function(data) {
            $('#search_content').html(data);
            //removeOpacity();

            $('#sortby_date').html('Publ.<img src="/images/bg.gif" alt="down" width="20"/>');
            $('#sortby_title').html('Rubrik<img src="/images/bg.gif" alt="down" width="20"/>');
            $('#sortby_category').html('Kategori<img src="/images/bg.gif" alt="down" width="20"/>');
            $('#sortby_type').html('Typ<img src="/images/bg.gif" alt="down" width="20"/>');
            $('#sortby_object').html('Objekt<img src="/images/bg.gif" alt="down" width="20"/>');
            $('#sortby_author').html('Författare<img src="/images/bg.gif" alt="down" width="20"/>');

        });
    });

    /* Used for search page pagination. */
    $('#search_listing a').unbind('click');
    $('#search_listing a').live("click", function() {
        var column_id = $('#column_id').val();
        var parent_id = $('#parent_id').val();
        var search_tab = $('#search_tab').val();
        var category_id = $('#category_id').val();
        var type_id = $('#type_id').val();
        var object_id = $('#object_id').val();
        var shop_type = $('#shop_type_id').val();
        var normal_search_para = $('#normal_search_para').val();
        var page = $(this).attr("id");
        var current_column_order = $('#search_current_column_order').val();
        var result_per_page = $('#result_per_page').val();
        setOpacity();

        var pagination_numbers = $('#search_listing').html();
        $('#search_listing').html('' + pagination_numbers + '');

        $.post("/borst/getSearchData?column_id=" + column_id + "&page=" + page + "&search_tab_id=" + search_tab + "&normal_search_para=" + normal_search_para + "&search_current_column_order=" + current_column_order + "&result_per_page=" + result_per_page + '&category_id=' + category_id + '&type_id=' + type_id + '&object_id=' + object_id + '&shop_type=' + shop_type + '&parent_id=' + parent_id, function(data) {
            $('#search_content').html(data);

            //removeOpacity();

            setSearchOrderImageAdvSearch('sortby_' + column_id, current_column_order, parent_id);
        });
    });

    /* Used for Additional criteria in search page. */
    $('.article_cat').unbind('click');
    $('.article_cat').live("click", function() {
        var category_id = $(this).attr('name');
        var column_id = $('#column_id').val();
        var search_tab = $('#search_tab').val();
        var normal_search_para = $('#normal_search_para').val();
        var current_column_order = $('#search_current_column_order').val();
        var result_per_page = $('#result_per_page').val();

        setOpacity();

        var pagination_numbers = $('#search_listing').html();
        $('#search_listing').html('<span class="float_right">' + pagination_numbers + '</span>  <span class="float_right" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');

        $.post("/borst/getSearchData?column_id=" + column_id + "&search_tab_id=" + search_tab + "&normal_search_para=" + normal_search_para + "&search_current_column_order=" + current_column_order + "&result_per_page=" + result_per_page + "&category_id=" + category_id, function(data) {
            $('#search_content').html(data);

            //removeOpacity();

            setSearchOrderImage('sortby_' + column_id, current_column_order);
        });
    });
    /* Used for Additional criteria in search page. */
    $('.article_type').unbind('click');
    $('.article_type').live("click", function() {
        var type_id = $(this).attr('name');
        var column_id = $('#column_id').val();
        var search_tab = $('#search_tab').val();
        var normal_search_para = $('#normal_search_para').val();
        var current_column_order = $('#search_current_column_order').val();
        var result_per_page = $('#result_per_page').val();

        setOpacity();

        var pagination_numbers = $('#search_listing').html();
        $('#search_listing').html('<span class="float_right">' + pagination_numbers + '</span>  <span class="float_right" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');

        $.post("/borst/getSearchData?column_id=" + column_id + "&search_tab_id=" + search_tab + "&normal_search_para=" + normal_search_para + "&search_current_column_order=" + current_column_order + "&result_per_page=" + result_per_page + "&type_id=" + type_id, function(data) {
            $('#search_content').html(data);

            //removeOpacity();

            setSearchOrderImage('sortby_' + column_id, current_column_order);
        });
    });
    /* Used for Additional criteria in search page. */
    $('.article_object').unbind('click');
    $('.article_object').live("click", function() {
        var object_id = $(this).attr('name');
        var column_id = $('#column_id').val();
        var search_tab = $('#search_tab').val();
        var normal_search_para = $('#normal_search_para').val();
        var current_column_order = $('#search_current_column_order').val();
        var result_per_page = $('#result_per_page').val();

        setOpacity();

        var pagination_numbers = $('#search_listing').html();
        $('#search_listing').html('<span class="float_right">' + pagination_numbers + '</span>  <span class="float_right" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');

        $.post("/borst/getSearchData?column_id=" + column_id + "&search_tab_id=" + search_tab + "&normal_search_para=" + normal_search_para + "&search_current_column_order=" + current_column_order + "&result_per_page=" + result_per_page + "&object_id=" + object_id, function(data) {
            $('#search_content').html(data);

            //removeOpacity();

            setSearchOrderImage('sortby_' + column_id, current_column_order);
        });
    });

    /* Used for Additional criteria in search page with shop_type. */
    $('.shop_type').unbind('click');
    $('.shop_type').live("click", function() {
        var shop_type = $(this).attr('name');
        var column_id = $('#column_id').val();
        var search_tab = $('#search_tab').val();
        var normal_search_para = $('#normal_search_para').val();
        var current_column_order = $('#search_current_column_order').val();
        var result_per_page = $('#result_per_page').val();

        setOpacity();

        var pagination_numbers = $('#search_listing').html();
        $('#search_listing').html('<span class="float_right">' + pagination_numbers + '</span>  <span class="float_right" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');

        $.post("/borst/getSearchData?column_id=" + column_id + "&search_tab_id=" + search_tab + "&normal_search_para=" + normal_search_para + "&search_current_column_order=" + current_column_order + "&result_per_page=" + result_per_page + "&shop_type=" + shop_type, function(data) {
            $('#search_content').html(data);

            //removeOpacity();

            setSearchOrderImage('sortby_' + column_id, current_column_order);
        });
    });

    /* Used for Additional criteria in search page with stock_type. */
    $('.stock_type').unbind('click');
    $('.stock_type').live("click", function() {
        var stock_type = $(this).attr('name');
        var column_id = $('#column_id').val();
        var search_tab = $('#search_tab').val();
        var normal_search_para = $('#normal_search_para').val();
        var current_column_order = $('#search_current_column_order').val();
        var result_per_page = $('#result_per_page').val();

        setOpacity();

        var pagination_numbers = $('#search_listing').html();
        $('#search_listing').html('<span class="float_right">' + pagination_numbers + '</span>  <span class="float_right" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');

        $.post("/borst/getSearchData?column_id=" + column_id + "&search_tab_id=" + search_tab + "&normal_search_para=" + normal_search_para + "&search_current_column_order=" + current_column_order + "&result_per_page=" + result_per_page + "&stock_type=" + stock_type, function(data) {
            $('#search_content').html(data);

            //removeOpacity();

            setSearchOrderImage('sortby_' + column_id, current_column_order);
        });
    });

    /* Used for sorting search result according to column */
    $('#column_header a').unbind('click');
    $('#column_header a').live("click", function() {
        var column_id_for_order = $(this).attr("id");
        var parent_id = $(this).attr("name");
        var column_name = $('#' + column_id_for_order).html();

        var column_id_arr = column_id_for_order.split('-')
        if (column_id_arr.length > 1)
            var column_id = column_id_arr[1];
        else
            var column_id = column_id_for_order;

        $(this).html(column_name + '<img src="../images/indicator.gif" />');
        //$('#'+parent_id+' #'+column_id).html(column_name+'<img src="../images/indicator.gif" />');


        var search_tab = $('#search_tab').val();
        var normal_search_para = $('#normal_search_para').val();
        var result_per_page = $('#result_per_page').val();

        if (search_tab == 'all') {
            showHideForAllTab(parent_id);
        } else {
            $('#' + search_tab + '_result').addClass('withOpacity');
        }
        $.post("/borst/getSearchData?column_id=" + column_id + "&search_tab_id=" + search_tab + "&normal_search_para=" + normal_search_para + "&result_per_page=" + result_per_page + '&parent_id=' + parent_id, function(data) {
            $('#search_content').html(data);
            $('#' + parent_id + ' #' + column_id).html(column_name);

            var order = $('#search_current_column_order').val();
            //setSearchOrderImage(column_id,order);
            //setSearchOrderImageAdvSearch(column_id_for_order,order,parent_id);
        });
    });


    /* Used for setting the no. of result per pages on search result page. */
    $('#search_no_of_rec').unbind('change');
    $('#search_no_of_rec').live("change", function() {
        var column_id_for_order = $('#column_id').val();
        var column_id_arr = column_id_for_order.split('-')
        if (column_id_arr.length > 1)
            var column_id = column_id_arr[1];
        else
            var column_id = column_id_for_order;
        var parent_id = $('#parent_id').val();
        var search_tab = $('#search_tab').val();
        var category_id = $('#category_id').val();
        var type_id = $('#type_id').val();
        var object_id = $('#object_id').val();
        var shop_type = $('#shop_type_id').val();
        var normal_search_para = $('#normal_search_para').val();
        var result_per_page = $('#search_no_of_rec').val();
        var order = $('#search_current_column_order').val();

        $.post("/borst/getSearchData?column_id=" + column_id + "&search_tab_id=" + search_tab + "&normal_search_para=" + normal_search_para + "&result_per_page=" + result_per_page + '&category_id=' + category_id + '&type_id=' + type_id + '&object_id=' + object_id + '&shop_type=' + shop_type + '&parent_id=' + parent_id + '&page=1&search_current_column_order=' + order, function(data) {
            $('#search_content').html(data);
            var order = $('#search_current_column_order').val();
            setSearchOrderImageAdvSearch('sortby_' + column_id, order, parent_id);
        });

        autoHeightForListingLeft();
    });


    /* Used for article listing, sorting according to column. */
    $('#article_list_column_row a').unbind('click');
    $('#article_list_column_row a').live("click", function() {
        var column_id = $(this).attr("id");
        var column_name = $('#' + column_id).html();
        $('#' + column_id).html(column_name + '<span class="float_left"><img src="../images/indicator.gif" /></span>');

        var parent_menu = $('#parent_menu').val();
        var submenu_menu = $('#submenu_menu').val();

        $('#article_list_table').find("tr.classnot").each(function(index) {
            $(this).addClass('withOpacity');
        });

        $.post("/borst/getArticleListData?column_id=" + column_id + "&parent_menu=" + parent_menu + "&submenu_menu=" + submenu_menu, function(data) {
            $('#article_list_page').html(data);
            $('#' + column_id).html(column_name);
            var order = $('#articlelist_current_column_order').val();
            setSearchOrderImage(column_id, order);
        });
    });

    /* Used for article listing page pagination. */
    $('#article_list_listing a').unbind('click');
    $('#article_list_listing a').live("click", function() {
        var column_id = $('#column_id').val();
        var parent_menu = $('#parent_menu').val();
        var submenu_menu = $('#submenu_menu').val();

        var page = $(this).attr("id");
        var current_column_order = $('#articlelist_current_column_order').val();

        $('#article_list_table').find("tr.classnot").each(function(index) {
            $(this).addClass('withOpacity');
        });

        var pagination_numbers = $('#article_list_listing').html();
        $('#article_list_listing').html('<span class="float_right">' + pagination_numbers + '</span>  <span class="float_right" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');

        $.post("/borst/getArticleListData?column_id=" + column_id + "&page=" + page + "&parent_menu=" + parent_menu + "&submenu_menu=" + submenu_menu + "&articlelist_current_column_order=" + current_column_order, function(data) {
            $('#article_list_page').html(data);

            setSearchOrderImage('sortby_' + column_id, current_column_order);
        });
    });


    /* Used for blog listing, sorting according to column. */
    $('.blog_topic_listing_column_row li span').unbind('click');
    $('.blog_topic_listing_column_row li span').live("click", function() {
        var column_id = $(this).attr("id");
        var column_name = $('#' + column_id).html();
        var blog_cat_id = $('#blog_cat_id').val();

        //$('.forun_sorting_arrow').html('<span class="float_right"><img src="../images/indicator.gif" /></span>');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $.post("/sbt/getBlogListData?column_id=" + column_id + '&blog_cat_id=' + blog_cat_id, function(data) {
            $('#blog_list_page').html(data);
            $('.pinkbg small_pinkbg width_658').css('height', 'auto');

            $('#' + column_id).html(column_name);
            $('.indicator').hide();
            $('#pop-box-over').hide();
            var order = $('#bloglist_current_column_order').val();
            //setBlogListOrderImage(column_id,order);
        });
    });

    /* Used for blog listing, sorting according to column. */
    /*$('#blog_list_column_row a').unbind('click');
    $('#blog_list_column_row a').live("click",function(){
        var column_id = $(this).attr("id");
        var column_name  = $('#'+column_id).html();
        var blog_cat_id = $('#blog_cat_id').val();
		
        //$("#blog_topic_list").html('<ul><li style="width:100%; text-align:center;"><span class="float_left" style="text-align:center; width:100%;"><img src="/images/indicator.gif" /></span></li></ul>');
        //$("#blog_list_listing").html('');
		
        
        //$("#blog_list_listing").html('<ul><li style="width:100%;text-align:center;"><img src="/images/indicator.gif" /></li></ul>');
        $.post("/sbt/getBlogListData?column_id="+column_id+'&blog_cat_id='+blog_cat_id, function(data){
            //$('#dummy1').hide();
            //$("#blog_list_page .paginationwrapper").remove(); 
            $('#blog_list_page').html(data);
            $('.pinkbg small_pinkbg width_658').css('height','auto');
			
            $('#'+column_id).html(column_name);
            var order = $('#bloglist_current_column_order').val();
            setBlogListOrderImage(column_id,order);
        });
    });*/



    /* Used for blog listing page pagination. */
    $('.blog_list_listing a, #blog_list_listing a').unbind('click');
    $('.blog_list_listing a, #blog_list_listing a').live("click", function() {
        var _this = $(this).parent('.blog_list_listing');
        var column_id = $('#column_id').val();
        var page = $(this).attr("id");
        var current_column_order = $('#bloglist_current_column_order').val();
        var blog_cat_id = $('#blog_cat_id').val();

        /*$('#blog_list_page').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});*/

        var pagination_numbers = $(_this).html();
        //$(_this).html(pagination_numbers+'<span class="" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');
        $(_this).html(pagination_numbers + '');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        //$(".dummy2").html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        $.post("/sbt/getBlogListData?column_id=" + column_id + "&page=" + page + "&bloglist_current_column_order=" + current_column_order + '&blog_cat_id=' + blog_cat_id, function(data) {
            //$('.dummy1').hide();
            $('.pinkbg small_pinkbg width_658').css('height', 'auto');
            $('#blog_list_page').html(data);
            $('.indicator').hide();
            $('#pop-box-over').hide();
            //setBlogListOrderImage('sortby_'+column_id,current_column_order);
        });
    });



    /* Sort blog list on category. */
    $('#blog_topic_list a.blog_cat').unbind('click');
    $('#blog_topic_list a.blog_cat').live("click", function() {
        var blog_cat_id = $(this).attr("name");
        $('#blog_topic_list #blog_cat_id').val(blog_cat_id);
        var column_id = $('#column_id').val();

        /*$('#blog_list_page').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});*/

        $.post("/sbt/getBlogListData?column_id=" + column_id + '&blog_cat_id=' + blog_cat_id, function(data) {
            $('#blog_list_page').html(data);
            var order = $('#bloglist_current_column_order').val();
            //setBlogListOrderImage(column_id,order);
        });

    });

    /* Used for user listing, sorting according to column. */
    $('#user_list_column_row a').unbind('click');
    $('#user_list_column_row a').live("click", function() {
        var column_id = $(this).attr("id");
        var column_name = $('#' + column_id).html();
        $('#' + column_id).html(column_name + '<span class="float_left"><img src="../images/indicator.gif" /></span>');

        $('#user_list_page').find("tr.classnot").each(function(index) {
            $(this).addClass('withOpacity');
        });

        $.post("/sbt/getUserListData?column_id=" + column_id, function(data) {
            $('#user_list_page').html(data);
            $('#' + column_id).html(column_name);
            var order = $('#userlist_current_column_order').val();
            setUserListOrderImage(column_id, order);
        });
    });

    /* Used for user listing page pagination. */
    $('#user_list_listing a').unbind('click');
    $('#user_list_listing a').live("click", function() {
        var column_id = $('#column_id').val();
        var page = $(this).attr("id");
        var current_column_order = $('#userlist_current_column_order').val();

        $('#user_list_page').find("tr.classnot").each(function(index) {
            $(this).addClass('withOpacity');
        });

        var pagination_numbers = $('#user_list_listing').html();
        $('#user_list_listing').html('<span class="float_right">' + pagination_numbers + '</span>  <span class="float_right" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');

        $.post("/sbt/getUserListData?column_id=" + column_id + "&page=" + page + "&userlist_current_column_order=" + current_column_order, function(data) {
            $('#user_list_page').html(data);

            setUserListOrderImage('sortby_' + column_id, current_column_order);
        });
    });

    /* Used for profile article listing, sorting according to column. */
    $('#profile_article_list_column_row a').unbind('click');
    $('#profile_article_list_column_row a').live("click", function() {
        var column_id = $(this).attr("id");
        var parent_id = $(this).attr("name");
        var column_name = $('#' + column_id).html();
        var user_id = $('#current_user').val();
        $('#' + parent_id + ' #' + column_id).html(column_name + '<span class="float_left"><img src="/images/indicator.gif" /></span>');

        $('#profile_article_list_table').find("tr.classnot").each(function(index) {
            $(this).addClass('withOpacity');
        });

        $.post("/sbt/getArticleAnalysisListData?column_id=" + column_id + '&id=' + user_id + '&parent_id=' + parent_id, function(data) {
            $('#profile_data_container').html(data);
            //$('#'+column_id).html(column_name);
            var order = $('#article_analysis_list_current_column_order').val();
            setOrderImageForUserAllArticle(column_id, order, parent_id);
        });
    });

    /* Used for profile analysis listing, sorting according to column. */
    $('#profile_analysis_list_column_row a').unbind('click');
    $('#profile_analysis_list_column_row a').live("click", function() {
        var column_id = $(this).attr("id");
        var parent_id = $(this).attr("name");
        var column_name = $('#' + column_id).html();
        var user_id = $('#current_user').val();
        $('#' + parent_id + ' #' + column_id).html(column_name + '<span class="float_left"><img src="/images/indicator.gif" /></span>');

        $('#profile_analysis_list_table').find("tr.classnot").each(function(index) {
            $(this).addClass('withOpacity');
        });

        column_id = column_id.replace('ana_', '');
        $.post("/sbt/getArticleAnalysisListData?column_id=" + column_id + '&id=' + user_id + '&parent_id=' + parent_id, function(data) {
            $('#profile_data_container').html(data);
            //$('#'+column_id).html(column_name);
            var order = $('#article_analysis_list_current_column_order').val();
            setOrderImageForUserAllArticle(column_id, order, parent_id);
        });
    });

    /*blog profiler user pagination */

    $('#blog_list_listing_profiler a').unbind('click');
    $('#blog_list_listing_profiler a').live("click", function() {
        var page = $(this).attr("id");
        var column_id = $("#column_id").val();
        var column_name = $('.pagination_blog').html();
        var userlist_current_column_order = $("#userlist_current_column_order").val();
        //$('.pagination_blog').html(column_name+'<span class=""><img src="../images/indicator.gif" /></span>');
        $('.pagination_blog').html(column_name + '');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $.post("/sbt/getProfilerListData?page=" + page + "&column_id=" + column_id + "&userlist_current_column_order=" + userlist_current_column_order, function(data) {
            $('#blog_list_profiler_page').html(data);
            $('.indicator').hide();
            $('#pop-box-over').hide();
            //$('#'+page).html(column_name);
            //var order = $('#userlist_current_column_order').val();
            //setUserListOrderImage(page,order);
        });
    });

    /* Used for profile article/analysis listing page pagination. */
    $('#profile_article_analysis_list_listing a').unbind('click');
    $('#profile_article_analysis_list_listing a').live("click", function() {
        var column_id = $('#column_id').val();
        var parent_id = $('#parent_id').val();
        var user_id = $('#current_user').val();
        var page = $(this).attr("id");
        var current_column_order = $('#article_analysis_list_current_column_order').val();

        $('#profile_article_list_table').find("tr.classnot").each(function(index) {
            $(this).addClass('withOpacity');
        });

        $('#profile_analysis_list_table').find("tr.classnot").each(function(index) {
            $(this).addClass('withOpacity');
        });

        var pagination_numbers = $('#profile_article_analysis_list_listing').html();
        $('#profile_article_analysis_list_listing').html('<span class="float_right">' + pagination_numbers + '</span>  <span class="float_right" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');

        $.post("/sbt/getArticleAnalysisListData?column_id=" + column_id + '&id=' + user_id + "&page=" + page + '&parent_id=' + parent_id + '&article_analysis_list_current_column_order=' + current_column_order, function(data) {
            $('#profile_data_container').html(data);

            setOrderImageForUserAllArticle('sortby_' + column_id, current_column_order, parent_id);
        });
    });


    /* Used for profile all post page listing, sorting according to column. (Borstjanaren column) */
    $('#profile_useralldata_borst_list_column_row a').unbind('click');
    $('#profile_useralldata_borst_list_column_row a').live("click", function() {
        var column_id = $(this).attr("id");
        var parent_id = $(this).attr("name");
        var column_name = $('#' + column_id).html();
        var user_id = $('#current_user').val();
        //$('#'+parent_id+' #'+column_id).html(column_name+'<span class="float_left"><img src="/images/indicator.gif" /></span>');
        $('#' + parent_id + ' #' + column_id).html(column_name + '');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $('#profile_useralldata_borst_list_table').find("tr.classnot").each(function(index) {
            $(this).addClass('withOpacity');
        });

        $.post("/sbt/getSbtMinProfileAllPost?column_id=" + column_id + '&id=' + user_id + '&parent_id=' + parent_id, function(data) {
            $('#profile_data_container').html(data);
            //$('#'+column_id).html(column_name);
            var order = $('#useralldata_list_current_column_order').val();
            $('.indicator').hide();
            $('#pop-box-over').hide();
            setSearchOrderImageForAll(column_id, order, parent_id);
        });
    });

    /* Used for profile all post page listing, sorting according to column. (BT Insider column) */
    $('#profile_useralldata_sbt_list_column_row a').unbind('click');
    $('#profile_useralldata_sbt_list_column_row a').live("click", function() {
        var column_id = $(this).attr("id");
        var parent_id = $(this).attr("name");
        var column_name = $('#' + column_id).html();
        var user_id = $('#current_user').val();
        //$('#'+parent_id+' #'+column_id).html(column_name+'<span class="float_left"><img src="/images/indicator.gif" /></span>');
        $('#' + parent_id + ' #' + column_id).html(column_name + '');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $('#profile_useralldata_sbt_list_table').find("tr.classnot").each(function(index) {
            $(this).addClass('withOpacity');
        });

        $.post("/sbt/getSbtMinProfileAllPost?column_id=" + column_id + '&id=' + user_id + '&parent_id=' + parent_id, function(data) {
            $('#profile_data_container').html(data);
            $('.indicator').hide();
            $('#pop-box-over').hide();
            //$('#'+column_id).html(column_name);
            var order = $('#useralldata_list_current_column_order').val();
            setSearchOrderImageForAll(column_id, order, parent_id);
        });
    });

    /* Used for profile all post page listing, sorting according to column. (Blog column) */
    $('#profile_useralldata_blog_list_column_row a').unbind('click');
    $('#profile_useralldata_blog_list_column_row a').live("click", function() {
        var column_id = $(this).attr("id");
        var parent_id = $(this).attr("name");
        var column_name = $('#' + column_id).html();
        var user_id = $('#current_user').val();
        //$('#'+parent_id+' #'+column_id).html(column_name+'<span class="float_left"><img src="/images/indicator.gif" /></span>');
        $('#' + parent_id + ' #' + column_id).html(column_name + '');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $('#profile_useralldata_blog_list_table').find("tr.classnot").each(function(index) {
            $(this).addClass('withOpacity');
        });

        $.post("/sbt/getSbtMinProfileAllPost?column_id=" + column_id + '&id=' + user_id + '&parent_id=' + parent_id, function(data) {
            $('#profile_data_container').html(data);
            $('.indicator').hide();
            $('#pop-box-over').hide();
            //$('#'+column_id).html(column_name);
            var order = $('#useralldata_list_current_column_order').val();
            setSearchOrderImageForAll(column_id, order, parent_id);
        });
    });

    /* Used for profile all post page listing, sorting according to column. (Forum column) */
    $('#profile_useralldata_forum_list_column_row a, .useronlyforum_list_listing_all li span').unbind('click');
    $('#profile_useralldata_forum_list_column_row a, .useronlyforum_list_listing_all li span').live("click", function() {
        var column_id = $(this).attr("id");
        var parent_id = $(this).attr("name");
        var column_name = $('#' + column_id).html();
        var user_id = $('#current_user').val();
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        /*$('#'+parent_id+' #'+column_id).html(column_name+'<span class="float_left"><img src="/images/indicator.gif" /></span>');
		
        $('#profile_useralldata_forum_list_table').find("tr.classnot").each(function(index){
            $(this).addClass('withOpacity');
        });*/
        //$(this).parents(".forum_sorting_wrapper").find('.forun_sorting_arrow_forum').html('<span class="float_right"><img src="../images/indicator.gif" /></span>');
        $.post("/sbt/getSbtMinProfileAllPost?column_id=" + column_id + '&id=' + user_id + '&parent_id=' + parent_id, function(data) {
            $('#profile_data_container').html(data);
            $('.indicator').hide();
            $('#pop-box-over').hide();
            //$('#'+column_id).html(column_name);
            var order = $('#useralldata_list_current_column_order').val();
            setSearchOrderImageForAll(column_id, order, parent_id);
        });
    });


    /* Used for profile all post tab listing page pagination. */
    $('.profile_useralldata_list_listing a').unbind('click');
    $('.profile_useralldata_list_listing a').live("click", function() {
        var column_id = $('#column_id').val();
        var parent_id = $('#parent_id').val();
        var user_id = $('#current_user').val();
        var page = $(this).attr("id");
        var _parent = $(this).parent(".profile_useralldata_list_listing");
        var paginationFor = "";
        if ($(_parent).attr("data") != "") {
            paginationFor = "-" + $(_parent).attr("data");
        }

        var current_column_order = $('#useralldata_list_current_column_order').val();

        /*$('#profile_useralldata_borst_list_table').find("tr.classnot").each(function(index){
            $(this).addClass('withOpacity');
        });
        $('#profile_useralldata_sbt_list_table').find("tr.classnot").each(function(index){
            $(this).addClass('withOpacity');
        });
        $('#profile_useralldata_blog_list_table').find("tr.classnot").each(function(index){
            $(this).addClass('withOpacity');
        });
        $('#profile_useralldata_forum_list_table').find("tr.classnot").each(function(index){
            $(this).addClass('withOpacity');
        });*/

        var pagination_numbers = $(_parent).html();
        //$(_parent).html(pagination_numbers+'<span class="" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');
        $(_parent).html(pagination_numbers + '');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $.post("/sbt/getSbtMinProfileAllPost?column_id=" + column_id + '&id=' + user_id + "&page" + paginationFor + "=" + page + '&parent_id=' + parent_id + '&useralldata_list_current_column_order=' + current_column_order, function(data) {
            $('#profile_data_container').html(data);
            $('.indicator').hide();
            $('#pop-box-over').hide();
            setSearchOrderImageForAll('sortby_' + column_id, current_column_order, parent_id);
        });
    });


    /* Used for profile only forum post page listing, sorting according to column. (Forum column) */
    $('#profile_useronly_forum_list_column_row a, .forum_list_column_row li span, #xyzblog_list_profiler_column_row a').unbind('click');
    $('#profile_useronly_forum_list_column_row a, .forum_list_column_row li span, #xyzblog_list_profiler_column_row a').live("click", function() {
        var column_id = $(this).attr("id");
        var parent_id = $(this).attr("name");
        var column_name = $('#' + column_id).html();
        var user_id = $('#current_user').val();
        //$('#'+parent_id+' #'+column_id).html(column_name+'<span class="float_left"><img src="/images/indicator.gif" /></span>');
        //$('.forun_sorting_arrow').html('<span class="float_right"><img src="../images/indicator.gif" /></span>');	
        $('#profile_useronly_forum_list_table').find("tr.classnot").each(function(index) {
            $(this).addClass('withOpacity');
        });
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $.post("/sbt/getSbtMinProfileOnlyForumPost?column_id=" + column_id + '&id=' + user_id + '&parent_id=' + parent_id, function(data) {
            $('#profile_data_container').html(data);
            //$('#'+column_id).html(column_name);
            var order = $('#useronlyforum_list_current_column_order').val();
            setSearchOrderImageForAll(column_id, order, parent_id);
            $('.indicator').hide();
            $('#pop-box-over').hide();
        });
    });

    /* Used for profile only user blog post tab listing page pagination. */
    $('#useronlyforum_list_listing a').unbind('click');
    $('#useronlyforum_list_listing a').live("click", function() {
        var column_id = $('#column_id').val();
        var parent_id = $('#parent_id').val();
        var user_id = $('#current_user').val();
        var page = $(this).attr("id");
        var current_column_order = $('#useronlyforum_list_current_column_order').val();

        $('#profile_useralldata_forum_list_table').find("tr.classnot").each(function(index) {
            $(this).addClass('withOpacity');
        });

        var pagination_numbers = $('#useronlyforum_list_listing').html();
        //$('#useronlyforum_list_listing').html(pagination_numbers+'<span class="" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');
        $('#useronlyforum_list_listing').html(pagination_numbers + '');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $.post("/sbt/getSbtMinProfileOnlyForumPost?column_id=" + column_id + '&id=' + user_id + "&page=" + page + '&parent_id=' + parent_id + '&useronlyforum_list_current_column_order=' + current_column_order, function(data) {
            $('#profile_data_container').html(data);
            $('.indicator').hide();
            $('#pop-box-over').hide();
            setSearchOrderImageForAll('sortby_' + column_id, current_column_order, parent_id);
        });
    });

    /* Used for logged in user blog listing, sorting according to column. */
    /*$('#myblog_list_column_row a').unbind('click');	 
    $('#myblog_list_column_row a').live("click",function(){   
        var column_id = $(this).attr("id");
        var column_name  = $('#'+column_id).html();
        var user_id = $('#current_user').val();
        $('#'+column_id).html(column_name+'<span class="left"><img src="/images/indicator.gif" /></span>');

        $('#myblog_list_page').find("tr.classnot").each(function(index){
            $(this).addClass('withOpacity');
        });
		
        $.post("/sbt/getMyBlogListData?column_id="+column_id+'&id='+user_id, function(data){
            $('#myblog_list_page').html(data);
            $('#'+column_id).html(column_name);
            var order = $('#mybloglist_current_column_order').val();
            setSearchOrderImage(column_id,order);
        });
    });*/

    /* Used for logged in user blog listing page pagination. */
    $('#myblog_list_listing a').unbind('click');
    $('#myblog_list_listing a').live("click", function() {
        var column_id = $('#column_id').val();
        var page = $(this).attr("id");
        var current_column_order = $('#mybloglist_current_column_order').val();

        $('#myblog_list_page').find("tr.classnot").each(function(index) {
            $(this).addClass('withOpacity');
        });

        var pagination_numbers = $('#myblog_list_listing').html();
        //$('#myblog_list_listing').html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        $('#myblog_list_listing').html(pagination_numbers + '<span class="" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');
        $.post("/sbt/getMyBlogListData?column_id=" + column_id + "&page=" + page + "&mybloglist_current_column_order=" + current_column_order, function(data) {
            $('#myblog_list_page').html(data);

            setSearchOrderImage('sortby_' + column_id, current_column_order);
        });
    });


    $('.blog_topic_listing_column_row_all li span').unbind('click');
    $('.blog_topic_listing_column_row_all li span').live("click", function() {
        var column_id = $(this).attr("id");
        var column_name = $('#' + column_id).html();

        $.post("/sbt/getMyBlogListData?column_id=" + column_id, function(data) {
            $('#myblog_list_page').html(data);
            $('.pinkbg small_pinkbg width_658').css('height', 'auto');

            $('#' + column_id).html(column_name);
            var order = $('#mybloglist_current_column_order').val();
            setSearchOrderImage(column_id, order);
        });
    });

    /* Used when user clicks on profile top menu item. */
    $('#profile_top_menu a.for_profile_menu').unbind('click');
    $('#profile_top_menu a.for_profile_menu').live("click", function() {
        $("#profile_top_menu .selectedtab").removeClass("selectedtab");
        $(this).addClass("selectedtab");
        var action_name = $(this).attr("id");
        var user_id = $('#current_user').val();

        var is_logged_in_user = $('#is_logged_in_user').val();
        var div_id = is_logged_in_user == 1 ? 'profile_top_menu' : 'profile_top_menu_other_user';

        if (action_name == 'sbtMinProfileMyAccount') $('#account_links').css('display', 'block');
        else $('#account_links').css('display', 'none');

        setProfileMenuStatus(action_name, div_id);

        $('#profile_data_container').css('border-bottom', '0px');
        $('#profile_data_container').html('<span class="float_left" style="text-align:center; width:100%;"><img src="/images/indicator.gif" /></span>');

        $.post("/sbt/" + action_name + "?id=" + user_id, function(data) {
            //$('#profile_data_container').css('border-bottom','2px solid #C7CCD4');
            $('#profile_data_container').html(data);
        });
    });

    //Used when user clicks on profile dashboard menu
    $("#account_links a.for_profile_dashboard_menu").unbind('click');
    $("#account_links a.for_profile_dashboard_menu").live("click", function() {
        $("#account_links a.for_profile_dashboard_menu").removeClass("selectedtab");
        $(this).addClass("selectedtab");
    });

    /* Used when user clicks on view all friend request link. */
    $('#show_friend_request').unbind('click');
    $('#show_friend_request').live("click", function() {
        var user_id = $('#current_user').val();

        $.post("/sbt/viewAllRequest?id=" + user_id, function(data) {
            $('#profile_data_container').html(data);
        });
    });

    /* Used when user clicks on profile top menu item. */
    $('#profile_top_menu_other_user a').unbind('click');
    $('#profile_top_menu_other_user a').live("click", function() {
        $("#profile_top_menu_other_user .selectedtab").removeClass("selectedtab");
        $(this).addClass("selectedtab");
        var action_name = $(this).attr("id");
        var user_id = $('#current_user').val();

        var is_logged_in_user = $('#is_logged_in_user').val();
        var div_id = is_logged_in_user == 1 ? 'profile_top_menu' : 'profile_top_menu_other_user';

        setProfileMenuStatus(action_name, div_id);

        $('#profile_data_container').css('border-bottom', '0px');
        $('#profile_data_container').html('<span class="float_left" style="text-align:center; width:100%;"><img src="/images/indicator.gif" /></span>');

        $.post("/sbt/" + action_name + "?id=" + user_id, function(data) {
            $('#profile_data_container').html(data);
        });
    });

    /* Used when user clicks on profile left section of his details. */
    $('#links_to_menu_tabs a').unbind('click');
    $('#links_to_menu_tabs a').live("click", function() {
        $("#profile_top_menu_other_user .selectedtab").removeClass("selectedtab");
        $(this).addClass("selectedtab");
        var action_name = $(this).attr("id");
        action_name = action_name.replace('lft_', '');
        var user_id = $('#current_user').val();
        var is_logged_in_user = $('#is_logged_in_user').val();
        var div_id = is_logged_in_user == 1 ? 'profile_top_menu' : 'profile_top_menu_other_user';

        $('#profile_data_container').css('border-bottom', '0px');
        $('#profile_data_container').html('<span class="float_left" style="text-align:center; width:100%;"><img src="/images/indicator.gif" /></span>');

        setProfileMenuStatusForLeftLink(action_name, div_id);

        $.post("/sbt/" + action_name + "?id=" + user_id, function(data) {
            $('#profile_data_container').html(data);
        });
    });

    /* use for pagination on comment / message */
    $('#comment_list a').live('click', function() {
        var id = $('#current_user').val();
        var page = $(this).attr('id');
        $.ajax({
            url: '/sbt/sbtMinProfileMessage?id=' + id + '&page=' + page,
            success: function(data) {
                $('#profile_data_container').html(data);
            }
        });
    });

    /*!
     *
     * Used on user profileMessage page, when anyone wants to post a message to specific user
     *
     */
    $('#profile_msg_postmessage').unbind('click');
    $('#profile_msg_postmessage').live("click", function() {
        var current_user = $('#current_user').val();

        if (current_user == '') {
            window.location = 'http://' + window.location.hostname + '/user/loginWindow';
        } else {
            allMessageBox('profile_msg_postmessage_dialog', 'profile_msg_postmessage_form', 'msg_post_message');
            return false;
        }
    });

    /*!
     *
     * Used when a logged in user wants to send message to any user.
     *
     */
    $('#post_message').unbind('click');
    $('#post_message').live("click", function() {
        var current_user = $('#current_user').val();

        if (current_user == '') {
            window.location = 'http://' + window.location.hostname + '/user/loginWindow';
        } else {
            allMessageBox('profile_msg_postmessage_dialog', 'profile_msg_postmessage_form', 'post_message');
            return false;
        }
    });


    /* Initailise Analysis combos after every update. */
    initAllAnalysisCombos();
    initAllBlogCombos();

    //when the close button at right corner of the message box is clicked
    $('#close_message').click(function() {
        //the messagebox gets scrool down with top property and gets hidden with zero opacity
        //$('#info').animate({ opacity:0 }, "slow");
        $('#info').css({
            'display': 'none',
            'visibility': 'hidden'
        });
    });

    /*!
     *
     * Used when a logged in user wants to send message to any user.
     *
     */
    $('#request_publisher_status a').unbind('click');
    $('#request_publisher_status a').live("click", function() {
        var author_id = $(this).attr("name");

        var req = $('#request_publisher_status a').html();
        $('#request_publisher_status a').html(req + '<img src="/images/indicator.gif" />');

        $.ajax({
            url: '/email/sendPublisherRequest?author_id=' + author_id,
            success: function(data) {
                $("#request_publisher_status").html(data);
            }
        });
    });
    /*--------------------------------All functionality of BT article comment add,edit,delete,pagination---------------------------------------*/
    /*
     *
     * Used when any user post comment on any BT article.
     * 
     */

    $('#post_article_comment').unbind('click');
    $('#post_article_comment').live("click", function() {
        var article_id = $('#borst_article_comment_article_id').val();
        var article_comment_by = $('#borst_article_comment_comment_by').val();
        var article_comment_text = $('#borst_article_comment_article_comment').val();
        var comment_subject = $('#borst_article_comment_subject').val();

        $('#article_comment_text_error').html('');
        $('#article_comment_text_error1').html('');



        if (comment_subject == '' || article_comment_text == '') {
            if (comment_subject == '') {
                $('#article_comment_text_error').html('Required');
                $('#borst_article_comment_subject').focus();
            }

            if (article_comment_text == '') {
                $('#borst_article_comment_subject').after($('<div id ="article_comment_text_error1" class="float_left widthall redcolor"/>').html('Required'));
                $('#borst_article_comment_article_comment').focus();
            }
            if (comment_subject == '' && article_comment_text == '') {
                $('#borst_article_comment_subject').focus();
            }
        } else {
            $('#article_comment_text_error').html('');
            $('#article_comment_text_error1').html('');
            $('#borst_article_comment_article_comment').val('<p>' + $('#borst_article_comment_article_comment').val() + '</p>');
            var button_html = $('#post_article_comment_div').html();
            var data = $('#comment_on_article_form').serialize();

            //tinyMCE.triggerSave();
            $.ajax({
                type: 'POST',
                data: $('#comment_on_article_form').serialize(),
                url: '/borst/postCommentOnBtArticle?article_id=' + article_id + '&comment_by=' + article_comment_by + '&page=1&to_save=1',

                success: function(data) {

                    $("#bt_article_comment_list_div").html(data);
                    $('#post_article_comment_div').html(button_html + '<img src="/images/indicator.gif" />');
                    $('#borst_article_comment_article_comment').val('');
                    $('#borst_article_comment_subject').val('');
                    $.ajax({
                        url: '/borst/sendFavoriteUpdateNotification',
                        success: function(data1) {
                            //$("#bt_article_comment_list_div").html(data1); 
                            //$('#post_article_comment_div').html(button_html) ;    
                        }
                    });
                    $('#borst_postid').val('');
                    setInterval(function() {
                        $('#post_article_comment_div').html(button_html)
                    }, 10000);
                }
            });
        }
    });


    /*
     *
     * Use to focus on editor onclick of edit link
     *
     */

    $('.editlink_float_right a').unbind();
    $('.editlink_float_right a').live('click', function() {

        editpost_id = $(this).attr('id');
        $(".deletelink_float_right").hide();
        $.get("/borst/getArticleCommentData?editpost_id=" + editpost_id, function(data) {
            //$('#borst_article_comment_comment').val(data);
            data1 = data.split('_');
            var da = new Array();
            var da1 = new Array();

            da = data1[0].split('<p>');
            da1 = da[1].split('</p>');
            //alert(da1[0]);  
            $('#borst_article_comment_article_comment').val(da1[0]);
            //tinyMCE.activeEditor.setContent(data1[0]);
            $('#borst_article_comment_subject').val(data1[1]);
            $('#borst_article_comment_article_comment').focus();
            $('#borst_postid').val(editpost_id);

        });
        setInterval(function() {
            $('#greenmsg_article').html('');
        }, 15000);
    });


    /*
     * 
     * This Dialog box is used when a article comment is to be deleted.
     *
     */

    $('#delete_article_comment_confirm_box').dialog({
        autoOpen: false,
        width: 400,
        modal: true,
        buttons: {
            "Delete Article Comment": function() {
                var deletepost_id = $('#delete_comment_by_id').val();
                var article_id = $('#borst_article_comment_article_id').val();
                $.ajax({
                    type: 'POST',
                    url: "/borst/delArticleCommentData?deletepost_id=" + deletepost_id + "&artical_id=" + article_id,
                    success: function(data) {
                        $("#bt_article_comment_list_div").html(data);
                        setInterval(function() {
                            $('#greenmsg_article').html('');
                        }, 15000);
                    }
                });

                $(this).dialog("close");

            },
            "Cancel": function() {
                $(this).dialog("close");
            }
        }
    });


    /*!
     *
     * Used for pagination of comment on BT article.
     *
     */

    $('#bt_article_comment_list_listing a').unbind('click');
    $('#bt_article_comment_list_listing a').live("click", function() {

        var page = $(this).attr("id");
        var article_id = $('#borst_article_comment_article_id').val();
        var article_comment_by = $('#borst_article_comment_comment_by').val();

        var pagination_html = $('#bt_article_comment_list_listing').html();
        $('#bt_article_comment_list_listing').html('<span class="float_right">' + pagination_html + '</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');

        $.ajax({
            url: '/borst/postCommentOnBtArticle?article_id=' + article_id + '&page=' + page + '&to_save=0',
            success: function(data) {
                $("#bt_article_comment_list_div").html(data);
            }
        });
    });

    /*-------------------------------------------------End of All functionality of BT article comment add,edit delete---------------------------*/

    /*-------------------------------------------------All functionality of SBT article comment add,edit delete---------------------------------*/
    /*!
     *
     * Used when any user post comment on an article on SBT.
     *
     */

    $('#post_analysis_comment').unbind('click');
    $('#post_analysis_comment').live("click", function() {

        var analysis_id = $('#analysis_id').val();
        var comment_by = $('#comment_by').val();
        var comment_subject = $('#sbt_analysis_comment_subject').val();



        $('#analysis_comment_text_error').html('');
        $('#analysis_comment_text_error1').html('');



        var analysis_comment_text = $('#sbt_analysis_comment_analysis_comment').val();
        if (comment_subject == '' || comment_subject.length == 0 || analysis_comment_text == '' || analysis_comment_text.length == 0) {
            if (comment_subject == '') {
                $('#analysis_comment_text_error').html('Required');
                $('#sbt_analysis_comment_subject').focus();
            }

            if (analysis_comment_text == '') {

                $('#sbt_analysis_comment_subject').after($('<div id ="analysis_comment_text_error1" class="float_left widthall redcolor"/>').html('Required'));
                $('#sbt_analysis_comment_analysis_comment').focus();
            }
            if (comment_subject == '' && analysis_comment_text == '') {
                $('#sbt_analysis_comment_subject').focus();
            }
        } else {
            $('#analysis_comment_text_error').html('');
            $('#analysis_comment_text_error1').html('');
            $('#sbt_analysis_comment_analysis_comment').val('<p>' + $('#sbt_analysis_comment_analysis_comment').val() + '</p>');

            var button_html = $('#post_analysis_comment_div').html();
            $('#post_analysis_comment_div').html(button_html + '<img src="/images/indicator.gif" />');
            //var t = $('#sbt_analysis_comment_analysis_comment').val();
            //alert(t);
            //tinyMCE.triggerSave();
            $.ajax({
                type: 'POST',
                data: $('#comment_on_analysis_form').serialize(),
                url: '/sbt/postCommentOnArticle?analysis_id=' + analysis_id + '&comment_by=' + comment_by + '&page=1&to_save=1',
                success: function(data) {
                    $('#post_analysis_comment_div').html(button_html);
                    //tinyMCE.activeEditor.setContent('');
                    $('#sbt_analysis_comment_analysis_comment').val('');
                    $('#borst_post_subject_sbt').val('');
                    $('#sbt_analysis_comment_subject').val('');
                    $("#post_list_comment_div").html(data);

                    $.ajax({
                        url: '/email/sendFavoriteUpdateNotification',
                        success: function(data1) {

                        }
                    });
                    $('#borst_postid_sbt').val('');
                    setInterval(function() {
                        $('#post_article_comment_div').html(button_html)
                    }, 10000);
                }
            });
        }
    });
    /*
     *
     * for SBT article Use to focus on editor onclick of edit link.
     *
     */
    $('.editlink_float_right_sbt a').unbind();
    $('.editlink_float_right_sbt a').live('click', function() {
        editpost_id_sbt = $(this).attr('id');
        var data1 = new Array();
        $(".deletelink_float_right_sbt").hide();
        $.get("/sbt/getArticleCommentData?editpost_id=" + editpost_id_sbt, function(data) {
            data1 = data.split('_');
            var da = new Array();
            var da1 = new Array();
            da = data1[0].split('<p>');
            da1 = da[1].split('</p>');

            $('#sbt_analysis_comment_analysis_comment').val(da1[0]);
            $('#sbt_analysis_comment_subject').val(data1[1]);
            $('#sbt_analysis_comment_analysis_comment').focus();
            $('#borst_postid_sbt').val(editpost_id_sbt);

        });
        setInterval(function() {
            $('#greenmsg_article_sbt').html('');
        }, 15000);
    });


    /*
     *
     * for SBT article comment delete functionality.
     *
     */

    $('#delete_article_comment_confirm_box_sbt').dialog({
        autoOpen: false,
        width: 400,
        modal: true,
        buttons: {
            "Delete Article Comment": function() {
                var deletepost_id = $('#delete_comment_by_id_sbt').val();
                var analysis_id = $('#analysis_id').val();
                $.ajax({
                    type: 'POST',
                    url: "/sbt/delAnalysisCommentData?deletepost_id=" + deletepost_id + "&analysis_id=" + analysis_id,
                    success: function(data) {
                        $("#post_list_comment_div").html(data);
                        setInterval(function() {
                            $('#greenmsg_article_sbt').html('');
                        }, 15000);
                    }
                });

                $(this).dialog("close");

            },
            "Cancel": function() {
                $(this).dialog("close");
            }
        }
    });

    /*!
     *
     * Used for pagination of comment on analysis.
     *
     */
    $('#comment_list_listing a').unbind('click');
    $('#comment_list_listing a').live("click", function() {

        var page = $(this).attr("id");
        var analysis_id = $('#analysis_id').val();
        var comment_by = $('#comment_by').val();

        var pagination_html = $('#comment_list_listing').html();
        $('#comment_list_listing').html('<span class="float_right">' + pagination_html + '</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');

        $.ajax({
            url: '/sbt/postCommentOnArticle?analysis_id=' + analysis_id + '&page=' + page + '&to_save=0',
            success: function(data) {
                $("#post_list_comment_div").html(data);
            }
        });
    });
    /*-------------------------------------------------End of All functionality of SBT article comment add,edit delete---------------------------*/
    /*!
     *
     * Used when any user post comment on a blog.
     *
     */
    $('#post_blog_comment').unbind('click');
    $('#post_blog_comment').live("click", function() {
        var captchavalue = $("#g-recaptcha-response").val();
        var blog_id = $('#blog_id').val();
        var comment_by = $('#current_user').val();

        var button_html = $('#post_blog_comment_div').html();
        $('#post_blog_comment_div').html(button_html + '<img src="/images/indicator.gif" />');

        var blog_text = trim($('#sbt_blog_comment_blog_comment').val());

        $.ajax({
            type: 'POST',
            data: {
                "g-recaptcha-response": captchavalue
            },
            url: '/sbt/AjaxCheckCaptcha',
            success: function(data) {
                if (blog_text == '' || blog_text.length == 0) {
                    $('#blog_text_error').html('Required');
                    $('#post_blog_comment_div').html(button_html);
                } else if (data == 0) {
                    $("#captcha_blog_validation").html("OBS! Ange giltig captcha");
                    grecaptcha.reset();
                    $('#post_blog_comment_div').html(button_html);
                } else {
                    $.ajax({
                        type: 'POST',
                        data: $('#post_blog_comment_form').serialize(),
                        url: '/sbt/postCommentOnBlog?blog_id=' + blog_id + '&comment_by=' + comment_by + '&page=1',
                        success: function(data) {
                            $('#post_blog_comment_div').html(button_html);
                            $('#blog_text_error').html('');
                            $("#captcha_blog_validation").html('');
                            $('#sbt_blog_comment_blog_comment').val('');
                            $("#show_blog_comment_div").html(data);

                            $.ajax({
                                type: 'POST',
                                url: '/sbt/fetchRecentBlogComment?blog_id=' + blog_id,
                                success: function(data1) {
                                    $('#recent_blog_comment').html(data1);
                                    grecaptcha.reset();
                                }
                            });

                            $.ajax({
                                url: '/email/sendFavoriteUpdateNotification',
                                success: function(data2) {
                                    //window.location.href=window.location.href;
                                }
                            });
                        }
                    });
                }
            }
        });
    });
    /*
     * 
     * This Dialog box is used when a article comment is to be deleted.
     *
     */

    $('#delete_article_comment_confirm_box_forum').dialog({
        autoOpen: false,
        width: 400,
        modal: true,
        buttons: {
            "Delete Forum Post": function() {
                var deletepost_id = $('#delete_comment_by_id_forum').val();
                var forumid = $('#parentid').val();
                var lastpage = $('#lastpage').val();
                var prvelemnt = $('#' + deletepost_id).prev().attr('id');
                var curPgNo = parseInt($('#forum_comment_list_listing .selected').html());

                //var prevelemnt = $('#'+deletepost_id).previousSibling;
                //

                $.ajax({
                    type: 'POST',
                    url: "/forum/delForumArticleCommentData?page=" + curPgNo + "&delete_forum_post_id=" + deletepost_id + "&forumid=" + forumid,
                    success: function(data) {
                        $("#forum_comment_list_div").html(data);

                        var pagination_numbers = $('.forum_comment_list_listing:last').html();
                        $('#forum_comment_list_listing, .forum_comment_list_listing').html(pagination_numbers);

                        // $(".forumlistingleftdiv").css('height','auto');

                        if ($('#lastpage').val() == 0) {
                            $('#post_comment_on_forum_topic_div').show();
                        }
                        var msg = '<div class="greenmsg_article" style="width:300px; margin-left:150px;align:center;">' + $('#greenmsg_article').html() + '</div>';

                        obj = $('#forum_comment_list_div #' + prvelemnt);
                        if (obj.attr('id') == undefined) {
                            obj = $('#forum_topic_div');
                            obj.before(msg);
                        } else {
                            obj.after(msg);
                        }
                        //$('#'+deletepost_id).replaceWith($('#greenmsg_article').html());
                        // $('html, body').scrollTo($("#borst_forum_reply1"));
                        //document.documentElement.scrollTop-=650;

                        $('.greenmsg_article').fadeOut(15000, function() {
                            $(this).remove();
                        });
                    }
                });
                //prvelemnt.after($('div').html($('#greenmsg_article').html()));
                //$("#greenmsg_article").show(); 
                $(this).dialog("close");

            },
            "Cancel": function() {
                $(this).dialog("close");
            }
        }
    });

    /*!
     *
     * Used for pagination of comment on blog.
     *
     */
    $('#blog_comment_list_listing a').unbind('click');
    $('#blog_comment_list_listing a').live("click", function() {

        var page = $(this).attr("id");
        var blog_id = $('#blog_id').val();
        var comment_by = $('#current_user').val();
        var pagination_html = $('#blog_comment_list_listing').html();
        //$('#blog_comment_list_listing').html(pagination_html+'<span class="" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        $('#blog_comment_list_listing').html(pagination_html + '');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $.ajax({
            url: '/sbt/postCommentOnBlog?blog_id=' + blog_id + '&comment_by=' + comment_by + '&page=' + page,
            success: function(data) {
                $("#show_blog_comment_div").html(data);
                $('.indicator').hide();
                $('#pop-box-over').hide();
            }
        });
    });

    /*!
     *
     * Used when any user apply for starting or removing newsletter service.
     *
     */
    $('#newsletter_form_button').unbind('click');
    $('#newsletter_form_button').live("click", function() {

        var button_html = $('#newsletter_form_button_div').html();
        $('#newsletter_form_button_div').html(button_html + '<img src="/images/indicator.gif" />');

        $.ajax({
            type: 'POST',
            data: $('#newsletter_form').serialize(),
            url: '/borst/checkBorstNewsletterForm',
            success: function(data) {
                $('#newsletter_form_button_div').html(button_html);
                $("#newsletter_form_error").html(data);
                $('#newsletter_email').val('Fyll i din e-post här!');
            }
        });
    });


    /* Used for article listing, sorting according to row item. */
    /*$('#borst_rec_row .noclass a').unbind('click');
	$('#borst_rec_row .noclass a').live("click",function(){   
		var clicked_val = $(this).attr("id");
		var sort_id_name = '';
		var sort_id_val = '';
		var variable_str = '';
		var column_id = $('#column_id').val();
		//var column_name  = $('#'+column_id).html();

		if(clicked_val)
		{
			if(clicked_val.indexOf("kat_id_") != -1) { sort_id_name = 'kat_id'; sort_id_val = clicked_val.replace('kat_id_',''); }
			if(clicked_val.indexOf("type_id_") != -1) { sort_id_name = 'type_id'; sort_id_val = clicked_val.replace('type_id_',''); }
			if(clicked_val.indexOf("obj_id_") != -1) { sort_id_name = 'obj_id'; sort_id_val = clicked_val.replace('obj_id_',''); }

			if(clicked_val.indexOf("sbt_kat_id_") != -1) { sort_id_name = 'sbt_kat_id'; sort_id_val = clicked_val.replace('sbt_kat_id_',''); }
			if(clicked_val.indexOf("sbt_type_id_") != -1) { sort_id_name = 'sbt_type_id'; sort_id_val = clicked_val.replace('sbt_type_id_',''); }
			if(clicked_val.indexOf("sbt_obj_id_") != -1) { sort_id_name = 'sbt_obj_id'; sort_id_val = clicked_val.replace('sbt_obj_id_',''); }

			variable_str = '&sort_id_name='+sort_id_name+'&sort_id_val='+sort_id_val;
		}
		
		//var column_name  = $('#'+column_id).html();
		//$('#'+column_id).html(column_name+'<span class="float_left"><img src="../images/indicator.gif" /></span>');
		
		var parent_menu = $('#parent_menu').val();
		var submenu_menu = $('#submenu_menu').val();
		
		$('#article_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});
	
		$.post("/borst/getNewArticleListData?parent_menu="+parent_menu+"&submenu_menu="+submenu_menu+variable_str, function(data){
			$('#article_list_page').html(data);
			//$('#'+column_id).html(column_name);
			$('#column_id').val(column_id);
			var order = $('#articlelist_current_column_order').val();
			setSearchOrderImage('sortby_'+column_id,order);
		});
	});*/


    /* Used for article listing page pagination. */
    $('#article_list_listing_new a').unbind('click');
    $('#article_list_listing_new a').live("click", function() {
        var column_id = $('#column_id').val();
        var parent_menu = $('#parent_menu').val();
        var submenu_menu = $('#submenu_menu').val();
        var parent_sort_by = $('#parent_sort_by').val();
        var variable_str = '';
        var page = $(this).attr("id");
        var current_column_order = $('#articlelist_current_column_order').val();
        var show_thumb = $('#show_thumb').val();

        var kat_id = $('#kat_id').val();
        var type_id = $('#type_id').val();
        var obj_id = $('#obj_id').val();
        var sbt_kat_id = $('#sbt_kat_id').val();
        var sbt_type_id = $('#sbt_type_id').val();
        var sbt_obj_id = $('#sbt_obj_id').val();

        if (column_id) variable_str = variable_str + '&column_id=' + column_id;
        if (current_column_order) variable_str = variable_str + '&articlelist_current_column_order=' + current_column_order;
        if (kat_id) variable_str = variable_str + '&kat_id=' + kat_id;
        if (type_id) variable_str = variable_str + '&type_id=' + type_id;
        if (obj_id) variable_str = variable_str + '&obj_id=' + obj_id;
        if (sbt_kat_id) variable_str = variable_str + '&sbt_kat_id=' + sbt_kat_id;
        if (sbt_type_id) variable_str = variable_str + '&sbt_type_id=' + sbt_type_id;
        if (sbt_obj_id) variable_str = variable_str + '&sbt_obj_id=' + sbt_obj_id;

        $('#article_list_table').find("tr.classnot").each(function(index) {
            $(this).addClass('withOpacity');
        });
        $('.indicator').css('display', 'block');
        var pagination_numbers = $('#article_list_listing_new').html();
        $('#article_list_listing_new').html('<span class="">' + pagination_numbers + '</span>');
        $('.dummy2').html('<span class="">' + pagination_numbers + '</span>');
        $.post("/borst/getNewArticleListData?page=" + page + "&parent_menu=" + parent_menu + "&submenu_menu=" + submenu_menu + '&show_thumb=' + show_thumb + variable_str, function(data) {
            $('.forumlistingleftdivinner').html(data);
            $('.indicator').hide();
            setSearchOrderImage('sortby_' + column_id, current_column_order);
        });
        //autoHeightOnPage();

    });


    /* Used for article listing, sorting according to column. */
    $('#article_list_column_row_new a, .article_listing_column_row ul li span').unbind('click');
    $('#article_list_column_row_new a, .article_listing_column_row ul li span').live("click", function() {

        var column_id = $(this).attr("id");

        var column_name = $('#' + column_id).html();

        $('#' + column_id).html(column_name);
        var parent_menu = $('#parent_menu').val();
        var submenu_menu = $('#submenu_menu').val();
        var parent_sort_by = $('#parent_sort_by').val();
        var variable_str = '';
        var show_thumb = $('#show_thumb').val();

        var kat_id = $('#kat_id').val();
        var type_id = $('#type_id').val();
        var obj_id = $('#obj_id').val();
        var sbt_kat_id = $('#sbt_kat_id').val();
        var sbt_type_id = $('#sbt_type_id').val();
        var sbt_obj_id = $('#sbt_obj_id').val();

        if (kat_id) variable_str = variable_str + '&kat_id=' + kat_id;
        if (type_id) variable_str = variable_str + '&type_id=' + type_id;
        if (obj_id) variable_str = variable_str + '&obj_id=' + obj_id;
        if (sbt_kat_id) variable_str = variable_str + '&sbt_kat_id=' + sbt_kat_id;
        if (sbt_type_id) variable_str = variable_str + '&sbt_type_id=' + sbt_type_id;
        if (sbt_obj_id) variable_str = variable_str + '&sbt_obj_id=' + sbt_obj_id;

        $('#article_list_table').find("tr.classnot").each(function(index) {
            $(this).addClass('withOpacity');
        });
        $('.indicator').css('display', 'block');
        console.log(column_id);
        $('.test').addClass("active_item");
        $('.test1').addClass("active_item");
        $.post("/borst/getNewArticleListData?column_id=" + column_id + "&parent_menu=" + parent_menu + "&submenu_menu=" + submenu_menu + '&show_thumb=' + show_thumb + variable_str, function(data) {
            $('.forumlistingleftdivinner').html(data);

            $('#' + column_id).html(column_name);
            $('.indicator').hide();
            var order = $('#articlelist_current_column_order').val();
            //setSearchOrderImage(column_id,order);
        });

        //autoHeightOnPage();
    });

    /* Used for article listing, sorting according to column. */
    $('.preamble').unbind('click');
    $('.preamble').live("click", function() {
        var show_value = $(this).attr("name");
        //var column_id = $('#column_id').val();
        var column_name = $(this).html();
        $(this).html(column_name + '<span class="float_left" style="padding-left:5px;"><img src="../images/indicator.gif" /></span>');
        var parent_menu = $('#parent_menu').val();
        var submenu_menu = $('#submenu_menu').val();
        var parent_sort_by = $('#parent_sort_by').val();
        var variable_str = '';

        var kat_id = $('#kat_id').val();
        var type_id = $('#type_id').val();
        var obj_id = $('#obj_id').val();
        var sbt_kat_id = $('#sbt_kat_id').val();
        var sbt_type_id = $('#sbt_type_id').val();
        var sbt_obj_id = $('#sbt_obj_id').val();

        if (kat_id) variable_str = variable_str + '&kat_id=' + kat_id;
        if (type_id) variable_str = variable_str + '&type_id=' + type_id;
        if (obj_id) variable_str = variable_str + '&obj_id=' + obj_id;
        if (sbt_kat_id) variable_str = variable_str + '&sbt_kat_id=' + sbt_kat_id;
        if (sbt_type_id) variable_str = variable_str + '&sbt_type_id=' + sbt_type_id;
        if (sbt_obj_id) variable_str = variable_str + '&sbt_obj_id=' + sbt_obj_id;

        $('#article_list_table').find("tr.classnot").each(function(index) {
            $(this).addClass('withOpacity');
        });
        $.post("/borst/getNewArticleListData?parent_menu=" + parent_menu + "&submenu_menu=" + submenu_menu + '&show_thumb=' + show_value + variable_str, function(data) {
            $('.forumlistingleftdivinner').html(data);
            // if (column_id != ""){
            //$('#'+column_id).html(column_name);
            //var order = $('#articlelist_current_column_order').val();

            //setSearchOrderImage(column_id,order);
            //    }
        });

        //	autoHeightOnPage();

    });

    /*!
     *
     * Used when user wants to upload a image for his profile.
     *
     */
    $('#changeProfileImage').unbind('click');
    $('#changeProfileImage').live("click", function() {
        var current_user = $('#current_user').val();
        if (current_user == '') {
            window.location = 'http://' + window.location.hostname + '/user/loginWindow';
        } else {
            showProfileImageUploadBox();
        }
    });

    /*!
     *
     * Used when user wants to remove existing image of his profile.
     *
     */
    $('#removeProfileImage').unbind('click');
    $('#removeProfileImage').live("click", function() {
        var current_user = $('#current_user').val();
        var user_id = $(this).attr("name");
        if (current_user == '') {
            window.location = 'http://' + window.location.hostname + '/user/loginWindow';
        } else {
            removeUserProfilePhoto(user_id);
        }
    });

    /*!
     *
     * Used when user wants to upload a image for his blog profile.
     *
     */
    $('#user_blog_profile_image').unbind('click');
    $('#user_blog_profile_image').live("click", function() {
        var current_user = $('#current_user').val();
        if (current_user == '') {
            window.location = 'http://' + window.location.hostname + '/user/loginWindow';
        } else {
            showBlogProfileImageUploadBox();
        }
    });

    /*!
     *
     * Used when user wants to add combined author to the author list.
     *
     */
    $('#add_to_author_list').unbind('click');
    $('#add_to_author_list').live("click", function() {
        var name_txt = trim($('#name_list').val());
        if (name_txt && name_txt.length > 0) {
            $('#list_div').css({
                'border': '1px solid #BDC2BE'
            });
            var div_cnt = $("#list_div > div").size();
            div_cnt = div_cnt + 1;
            var div_id = 'd' + div_cnt;
            var image_id = 'i' + div_cnt;
            var name_list = '<div id=' + div_id + ' class="float_left widthall"><img id=' + image_id + ' class="float_left cursor" src="/images/cross.png" style="margin:2px 5px 7px 5px;" align="cross" />' + $('#name_list').val() + '</div>';
            var exisiting_data = $('#list_div').html();

            if (div_cnt <= 5)
                $('#list_div').html(exisiting_data + name_list);
            if (div_cnt > 5)
                $('#author_limit_error').html('You can add only 5 Authors');

            $('#name_list').val('');
        }
    });








    $('#list_div img').unbind('click');
    $('#list_div img').live("click", function() {
        var id_txt = $(this).attr("id");
        id_txt = id_txt.replace('i', 'd');
        $('#' + id_txt).remove();
        var div_cnt = $("#list_div > div").size();
        div_cnt = div_cnt + 1;
        if (div_cnt <= 5) {
            $('#author_limit_error').html(' ');
        }
        if (div_cnt == 1) {
            $('#list_div').css({
                'border': '0px solid #BDC2BE'
            });
        }
    });

    $('#save_article_changes').unbind('click');
    $('#save_article_changes').live("click", function() {
        save_edit_article();
    });


    // To adjust the popups width in mac safari.
    var jQbrowser = navigator.userAgent.toLowerCase();
    jQuery.os = {
        mac: /mac/.test(jQbrowser),
        win: /win/.test(jQbrowser),
        linux: /linux/.test(jQbrowser)
    };


    if (jQuery.os.mac) {
        if (jQuery.browser.safari) {
            $('#friend_request_message').attr("cols", "50");
            $('#sbt_messages_message_detail').attr("cols", "60");
        }
    }

    // When any user want to comment on any of his friend.
    $('.lightbluefont a').unbind('click');
    $('.lightbluefont a').live("click", function() {

        var id_str = new Array();
        id_str = $('.lightbluefont a').attr("name");
        var id_arr = id_str.split(',');
        var reciver = $(this).attr('id');
        commentOnAnyUser(id_arr[0], reciver, id_arr[2]);
    });

    // When any tries to create new forum topic.
    /*$('#create_forum_btn').unbind('click');	 
    $('#create_forum_btn').live("click",function(){
		
		var btforum_category_flag = btforum_subject_flag = btforum_desc_flag = 0;
		
		var cat_id = $('#btforum_btforum_category_id').val();
	    if(cat_id < 1) { $('#btforum_category_error').html('Please select the category.'); btforum_category_flag = 1;}
		else
		{
			$('#btforum_category_error').html('');
			var rubrik = trim($('#btforum_rubrik').val());
			var forum_description = tinyMCE.activeEditor.getContent();
			
			if(rubrik == '' || rubrik.length == 0) { $('#btforum_subject_error').html('Required'); btforum_subject_flag = 1;}
			else { $('#btforum_subject_error').html(''); }
			
			if(forum_description == '' || forum_description.length == 0) { $('#btforum_desc_error').html('Required'); btforum_desc_flag = 1;}
			else { $('#btforum_desc_error').html(''); }
			
			if(btforum_category_flag == 0 && btforum_subject_flag == 0 && btforum_desc_flag == 0)
			{
				$('#create_forumtopic_form').submit();
			}
			
		}
	});*/


    /* Used for posting reply to any request. */
    $('#post_enquiry_reply').unbind('click');
    $('#post_enquiry_reply').live("click", function() {
        var enq_id = $('#enq_id').val();
        var enquiry_reply_text = trim(tinyMCE.activeEditor.getContent());
        var postid = $('#postid').val();
        if (enquiry_reply_text == '' || enquiry_reply_text.length == 0) {
            $('#post_enquiry_reply_error').html('Required');
            $('#contact_enquiry_post_reply_text').focus();
        } else {
            tinyMCE.triggerSave();
            $.ajax({
                type: 'POST',
                data: $('#reply_on_enquiry').serialize(),
                url: '/borst/postReplyByUser?enq_id=' + enq_id,
                success: function(data) {
                    $(".enquiry_partial_replace").html(data);
                    tinyMCE.activeEditor.setContent('');
                    $('#action_msg').css('display', 'block');
                    $('#action_msg').html('Post saved');
                }
            });
        }
    });

    /* Used for update articlelist page pagination. */
    $('#enquiry_post_list_listing a').unbind('click');
    $('#enquiry_post_list_listing a').live("click", function() {
        var page = $(this).attr("id");
        var enq_id = $('#enq_id').val();

        $('#update_article_list_table').find("tr.classnot").each(function(index) {
            $(this).addClass('withOpacity');
        });

        var pagination_numbers = $('#enquiry_post_list_listing').html();
        $('#enquiry_post_list_listing').html('<span class="float_left">' + pagination_numbers + '</span>  ');

        $.ajax({
            url: '/borst/postReplyByUser?page=' + page + '&enq_id=' + enq_id,
            success: function(data) {
                $(".enquiry_partial_replace").html(data);
            }
        });
    });


    /* For BT-SHOP section.*/

    $('#bt_shop a').unbind('click');
    $('#bt_shop a').live("click", function() {
        $('.yellowcolor_submenu').removeClass('yellowcolor_submenu');
        $(this).addClass('yellowcolor_submenu');
    });

    /* For going to buy or adding to chart.*/

    /*$('#buy_or_add #add').unbind('click');	
	$('#buy_or_add #add').live("click",function(){   
     	var id = $(this).attr("id");
		var price = $("input[@name='product_price']:checked").val();
		var price_detail_id = $("input[@name='product_price']:checked").attr("id");
		var product_id = $('#product_id').val();
		
		$.ajax({
				url:'/borst_shop/getChartData?price='+price+'&product_id='+product_id+'&price_detail_id='+price_detail_id,
				success:function(data)
				{
					$("#shop_rightbanner").html(data);
					shopChartHeight();
				}
		});
	
	});*/

    $('#buy_or_add a').unbind('click');
    $('#buy_or_add a').live("click", function() {
        var id = $(this).attr("id");
        var price = $("input[@name='product_price']:checked").val();
        var price_detail_id = $("input[@name='product_price']:checked").attr("id");
        var product_id = $('#product_id').val();

        $.ajax({
            url: '/borst_shop/getCartData?price=' + price + '&product_id=' + product_id + '&price_detail_id=' + price_detail_id,
            success: function(data) {
                if (id == 'add') {
                    $("#shop_rightbanner").html(data);
                    shopChartHeight();
                    //setShippingCost();
                }
                if (id == 'to_payment') {
                    window.location = 'http://' + window.location.hostname + '/borst_shop/shopPayment/product_id/' + product_id;
                }
                // console.log("testtest");
                window.scrollTo(0, 0);
                $.ajax({
                    url: '/borst_shop/getCartDataCount',
                    success: function(data1) {
                        $('.cart_count').html(data1);
                    }
                });
            }
        });


    });

    $('.add_to_cart span').unbind('click');
    $('.add_to_cart span').live("click", function() {
        var str_arr = $(this).attr('id').split("product_id_");
        var prod_id_split_str_arr = str_arr[1].split('_product_price_');
        var prod_price_split_str_arr = prod_id_split_str_arr[1].split('_price_id_');
        var price = prod_price_split_str_arr[0];
        var price_detail_id = prod_price_split_str_arr[1];
        var product_id = prod_id_split_str_arr[0];

        $.ajax({
            url: '/borst_shop/getCartData?price=' + price + '&product_id=' + product_id + '&price_detail_id=' + price_detail_id,
            success: function(data) {
                $('#shop_rightbanner').addClass('shopcart_right_banner');
                $(".rightbanner").addClass('right_banner_cart');
                $(".rightbanner").html(data);
                window.scrollTo(0, 0);
                $.ajax({
                    url: '/borst_shop/getCartDataCount',
                    success: function(data1) {
                        $('.cart_count').html(data1);
                    }
                });
            }
        });
    });


    $('#buy_or_add_article a').unbind('click');
    $('#buy_or_add_article a').live("click", function() {
        var id = $(this).attr("id");
        var price = $("input[@name='product_price']:checked").val();
        var price_detail_id = $("input[@name='product_price']:checked").attr("id");
        var product_id = $('#product_id').val();

        $.ajax({
            url: '/borst_shop/getCartDataArticle?price=' + price + '&product_id=' + product_id + '&price_detail_id=' + price_detail_id,
            success: function(data) {
                if (id == 'add') {
                    $("#shop_rightbanner").html(data);
                    shopChartHeight();
                }
                if (id == 'to_payment_article') {
                    window.location = 'http://' + window.location.hostname + '/borst_shop/shopArticlePayment/product_id/' + product_id;
                }
            }
        });
    });


    $('#check_payment_detail_article').unbind('click');
    $('#check_payment_detail_article').live("click", function() {

        var email = trim($('#user_email').val());
        var user_firstname = trim($('#user_firstname').val());
        var user_lastname = trim($('#user_lastname').val());
        var user_street = trim($('#user_street').val());
        var user_zipcode = trim($('#user_zipcode').val());
        var user_city = trim($('#user_city').val());
        var user_telephone = trim($('#user_telephone').val());
        var user_country = $('#user_country_article').val();
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        var result_flag = new Array();
        result_flag[''] = 0;
        result_flag['Required'] = 1;
        result_flag['Invalid'] = 2;

        var email_flag = firstname_flag = lastname_flag = street_flag = zipcode_flag = telephone_flag = country_flag = city_flag = 0;

        //Email
        if (email == '' || email.length == 0) {
            $('#pay_email_error').html('Required');
            email_flag = 1;
        } else {
            if (reg.test(email) == false) {
                $('#pay_email_error').html('Invalid');
                email_flag = 2;
            } else {
                $('#pay_email_error').html('');
                email_flag = 0;
            }
        }

        // Firstname check
        /*if(result_flag[specialCharCheck(user_firstname)]==0)
        {*/
        if (result_flag[checkForOnlyCharacters(user_firstname)] == 0) {
            firstname_flag = result_flag[checkForOnlyCharacters(user_firstname)];
            $('#pay_firstname_error').html(checkForOnlyCharacters(user_firstname));
        } else {
            $('#pay_firstname_error').html(checkForOnlyCharacters(user_firstname));
            firstname_flag = 1;
        }
        /*}
        else
        {
            $('#pay_firstname_error').html(specialCharCheck(user_firstname));
            firstname_flag = 1;
        }*/
        // lastname check
        /*if(result_flag[specialCharCheck(user_lastname)]==0)
        {*/
        if (result_flag[checkForOnlyCharacters(user_lastname)] == 0) {
            lastname_flag = result_flag[checkForOnlyCharacters(user_lastname)];
            $('#pay_lastname_error').html(checkForOnlyCharacters(user_lastname));
        } else {
            $('#pay_lastname_error').html(checkForOnlyCharacters(user_lastname));
            lastname_flag = 1;
        }
        /*}
        else
        {
            $('#pay_lastname_error').html(specialCharCheck(user_lastname));
            lastname_flag = 1;
        }*/
        // Street
        if (user_street == '' || user_street.length == 0) {
            $('#pay_street_error').html('Required');
            street_flag = 1;
        } else {
            $('#pay_street_error').html('');
            street_flag = 0;
        }

        // Zip code 
        $('#pay_zipcode_error').html(checkForOnlyNumber(user_zipcode));
        zipcode_flag = result_flag[checkForOnlyNumber(user_zipcode)];

        // City
        /*if(result_flag[specialCharCheck(user_city)]==0)
        {*/
        if (result_flag[checkForOnlyCharacters(user_city)] == 0) {
            city_flag = result_flag[checkForOnlyCharacters(user_city)];
            $('#pay_zipcode_error').html(checkForOnlyCharacters(user_city));
        } else {
            $('#pay_zipcode_error').html(checkForOnlyCharacters(user_city));
            city_flag = 1;
        }
        /*}
        else{
            $('#pay_zipcode_error').html(specialCharCheck(user_city));
            city_flag = 1;
        }*/

        // Telephone
        $('#pay_telephone_error').html(checkForOnlyNumber(user_telephone));
        telephone_flag = result_flag[checkForOnlyNumber(user_telephone)];

        // Country
        if (user_country == 0) {
            $('#pay_country_error').html('Please select Country');
            country_flag = 1;
        } else {
            $('#pay_country_error').html('');
            country_flag = 0;
        }

        if (email_flag == 0 && firstname_flag == 0 && lastname_flag == 0 && street_flag == 0 && zipcode_flag == 0 && telephone_flag == 0 && city_flag == 0 && country_flag == 0) {
            $("#empty_cart_for_payment_error").html('');
            $('#payment_detail').submit();
        }
    });


    $('#change_order_article').unbind('click');
    $('#change_order_article').live("click", function() {
        $('.btshopleftdiv').addClass('greyOut');
        $('.btshopleftdiv').css('opacity', 0.5);
        $('#change_order_article span').addClass('greyOut_backgnd');
        $.ajax({
            url: '/borst_shop/getCartDataArticle',
            success: function(data) {
                $("#shop_rightbanner").html(data);
                shopChartHeight();
                //setShippingCost();
            }
        });
    });

    $('.empty_cart_article').unbind('click');
    $('.empty_cart_article').live("click", function() {
        var product_id = $("#product_id").val();
        $.ajax({
            url: '/borst_shop/getCartDataArticle?empty_cart=1&product_id=' + product_id,
            success: function(data) {
                $("#shop_rightbanner").html(data);
                $('.btshopleftdiv').removeClass('greyOut');
                $('.btshopleftdiv').css('opacity', 1);
                shopChartHeight();
            }
        });
    });
    /* When a quantity is changed. */
    /*$('.no_of_product').unbind('blur');	
	$('.no_of_product').live('blur',function(){ 
											 
	  var id = $(this).attr("id");
	  var qty = $(this).val();
	  	  
		$.ajax({
				url:'/borst_shop/getCartData?qty_index='+id+'&qty='+qty,
			  	success:function(data)
			  	{
			  		$("#shop_rightbanner").html(data);
					shopChartHeight();
			  	}
		});
	
	});*/


    /* When a item is to be deleted from cart. */
    $('.remove_from_cart').unbind('click');
    $('.remove_from_cart').live("click", function() {
        if (/borstShopHome/i.test(breadcrum_modulename_str)) {
            var cartEmptyOrNt = 1;
        } else {
            var cartEmptyOrNt = 0;
        }
        var id = $(this).attr("id");
        var product_id = $("#product_id").val();

        $.ajax({
            url: '/borst_shop/getCartData?delete_index=' + id + '&product_id=' + product_id + '&cartEmptyOrNt=' + cartEmptyOrNt,
            success: function(data) {
                $("#shop_rightbanner").html(data);
                setShopPaymentItemList();
                //	setShippingCost();
                $.ajax({
                    url: '/borst_shop/getCartDataCount',
                    success: function(data1) {
                        if ($('#shop_rightbanner').hasClass('shopcart_right_banner') && data1 == 0) {
                            $('#shop_rightbanner').removeClass('shopcart_right_banner');
                        }
                        $('.cart_count').html(data1);
                    }
                });
            }
        });


    });

    $('.remove_from_cart1').unbind('click');
    $('.remove_from_cart1').live("click", function() {

        var id = $(this).attr("id");

        $.ajax({
            url: '/borst_shop/getCartData?delete_index=' + id,
            success: function(data) {
                //$("#shop_rightbanner").html(data);
                setShopPaymentItemList();
                //	setShippingCost();
                $.ajax({
                    url: '/borst_shop/getCartDataCount',
                    success: function(data) {
                        $('.cart_count').html(data);
                        if (data == '') {
                            window.location.href = '/borst_shop/shopCart';
                        }
                    }
                });
            }
        });
    });

    $('.remove_from_cart2').unbind('click');
    $('.remove_from_cart2').live("click", function() {
        var id = $(this).attr("id");
        var dId = $(this).attr('dId');
        $('#shop_rightbanner ul li').each(function() {
            var delIteam = $(this).attr('id');
            if (dId == delIteam) {
                $(this).removeClass('shop_r_side_active');
                $(this).find('.shop_r_side_active').removeClass('shop_r_side_active');
            }
        });
        $.ajax({
            url: '/borst_shop/getCartData?delete_index=' + id,
            success: function(data) {
                $.ajax({
                    url: '/borst_shop/getCartDataCount',
                    success: function(data) {
                        $('.cart_count').html(data);
                        $.ajax({
                            url: '/borst_shop/cartPricing',
                            success: function(data) {
                                $("#btshopleftdivinner").html(data);
                            }
                        });
                    }
                });
            }
        });
    });


    /* When user want to empty the shopping cart. */
    $('.empty_cart').unbind('click');
    $('.empty_cart').live("click", function() {
        if (/borstShopHome/i.test(breadcrum_modulename_str)) {
            var cartEmptyOrNt = 1;
        } else {
            var cartEmptyOrNt = 0;
        }

        var product_id = $("#product_id").val();
        $.ajax({
            url: '/borst_shop/getCartData?empty_cart=1&product_id=' + product_id + '&cartEmptyOrNt=' + cartEmptyOrNt,
            success: function(data) {
                if ($('#shop_rightbanner').hasClass('shopcart_right_banner')) {
                    $('#shop_rightbanner').removeClass('shopcart_right_banner');
                }
                $("#shop_rightbanner").html(data);
                setShopPaymentItemList();
                //	setShippingCost();
                shopChartHeight();
                $.ajax({
                    url: '/borst_shop/getCartDataCount',
                    success: function(data1) {
                        $('#user_cart_details').hide();
                        $('.cart_payment_steps').hide();
                        $('.cart_count').html(data1);
                        if (data1 == '') {
                            window.location.href = '/borst_shop/shopCart';
                        }
                    }
                });
            }
        });
    });


    /* When user want to change the order. */
    $('#change_order').unbind('click');
    $('#change_order').live("click", function() {
        $('.btshopleftdiv').addClass('greyOut');
        $('.btshopleftdiv').css('opacity', 0.5);
        $('#change_order span').addClass('greyOut_backgnd');
        $.ajax({
            url: '/borst_shop/getCartData',
            success: function(data) {
                $("#shop_rightbanner").html(data);
                shopChartHeight();
                //setShippingCost();
                $.ajax({
                    url: '/borst_shop/getCartDataCount',
                    success: function(data1) {
                        $('.cart_count').html(data1);
                    }
                });
            }
        });
    });


    /* When user submits the payment details. */
    $('#check_payment_detail').unbind('click');
    $('#check_payment_detail').live("click", function() {

        var email = trim($('#user_email').val());
        var user_firstname = trim($('#user_firstname').val());
        var user_lastname = trim($('#user_lastname').val());
        var user_street = trim($('#user_street').val());
        var user_zipcode = trim($('#user_zipcode').val());
        var user_city = trim($('#user_city').val());
        var user_telephone = trim($('#user_telephone').val());
        var user_country = $('#user_country').val();
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        var result_flag = new Array();
        result_flag[''] = 0;
        result_flag['Required'] = 1;
        result_flag['Invalid'] = 2;

        var email_flag = firstname_flag = lastname_flag = street_flag = zipcode_flag = telephone_flag = country_flag = city_flag = 0;

        if (email == '' || email.length == 0) {
            $('#pay_email_error').html('Required');
            email_flag = 1;
        } else {
            if (reg.test(email) == false) {
                $('#pay_email_error').html('Invalid');
                email_flag = 2;
            } else {
                $('#pay_email_error').html('');
                email_flag = 0;
            }
        }

        // Firstname check
        /*if(result_flag[specialCharCheck(user_firstname)]==0)
        {*/
        if (result_flag[checkForOnlyCharacters(user_firstname)] == 0) {
            firstname_flag = result_flag[checkForOnlyCharacters(user_firstname)];
            $('#pay_firstname_error').html(checkForOnlyCharacters(user_firstname));
        } else {
            $('#pay_firstname_error').html(checkForOnlyCharacters(user_firstname));
            firstname_flag = 1;
        }
        /*}
        else  $('#pay_firstname_error').html(specialCharCheck(user_firstname));*/

        // lastname check
        /*if(result_flag[specialCharCheck(user_lastname)]==0)
        {*/
        if (result_flag[checkForOnlyCharacters(user_lastname)] == 0) {
            lastname_flag = result_flag[checkForOnlyCharacters(user_lastname)];
            $('#pay_lastname_error').html(checkForOnlyCharacters(user_lastname));
        } else {
            $('#pay_lastname_error').html(checkForOnlyCharacters(user_lastname));
            lastname_flag = 1;
        }
        /*}
        else  $('#pay_lastname_error').html(specialCharCheck(user_lastname));*/


        /*$('#pay_firstname_error').html(specialCharCheck(user_firstname));
		$('#pay_firstname_error').html(checkForOnlyCharacters(user_firstname));
		firstname_flag = result_flag[specialCharCheck(user_firstname)];
		firstname_flag = result_flag[checkForOnlyCharacters(user_firstname)];

		$('#pay_lastname_error').html(specialCharCheck(user_lastname));
		$('#pay_lastname_error').html(checkForOnlyCharacters(user_lastname));
		lastname_flag = result_flag[specialCharCheck(user_lastname)];
		lastname_flag = result_flag[checkForOnlyCharacters(user_lastname)];*/

        if (user_street == '' || user_street.length == 0) {
            $('#pay_street_error').html('Required');
            street_flag = 1;
        } else {
            $('#pay_street_error').html('');
            street_flag = 0;
        }

        //$('#pay_zipcode_error').html(checkForOnlyCharacters(user_city));
        $('#pay_zipcode_error').html(checkForOnlyNumber(user_zipcode));
        //zipcode_flag = result_flag[checkForOnlyCharacters(user_city)];
        zipcode_flag = result_flag[checkForOnlyNumber(user_zipcode)];


        // lastname check
        /*if(result_flag[specialCharCheck(user_city)]==0)
        {*/
        if (result_flag[checkForOnlyCharacters(user_city)] == 0) {
            city_flag = result_flag[checkForOnlyCharacters(user_city)];
            $('#pay_zipcode_error').html(checkForOnlyCharacters(user_city));
        } else {
            $('#pay_zipcode_error').html(checkForOnlyCharacters(user_city));
            city_flag = 1;
        }
        /*}
        else  $('#pay_city_error').html('/'+specialCharCheck(user_city));*/

        /*$('#pay_city_error').html(specialCharCheck(user_city));
		$('#pay_city_error').html(checkForOnlyCharacters(user_city));
		city_flag = result_flag[specialCharCheck(user_city)];
		city_flag = result_flag[checkForOnlyCharacters(user_city)];*/

        $('#pay_telephone_error').html(checkForOnlyNumber(user_telephone));
        telephone_flag = result_flag[checkForOnlyNumber(user_telephone)];

        if (user_country == 0) {
            $('#pay_country_error').html('Please select Country');
            country_flag = 1;
        } else {
            $('#pay_country_error').html('');
            country_flag = 0;
        }


        if (email_flag == 0 && firstname_flag == 0 && lastname_flag == 0 && street_flag == 0 && zipcode_flag == 0 && telephone_flag == 0 && city_flag == 0 && country_flag == 0) {
            $.get("/borst_shop/isEmptyCartForPayment", function(data) {
                if (data == 0) {
                    window.location = 'http://' + window.location.hostname + '/user/loginWindow';
                }
                if (data == 1) {
                    $("#empty_cart_for_payment_error").html('Please select a product to Buy.');
                }
                if (data == 2) {
                    //$("#empty_cart_for_payment_error").html('');
                    //$('#payment_detail').submit();                    

                    var final_amount_num = $('#final_amount_num').val();
                    //alert(final_amount_num); 
                    if (final_amount_num > 0) { //check total amount is positive or not after coupon code apply
                        //alert('positive');
                        $("#empty_cart_for_payment_error").html('');
                        $('#payment_detail').submit();
                    } else {
                        //alert('negative');
                        if (/borstShopHome/i.test(breadcrum_modulename_str)) {
                            var cartEmptyOrNt = 1;
                        } else {
                            var cartEmptyOrNt = 0;
                        }

                        var product_id = $("#product_id").val();
                        $.ajax({
                            url: '/borst_shop/getCartData?empty_cart=1&product_id=' + product_id + '&cartEmptyOrNt=' + cartEmptyOrNt,
                            success: function(data) {
                                $("#shop_rightbanner").html(data);
                                setShopPaymentItemList();
                                //	setShippingCost();
                                shopChartHeight();
                                $.ajax({
                                    url: '/borst_shop/getCartDataCount',
                                    success: function(data1) {
                                        $('.cart_count').html(data1);
                                    }
                                });
                            }
                        });
                    }
                }
            });
            //$('#payment_detail').submit();
        }
    });

    /*!
     *
     * Used when any user post comment on a forum topic.
     *
     */
    ///$('#post_on_forum_topic').unbind('click');	 
    $('#post_on_forum_topic').live("click", function() {

        var button_html = $('#post_forum_comment_div').html();
        $('#post_forum_comment_div').html('');
        $('#post_forum_comment_div').html(button_html + '<img src="/images/indicator.gif" />');

        var is_forum_topic = $('#is_forum_topic').val();

        var post_text = trim(tinyMCE.activeEditor.getContent());
        if (post_text == '' || post_text.length == 0) {
            $('#forum_post_text_error').html('Required');
            $('#post_forum_comment_div').html(button_html);
            var pagination_numbers = $('.forum_comment_list_listing:last').html();
            $('#forum_comment_list_listing, .forum_comment_list_listing').html(pagination_numbers);
        } else {
            $('#forum_post_text_error').html('');

            tinyMCE.triggerSave();
            $('.indicator').show();
            $('html, body').scrollTo($('.indicator'));
            $.ajax({
                type: 'POST',
                data: $('#reply_to_forum_post').serialize(),
                url: '/forum/saveCommentOnForum',
                success: function(data) {

                    $('#post_forum_comment_div').html(button_html);

                    tinyMCE.activeEditor.setContent('');
                    $("#forum_comment_img_upload_msg").html('');

                    if (is_forum_topic == 1) {
                        $('#forum_topic_text').html(data);
                        //setHeightOnForum();
                    } else {
                        $("#forum_comment_list_div").html(data);
                        //$("#forum_comment_list_div").html(data);
                        //setHeightOnForum();
                    }

                    var pagination_numbers = $('.forum_comment_list_listing:last').html();
                    $('#forum_comment_list_listing, .forum_comment_list_listing').html(pagination_numbers);
                    $("#borst_forum_reply #postid").val("");

                    // Added for diplaying last page
                    var page = $('#lastpage').val();
                    var koppling_id = $('#koppling_id').val();

                    //$("#forum_comment_list_div").html(data);
                    /*$.get("/forum/saveCommentOnForum?page="+page+"&koppling_id="+koppling_id, function(data){
						 $("#forum_comment_list_div").html(data);
						 setHeightOnForum();
					});
                                        */

                    $.ajax({
                        url: '/email/sendFavoriteUpdateNotification',
                        success: function(data1) {
                            $('.indicator').hide();
                        }
                    });
                    $('html, body').scrollTo($("#borst_forum_reply"));
                    document.documentElement.scrollTop -= 250;

                }
            });
        }

    });

    /* Used for viewing next post for a forum topic. */
    $('#forum_comment_list_listing a, .forum_comment_list_listing a').unbind('click');
    $('#forum_comment_list_listing a, .forum_comment_list_listing a').live("click", function() {
        var page = $(this).attr("id");
        var koppling_id = $('#koppling_id').val();

        var pagination_numbers = $('#forum_comment_list_listing, .forum_comment_list_listing').html();
        //$('#forum_comment_list_listing, .forum_comment_list_listing').html('<span class="">'+pagination_numbers+'</span>  <span class="pageindicator" ><img style="position:relative;top:3px;width:13px;" src="/images/indicator.gif" /></span>');
        //$('#forum_comment_list_listing, .forum_comment_list_listing').html('<span class="">'+pagination_numbers+'</span>');
        $('.indicator').css('display', 'block');
        //$('html, body').scrollTo( $('#forum_topic_div'));
        $('#pop-box-over').show();
        $.get("/forum/saveCommentOnForum?page=" + page + "&koppling_id=" + koppling_id, function(data) {
            $("#forum_comment_list_div").html(data);
            //setHeightOnForum();
            var pagination_numbers = $('.forum_comment_list_listing:last').html();
            $('#forum_comment_list_listing, .forum_comment_list_listing').html(pagination_numbers);
            $('.indicator').hide();
            $('#pop-box-over').hide();
        });
    });

    /* Used for showing blogs as per date. */
    $('.ui-datepicker-calendar a.ui-state-default').unbind('click');
    $('.ui-datepicker-calendar a.ui-state-default').live("click", function() {
        /*var one_date = $(this).html();
		var month = $('.ui-datepicker-month').html();
		var year = $('.ui-datepicker-year').html();
		//var user_id = $('#user_all_blog_post').attr("name");
		var user_id = $('#blog_user_id').val();
		
		$('#blog_detail_div').html('<span class="float_left" style="text-align:center; width:100%; height:20px;"><img src="/images/indicator.gif" /></span>');
		 alert('c'+month); 
		 
		show_blog_dates(month,year);
		
		$.get("/sbt/getBlogListOnDateData?month="+month+"&year="+year+"&last_date="+one_date+"&user_id="+user_id, function(data){
			 $("#blog_detail_div").html(data);
		});*/
    });

    /* Sort blog list of a specific Date. */
    $('#date_blog_list_column_row a').unbind('click');
    $('#date_blog_list_column_row a').live("click", function() {
        var column_id = $(this).attr("id");
        var column_name = $('#' + column_id).html();

        var search_month = $('#search_month').val();
        var search_year = $('#search_year').val();
        var search_last_date = $('#search_last_date').val();

        $('#' + column_id).html(column_name + '<span class="float_left"><img src="../images/indicator.gif" /></span>');

        $('#blog_detail_div').find("tr.classnot").each(function(index) {
            $(this).addClass('withOpacity');
        });

        $.post("/sbt/getBlogListOnDateData?column_id=" + column_id + "&month=" + search_month + "&year=" + search_year + "&last_date=" + search_last_date, function(data) {
            $('#blog_detail_div').html(data);
            $('#' + column_id).html(column_name);
            var order = $('#date_bloglist_current_column_order').val();
            setDateBlogListOrderImage(column_id, order);
        });
    });

    /* Pagination for blog list of a specific Date. */
    $('#date_blog_list_listing a').unbind('click');
    $('#date_blog_list_listing a').live("click", function() {
        var column_id = $('#column_id').val();
        var page = $(this).attr("id");
        var current_column_order = $('#date_bloglist_current_column_order').val();

        var search_month = $('#search_month').val();
        var search_year = $('#search_year').val();
        var search_last_date = $('#search_last_date').val();

        $('#blog_detail_div').find("tr.classnot").each(function(index) {
            $(this).addClass('withOpacity');
        });

        var pagination_numbers = $('#date_blog_list_listing').html();
        $('#date_blog_list_listing').html('<span class="float_right">' + pagination_numbers + '</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');

        $.post("/sbt/getBlogListOnDateData?column_id=" + column_id + "&page=" + page + "&date_bloglist_current_column_order=" + current_column_order + "&month=" + search_month + "&year=" + search_year + "&last_date=" + search_last_date, function(data) {
            $('#blog_detail_div').html(data);

            setDateBlogListOrderImage('sortby_blog_' + column_id, current_column_order);
        });
    });

    /* To Scroll Page to the Top on shop page. */
    $('.to_page_top a').unbind('click');
    $('.to_page_top a').live("click", function() {
        $('html, body').animate({
            scrollTop: 0
        }, 0);
    });

    // This Dialog box is used when a forum topic is to be deleted.
    $('#delete_forum_topic_confirm_box').dialog({
        autoOpen: false,
        width: 400,
        modal: true,
        buttons: {
            "Delete Forum Topic": function() {
                var column_id = $('#column_id').val();
                var current_column_order = $('#sbt_forum_column_order').val();
                var cat_id = $('#forum_parent_tab').val();
                var sub_cat_id = $('#forum_sub_cat_id').val();
                var delete_forum_topic_id = $('#delete_forum_topic_id').val();

                $.ajax({
                    url: '/forum/getForumContentByOrder?column_id=' + column_id + '&sbt_forum_column_order=' + current_column_order + '&forum_parent_tab=' + cat_id + '&forum_sub_cat_id=' + sub_cat_id + '&delete_forum_topic_id=' + delete_forum_topic_id,
                    success: function(data) {
                        $('#forum_content').html(data);
                        $('#delete_forum_topic_id').val('');
                    }
                });
                $(this).dialog("close");
            },
            "Cancel": function() {
                $(this).dialog("close");
            }
        }
    });

    /* To select blog page header name color.*/
    $('#colorSelector').ColorPicker({
        color: '#0000ff',
        onShow: function(colpkr) {
            $(colpkr).fadeIn(500);
            return false;
        },
        onHide: function(colpkr) {
            $(colpkr).fadeOut(500);
            return false;
        },
        onChange: function(hsb, hex, rgb) {
            $('#colorSelector div').css('backgroundColor', '#' + hex);
            $('#blog_headername_color').val('#' + hex);
        }
    });

    /* To select blog page header color.*/
    $('#colorSelectorHeaderInfo').ColorPicker({
        color: '#0000ff',
        onShow: function(colpkr) {
            $(colpkr).fadeIn(500);
            return false;
        },
        onHide: function(colpkr) {
            $(colpkr).fadeOut(500);
            return false;
        },
        onChange: function(hsb, hex, rgb) {
            $('#colorSelectorHeaderInfo div').css('backgroundColor', '#' + hex);
            $('#blog_headerinfo_color').val('#' + hex);
        }
    });

    /* To select blog page background color.*/
    $('#blogPageBackgroundColor').ColorPicker({
        color: '#0000ff',
        onShow: function(colpkr) {
            $(colpkr).fadeIn(500);
            return false;
        },
        onHide: function(colpkr) {
            $(colpkr).fadeOut(500);
            return false;
        },
        onChange: function(hsb, hex, rgb) {
            $('#blogPageBackgroundColor div').css('backgroundColor', '#' + hex);
            $('#blog_pagebackground_color').val('#' + hex);
        }
    });

    /* To show all user blog post. */
    /*$('#user_all_blog_post').unbind('click');
	$('#user_all_blog_post').live("click",function(){   
		var user_id = $(this).attr("name");
		
		$('#blog_detail_div').html('<span class="float_left" style="text-align:center; width:100%; height:20px;"><img src="/images/indicator.gif" /></span>');
		
		$.ajax({
		  url:'/sbt/showAllBlogPostOfUser?user_id='+user_id,
		  success:function(data)
		  {
				$("#blog_detail_div").html(data);
		  }
		});
		
	});*/

    /* Used for user all blog post page pagination. */
    $('#user_all_blog_post_list_listing a').unbind('click');
    $('#user_all_blog_post_list_listing a').live("click", function() {

        var page = $(this).attr("id");
        var user_id = $('#blog_user_id').val();
        $('#blog_detail_div').find("div.blog_classnot").each(function(index) {
            $(this).addClass('withOpacity');
        });

        var pagination_numbers = $('#user_all_blog_post_list_listing').html();
        $('#user_all_blog_post_list_listing').html(pagination_numbers + '<span class="" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');

        $.ajax({
            url: '/sbt/showAllBlogPostOfUser?user_id=' + user_id + '&page=' + page,
            success: function(data) {
                $("#blog_detail_div").html(data);
            }
        });

    });

    /* Used for user all blog post page, individual blog comment pagination. */
    $('.user_all_blog_comment_pagination a').unbind('click');
    $('.user_all_blog_comment_pagination a').live("click", function() {

        var blog_id_str = $(this).parent().attr("id");
        var blog_id = trim(blog_id_str.replace('blog_comment_list', ''));

        var page = $(this).attr("id");

        var user_id = $('#blog_user_id').val();
        /*$('#blog_detail_div').find("div.blog_classnot").each(function(index){
			$(this).addClass('withOpacity');
		});*/

        var pagination_numbers = $('.user_all_blog_comment_pagination').html();
        $('.user_all_blog_comment_pagination').html('<span class="float_left">' + pagination_numbers + '</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');

        $.ajax({
            url: '/sbt/fetchAndPostCommentOnBlog?user_id=' + user_id + '&page=' + page + '&blog_id=' + blog_id,
            success: function(data) {
                $("#blog_comment_div" + blog_id).html(data);
            }
        });
    });

    /* Used for user all blog post page pagination. */
    $('.blog_read_more a').unbind('click');
    $('.blog_read_more a').live("click", function() {
        var blog_id = $(this).attr("name");
        //alert(blog_id);
        $('#blog_vote_div_id' + blog_id).css({
            'display': 'block',
            'visibility': 'visible'
        });
        $('#blog_comment_section' + blog_id).css({
            'display': 'block',
            'visibility': 'visible'
        });
        $('#comment_count_div' + blog_id).css({
            'display': 'none',
            'visibility': 'hidden'
        });
        $('#descFull_' + blog_id).css('display', '');
        $('#descLimited_' + blog_id).css('display', 'none');
    });
    $('.hide_blog_div a').live('click', function() {
        var blog_id = $(this).attr("name");
        $('#blog_vote_div_id' + blog_id).css({
            'display': 'none',
            'visibility': 'hidden'
        });
        $('#blog_comment_section' + blog_id).css({
            'display': 'none',
            'visibility': 'hidden'
        });
        $('#comment_count_div' + blog_id).css({
            'display': 'block',
            'visibility': 'visible'
        });
        $('#descFull_' + blog_id).css('display', 'none');
        $('#descLimited_' + blog_id).css('display', '');
    })

    /* Used to list of favorite article,blog and forum post. */
    $('#account_links #my_favorite_links').unbind('click');
    $('#account_links #my_favorite_links').live("click", function() {

        $('#myaccount_data_container').html('<span class="float_left" style="text-align:center; padding-bottom:10px; width:100%;"><img src="/images/indicator.gif" /></span>');
        if ($('#account_links').hasClass('hide-show')) {
            $('.om_miginfo').hide();
        }
        $.ajax({
            url: '/sbt/sbtMinProfileMyFavorite',
            success: function(data) {
                $('#myaccount_data_container').html(data);
                $('#myaccount_data_container form').jqTransform();
            }
        });

    });

    /* Used when user add anything to my favorite list. */
    $('a.add_to_favorite,.forum_post_fan').unbind('click');
    $('a.add_to_favorite,.forum_post_fan').live("click", function() {
        var ifLogin = $("#userLogin").val();
        if (ifLogin == "") {
            window.location.href = "/user/loginWindow";
        } else {
            var id = $(this).attr("id");
            var id_str = $(this).attr("id");
            var item_name = $(this).attr("name");

            var str_arr = id_str.split("_");
            //alert(ifLogin); alert(str_arr);return false;
            $.ajax({
                url: '/sbt/addToMyFavorite?id=' + id + '&item_name=' + item_name,
                success: function(data) {

                    if (str_arr[0] == 'analysis') {
                        var img_fav = '<img width="85" src="/images/new_home/fav_put.png" alt="photo" />';
                        $("#f_analysis").html(img_fav);
                    }
                    if (str_arr[0] == 'article') {
                        var img_fav = '<img width="85" src="/images/new_home/fav_put.png" alt="photo" />';
                        $("#f_article").html(img_fav);
                    }
                    if (str_arr[0] == 'forum') $("#f_forum").html('<span class="float_left added_to_favorite" style="float:right;">' + data + '</span>');
                    if (str_arr[0] == 'blog') {
                        var img_fav = '<img width="85" src="/images/new_home/blog_fav_put.png" alt="photo" />';
                        $("#f_blog").html(img_fav);
                    }
                    window.location.href = window.location.href;
                }
            });
        }
    });


    /* Used for pagination on my favorite page. */
    /*$('.all_favorite_pagination a').unbind('click');	
    $('.all_favorite_pagination a').live("click",function(){   
		
        var id = $(this).parent().attr("id");
        var page = $(this).attr("id");
		
        var pagination_numbers = $('#'+id).html();
        $('#'+id).html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
		
        $.ajax({
            url:'/sbt/fetchMoreFavoriteRecords?id='+id+'&page='+page,
            success:function(data)
            {
                if(id == 'fav_analysis_listing') $("#analysis_fav_list").html(data);
                if(id == 'fav_article_listing') $("#article_fav_list").html(data);
                if(id == 'fav_forum_listing') $("#forum_fav_list").html(data);
                if(id == 'fav_blog_listing') $("#blog_fav_list").html(data);
            }
        });		
    });*/


    /* Used to list logged-In users favourite article pagination code */
    $('.all_favorite_pagination a').unbind('click');
    $('.all_favorite_pagination a').live("click", function() {
        var id = $(this).parent().attr("id");
        var column_id = $('#column_id').val();
        var page = $(this).attr("id");
        var current_column_order = $('#bloglist_current_column_order').val();
        var pagination_numbers = $('#' + id).html();
        //$('#'+id).html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        //$('#'+id).html(pagination_numbers+'<span class="" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');
        $('#' + id).html(pagination_numbers + '');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $.ajax({
            url: '/sbt/fetchMoreFavoriteRecords?id=' + id + '&column_id=' + column_id + '&page=' + page + '&bloglist_current_column_order=' + current_column_order, //?page='+page,
            success: function(data) {
                if (id == 'fav_analysis_listing') $("#analysis_fav_list").html(data);
                $('#analysis_fav_list').jqTransform();
                if (id == 'fav_article_listing') $("#article_fav_list").html(data);
                $('#article_fav_list').jqTransform();
                if (id == 'fav_forum_listing') $("#forum_fav_list").html(data);
                $('#forum_fav_list').jqTransform();
                if (id == 'fav_blog_listing') $("#blog_fav_list").html(data);
                $('#blog_fav_list').jqTransform();
                if (id == 'fav_chart_listing') $("#chart_fav_list").html(data);
                $('#myaccount_data_container form').jqTransform();
                $('.indicator').hide();
                $('#pop-box-over').hide();
            }
        });
    });

    /* Used to list logged-In users favourite article column sorting code */
    /*$('#article_fav_list table tr th, #forum_fav_list table tr th, #blog_fav_list table tr th, #chart_fav_list table tr th').unbind('click');
    $('#article_fav_list table tr th, #forum_fav_list table tr th, #blog_fav_list table tr th, #chart_fav_list table tr th').live("click",function(){
        var column_id = $(this).attr("id");
        var column_name  = $('#'+column_id).html();
        var id = $(this).parent().parent().parent().attr('summary');
        $.post('/sbt/fetchMoreFavoriteRecords?id='+id+'&column_id='+column_id, function(data){
            if(id == 'fav_analysis_listing') $("#analysis_fav_list").html(data);
            if(id == 'fav_article_listing') $("#article_fav_list").html(data);
            if(id == 'fav_forum_listing') $("#forum_fav_list").html(data);
            if(id == 'fav_blog_listing') $("#blog_fav_list").html(data);
            if(id == 'fav_chart_listing') $("#chart_fav_list").html(data);                
            $('.pinkbg small_pinkbg width_658').css('height','auto');			
            $('#'+column_id).html(column_name);
            var order = $('#bloglist_current_column_order').val();
            setFavouriteArticleListOrderImage(column_id,order);
        });
    });*/

    /* Used for sorting according to column favourite article dropdown. */
    $('.favourite_article_listing_column_row_all_active_subscription li span, .favourite_forum_listing_column_row_all_active_subscription li span, .favourite_blog_listing_column_row_all_active_subscription li span, .favourite_chart_listing_column_row_all_active_subscription li span').unbind('click');
    $('.favourite_article_listing_column_row_all_active_subscription li span, .favourite_forum_listing_column_row_all_active_subscription li span, .favourite_blog_listing_column_row_all_active_subscription li span, .favourite_chart_listing_column_row_all_active_subscription li span').live("click", function() {
        var column_id = $(this).attr("id");
        var column_name = $('#' + column_id).html();
        var id = $(this).attr('summary');
        $.post('/sbt/fetchMoreFavoriteRecords?id=' + id + '&column_id=' + column_id, function(data) {
            if (id == 'fav_analysis_listing') $("#analysis_fav_list").html(data);
            $('#analysis_fav_list').jqTransform();
            if (id == 'fav_article_listing') $("#article_fav_list").html(data);
            $('#article_fav_list').jqTransform();
            if (id == 'fav_forum_listing') $("#forum_fav_list").html(data);
            $('#forum_fav_list').jqTransform();
            if (id == 'fav_blog_listing') $("#blog_fav_list").html(data);
            $('#blog_fav_list').jqTransform();
            if (id == 'fav_chart_listing') $("#chart_fav_list").html(data);
            $('.pinkbg small_pinkbg width_658').css('height', 'auto');
            $('#' + column_id).html(column_name);
            var order = $('#bloglist_current_column_order').val();
            setFavouriteArticleListOrderImage(column_id, order);
        });
    });

    function setFavouriteArticleListOrderImage(column_id, order) {
        if (column_id == 'sortby_srno') $('#sortby_srno').html('<span class="float_right">Nr</span>');
        if (column_id == 'sortby_article') $('#sortby_subscription').html('<span class="float_left">Artikelrubrik</span>');
    }

    $('#article_fav_list input[type=radio], #forum_fav_list input[type=radio], #blog_fav_list input[type=radio]').unbind('click');
    $('#article_fav_list input[type=radio], #forum_fav_list input[type=radio], #blog_fav_list input[type=radio]').live("click", function() {
        //alert($(this).attr('id')+'==='+$(this).val());  
        var radio_id = $(this).attr('id');
        var radio_value = $(this).val();
        var id = $(this).parent().attr('id');
        $.ajax({
            url: '/sbt/sbtMinProfileSaveENewsLetter?id=' + radio_id + '&val=' + radio_value,
            success: function(data) {
                if (id == 'article_radio') {
                    $('#article_fav_reply').html('Saved Changes succesfully.');
                } else if (id == 'forum_radio') {
                    $('#forum_fav_reply').html('Saved Changes succesfully.');
                } else if (id == 'blog_radio') {
                    $('#blog_fav_reply').html('Saved Changes succesfully.');
                }

            }
        });
    });

    /* Used to list logged-In users e - newsletter subscription. */
    $('#account_links #my_e_newsletter').unbind('click');
    $('#account_links #my_e_newsletter').live("click", function() {

        $('#myaccount_data_container').html('<span class="float_left" style="text-align:center; padding-bottom:10px; width:100%;"><img src="/images/indicator.gif" /></span>');
        if ($('#account_links').hasClass('hide-show')) {
            $('.om_miginfo').hide();
        }
        $.ajax({
            url: '/sbt/sbtMinProfileMyENewsLetter',
            success: function(data) {
                $('#myaccount_data_container').html(data);
                $('#myaccount_data_container form').jqTransform();
            }
        });

    });

    /* Used to list logged-In users subscription. */
    $('#account_links #my_subscription').unbind('click');
    $('#account_links #my_subscription').live("click", function() {

        $('#myaccount_data_container').html('<span class="float_left" style="text-align:center; padding-bottom:10px; width:100%;"><img src="/images/indicator.gif" /></span>');
        if ($('#account_links').hasClass('hide-show')) {
            $('.om_miginfo').hide();
        }
        $.ajax({
            url: '/sbt/sbtMinProfileMySubscription',
            success: function(data) {
                $('#myaccount_data_container').html(data);
            }
        });

    });

    /* Used to list all the request to the logged-In user. */
    $('#account_links #request_to_me').unbind('click');
    $('#account_links #request_to_me').live("click", function() {

        var id = $(this).attr("name");

        $('#myaccount_data_container').html('<span class="float_left" style="text-align:center; padding-bottom:10px; width:100%;"><img src="/images/indicator.gif" /></span>');

        $.ajax({
            url: '/sbt/viewAllRequest?id=' + id,
            success: function(data) {
                $('#myaccount_data_container').html(data);
            }
        });

    });

    /* Used to list all the blocked users. */
    $('#account_links #blocked_users').unbind('click');
    $('#account_links #blocked_users').live("click", function() {

        var id = $(this).attr("name");

        $('#myaccount_data_container').html('<span class="float_left" style="text-align:center; padding-bottom:10px; width:100%;"><img src="/images/indicator.gif" /></span>');
        if ($('#account_links').hasClass('hide-show')) {
            $('.om_miginfo').hide();
        }
        $.ajax({
            url: '/sbt/blockedUser?id=' + id,
            success: function(data) {
                $('#myaccount_data_container').html(data);
            }
        });

    });

    /* Used to set visibility of profile. */
    $('#account_links #profile_visibility').unbind('click');
    $('#account_links #profile_visibility').live("click", function() {

        var id = $(this).attr("name");

        $('#myaccount_data_container').html('<span class="float_left" style="text-align:center; padding-bottom:10px; width:100%;"><img src="/images/indicator.gif" /></span>');
        if ($('#account_links').hasClass('hide-show')) {
            $('.om_miginfo').hide();
        }
        $.ajax({
            url: '/sbt/sbtMinProfileVisibility?id=' + id,
            success: function(data) {
                $('#myaccount_data_container').html(data);
                $('#myaccount_data_container form').jqTransform();
            }
        });

    });

    /* Used to list logged-In users subscription pagination code */
    $('.all_my_subscription_pagination a').unbind('click');
    $('.all_my_subscription_pagination a').live("click", function() {
        var column_id = $('#column_id').val();
        var page = $(this).attr("id");
        var current_column_order = $('#bloglist_current_column_order').val();
        var pagination_numbers = $('.all_my_subscription_pagination').html();
        //$('.all_my_subscription_pagination').html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        //$('.all_my_subscription_pagination').html(pagination_numbers+'<span class="" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');
        $('.all_my_subscription_pagination').html(pagination_numbers + '');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $.ajax({
            url: '/sbt/fetchMoreMySubscription?column_id=' + column_id + '&page=' + page + '&bloglist_current_column_order=' + current_column_order, //?page='+page,
            success: function(data) {
                $('#my_subscription_list').html(data);
                $('.indicator').hide();
                $('#pop-box-over').hide();
            }
        });
    });

    /* Used to list logged-In users subscription column sorting code */
    /*$('#my_subscription_list table tr th').unbind('click');
    $('#my_subscription_list table tr th').live("click",function(){
        var column_id = $(this).attr("id");
        var column_name  = $('#'+column_id).html();

        $.post("/sbt/fetchMoreMySubscription?column_id="+column_id, function(data){

            $('#my_subscription_list').html(data);
            $('.pinkbg small_pinkbg width_658').css('height','auto');
			
            $('#'+column_id).html(column_name);
            var order = $('#bloglist_current_column_order').val();
            setSubscriptionListOrderImage(column_id,order);
        });
    });    */

    /* Used for sorting according to column dropdown. */
    $('.blog_topic_listing_column_row_all_subscription li span').unbind('click');
    $('.blog_topic_listing_column_row_all_subscription li span').live("click", function() {
        var column_id = $(this).attr("id");
        var column_name = $('#' + column_id).html();
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $.post("/sbt/fetchMoreMySubscription?column_id=" + column_id, function(data) {
            $('#my_subscription_list').html(data);
            $('.pinkbg small_pinkbg width_658').css('height', 'auto');
            $('.indicator').hide();
            $('#pop-box-over').hide();
            $('#' + column_id).html(column_name);
            var order = $('#bloglist_current_column_order').val();
            setSubscriptionListOrderImage(column_id, order);
        });
    });

    /* Used to list logged-In users Active subscription. */
    $('.all_my_active_subscription_pagination a').unbind('click');
    $('.all_my_active_subscription_pagination a').live("click", function() {
        var column_id = $('#column_id').val();
        var page = $(this).attr("id");
        var current_column_order = $('#bloglist_current_column_order').val();
        var pagination_numbers = $('.all_my_subscription_pagination').html();
        //$('.all_my_active_subscription_pagination').html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        //$('.all_my_active_subscription_pagination').html(pagination_numbers+'<span class="" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');	
        //$('.all_my_active_subscription_pagination').html(pagination_numbers+'');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $.ajax({
            url: '/sbt/fetchMoreMyActiveSubscription?column_id=' + column_id + '&page=' + page + '&bloglist_current_column_order=' + current_column_order, //?page='+page,
            success: function(data) {
                $('#my_active_subscription_list').html(data);
                $('.indicator').hide();
                $('#pop-box-over').hide();
            }
        });
    });


    /* Used to list logged-In users Active subscription column sorting code */
    /*$('#my_active_subscription_list table tr th').unbind('click');
    $('#my_active_subscription_list table tr th').live("click",function(){
        var column_id = $(this).attr("id");
        var column_name  = $('#'+column_id).html();

        $.post("/sbt/fetchMoreMyActiveSubscription?column_id="+column_id, function(data){

            $('#my_active_subscription_list').html(data);
            $('.pinkbg small_pinkbg width_658').css('height','auto');
			
            $('#'+column_id).html(column_name);
            var order = $('#bloglist_current_column_order').val();
            setSubscriptionListOrderImage(column_id,order);
        });
    });   */

    /* Used for sorting according to column dropdown. Active subscription */
    $('.blog_topic_listing_column_row_all_active_subscription li span').unbind('click');
    $('.blog_topic_listing_column_row_all_active_subscription li span').live("click", function() {
        var column_id = $(this).attr("id");
        var column_name = $('#' + column_id).html();

        $.post("/sbt/fetchMoreMyActiveSubscription?column_id=" + column_id, function(data) {
            $('#my_active_subscription_list').html(data);
            $('.pinkbg small_pinkbg width_658').css('height', 'auto');

            $('#' + column_id).html(column_name);
            var order = $('#bloglist_current_column_order').val();
            setSubscriptionListOrderImage(column_id, order);
        });
    });

    function setSubscriptionListOrderImage(column_id, order) {
        if (column_id == 'sortby_srno') $('#sortby_srno').html('<span class="float_right">Nr</span>');
        if (column_id == 'sortby_subscription') $('#sortby_subscription').html('<span class="float_left">Abonnemang</span>');
        if (column_id == 'sortby_start_date') $('#sortby_start_date').html('<span class="float_left">Startdatum</span>');
        if (column_id == 'sortby_end_date') $('#sortby_reply').html('<span class="float_right">Stopdatum</span>');
        if (column_id == 'sortby_status') $('#sortby_status').html('<span class="float_left">Status</span>');
    }


    function setOrderImage(column_id, order) {
        if (column_id == 'sortby_srno') $('#sortby_srno').html('<span class="float_right">Nr</span>');
        if (column_id == 'sortby_subscription') $('#sortby_subscription').html('<span class="float_left">Abonnemang</span>');
        if (column_id == 'sortby_start_date') $('#sortby_start_date').html('<span class="float_left">Datum</span>');
    }

    /* Used to list logged-In users orders. */
    $('#account_links #invoice_records').unbind('click');
    $('#account_links #invoice_records').live("click", function() {

        $('#myaccount_data_container').html('<span class="float_left" style="text-align:center; padding-bottom:10px; width:100%;"><img src="/images/indicator.gif" /></span>');
        //$('#pop-box-over').show();
        //$('.indicator').css('display','block');
        if ($('#account_links').hasClass('hide-show')) {
            $('.om_miginfo').hide();
        }
        $.ajax({
            url: '/sbt/sbtMinProfileInvoice?id=4265',
            success: function(data) {
                $('#myaccount_data_container').html(data);
                //$('.indicator').hide();
                //$('#pop-box-over').hide();
            }
        });
    });


    /* Used to list logged-In users order pagination code */
    $('.all_my_order_pagination a').unbind('click');
    $('.all_my_order_pagination a').live("click", function() {
        var column_id = $('#column_id').val();
        var page = $(this).attr("id");
        var current_column_order = $('#bloglist_current_column_order').val();
        var pagination_numbers = $('.all_my_order_pagination').html();
        //$('.all_my_order_pagination').html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        //$('.all_my_order_pagination').html(pagination_numbers+'<span class="" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');
        $('.all_my_order_pagination').html(pagination_numbers + '');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $.ajax({
            url: '/sbt/sbtMinProfileInvoicePartial?id=4265&column_id=' + column_id + '&page=' + page + '&bloglist_current_column_order=' + current_column_order, //?page='+page,
            success: function(data) {
                $('#my_order_list').html(data);
                $('.indicator').hide();
                $('#pop-box-over').hide();
            }
        });
    });

    /* Used to list logged-In users order column sorting code */
    /*$('#my_order_list table tr th').unbind('click');
    $('#my_order_list table tr th').live("click",function(){
        var column_id = $(this).attr("id");
        var column_name  = $('#'+column_id).html();

        $.post("/sbt/sbtMinProfileInvoicePartial?id=4265&column_id="+column_id, function(data){

            $('#my_order_list').html(data);
            $('.pinkbg small_pinkbg width_658').css('height','auto');
			
            $('#'+column_id).html(column_name);
            var order = $('#bloglist_current_column_order').val();
            setOrderImage(column_id,order);
        });
    });    */

    /* Used for sorting according to column dropdown. */
    $('.blog_topic_listing_column_row_all_order li span').unbind('click');
    $('.blog_topic_listing_column_row_all_order li span').live("click", function() {
        var curUser_id = $("#current_user").val();
        var column_id = $(this).attr("id");
        var column_name = $('#' + column_id).html();
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $.post("/sbt/sbtMinProfileInvoicePartial?id=" + curUser_id + "&column_id=" + column_id, function(data) {
            $('#my_order_list').html(data);
            $('.pinkbg small_pinkbg width_658').css('height', 'auto');
            $('.indicator').hide();
            $('#pop-box-over').hide();
            $('#' + column_id).html(column_name);
            var order = $('#bloglist_current_column_order').val();
            setOrderImage(column_id, order);
        });
    });

    /* Used while send a payment request after confirmation. */
    $('#payment_conformation').unbind('click');
    $('#payment_conformation').live("click", function() {

        console.log("test");

        // echo('test_click');
        // exit;

        var pay_option = $("input[@name='pay_option']:checked").val();
        var pay_option_bank = $(".bank_selection_outer input[@name='pay_option_bank']:checked").val();

        // echo(pay_option);
        // exit;

        //alert(pay_option+' '+pay_option_bank);

        var para_str = '';

        if (pay_option == 1) para_str = '/typ/' + pay_option;
        if (pay_option == 2) para_str = '/typ/' + pay_option + '/bk/' + pay_option_bank;
        console.log('http://' + window.location.hostname + '/borst_shop/shopPaymentDone' + para_str);
        window.location = 'http://' + window.location.hostname + '/borst_shop/shopPaymentDone' + para_str;
    });

    /* Used while send a article payment request after confirmation. */
    $('#article_payment_conformation').unbind('click');
    $('#article_payment_conformation').live("click", function() {

        var pay_option = $("input[@name='pay_option']:checked").val();
        var pay_option_bank = $(".bank_selection_outer input[@name='pay_option_bank']:checked").val();

        //alert(pay_option+' '+pay_option_bank);

        var para_str = '';

        if (pay_option == 1) para_str = '/typ/' + pay_option;
        if (pay_option == 2) para_str = '/typ/' + pay_option + '/bk/' + pay_option_bank;

        window.location = 'http://' + window.location.hostname + '/borst_shop/shopArticlePaymentDone' + para_str;
    });

    /* Used while send a payment request after confirmation. */
    $('a.save_mail_bill').unbind('click');
    $('a.save_mail_bill').live("click", function() {

        var id = $(this).attr("id");
        var purchase_id = $(this).attr("name");

        if (id == 'save_receipt') {
            window.location = 'http://' + window.location.hostname + '/borst_shop/saveAsPdf?purchase_id=' + purchase_id + '&receipt=1'
        }
        if (id == 'save_receipt_article') {
            window.location = 'http://' + window.location.hostname + '/borst_shop/saveAsPdf?purchase_id=' + purchase_id + '&receipt=1' + '&individual_article=1'
        }

        if (id == 'e_bill') {
            $.ajax({
                url: '/email/sendInvoiceToUser?purchase_id=' + purchase_id,
                success: function(data) {
                    $('#pdf_send_report').html('Mail sent');
                }
            });
        }

        if (id == 'save_invoice') {
            window.location = 'http://' + window.location.hostname + '/borst_shop/saveAsPdf?purchase_id=' + purchase_id + '&receipt=0'
        }

        if (id == 'save_invoice_article') {
            window.location = 'http://' + window.location.hostname + '/borst_shop/saveAsPdf?purchase_id=' + purchase_id + '&receipt=0' + '&individual_article=1'
        }

        if (id == 'print_invoice') {
            var o = $("#invoice_data");
            o.jqprint();
        }

        if (id == 'print_receipt') {
            var o = $("#receipt_data");
            o.jqprint();
        }
    });


    /* Used while send a payment request after confirmation. */
    $('.blog_list_of_month a').unbind('click');
    $('.blog_list_of_month a').live("click", function() {

        var blog_id = $(this).attr("name");

        $('#blog_detail_div').html('<span class="float_left" style="text-align:center; width:100%; height:20px;"><img src="/images/indicator.gif" /></span>');

        $.get("/sbt/showOneBlog?blog_id=" + blog_id, function(data) {
            $('#blog_detail_div').html(data);
        });
    });

    /* Used when user selects weither he wants to write analysis or blog. */
    $('.article_content ul.select_option li a').unbind('click');
    $('.article_content ul.select_option li a').live("click", function() {

        var id = $(this).attr("name");

        if (id == 'blog') {
            $('#blog_selected').addClass("activelink");
            $('#analysis_selected').removeClass("activelink");
        } else {
            $('#analysis_selected').addClass("activelink");
            $('#blog_selected').removeClass("activelink");
        }

        $('.article_content ul li #blog_article').val(id);
        var div_id = $('#blog_article').val();
        $('#blog_or_analysis').val(div_id);
        switch_create_div();
    });

    /* Used for blog listing for blogtoplist, sorting according to column. */
    $('#blogtoplist_column_row a').unbind('click');
    $('#blogtoplist_column_row a').live("click", function() {
        var column_id = $(this).attr("id");
        var column_name = $('#' + column_id).html();
        var blog_view_type = $('#blog_view_type').val();

        //$("#blogtoplist_topic_list").find("tr:gt(0)").remove();
        $("#blogtoplist_topic_list").html('');
        $("#blogtoplist_list_page .paginationwrapper").remove();
        //$("#blogtoplist_topic_list").find("tr:eq(1)").html('<td colspan="4" width="100%" align="center"><span class="" style="text-align:center; width:100%;"><img src="/images/indicator.gif" /></span></td>');

        $("#blogtoplist_topic_list").html('<ul><li style="width:100%;text-align:center;"><img src="/images/indicator.gif" /></li></ul>');
        //		$(".dummy2").html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        $.post("/sbt/getBlogTopListData?column_id=" + column_id + '&blog_view_type=' + blog_view_type, function(data) {
            $('.dummy1').hide();
            $('.pinkbg small_pinkbg width_658').css('height', 'auto');
            $('#blogtoplist_list_page').html(data);
            $('#' + column_id).html(column_name);
            var order = $('#blogtoplist_current_column_order').val();
            setBlogTopListOrderImage(column_id, order);
        });
    });

    /* Used for blog listing for blogtoplist page pagination. */
    $('#blogtoplist_listing a').unbind('click');
    $('#blogtoplist_listing a').live("click", function() {

        var column_id = $('#column_id').val();
        var page = $(this).attr("id");
        var current_column_order = $('#blogtoplist_current_column_order').val();
        var blog_view_type = $('#blog_view_type').val();

        var pagination_numbers = $('#blogtoplist_listing').html();
        $('#blogtoplist_listing').html('<span class="float_right">' + pagination_numbers + '</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        $(".dummy2").html('<span class="float_right">' + pagination_numbers + '</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        $.post("/sbt/getBlogTopListData?column_id=" + column_id + "&page=" + page + "&blogtoplist_current_column_order=" + current_column_order + '&blog_view_type=' + blog_view_type, function(data) {
            $('.dummy1').hide();
            $('.pinkbg small_pinkbg width_658').css('height', 'auto');
            $('#blogtoplist_list_page').html(data);

            setBlogTopListOrderImage('sortby_' + column_id, current_column_order);
        });
    });

    /* Used for analysis listing for analysistoplist, sorting according to column. */
    $('#analysistoplist_column_row a').unbind('click');
    $('#analysistoplist_column_row a').live("click", function() {
        var column_id = $(this).attr("id");
        var column_name = $('#' + column_id).html();
        var analysis_view_type = $('#analysis_view_type').val();

        $("#analysistoplist_topic_list").html("");
        $("#analysistoplist_list_page .paginationwrapper").remove();
        //$("#analysistoplist_topic_list").find("tr:eq(1)").html('<td colspan="4" width="100%" align="center"><span class="" style="text-align:center; width:100%;"><img src="/images/indicator.gif" /></span></td>');
        $("#analysistoplist_topic_list").html('<ul><li style="text-align:center; width:100%;"><img src="/images/indicator.gif" /></li></ul>');
        //		$(".dummy2").html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        $.post("/sbt/getAnalysisTopListData?column_id=" + column_id + '&analysis_view_type=' + analysis_view_type, function(data) {
            $('.dummy1').hide();
            $('.pinkbg').css('height', 874);
            $('#analysistoplist_list_page').html(data);
            $('#' + column_id).html(column_name);
            var order = $('#analysistoplist_current_column_order').val();
            setAnalysisTopListOrderImage(column_id, order);
        });
    });

    /* Used for blog listing for blogtoplist page pagination. */
    $('#analysistoplist_listing a').unbind('click');
    $('#analysistoplist_listing a').live("click", function() {

        var column_id = $('#column_id').val();
        var page = $(this).attr("id");
        var current_column_order = $('#analysistoplist_current_column_order').val();
        var analysis_view_type = $('#analysis_view_type').val();

        var pagination_numbers = $('#analysistoplist_listing').html();
        $('#analysistoplist_listing').html('<span class="float_right">' + pagination_numbers + '</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        $(".dummy2").html('<span class="float_right">' + pagination_numbers + '</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        $.post("/sbt/getAnalysisTopListData?column_id=" + column_id + "&page=" + page + "&analysistoplist_current_column_order=" + current_column_order + '&analysis_view_type=' + analysis_view_type, function(data) {
            $('.dummy1').hide();
            $('.pinkbg small_pinkbg width_658').css('height', 'auto');
            $('#analysistoplist_list_page').html(data);

            setAnalysisTopListOrderImage('sortby_' + column_id, current_column_order);
        });
    });

    /* Used for article listing for articletoplist, sorting according to column. */
    $('#articletoplist_column_row a').unbind('click');
    $('#articletoplist_column_row a').live("click", function() {

        var column_id = $(this).attr("id");
        var column_name = $('#' + column_id).html();
        var article_view_type = $('#article_view_type').val();

        //$("#articletoplist_topic_list").html('');
        $("#articletoplist_list_page .paginationwrapper").remove();
        //$("#articletoplist_topic_list").find("tr:eq(1)").html('<td colspan="4" width="100%" align="center"><span class="" style="text-align:center; width:100%;"><img src="/images/indicator.gif" /></span></td>');
        $("#articletoplist_topic_list").html('<ul><li style="text-align:center; width:100%;"><img src="/images/indicator.gif" /></li></ul>');
        //$(".dummy2").html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');

        $.post("/sbt/getArticleTopListData?column_id=" + column_id + '&article_view_type=' + article_view_type, function(data) {
            $('.dummy1').hide();
            $('.pinkbg small_pinkbg width_658').css('height', 'auto');
            $('#articletoplist_list_page').html(data);
            $('#' + column_id).html(column_name);
            var order = $('#articletoplist_current_column_order').val();
            setArticleTopListOrderImage(column_id, order);
        });
    });

    /* Used for article listing for articletoplist page pagination. */
    $('#articletoplist_listing a').unbind('click');
    $('#articletoplist_listing a').live("click", function() {


        var column_id = $('#column_id').val();
        var page = $(this).attr("id");
        var current_column_order = $('#articletoplist_current_column_order').val();
        var article_view_type = $('#article_view_type').val();

        var pagination_numbers = $('#articletoplist_listing').html();
        $('#articletoplist_listing').html('<span class="float_right">' + pagination_numbers + '</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        $(".dummy2").html('<span class="float_right">' + pagination_numbers + '</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        $.post("/sbt/getArticleTopListData?column_id=" + column_id + "&page=" + page + "&articletoplist_current_column_order=" + current_column_order + '&article_view_type=' + article_view_type, function(data) {
            $('.dummy1').hide();
            $('.pinkbg small_pinkbg width_658').css('height', 'auto');
            $('#articletoplist_list_page').html(data);

            setArticleTopListOrderImage('sortby_' + column_id, current_column_order);
        });

    });

    /* Used for user listing for usertoplist, sorting according to column. */
    $('#usertoplist_column_row a').unbind('click');
    $('#usertoplist_column_row a').live("click", function() {


        var column_id = $(this).attr("id");
        var column_name = $('#' + column_id).html();
        var user_view_type = $('#user_view_type').val();


        $("#usertoplist_topic_list").html('');
        $("#usertoplist_list_page .paginationwrapper").remove();
        //$("#usertoplist_topic_list").find("tr:eq(1)").html('<td colspan="4" width="100%" align="center"><span class="" style="text-align:center; width:100%;"><img src="/images/indicator.gif" /></span></td>');

        $("#usertoplist_topic_list").html('<ul><li style="text-align:center; width:100%;"><img src="/images/indicator.gif" /></li></ul>');
        //	$(".dummy2").html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        $.post("/sbt/getUserTopListData?column_id=" + column_id + '&user_view_type=' + user_view_type, function(data) {
            $('.dummy1').hide();
            $('#usertoplist_list_page').html(data);
            $('#' + column_id).html(column_name);
            var order = $('#usertoplist_current_column_order').val();
            setUserTopListOrderImage(column_id, order);
        });

    });

    /* Used for user listing for usertoplist page pagination. */
    $('#usertoplist_listing a').unbind('click');
    $('#usertoplist_listing a').live("click", function() {

        var column_id = $('#column_id').val();
        var page = $(this).attr("id");
        var current_column_order = $('#usertoplist_current_column_order').val();
        var user_view_type = $('#user_view_type').val();

        var pagination_numbers = $('#usertoplist_listing').html();
        $('#usertoplist_listing').html('<span class="float_right">' + pagination_numbers + '</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        $(".dummy2").html('<span class="float_right">' + pagination_numbers + '</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        $.post("/sbt/getUserTopListData?column_id=" + column_id + "&page=" + page + "&usertoplist_current_column_order=" + current_column_order + '&user_view_type=' + user_view_type, function(data) {
            $('.dummy1').hide();
            $('#usertoplist_list_page').html(data);

            setUserTopListOrderImage('sortby_' + column_id, current_column_order);
        });
    });

    /* Used when admin or creator of blog wants to delete the blog. */
    $('#myblog_list_page a.profile_bloglist_row').unbind('click');
    $('#myblog_list_page a.profile_bloglist_row').live("click", function() {
        var row_id = $(this).attr("name");
        confirmation_delete_blog(row_id);
    });

    /* Used when admin or creator of blog wants to delete the blog. */
    $('.blog1advrt a.profile_bloglist_row').unbind('click');
    $('.blog1advrt a.profile_bloglist_row').live("click", function() {
        var row_id = $(this).attr("name");
        confirmation_delete_blog_showallpage(row_id);
    });

    $('a.remove_blog').unbind('click');
    $('a.remove_blog').live("click", function() {
        var row_id = $(this).attr("name");
        confirmation_delete_blog_redirect_to_min_list(row_id);
    });

    $('#user_occ input').unbind('click');
    $('#user_occ input').live("click", function() {
        var id = $(this).val();

        var classname = $('#occ_container').attr('class');

        if (id == 'other') $('#occ_container').removeClass(classname).addClass('show_div');
        else $('#occ_container').removeClass(classname).addClass('hide_div');
    });

    /* Used when user wants to quote on any forum post.*/
    /*$('a.quote_on_forum_topic').unbind('click');	
	$('a.quote_on_forum_topic').live("click",function(){   

		$('html, body').scrollTo( $('#borst_forum_reply'));

		var post_id = $(this).attr("id");
		var auth_name = $(this).attr("name");
		$('#is_forum_topic').val(0);
		
		//if(is_topic == 'topic') $('#is_forum_topic').val(1);
		//else  $('#is_forum_topic').val(0);
		
		$.get("/forum/getForumPostData?editpost_id="+post_id, function(data){
			var q_start = '[QUOTE='+auth_name+':'+post_id+']';
			var q_end = '[/QUOTE]';
			tinyMCE.activeEditor.setContent(q_start+data+q_end);
			//$('#postid').val(post_id);
		});
	})*/



    //$('a.new_fprum_topic_text').unbind('click');	
    $('a.new_fprum_topic_text').live("click", function() {
        var _this = $(this);
        var cat_id = $('#forum_parent_tab').val();

        var sub_cat = $('#forum_sub_cat_id').val();
        if (sub_cat) sub_cat = sub_cat.replace('subcat_', '');

        if (!cat_id || cat_id == 'undefined' && sub_cat) {
            $('#forum_tabs').find("a").each(function(index) {
                var class_name = $(this).attr("class");
                if (class_name == 'selectedtab')
                    cat_id = $(this).attr("id");
            });
        }

        if (!cat_id) cat_id = 'cat_9';
        cat_id = cat_id.replace('cat_', '');

        $.ajax({
            url: '/forum/createForumTopic',
            success: function(data) {
                if (data != 0) {
                    $('#forum_content').html(data);
                    if (cat_id && cat_id < 9) {
                        $('#btforum_btforum_category_id').val(cat_id);

                        $('#btforum_category_error').html('');
                        $.get("/forum/getSbtSubCategory?cat_id=" + cat_id, function(data1) {
                            $('#btforum_subcategory_div').css({
                                'display': 'block',
                                'visibility': 'visible'
                            });
                            $('#btforum_category_error').html('');
                            $('#btforum_subcategory_div').html(data1);
                            if (sub_cat) $('#btforum_btforum_subcategory_id').val(sub_cat);
                        });
                    }


                } else {
                    window.location = 'http://' + window.location.hostname + '/user/loginWindow';
                }
                $(_this).find(".forum-menu-active-logo").addClass("forum-menu-active-logo-activated");
            }
        });

    });

    $('a.edit_forum_topic').live("click", function() {
        var cat_id = $('#forum_parent_tab').val();

        var sub_cat = $('#forum_sub_cat_id').val();
        if (sub_cat) sub_cat = sub_cat.replace('subcat_', '');

        if (!cat_id || cat_id == 'undefined' && sub_cat) {
            $('#forum_tabs').find("a").each(function(index) {
                var class_name = $(this).attr("class");
                if (class_name == 'selectedtab')
                    cat_id = $(this).attr("id");
            });
        }

        if (!cat_id) cat_id = 'cat_9';
        cat_id = cat_id.replace('cat_', '');

        $.ajax({
            url: '/forum/createForumTopic?id=' + $(this).attr('id'),
            success: function(data) {
                if (data != 0) {
                    $('#forum_content').html(data);
                    if (cat_id && cat_id < 9) {
                        $('#btforum_btforum_category_id').val(cat_id);

                        $('#btforum_category_error').html('');
                        $.get("/forum/getSbtSubCategory?cat_id=" + cat_id, function(data1) {
                            $('#btforum_subcategory_div').css({
                                'display': 'block',
                                'visibility': 'visible'
                            });
                            $('#btforum_category_error').html('');
                            $('#btforum_subcategory_div').html(data1);

                            if (sub_cat) $('#btforum_btforum_subcategory_id').val(sub_cat);
                        });
                    }
                } else {
                    window.location = 'http://' + window.location.hostname + '/user/loginWindow';
                }

            }
        });

    });

    /* Used while send a payment request after confirmation. */
    $("#user_country").live($.browser.msie ? 'click' : 'change', '', function() {
        setShippingCost();
    });

    $(function() {
        setYahooUpdates();
    });

    // code for sensex text color change depend on + or  - start here
    /*var omxVal = $('#omxval').html();
    var omx_up = omxVal.charAt(0);
    if(omx_up == '+'){
        $('.bt_head_percent').css('color', '#a6cc39');
    }else{
        $('.bt_head_percent').css('color', '#f15a22');
    }
        
    var spVal = $('#spval').html();
    var sp_up = spVal.charAt(0);
    if(sp_up == '+'){
        $('.bt_head_percent_down').css('color', '#a6cc39');
    }else{
        $('.bt_head_percent_down').css('color', '#f15a22');
    }*/
    // code for sensex text color change depend on + or  - end here

    /* Used for sorting profiler topics according to column */
    $('.blog_profiler_listing_column_row span').unbind('click');
    $('.blog_profiler_listing_column_row span').live("click", function() {
        var page = 1;
        var column_id = $(this).attr("id");
        //$('.forun_sorting_arrow').html('<span class="float_right"><img src="../images/indicator.gif" /></span>');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $.post("/sbt/getProfilerListData?column_id=" + column_id, function(data) {
            $('#blog_list_profiler_page').html(data);
            //$('#'+page).html(column_name);
            var order = $('#userlist_current_column_order').val();
            $('.indicator').hide();
            $('#pop-box-over').hide();
            setUserListOrderImage(page, order);
        });
    });

    // Code for remove left and right border of menu item when menu selected.
    $('.leftmenu li a').each(function() {
        if ($(this).hasClass('selected')) {
            var bgColor = $(this).css("background-color");
            $(this).find('span.right_border').css({
                "border-color": bgColor,
                "padding-top": "7px",
                "padding-bottom": "7px"
            });
            $(this).parent().prev().find('span.right_border').css({
                "border-color": bgColor,
                "padding-top": "7px",
                "padding-bottom": "7px"
            });
            //$(this).find('span').removeClass('right_border');
            //$(this).parent().prev().find('span').removeClass('right_border');
        }
        $(this).hover(function() {
                var bgColor = $(this).css("background-color");
                $(this).find('span.right_border').css({
                    "border-color": bgColor,
                    "padding-top": "7px",
                    "padding-bottom": "7px"
                });
                $(this).parent().prev().find('span.right_border').css({
                    "border-color": bgColor,
                    "padding-top": "7px",
                    "padding-bottom": "7px"
                });
                if ($(this).parent().prev().find('a').hasClass('selected')) {
                    var _this = $(this).parent().prev().find('a');
                    var bgColor = $(_this).css("background-color");
                    $(this).parent().prev().find('span.right_border').css({
                        "border-color": bgColor,
                        "padding-top": "7px",
                        "padding-bottom": "7px"
                    });
                }
                if ($(this).parent().next().find('a').hasClass('selected')) {
                    var _this = $(this).parent();
                    var bgColor = $(this).parent().next().find('a').css("background-color");
                    $(this).parent().find('span.right_border').css({
                        "border-color": bgColor,
                        "padding-top": "7px",
                        "padding-bottom": "7px"
                    });
                }
                //$(this).find('span').removeClass('right_border');
                //$(this).parent().prev().find('span').removeClass('right_border');
            },
            function() {
                if (!$(this).hasClass('selected')) {
                    if (!$(this).parent().next().find('a').hasClass('selected')) {
                        $(this).find('span').addClass('right_border');
                        $(this).find('span.right_border').css({
                            "border-color": "#ffffff",
                            "padding-top": "1px",
                            "padding-bottom": "1px"
                        });
                    }
                    if (!$(this).parent().prev().find('a').hasClass('selected')) {
                        $(this).parent().prev().find('span').addClass('right_border');
                        $(this).parent().prev().find('span.right_border').css({
                            "border-color": "#ffffff",
                            "padding-top": "1px",
                            "padding-bottom": "1px"
                        });
                    }
                } else {
                    //$(this).find('span').removeClass('right_border');
                    //  $(this).parent().prev().find('span').removeClass('right_border');

                    $(this).find('span.right_border').css({
                        "border-color": bgColor,
                        "padding-top": "7px",
                        "padding-bottom": "7px"
                    });
                    $(this).parent().prev().find('span.right_border').css({
                        "border-color": bgColor,
                        "padding-top": "7px",
                        "padding-bottom": "7px"
                    });
                }
            });
    });

    //Code for remove last line from the top nine article
    $(".top_nine_article li:last").find('.home_artline_centerdiv').remove();

    //submenu bottom arrow remove on hover
    var currentSelected = $(".submenuwrapper").find("a.selected");
    var fontColor = $('.submenuwrapper').find("a.selected").css("color");
    var bgColor = $(".submenuwrapper").find("a.selected").css("background-color");

    var currentSelected_active = $(".submenuwrapper").find("a.active");
    var fontColor_active = $('.submenuwrapper').find("a.active").css("color");
    var bgColor_active = $(".submenuwrapper").find("a.active").css("background-color");
    $('.submenuwrapper ul li a').each(function() {
        $(this).hover(function() { //alert($(currentSelected).size());
            $(currentSelected).css("background-color", bgColor);
            $(currentSelected).css("color", fontColor);
            $(currentSelected).removeClass("selected");

            $(currentSelected_active).css("background-color", bgColor_active);
            $(currentSelected_active).css("color", fontColor_active);
            $(currentSelected_active).removeClass("active");
        }, function() {
            $(currentSelected).addClass("selected");
            $(currentSelected_active).addClass("active");
        });
    });

    var thirdMenuselected = $(".navBar_third a.select");
    $('.navBar_third a').each(function() {
        $(this).hover(function() {
            $(thirdMenuselected).removeClass("select");
        }, function() {
            $(thirdMenuselected).addClass("select");
        });
    });

    //Code for click event for hide the cookie area from home page.   
    checkCookie();

    function checkCookie() {
        var user = getCookie("userRegister");
        if (user == 1) {
            $('.cookie_bg').css('display', 'none');
        } else {
            $('.cookie_bg').css('display', 'block');
        }
    }

    $('#cookie_ok').click(function() {
        $('.cookie_bg').slideUp(1000);
        setCookie('userRegister', 1, 365);
    });

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    /*
     *  Code for sitemap page start here
     */
    $('.borstlink li .sitemap_2nd').hover(function() {
            $('.sitemap_btn_detail').hide();
            var menuID = $(this).attr('id');
            var menuID_split = menuID.split('_');
            $('#borstdetails_' + menuID_split[1]).show();
        },
        function() {
            $('.sitemap_detail').hide();
        });

    $('.sitemap_3rd').hover(function() {
            var sitemapID = $(this).attr('id');
            var sitemapID_split = sitemapID.split('_');
            $('.sitemap_detail_text_bg').show();
            $('#sitemap_detail_' + sitemapID_split[1]).show();
        },
        function() {
            $('.sitemap_detail_text_bg').hide();
            $('.sitemap_detail_text').hide();
        });

    $('.sitemap_plus').hover(function() {
            $('.sitemap_plus_detail').show();
            $('.sitemap_detail_text').show();
        },
        function() {
            $('.sitemap_plus_detail').hide();
            $('.sitemap_detail_text').hide();
        });

    $('.sitemap_button_subwrap').hover(function() {
            $('.sitemap_img').css('opacity', '0.1');
        },
        function() {
            $('.sitemap_img').css('opacity', '1');
        });

    $('.sitemap_button_subwrap li').hover(function() {
            var sitemap_btnID = $(this).attr('id');
            var sitemap_btnID_split = sitemap_btnID.split('_');
            $('#sitemapbtnhometext_' + sitemap_btnID_split[1]).show();
        },
        function() {
            $('.sitemap_btn_detail').hide();
        });
    /*
     *  Code for sitemap page end here
     */

    $('#show_signature').click(function() {
        $('#user_signature').attr('placeholder', 'Skriv din signatur här');
    });

    $('.load_article').live('click', function() {
        var pageno = $(this).attr('pageno');
        $('.loading_home').show();
        $.ajax({
            type: 'POST',
            url: '/borst/getMoreArticle?pageno=' + pageno,
            success: function(html) {
                $('.morearticle').append(html);
                $('#load_article_' + (pageno - 1)).remove();
                $('.loading_home').hide();
            }
        });
    });

    $('.load_article_details').live('click', function() {
        var pageno = $(this).attr('pageno');
        $('.loading_home').show();
        $.ajax({
            type: 'POST',
            url: '/borst/getMoreArticleDetails?pageno=' + pageno,
            success: function(html) {
                $('.morearticledetails').append(html);
                $('#load_article_details_' + (pageno - 1)).remove();
                $('.loading_home').hide();
            }
        });
    });

    $('#preview_data').click(function() {
        $('#show_forum_preview_box').prev('.ui-dialog-titlebar').hide();
        $('.ui-dialog').find('.ui-button').addClass('forum_preview_ok');
        $('.ui-dialog').find('.ui-button').removeClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only');
        $('.ui-dialog').find('.ui-dialog-buttonpane button').css('width', '45px');
        $('.ui-dialog').find('.ui-button-text').remove();
        $('.forum_preview_ok').hover(function() {
            $(this).removeClass('ui-state-hover ui-widget-content ui-state-hover ui-widget-header ui-state-hover ui-state-focus ui-widget-content ui-state-focus ui-widget-header ui-state-focus');
            $(this).addClass('forum_preview_ok');
        })

    });

    $('#show_blog_comment_div').each(function() {
        var commentpresent = $(this).find('.comment_messagewrapper');
        if (commentpresent.length > 0) {
            console.log('Comment present');
        } else {
            $('.blog_comment_main').css('margin-left', '0px');
        }
    });

}); // Ready event closes

function setServerTime(id, val, indexval, arrow) {
    $.ajax({
        url: '/borst/getTime',
        async: true,
        data: {
            id: id,
            val: val,
            indexval: indexval,
            arrow: arrow
        },
        success: function(data) {
            id = '#' + id;
            $(id).html(data);
        }
    });

}

function setYahooUpdates() {
    url = "https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20%28%22^OMXS30%22%29&env=store://datatables.org/alltableswithkeys";
    $.ajax({
        url: url,
        cache: false,
        success: function(data) {
            $(data).find('results').each(function() {
                var val = $(this).find('Change_PercentChange').text();
                var indexval = $(this).find('LastTradePriceOnly').text();
                var myArray = val.split(' ');
                var item1_text = parseFloat(myArray[myArray.length - 1]);
                var i = '<img src="/images/new_home/' + getArrow(item1_text) + '" alt=""  style="margin-right: 4px" width="32"/>';
                $("#omxval").html(myArray[myArray.length - 1]);
                $("#omxindexval").html(indexval);
                $("#omxarrow").html(i);
                setServerTime('omxtime', myArray[myArray.length - 1], indexval, getArrow(item1_text));

            });
        }
    });

    url = "https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20%28%22^gspc%22%29&env=store://datatables.org/alltableswithkeys";
    $.ajax({
        url: url,
        cache: false,
        success: function(data) {
            $(data).find('results').each(function() {
                var val = $(this).find('Change_PercentChange').text();
                var indexval = $(this).find('LastTradePriceOnly').text();
                var myArray = val.split(' ');
                var item1_text = parseFloat(myArray[myArray.length - 1]);
                var i = '<img src="/images/new_home/' + getArrow(item1_text) + '" alt=""  style="margin-right: 4px" width="32"/>';
                $("#spval").html(myArray[myArray.length - 1]);
                $("#spindexval").html(indexval);
                $("#sparrow").html(i);
                setServerTime('sptime', myArray[myArray.length - 1], indexval, getArrow(item1_text));
                $('.yahoovaluewr').show();

            });
        }
    });



    /*  url = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20%28%22USDSEK=X%22%29&env=store://datatables.org/alltableswithkeys";
                $.ajax({
                    url: url,
                    cache: false,
                    success: function(data){
                          $(data).find('results').each(function(){
                                 var item1_text = $(this).find('Change').text();
                                 $("#goldval").html(item1_text);
                            });
                    }
                });

                url = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20%28%22EURUSD=X%22%29&env=store://datatables.org/alltableswithkeys";
                $.ajax({
                    url: url,
                    cache: false,
                    success: function(data){
                          $(data).find('results').each(function(){
                                 var item1_text = $(this).find('Change').text();
                                 $("#oilval").html(item1_text);
                            });
                    }
                });*/
    //}

}

function padlength(what) {
    var output = (what.toString().length == 1) ? "0" + what : what
    return output
}

function getArrow(v) {
    var arrow = 'greenarrow';

    if ((new Number(v)) < 0) {
        arrow = 'redarrow';
        v = Math.abs(v);
    }
    if (v >= 0 && v <= 0.3) {
        return arrow + '_horiz.png';
    } else if (v >= 0.3 && v <= 1.5) {
        return arrow + '_45.png';
    } else if (v >= 1.5 && v <= 100) {
        return arrow + '_90.png';
    }

}

function showSearchCombos() {
    var typeid = $('#adv_search_type').val();
    var typeid = $('#adv_search_type').val();
    var stocklistid = $('#adv_search_stock_lista').val();
    var sectorid = $('#adv_search_sector').val();

    $.get("/borst/fromAdvSearchMarket?typeid=" + typeid + "&stocklistid=" + stocklistid + "&sectorid=" + sectorid, function(data) {
        $('#adv_search_combo_set').html(data);

        $('#adv_search_market').change(update_adv_search_combo);
        $('#adv_search_stock_lista').change(update_adv_search_combo);
        $('#adv_search_sector').change(update_adv_search_combo);
    });

}

function saveMyENewsletterChanges() {
    $('#my_e_newsletter_reply').html('');
    var user_Id = $('#user_id').val();
    var email_Id = $('#email').val();

    if (user_Id == '' && email_Id == '') {
        $('#my_e_newsletter_reply').addClass('redColor');
        $('#my_e_newsletter_reply').html('Du behöver logga in för att spara ändringen.');
        $('#my_e_newsletter_reply').fadeIn().delay(3000).fadeOut();
    } else {
        $.ajax({
            type: 'POST',
            data: $('#my_e_newsletter_form').serialize(),
            url: '/sbt/sbtMinProfileMyENewsLetter',
            success: function(data) {
                $('#my_e_newsletter_reply').addClass('darkgreencolor');
                $('#my_e_newsletter_reply').html('Ändringen sparad.');
            }
        });
    }
}

function saveMyENewsletterChangesDaily() {
    $("#my_e_newsletter_reply").html("");
    var t = $("#user_id").val(),
        e = $("#email").val();
    "" == t && "" == e ? ($("#my_e_newsletter_reply").addClass("redColor"), $("#my_e_newsletter_reply").html("Du behöver logga in för att spara ändringen."), $("#my_e_newsletter_reply").fadeIn().delay(3e3).fadeOut()) : $.ajax({
        type: "POST",
        data: $("#my_e_newsletter_form").serialize(),
        url: "/sbt/sbtMinProfileMyENewsLetterDaily",
        success: function(t) {
            $("#my_e_newsletter_reply").addClass("darkgreencolor"), $("#my_e_newsletter_reply").html("Ändringen sparad.")
        }
    })
}

function saveProfileVisibilityChanges() {
    $('#my_visibility_form_reply').html('');

    $.ajax({
        type: 'POST',
        data: $('#my_visibility_form').serialize(),
        url: '/sbt/sbtMinProfileVisibility',
        success: function(data) {
            $('#my_visibility_form_reply').html('Ändringen sparad.');
        }
    });
}

function removeItemFormFavoriteList(delete_id, id, cross_span_id) {
    var data_in_span = $('#' + cross_span_id).html();

    $('#' + cross_span_id).html('<span class="float_left" style="height:17px;">' + data_in_span + '</span>  <span class="float_left" style="padding-left:5px;height:17px;"><img src="/images/indicator.gif" /></span>');

    $.ajax({
        url: '/sbt/fetchMoreFavoriteRecords?id=' + id + '&delete_id=' + delete_id,
        success: function(data) {
            if (id == 'fav_analysis_listing') $("#analysis_fav_list").html(data);
            if (id == 'fav_article_listing') $("#article_fav_list").html(data);
            if (id == 'fav_forum_listing') $("#forum_fav_list").html(data);
            if (id == 'fav_blog_listing') $("#blog_fav_list").html(data);
            if (id == 'fav_chart_listing') $("#chart_fav_list").html(data);
        }
    });
}

function saveNotificatioChanges(id) {
    $('#analysis_fav_reply').html('');
    $('#article_fav_reply').html('');
    $('#forum_fav_reply').html('');
    $('#blog_fav_reply').html('');
    $.ajax({
        type: 'POST',
        data: $('#fav_' + id + '_form').serialize(),
        url: '/sbt/saveFavoriteNotificationChanges',
        success: function(data) {
            $('#' + id + '_fav_reply').html('Ändringen sparad.');
        }
    });
}

function checkForOnlyNumber(str) {
    var noalpha = /^[a-zA-Z]*$/;

    if (str == '' || str.length == 0) {
        return 'Required';
    }

    if (noalpha.test(str)) {
        return 'Invalid';
    } else return '';
}

function checkForOnlyCharacters(str) {
    var nonums = /^[0-9]*$/;

    if (str == '' || str.length == 0) {
        return 'Required';
    }

    if (nonums.test(str)) {
        return 'Invalid';
    } else return '';
}


function specialCharCheck(str) {
    var iChars = "!@#$%^&*()+=-[]\\\';,./{}|\":<>?";
    var error_flag = 0;

    if (str == '' || str.length == 0) {
        return 'Required';
    }

    for (var i = 0; i < str.length; i++) {
        if (iChars.indexOf(str.charAt(i)) != -1) {
            error_flag = 1;
            break;
        }
    }

    if (error_flag == 1) return 'Invalid';
    else return '';
}

// Used for getting the sub categories according to category.
function getSubCategory() {
    var cat_id = $('#btforum_btforum_category_id').val();
    if (cat_id < 1) $('#btforum_category_error').html('Vänligen välj kategori.');
    else {
        $('#btforum_category_error').html('');
        $('#btforum_category_error').html('<span class="float_left"><img src="../images/indicator.gif" /></span>');
        $.get("/forum/getSbtSubCategory?cat_id=" + cat_id, function(data) {
            $('#btforum_subcategory_div').css({
                'display': 'block',
                'visibility': 'visible'
            });
            $('#btforum_category_error').html('');
            $('#btforum_subcategory_div').html(data);
        });
    }
}

function setProfileMenuStatus(action_id, div_id) {

    var action_arr = Array('getSbtMinProfile', 'sbtMinProfileMessage', 'sbtMinProfileFriends', 'sbtMinProfileBlogPost', 'sbtMinProfileAllArticle', 'sbtMinProfileMeddelanden', 'sbtMinProfileMyAccount', 'sbtMinProfileAllArticle', 'sbtMinProfileForumPost', 'sbtMinProfileAllPost', 'sbtMinProfileMyFavorite');

    for (var i = 0; i < action_arr.length; i++) {
        var classname = $('#' + div_id + ' #' + action_arr[i]).attr('class');
        if (action_id == action_arr[i])
            $('#' + div_id + ' #' + action_arr[i]).removeClass(classname).addClass('selectedtab');
        else
            $('#' + div_id + ' #' + action_arr[i]).removeClass(classname).addClass('for_profile_menu');
    }
}

function setProfileMenuStatusForLeftLink(action_id, div_id) {
    var action_arr = Array('getSbtMinProfile', 'sbtMinProfileMessage', 'sbtMinProfileFriends', 'sbtMinProfileBlogPost', 'sbtMinProfileAllArticle', 'sbtMinProfileMeddelanden', 'sbtMinProfileMyAccount', 'sbtMinProfileAllArticle', 'sbtMinProfileForumPost', 'sbtMinProfileAllPost', 'sbtMinProfileMyFavorite');

    for (var i = 0; i < action_arr.length; i++) {
        var classname = $('#' + div_id + ' #' + action_arr[i]).attr('class');
        if (action_id == action_arr[i])
            $('#' + div_id + ' #' + action_arr[i]).removeClass(classname).addClass('selectedtab');
        else
            $('#' + div_id + ' #' + action_arr[i]).removeClass(classname).addClass('for_profile_menu');
    }
}

function update_combo(content_type) {
    var marketid = $('#sbt_analysis_market_id').val();
    var stocklistid = $('#sbt_analysis_stocklist_id').val();

    var blog_marketid = $('#sbt_user_blog_ublog_market_id').val();
    var blog_stocklistid = $('#sbt_user_blog_ublog_stocklist_id').val();

    var blog_article = $('#blog_article').val();
    if ($('#blog_article').length < 1)
        blog_article = 'blog';

    if (blog_article == 'analysis') {
        $.get("/sbt/fromMarket?marketid=" + marketid + "&stocklistid=" + stocklistid, function(data) {
            $('#combo_set').html(data);

            initCombos('analysis');
        });
    }
    if (blog_article == 'blog') {
        $.get("/sbt/forBlogMarket?marketid=" + blog_marketid + "&stocklistid=" + blog_stocklistid, function(data) {
            $('#combo_set').html(data);

            /* Initailise after every update. */
            /*$('#sbt_user_blog_ublog_market_id').unbind('change');
			$('#sbt_user_blog_ublog_stocklist_id').unbind('change');
			
			$('#sbt_user_blog_ublog_market_id').change(update_combo);
			$('#sbt_user_blog_ublog_stocklist_id').change(update_combo);*/
            initCombos('blog');
        });
    }
}

function update_typerow_combo() {
    var typeid = $('#adv_search_type').val();
    var marketid = $('#adv_search_market').val();
    var stockid = $('#adv_search_stock_lista').val();
    var sectorid = $('#adv_search_sector').val();



    //if(typeid==1)
    //{
    $('#combo_set').css({
        'display': 'block',
        'visibility': 'visible'
    });
    $('#first_row_obj').css({
        'display': 'none',
        'visibility': 'hidden'
    });

    $.get("/sbt/forAnalysisTypeShare?typeid=" + typeid + "&marketid=" + marketid + "&stockid=" + stockid + "&sectorid=" + sectorid, function(data) {
        $('#combo_set').html(data);

        initCombos('analysis');
    });

    /*}
	else
	{
		$('#combo_set').css({'display':'none','visibility':'hidden'});
		$('#first_row_obj').css({'display':'block','visibility':'visible'});
		
		$.get("/sbt/forAnalysisTypeOther?typeid="+typeid, function(data){
			$('#first_row_obj').html(data);
		});	
	}*/

    /* Initailise after every update. */
    $('#sbt_analysis_type_id').unbind('change');
    $('#sbt_analysis_type_id').change(update_typerow_combo);
}

function update_blogtyperow_combo() {
    var typeid = $('#sbt_user_blog_ublog_type_id').val();

    if (typeid == 1) {
        $('#combo_set').css({
            'display': 'block',
            'visibility': 'visible'
        });
        $('#first_row_obj').css({
            'display': 'none',
            'visibility': 'hidden'
        });

        $.get("/sbt/forBlogTypeShare?typeid=" + typeid, function(data) {
            $('#combo_set').html(data);

            initCombos('blog');
        });
    } else {
        $('#combo_set').css({
            'display': 'none',
            'visibility': 'hidden'
        });
        $('#first_row_obj').css({
            'display': 'block',
            'visibility': 'visible'
        });

        $.get("/sbt/forBlogTypeOther?typeid=" + typeid, function(data) {
            $('#first_row_obj').html(data);
        });
    }

    /* Initailise after every update. */
    $('#sbt_user_blog_ublog_type_id').unbind('change');
    $('#sbt_user_blog_ublog_type_id').change(update_blogtyperow_combo);
}

/* To switch between Create Blog and Create Analysis. */
function switch_create_div() {
    var title_val = '';
    if ($('#sbt_user_blog_ublog_title').length > 0) {
        title_val = $('#sbt_user_blog_ublog_title').val();
    }
    if ($('#sbt_analysis_title').length > 0) {
        title_val = $('#sbt_analysis_title').val();
    }
    //alert(title_val);
    var div_id = $('#blog_article').val();
    $('#blog_or_analysis').val(div_id);
    $(tinyMCE.editors).each(function() {
        tinyMCE.remove(this);
    });
    if (div_id == 'blog') {
        $('#create_blog').css({
            'display': 'block',
            'visibility': 'visible'
        });
        var typeid = 0;

        //$('#profile_data_container').css('border-bottom','0px');
        $('#create_blog').html('<span class="float_left" style="text-align:center; width:100%; margin-top:20px;"><img src="/images/indicator.gif" /></span>');

        $.get("/sbt/sbtAddUserBlog?typeid=" + typeid, function(data) {
            $('#create_blog').html(data);
            $('#form_type').val(div_id);
            $('#sbt_user_blog_ublog_title').val(title_val); // keep the same title after switch
            $('.selectBox').jqTransform();
            /* Initailise after every update. */
            initCombos('blog');
        });
    } else if (div_id == 'analysis') {
        $('#create_blog').css({
            'display': 'block',
            'visibility': 'visible'
        });
        var typeid = 0;

        $('#create_blog').html('<span class="float_left" style="text-align:center; width:100%;  margin-top:20px;"><img src="/images/indicator.gif" /></span>');

        $.get("/sbt/sbtAddAnalysis?typeid=" + typeid, function(data) {
            $('#create_blog').html(data);
            $('#form_type').val(div_id);
            $('#sbt_analysis_title').val(title_val); // keep the same title after switch
            $('.selectBox').jqTransform();
            /* Initailise after every update. */
            initCombos('analysis');
        });

    } else {
        $('#create_blog').css({
            'display': 'none',
            'visibility': 'hidden'
        });
    }
}

/* To Preview the entered text on create analysis page. */
function preview_analysis() {
    var popurl = "http://" + window.location.hostname + "/js/tiny_mce/plugins/preview/preview.html";
    winpops = window.open(popurl, "imgupload", "width=340,height=450,scrollbars,resizable");
}

/* To Preview the entered text on create forum topic page. */
function preview_forum_topic() {
    //var popurl="http://"+window.location.hostname+"/js/tiny_mce/plugins/preview/preview.html";
    //winpops=window.open(popurl,"imgupload","width=340,height=450,scrollbars,resizable");

    var post_url = "/js/tiny_mce/plugins/preview/preview.html";
    var new_width = 340;
    var new_height = 450;
    var window_name = 'preview_text';
    openWindowInCenter(post_url, new_width, new_height, window_name);
}

/* To Preview the entered text on create analysis page. */
function reset_all() {
    $('#title_text').val('');
    $('#tag_text').val('');
    $('#ingressbild_text').val('');
    tinyMCE.activeEditor.setContent('');
}

/* To validate the blog and analysis form. */
function check_type(content_type) {
    var div_id = $('#blog_article').val();

    if (div_id == 'analysis') {
        var analysis_title_flag = analysis_desc_flag = '';
        var analysis_title = trim($('#sbt_analysis_title').val());
        var analysis_description = tinyMCE.activeEditor.getContent();
        var combined_author_names_flag = 0;
        var type_id = $('#analysis_type').val();
        var ingress_img = $('#sbt_image').val();

        // For title
        if (analysis_title == '' || analysis_title.length == 0) {
            $('#analysis_title_error').html('Required');
            //$('#sbt_analysis_title').focus(); 
            analysis_title_flag = 1;
        } else {
            $('#analysis_title_error').html('');
            analysis_title_flag = 0;
        }

        // For ingress image
        if (ingress_img == '' || ingress_img.length == 0) {
            $('#upload_msg').html('Required');
            ingress_img_flag = 1;
        } else {
            $('#upload_msg').html('File Uploaded');
            ingress_img_flag = 0;
        }

        // For type
        if (type_id < 1) {
            $('#type_error').html('Please select the type');
            analysis_type_flag = 1;
        } else {
            $('#type_error').html('');
            analysis_type_flag = 0;
        }

        // For Description 
        if (analysis_description == " " || analysis_description.length == 0) {
            $('#article_desc_error').html('Required');
            //$('#sbt_analysis_description').focus(); 
            analysis_desc_flag = 1;
        } else {
            $('#article_desc_error').html('');
            analysis_desc_flag = 0;
        }


        // For Combined Analysis 
        if ($('input[name=is_combined]').is(':checked')) {
            var div_cnt = $("#list_div > div").size();
            var name_str = '0';
            if (div_cnt == 0) {
                $('#combined_author_names_error').html('You have not added any user.');
                $('#name_list').focus();
                combined_author_names_flag = 1;
            } else {
                $("#list_div").find("div").each(function(index) {
                    var str_arr = $(this).html().split('>');

                    if (name_str == '0') name_str = str_arr[1];
                    else name_str = name_str + ',' + str_arr[1];
                });
                $('#combined_author_names').val(name_str);
                $('#combined_author_names_error').html('');
                combined_author_names_flag = 0;
            }

        } else {
            combined_author_names_flag = 0;
        }

        if ((analysis_title_flag == 0) && (ingress_img_flag == 0) && (analysis_type_flag == 0) && (analysis_desc_flag == 0) && (combined_author_names_flag == 0)) {
            var has_publication_rights = $('#has_publication_rights').val();
            var analysis_status = $('#analysis_status').val();


            if (analysis_status == 1 && has_publication_rights == 0) {
                show_analysis_first_confirmation('Din artikel är publicerad i din blogg och i ditt artikelarkiv men du har ännu ej rätt att publicera artiklar på BT Insiders förstasida. Vill du skicka en publiceringsansökan för denna artikel till BT Insiders administratör?');

            }

            if (analysis_status == 1 && has_publication_rights == 1) {
                confirmation_before_publish_analysis('Vill du verkligen skicka denna artikel för publicering? Kom ihåg att korrekturläsa!');
            }

            var process_analysis_button = $('#process_analysis_outer').html();
            var processing_str = '<span class="float_left">' + process_analysis_button + '</span>  <span class="float_left" style="padding-left:5px;"><img src="../images/indicator.gif" /></span>';

            if (analysis_status == 6) {
                $('#process_analysis_outer').html(processing_str);
                save_analysis_blog_data('6');
            }
            if (analysis_status == 7) {
                $('#process_analysis_outer').html(processing_str);
                save_analysis_blog_data('7');
            }
        }

        /*if( (analysis_title_flag == 0) && (analysis_type_flag == 0) &&  (analysis_desc_flag == 0) && (combined_author_names_flag == 0))
		{
			$('#analysis_desc_hid').val(analysis_description);
			tinyMCE.triggerSave();
			$('#blog_article').val(0);
			$.ajax({
					 type:'POST',
					 data:$('#create_analysis_form').serialize(),
					 url:'/sbt/sbtAddAnalysis',
					 success:function(data1)
					 {
						   $.ajax({
										type:'POST',
										data:$('#create_analysis_form').serialize(),
										url:'/email/analysisCreationMail',
										success:function(data)
										{
											$("#create_blog").html(data1);
											$('html, body').animate( { scrollTop: 0 }, 0 );
											initCombos('analysis');
											closeMCE();
										}
								  });
						   
					 }
				});
		}*/
    }

    if (div_id == 'blog' || content_type == 'EditBlogSubmit') {
        var blog_title = trim($('#sbt_user_blog_ublog_title').val());
        var blog_type_id = $('#sbt_user_blog_ublog_type_id').val();
        var description = tinyMCE.activeEditor.getContent();

        var kat = $('#sbt_user_blog_ublog_category_id').val();

        // For Blog Title
        if (blog_title == '' || blog_title.length == 0) {
            $('#blog_title_error').html('Required');
            title_flag = 1;
        } else {
            $('#blog_title_error').html('');
            title_flag = 0;
        }

        // For Blog Type
        if ((blog_type_id < 1 && kat == 1) || (blog_type_id < 1 && kat == 2)) {
            $('#blog_type_error').html('Please select the type');
            blog_type_flag = 1;
        } else {
            $('#blog_type_error').html('');
            blog_type_flag = 0;
        }

        // For Blog Description
        if (description == " " || description.length == 0) {
            $('#blog_desc_error').html('Required');
            desc_flag = 1;
        } else {
            $('#blog_desc_error').html('');
            desc_flag = 0;
        }

        if (kat == 1 || kat == 2) var condition = (title_flag == 0) && (blog_type_flag == 0) && (desc_flag == 0);
        else var condition = (title_flag == 0) && (desc_flag == 0);

        if (condition) {
            if (content_type == 'EditBlogSubmit')
                return true;

            $('#blog_desc_hid').val(description);
            tinyMCE.triggerSave();
            $('#blog_article').val(0);
            $('#create_blog_form').submit();
            //closeMCE();
            /*$.ajax({
						type:'POST',
						data:$('#create_blog_form').serialize(),
						url:'/sbt/sbtAddUserBlog',
						success:function(data)
						{
						  $("#create_blog").html(data);
						  initCombos('blog');
						}
				   });*/
        } else {
            $('html, body').scrollTo($('.error_box:first'));
            return false;
        }
    }

    if ($('.error_box').html()) {
        $('html, body').scrollTo($('.error_box:first'));
    }
}

function closeMCE() {
    if (typeof tinyMCE != "undefined") {
        for (id in tinyMCE.editors) {
            tinyMCE.execCommand('mceRemoveControl', false, id);
        }
    } else {
        alert('Editeur non initialisé');
    }
}

/* To show the epolicy page. */
function openwindow() {
    var post_url = "/epolicy.php";
    var new_width = 500;
    var new_height = 525;
    var window_name = 'epolicy_page';
    openWindowInCenter(post_url, new_width, new_height, window_name);
}

/* Begin ClearField */
function clearNewsletterEmailField(field) {
    if (field.value == 'Fyll i din e-post här!') {
        field.value = "";
    }
}

/* End ClearField */
function fillNewsletterEmailField() {
    var newsletter_email = $('#newsletter_email').val();
    if (newsletter_email == "") {
        $('#newsletter_email').val('Fyll i din e-post här!');
    }
}

/* Used for image upload.*/
function upload(id) {
    //var popurl="http://"+window.location.hostname+"/sbt/imageUpload/mode/upload/image_path/"+id;
    //winpops=window.open(popurl,"imgupload","width=340,height=450,scrollbars,resizable");
    if (id == 'blog') var window_name = 'upload_image_in_blog_detail';
    if (id == 'analysis') var window_name = 'upload_image_in_analysis_detail';
    if (id == 'forum_comment') var window_name = 'upload_image_in_forum_comment';

    if (id == 'forum_comment')
        var post_url = "forum/uploadImageInForumComment/type/" + id;
    else if (id == 'forum')
        var post_url = "forum/uploadImageInForumDetail/type/" + id;
    else
        var post_url = "sbt/uploadImageInAnalysisAndBlog/type/" + id;

    var new_width = 340;
    var new_height = 250;

    openWindowInCenter(post_url, new_width, new_height, window_name);
}

function uploadIngressImage() {
    //var popurl="http://"+window.location.hostname+"/sbt/uploadIngressImage";
    //winpops=window.open(popurl,"ingressImgupload","width=340,height=450,scrollbars,resizable");

    var post_url = "/sbt/uploadIngressImage";
    var new_width = 340;
    var new_height = 250;
    var window_name = 'upload_ingressimage_in_analysis_detail';
    openWindowInCenter(post_url, new_width, new_height, window_name);
}

function forwardTo() {
    var div_id = $('#blog_article').val();

    if (div_id == 'analysis')
        window.location = 'http://' + window.location.hostname + '/sbt/sbtAddAnalysis/formValidation/0';
    if (div_id == 'blog')
        window.location = 'http://' + window.location.hostname + '/sbt/sbtAddUserBlog/formValidation/0';
}

function initCombos(id) {
    if (id == 'analysis') {
        /* Initailise after every update. */
        $('#sbt_analysis_market_id').unbind('change');
        $('#sbt_analysis_stocklist_id').unbind('change');
        $('#sbt_analysis_type_id').unbind('change');

        $('#sbt_analysis_market_id').change(update_combo);
        $('#sbt_analysis_stocklist_id').change(update_combo);
        $('#sbt_analysis_type_id').change(update_typerow_combo);

        initAllAnalysisCombos();
    }
    if (id == 'blog') {
        /* Initailise after every update. */
        $('#sbt_user_blog_ublog_type_id').unbind('change');
        $('#sbt_user_blog_ublog_market_id').unbind('change');
        $('#sbt_user_blog_ublog_stocklist_id').unbind('change');

        $('#sbt_user_blog_ublog_type_id').change(update_blogtyperow_combo);
        $('#sbt_user_blog_ublog_market_id').change(update_combo);
        $('#sbt_user_blog_ublog_stocklist_id').change(update_combo);
        initAllBlogCombos();
    }
}

/* Removes leading whitespaces */
function LTrim(value) {
    var re = /\s*((\S+\s*)*)/;
    return value.replace(re, "$1");
}

/* Removes ending whitespaces */
function RTrim(value) {
    var re = /((\s*\S+)*)\s*/;
    return value.replace(re, "$1");
}

/* Removes leading and ending whitespaces */
function trim(value) {
    return LTrim(RTrim(value));
}

/* Sets a perticular class to article title on articlle list page and remove it after some time.*/
function setTitleColor(id, art_id) {
    if (id == 1) {
        $('#sbt_article_title_' + art_id).removeClass('topic_title').addClass('highlight_topic_title');
        t = setTimeout("setTitleColor('2','" + art_id + "')", 5000);
    } else {
        $('#sbt_article_title_' + art_id).removeClass('highlight_topic_title').addClass('topic_title');
        clearTimeout(t);
    }
}

/* Show / hide vote meter.  */
function show_vote_meter(valid_user) {
    if (valid_user == '1') {
        $('#article_vote_option').css({
            'display': 'block',
            'visibility': 'visible'
        });
        $('#total_comment').css({
            'display': 'none',
            'visibility': 'hidden'
        });
        $('#vote_symb_top').css({
            'display': 'none',
            'visibility': 'hidden'
        });
        //$('html, body').animate( { scrollTop: 000 }, 0 );
        $('html, body').scrollTo($('#article_vote_option'));
    } else {
        window.location = 'http://' + window.location.hostname + '/user/loginWindow';
    }
}

/*!
 *
 * Submit vote. 
 *
 */
function submit_vote() {
    var vote_flag = 0;
    if ($("input[@name='vote_type']:checked").val() == '1') vote_flag = 1;
    else if ($("input[@name='vote_type']:checked").val() == '2') vote_flag = 2;
    else if ($("input[@name='vote_type']:checked").val() == '3') vote_flag = 3;
    else if ($("input[@name='vote_type']:checked").val() == '4') vote_flag = 4;
    else if ($("input[@name='vote_type']:checked").val() == '5') vote_flag = 5;
    else if ($("input[@name='vote_type']:checked").val() == '6') vote_flag = 6;

    if (vote_flag == 0)
        $('#vote_error').html('Please select any of the option');
    else {
        $('#article_vote_option').css({
            'display': 'none',
            'visibility': 'hidden'
        });

        $.ajax({
            type: 'POST',
            data: $('#vote_article_form').serialize(),
            url: '/sbt/submitVoteForArticle',
            success: function(data) {
                $("#total_comment").html(data);
                $('#total_comment').css({
                    'display': 'block',
                    'visibility': 'visible'
                });
            }
        });
    }
}

/*!
 *
 * Reply to the friend request.
 *
 */
function reply_to_request(reply_id, div_id) {
    $.get("/sbt/updateFriendRequest?statusid=" + reply_id + "&rec_id=" + div_id, function(data) {
        $('#reply_div_id' + div_id).html(data);

        var user_id = $('#current_user').val();

        $.get("/sbt/fecthMyAllFriend?user_id=" + user_id, function(data1) {
            $('#my_friends_div').html(data1);
        });
    });
}

/*!
 *
 * Check validation for comment on blog.
 *
 */
function comment_blog_validation_check() {
    var comment = trim($('#sbt_blog_comment_blog_comment').val());

    if (comment == "" || comment.length == 0) {
        $('#comment_blog_validation').css({
            'display': 'block',
            'visibility': 'visible'
        });
        return false;
    } else {
        $('#comment_blog_validation').css({
            'display': 'none',
            'visibility': 'hidden'
        });
        //$('#post_blog_comment_form').submit();
        return true;
    }
}

/*!
 *
 * Check validation for comment on blog, on user all blog post page.
 *
 */
function user_all_blog_comment_validation_check(blog_id) {
    var comment_by = $('#blog_user_id').val();

    var button_html = $('#post_blog_comment_div' + blog_id).html();
    $('#post_blog_comment_div' + blog_id).html(button_html + '<img src="/images/indicator.gif" />');
    var str = '#blog_comment_form' + blog_id + '  #sbt_blog_comment_blog_comment' + blog_id;
    var blog_text = $(str).val();

    if (blog_text == '' || blog_text.length == 0) {
        $('#blog_text_error' + blog_id).html('Required');
        $('#post_blog_comment_div' + blog_id).html(button_html);
    } else {
        $.ajax({
            type: 'POST',
            data: $('#blog_comment_form' + blog_id).serialize(),
            url: '/sbt/fetchAndPostCommentOnBlog?blog_id=' + blog_id + '&comment_by=' + comment_by,
            success: function(data) {
                $('#post_blog_comment_div' + blog_id).html(button_html);
                $('#blog_text_error' + blog_id).html('');
                //$('#sbt_blog_comment_blog_comment').val('');
                $("#blog_comment_div" + blog_id).html(data);
                $('#blog_comment_form' + blog_id + ' #sbt_blog_comment_blog_comment').val(' ');
                $(str).val('');
            }
        });
    }
}


/*!
 *
 * Show / hide vote meter on Blog Details Page.
 *
 */
function show_vote_meter_on_blog(valid_user) {
    if (valid_user == '1') {
        $('#blog_vote_option').css({
            'display': 'block',
            'visibility': 'visible'
        });
        $('#vote_div').css({
            'display': 'none',
            'visibility': 'hidden'
        });
        //$('#vote_symb_top').css({'display':'none','visibility':'hidden'});
    } else {
        window.location = 'http://' + window.location.hostname + '/user/loginWindow';
    }
}

/*!
 *
 * Show / hide vote meter on User all Blog Details Page.
 *
 */
function show_vote_meter_on_all_blog_page(valid_user, blog_id) {
    if (valid_user == '1') {
        $('#blog_vote_option_id' + blog_id).css({
            'display': 'block',
            'visibility': 'visible'
        });
        $('#user_all_blog_vote_div' + blog_id).css({
            'display': 'none',
            'visibility': 'hidden'
        });
        //$('#vote_symb_top').css({'display':'none','visibility':'hidden'});
    } else {
        window.location = 'http://' + window.location.hostname + '/user/loginWindow';
    }
}

/*!
 *
 * Submit vote for blog.
 *
 */
function submit_vote_for_blog() {
    var vote_flag = 0;
    if ($("input[@name='vote_type']:checked").val() == '1') vote_flag = 1;
    else if ($("input[@name='vote_type']:checked").val() == '2') vote_flag = 2;
    else if ($("input[@name='vote_type']:checked").val() == '3') vote_flag = 3;
    else if ($("input[@name='vote_type']:checked").val() == '4') vote_flag = 4;
    else if ($("input[@name='vote_type']:checked").val() == '5') vote_flag = 5;
    else if ($("input[@name='vote_type']:checked").val() == '6') vote_flag = 6;

    if (vote_flag == 0)
        $('#vote_error').html('Please select any of the option');
    else {
        $('#blog_vote_option').css({
            'display': 'none',
            'visibility': 'hidden'
        });

        $.ajax({
            type: 'POST',
            data: $('#vote_blog_form').serialize(),
            url: '/sbt/submitVoteForBlog',
            success: function(data) {
                $("#vote_div").html(data);
                $('#vote_div').css({
                    'display': 'block',
                    'visibility': 'visible'
                });
            }
        });
    }
}

/*!
 *
 * Submit vote for all blog page.
 *
 */
function submit_vote_for_all_blog_page(blog_id) {
    var vote_flag = 0;
    var vote_type = 'vote_type' + blog_id;
    var selected_val = $("input[@name='" + vote_type + "']:checked").val();

    if (selected_val == '1') vote_flag = 1;
    else if (selected_val == '2') vote_flag = 2;
    else if (selected_val == '3') vote_flag = 3;
    else if (selected_val == '4') vote_flag = 4;
    else if (selected_val == '5') vote_flag = 5;
    else if (selected_val == '6') vote_flag = 6;

    if (vote_flag == 0)
        $('#blog_vote_error' + blog_id).html('Please select any of the option');
    else {
        $('#blog_vote_option_id' + blog_id).css({
            'display': 'none',
            'visibility': 'hidden'
        });

        $.ajax({
            type: 'POST',
            data: $('#vote_blog_form').serialize(),
            url: '/sbt/submitVoteForBlog',
            success: function(data) {
                data = data + "<span class='float_left cursor hide_blog_div'><a href='#' name='" + blog_id + "'>Minimera</a></span>";
                $('#blog_vote_div_id' + blog_id).html(data);
                $('#blog_vote_div_id' + blog_id).css({
                    'display': 'block',
                    'visibility': 'visible'
                });
            }
        });
    }
}


/*!
 *
 * Check/Uncheck the Followup for Blog.
 *
 */
function is_blog_followup() {
    if ($('input[name=blog_followup]').is(':checked'))
        $('#sbt_blog_comment_followup_by_mail').val(1);
    else
        $('#sbt_blog_comment_followup_by_mail').val(0);
}

/*!
 *
 * Check/Uncheck the Followup for Blog, on all user blog page.
 *
 */
function all_user_blog_is_blog_followup(blog_id) {
    if ($('input[name=blog_followup' + blog_id + ']').is(':checked'))
        $('#blog_comment_form' + blog_id + ' #sbt_blog_comment_followup_by_mail').val(1);
    else
        $('#blog_comment_form' + blog_id + '#sbt_blog_comment_followup_by_mail').val(0);
}

/*!
 *
 * Show Blog Dates.
 *
 */
function show_blog_dates(month, year) {
    //var month = $('.ui-datepicker-month').html();
    //var year = $('.ui-datepicker-year').html();

    var last_date = 0;
    var actual_date = 0;


    day_arr['01'] = 1;
    day_arr['02'] = 2;
    day_arr['03'] = 3;
    day_arr['04'] = 4;
    day_arr['05'] = 5;
    day_arr['06'] = 6;
    day_arr['07'] = 7;
    day_arr['08'] = 8;
    day_arr['09'] = 9;

    $('.ui-datepicker-calendar').find("a.ui-state-default").each(function(index) {
        last_date = $(this).html();
    });

    //var user_id = $('#user_all_blog_post').attr("name");
    var user_id = $('#blog_user_id').val();


    var month_index = isNaN(month) ? month_arr[month] : month;

    $.get("/sbt/getBlogCreationDates?month=" + month_index + "&year=" + year + "&last_date=" + last_date + '&user_id=' + user_id, function(data) {
        var brokenstring = data.split(',');

        $('.ui-datepicker-calendar').find("a.ui-state-default").each(function(index) {
            one_date = $(this).html();

            for (var i = 0; i < brokenstring.length; i++) {
                if (brokenstring[i] < 10)
                    actual_date = day_arr[brokenstring[i]];
                else
                    actual_date = brokenstring[i];

                if (one_date == actual_date) {
                    $(this).addClass("ui-state-active").addClass("white_background").attr("href", "http://" + window.location.hostname);
                }
            }
        });

    });

    $.get("/sbt/getBlogOfMonth?month=" + month_index + "&year=" + year + "&last_date=" + last_date + '&user_id=' + user_id, function(data) {
        $('#blog_of_month').html(data);
        $('#display_month_year').html('List of Blog Post in ' + month + ' ' + year);
    });


    // Append datepicker's next, previous button.
    //append_next_prev_button();
}

/*!
 *
 * Append datepicker's next, previous button.
 *
 */
/*function append_next_prev_button() 
{
	// This is used on datepickers next month button.
	var next_click_func = $('.ui-datepicker-next').attr("onClick");
	var new_next_event = next_click_func+' show_blog_dates();';
	$('.ui-datepicker-next').attr("onClick",new_next_event);
	
	// This is used on datepickers previous month button.
	var next_click_func = $('.ui-datepicker-prev').attr("onClick");
	var new_prev_event = next_click_func+' show_blog_dates();';
	$('.ui-datepicker-prev').attr("onClick",new_prev_event);
}*/

/*!
 *
 * This function is used when user uses the search fucntionality.
 *
 */
function check_search_parameter() {
    var is_error_flag = 0;
    var ValidChars = "0123456789";
    var iChars = "!@#$%^&*()+=-[]\';,./{}|\":<>?";

    var search_val = trim($('#normal_search').val());

    if (search_val == "" || search_val.length == 0) {
        $('#normal_search').removeClass('go').addClass('search_error');
        return false;
    }
    /* code by sandeep */
    /*else 
    	{
    		for (var i = 0; i < search_val.length; i++) 
    		{   
    			if (iChars.indexOf(search_val.charAt(i)) != -1)    
    			{   	
    				$('#normal_search').removeClass('go').addClass('search_error');
    				is_error_flag = 1;
    			}  
    		}
    		
    		for (i = 0; i < search_val.length; i++) 
    		{ 
    			Char = search_val.charAt(i); 
    			if (ValidChars.indexOf(Char) != -1) 
    			{
    				$('#normal_search').removeClass('go').addClass('search_error');
    				is_error_flag = 1;
    			}
    		}
    		
    		if(is_error_flag == 0)
    			return true;
    		else
    			return false;
    	}*/
    /* code by sandeep end */
}

/*!
 *
 * This function initialises advance search comboboxes.
 *
 */

function initAdvSearchCombos() {
    /* Initailise after every update. */
    $('#adv_search_market').unbind('change');
    $('#adv_search_stock_lista').unbind('change');
    $('#adv_search_sector').unbind('change');

    $('#adv_search_market').change(update_adv_search_combo);
    $('#adv_search_stock_lista').change(update_adv_search_combo);
    //$('#adv_search_sector').change(update_typerow_combo);
    $('#adv_search_sector').change(update_adv_search_combo);
}

/*!
 *
 * This function updates the advance search comboboxes.
 *
 */
function update_adv_search_combo() {
    var typeid = $('#adv_search_type').val();
    var marketid = $('#adv_search_market').val();
    var stocklistid = $('#adv_search_stock_lista').val();
    var sectorid = $('#adv_search_sector').val();

    //if(stocklistid)
    //str = marketid+"&stocklistid="+stocklistid;
    //else
    //str = marketid;

    $.get("/borst/fromAdvSearchMarket?typeid=" + typeid + "&marketid=" + marketid + "&stocklistid=" + stocklistid + "&sectorid=" + sectorid, function(data) {
        $('#adv_search_combo_set').html(data);

        initAdvSearchCombos();
    });
}
/**
 *
 **/
function validateGoogleAdForm() {

    /*var firstname = $('#firstname').val();
	var lastname = $('#lastname').val();
	var email = $('#email').val();
	var enq_type = $('#enq_type').val();
	var enq_subject = $('#enq_subject').val();
	

	var firstname_flag = 0;
	var lastname_flag = 0;
	var email_flag = 0;
	var enq_type_flag = 0;
	var enq_subject_flag = 0;
	var user_question_flag = 0;

	if(!firstname)
	{
		$('#contact_firstname_error').html('<strong>OBS!</strong> Förnamnsfältet är tomt.<br/>');
		$('#firstname').focus();
		firstname_flag = 1;
	}
	else $('#contact_firstname_error').html('');
	if(!lastname)
	{
		$('#contact_lastname_error').html('<strong>OBS!</strong> Efternamnsfältet är tomt.<br/>');
		$('#lastname').focus();
		lastname_flag = 1;
	}
	else $('#contact_lastname_error').html('');

	if(!email)
	{
		$('#contact_email_error').html('<strong>OBS!</strong> Du har inte fyllt i någon e-postadress.<br>');
		$('#email').focus();
		email_flag = 1;
	}
	else{

		apos=email.indexOf("@");
		dotpos=email.lastIndexOf(".");
		if(apos<1||dotpos-apos<2)
		{
			$('#contact_email_error').html('<b>OBS!</b> Inmatad e-post har inte rätt syntax!<br/>');
			$('#email').focus();
			email_flag = 1;
		}
		else $('#contact_email_error').html('');
	}
      
        if(firstname_flag == 0 && lastname_flag == 0 && email_flag == 0){
            
            $('#contactus').submit();
        }
		*/
    $('#contactus').submit();
}

/**
/*!
 *
 * This function validates the contact enquiry form and returns the errors if any.
 *
 */
function validateContactForm() {
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var email = $('#email').val();
    var enq_type = $('#enq_type').val();
    var enq_subject = $('#enq_subject').val();
    var user_question = tinyMCE.activeEditor.getContent();

    var firstname_flag = 0;
    var lastname_flag = 0;
    var email_flag = 0;
    var enq_type_flag = 0;
    var enq_subject_flag = 0;
    var user_question_flag = 0;

    if (!firstname) {
        $('#contact_firstname_error').html('<strong>OBS!</strong> Förnamnsfältet är tomt.<br/>');
        $('#firstname').focus();
        firstname_flag = 1;
    } else $('#contact_firstname_error').html('');

    if (!lastname) {
        $('#contact_lastname_error').html('<strong>OBS!</strong> Efternamnsfältet är tomt.<br/>');
        $('#lastname').focus();
        lastname_flag = 1;
    } else $('#contact_lastname_error').html('');

    if (!email) {
        $('#contact_email_error').html('<strong>OBS!</strong> Du har inte fyllt i någon e-postadress.<br>');
        $('#email').focus();
        email_flag = 1;
    } else {

        apos = email.indexOf("@");
        dotpos = email.lastIndexOf(".");
        if (apos < 1 || dotpos - apos < 2) {
            $('#contact_email_error').html('<b>OBS!</b> Inmatad e-post har inte rätt syntax!<br/>');
            $('#email').focus();
            email_flag = 1;
        } else $('#contact_email_error').html('');
    }

    if (enq_type <= 0) {
        $('#contact_enq_type_error').html('<strong>OBS!</strong> Välj typ av förfrågan.<br/>');
        $('#enq_type').focus();
        enq_type_flag = 1;
    } else $('#contact_enq_type_error').html('');

    if (!enq_subject) {
        $('#contact_enq_subject_error').html('<strong>OBS!</strong> Du har inte fyllt i någon rubrik.<br/>');
        $('#enq_subject').focus();
        enq_subject_flag = 1;
    } else $('#contact_enq_subject_error').html('');

    if (user_question == " " || user_question.length == 0) {
        $('#contact_enq_question_error').html('<strong>OBS!</strong> Frågan är tom.<br/>');
        $('#contact_enquiry_user_question').focus();
        user_question_flag = 1;
    } else $('#contact_enq_question_error').html('');

    if (firstname_flag == 0 && lastname_flag == 0 && email_flag == 0 && enq_type_flag == 0 && enq_subject_flag == 0 && user_question_flag == 0)
        $('#contactus').submit();

    /*$.get("/borst/validateContactForm?firstname="+firstname+'&lastname='+lastname+'&email='+email+'&enq_type='+enq_type+'&enq_subject='+enq_subject, function(data){
    		if(data=='') $('#contactus').submit();
    		else $('#contact_form_error').html(data);
    	});*/
}

/*!
 *
 * This function is used when logged in user wants to comment on any user.
 *
 */
function commentOnAnyUser(sender, receiver, dialog_divid) {
    $('#' + dialog_divid).dialog('destroy');
    $('#sbt_messages_message_to').val(receiver);

    $('#sbt_messages_message_detail').val('');

    $('#message_error').css({
        'display': 'none',
        'visibility': 'hidden'
    });
    // This Dialog box is used on logged user want to make comment on any user.

    var classname = $('#' + dialog_divid).attr('class');
    $('#' + dialog_divid).removeClass(classname).addClass('show_div');

    $('#' + dialog_divid).dialog({
        draggable: false,
        autoOpen: false,
        width: 600,
        buttons: {
            "Post Message": function() {

                var text = $('#sbt_messages_message_detail').val();
                var user_id = $('#current_user').val();

                if (text == "" || text.length == 0) {
                    $('#message_error').css({
                        'display': 'block',
                        'visibility': 'visible'
                    });
                } else {
                    $.ajax({
                        type: 'POST',
                        data: $('#post_message_to_user').serialize(),
                        url: '/sbt/sbtMinProfileFriends?id=' + user_id + '&sender=' + sender + '&receiver=' + receiver,
                        success: function(data) {
                            $('#' + dialog_divid).dialog("close");
                        }
                    });
                }
            },
            "Cancel": function() {
                $(this).dialog("close");
            }
        }
    });
    $('#' + dialog_divid).dialog('open');

}

/*!
 *
 * This function sets the image for search page as per the order.
 *
 */
function setSearchOrderImage(column_id, order) {
    if (order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="desc" />';
    if (order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="asc" />';

    if (column_id == 'sortby_date') $('#sortby_date').html('<span class="float_left list_heading">Publ.' + image_txt + '</span>');
    if (column_id == 'sortby_title') $('#sortby_title').html('<span class="float_left list_heading">Rubrik' + image_txt + '</span>');
    if (column_id == 'sortby_category') $('#sortby_category').html('<span class="float_left list_heading_kategori">Kategori' + image_txt + '</span>');
    if (column_id == 'sortby_type') $('#sortby_type').html('<span class="float_left list_heading_typ">Typ' + image_txt + '</span>');
    if (column_id == 'sortby_object') $('#sortby_object').html('<span class="float_left list_heading_objekt">Objekt' + image_txt + '</span>');
    if (column_id == 'sortby_author') $('#sortby_author').html('<span class="float_left">Författare' + image_txt + '</span>');
}

function setSearchOrderImageAdvSearch(column_id, order, parent_id) {
    if (order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="desc" />';
    if (order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="asc" />';

    if (parent_id == 'borst_result') var parent_name = 'bt-';
    if (parent_id == 'sbt_result') var parent_name = 'sbt-';
    if (parent_id == 'blog_result') var parent_name = 'blog-';
    if (parent_id == 'forum_result') var parent_name = 'forum-';

    if (column_id == parent_name + 'sortby_date') $('#' + parent_id + ' #' + parent_name + 'sortby_date').html('<span class="float_left">Publ.' + image_txt + '</span>');
    if (column_id == parent_name + 'sortby_title') $('#' + parent_id + ' #' + parent_name + 'sortby_title').html('<span class="float_left">Rubrik' + image_txt + '</span>');
    if (column_id == parent_name + 'sortby_category') $('#' + parent_id + ' #' + parent_name + 'sortby_category').html('<span class="float_left">Kategori' + image_txt + '</span>');
    if (column_id == parent_name + 'sortby_type') $('#' + parent_id + ' #' + parent_name + 'sortby_type').html('<span class="float_left">Typ' + image_txt + '</span>');
    if (column_id == parent_name + 'sortby_object') $('#' + parent_id + ' #' + parent_name + 'sortby_object').html('<span class="float_left">Objekt' + image_txt + '</span>');
    if (column_id == parent_name + 'sortby_author') $('#' + parent_id + ' #' + parent_name + 'sortby_author').html('<span class="float_left">Författare' + image_txt + '</span>');

    if (column_id == 'sortby_date') $('#' + parent_id + ' #' + parent_name + 'sortby_date').html('<span class="float_left">Publ.' + image_txt + '</span>');
    if (column_id == 'sortby_title') $('#' + parent_id + ' #' + parent_name + 'sortby_title').html('<span class="float_left">Rubrik' + image_txt + '</span>');
    if (column_id == 'sortby_category') $('#' + parent_id + ' #' + parent_name + 'sortby_category').html('<span class="float_left">Kategori' + image_txt + '</span>');
    if (column_id == 'sortby_type') $('#' + parent_id + ' #' + parent_name + 'sortby_type').html('<span class="float_left">Typ' + image_txt + '</span>');
    if (column_id == 'sortby_object') $('#' + parent_id + ' #' + parent_name + 'sortby_object').html('<span class="float_left">Objekt' + image_txt + '</span>');
    if (column_id == 'sortby_author') $('#' + parent_id + ' #' + parent_name + 'sortby_author').html('<span class="float_left">Författare' + image_txt + '</span>');

    if (column_id == 'sortby_company_name') $('#' + parent_id + ' #sortby_company_name').html('<span class="float_left">Stock Name' + image_txt + '</span>');
    if (column_id == 'sortby_company_symbol') $('#' + parent_id + ' #sortby_company_symbol').html('<span class="float_left">Short Name' + image_txt + '</span>');
    if (column_id == 'sortby_company_type') $('#' + parent_id + ' #sortby_company_type').html('<span class="float_left">Stock List' + image_txt + '</span>');

    if (column_id == 'sortby_btshop_article_title') $('#' + parent_id + ' #sortby_btshop_article_title').html('<span class="float_left">Artikel' + image_txt + '</span>');
    if (column_id == 'sortby_btshop_type_id') $('#' + parent_id + ' #sortby_btshop_type_id').html('<span class="float_left">Typ' + image_txt + '</span>');
    if (column_id == 'sortby_btshop_product_price') $('#' + parent_id + ' #sortby_btshop_product_price').html('<span class="float_left">Pris' + image_txt + '</span>');

    if (column_id == 'sortby_author_userlist') $('#' + parent_id + ' #sortby_author_userlist').html('<span class="float_left">Användare' + image_txt + '</span>');
    if (column_id == 'sortby_title_userlist') $('#' + parent_id + ' #sortby_title_userlist').html('<span class="float_left">Titel' + image_txt + '</span>');
    if (column_id == 'sortby_regdate') $('#' + parent_id + ' #sortby_regdate').html('<span class="float_left">Regdate' + image_txt + '</span>');
    if (column_id == 'sortby_message') $('#' + parent_id + ' #sortby_message').html('<span class="float_left">Inlägg' + image_txt + '</span>');
    if (column_id == 'sortby_vote') $('#' + parent_id + ' #sortby_vote').html('<span class="float_left">Röster' + image_txt + '</span>');
    if (column_id == 'sortby_totallogin') $('#' + parent_id + ' #sortby_totallogin').html('<span class="float_left">Inlogg' + image_txt + '</span>');
    if (column_id == 'sortby_lastlogin') $('#' + parent_id + ' #sortby_lastlogin').html('<span class="float_left">Senaste' + image_txt + '</span>');
}

/*!
 *
 * This function sets the image for blog list page as per the order.
 *
 */
function setBlogListOrderImage(column_id, order) {
    //if(order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="desc" />';
    //if(order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="asc" />';

    if (column_id == 'sortby_date') $('#sortby_date').html('<span class="float_right">Senast uppdaterad</span>');
    if (column_id == 'sortby_title') $('#sortby_title').html('<span class="float_left">Rubrik</span>');
    if (column_id == 'sortby_category') $('#sortby_category').html('<span class="float_left">Kategori</span>');
    if (column_id == 'sortby_reply') $('#sortby_reply').html('<span class="float_right">Inlägg</span>');
    if (column_id == 'sortby_view') $('#sortby_view').html('<span class="float_right">Visad</span>');
    if (column_id == 'sortby_author') $('#sortby_author').html('<span class="float_left"> Skapad av</span>');
}

/*!
 *
 * This function sets the image for blog list page of a specific date as per the order.
 *
 */
function setDateBlogListOrderImage(column_id, order) {
    if (order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="desc" />';
    if (order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="asc" />';

    if (column_id == 'sortby_blog_date') $('#sortby_blog_date').html('<span class="float_left">Senast uppdaterad' + image_txt + '</span>');
    if (column_id == 'sortby_blog_title') $('#sortby_blog_title').html('<span class="float_left">Rubrik' + image_txt + '</span>');
    if (column_id == 'sortby_blog_category') $('#sortby_blog_category').html('<span class="float_left">Kategori' + image_txt + '</span>');
    if (column_id == 'sortby_blog_reply') $('#sortby_blog_reply').html('<span class="float_left">Inlägg' + image_txt + '</span>');
    if (column_id == 'sortby_blog_view') $('#sortby_blog_view').html('<span class="float_left">Visad' + image_txt + '</span>');
    if (column_id == 'sortby_blog_author') $('#sortby_blog_author').html('<span class="float_left"> Skapad av' + image_txt + '</span>');
}

/*!
 *
 * This function sets the opacity when ajax acion is going on.
 *
 */
function setOpacity() {
    /*$('#borst_result').css("opacity","0.5");
	$('#sbt_result').css("opacity","0.5");
	$('#blog_result').css("opacity","0.5");
	$('#forum_result').css("opacity","0.5");*/

    $('#borst_result').addClass('withOpacity');
    $('#sbt_result').addClass('withOpacity');
    $('#blog_result').addClass('withOpacity');
    $('#forum_result').addClass('withOpacity');
    $('#btchart_result').addClass('withOpacity');
    $('#btshop_result').addClass('withOpacity');
    $('#userlist_result').addClass('withOpacity');
}

/*!
 *
 * This function removes the opacity when ajax acion is finished.
 *
 */
function removeOpacity() {
    $('#borst_result').css("opacity", "1");
    $('#sbt_result').css("opacity", "1");
    $('#blog_result').css("opacity", "1");
    $('#forum_result').css("opacity", "1");
    $('#btchart_result').css("opacity", "1");
    $('#btshop_result').css("opacity", "1");
    $('#userlist_result').css("opacity", "1");
}

/*!
 *
 * This function sets the image for search page as per the order.
 *
 */
function setSearchOrderImageForAll(column_id, order, parent_id) {
    if (order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="desc" />';
    if (order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="asc" />';

    if (column_id == 'sortby_date') $('#' + parent_id + ' #sortby_date').html('<span class="float_left">Publ.' + image_txt + '</span>');
    if (column_id == 'sortby_title') $('#' + parent_id + ' #sortby_title').html('<span class="float_left">Rubrik' + image_txt + '</span>');
    if (column_id == 'sortby_category') $('#' + parent_id + ' #sortby_category').html('<span class="float_left">Kategori' + image_txt + '</span>');
    if (column_id == 'sortby_type') $('#' + parent_id + ' #sortby_type').html('<span class="float_left">Typ' + image_txt + '</span>');
    if (column_id == 'sortby_object') $('#' + parent_id + ' #sortby_object').html('<span class="float_left">Objekt' + image_txt + '</span>');
    if (column_id == 'sortby_author') $('#' + parent_id + ' #sortby_author').html('<span class="float_left">Författare' + image_txt + '</span>');
    if (column_id == 'sortby_company_name') $('#' + parent_id + ' #sortby_company_name').html('<span class="float_left">Stock Name' + image_txt + '</span>');
    if (column_id == 'sortby_company_symbol') $('#' + parent_id + ' #sortby_company_symbol').html('<span class="float_left">Short Name' + image_txt + '</span>');
    if (column_id == 'sortby_company_type') $('#' + parent_id + ' #sortby_company_type').html('<span class="float_left">Stock List' + image_txt + '</span>');

    if (column_id == 'sortby_btshop_article_title') $('#' + parent_id + ' #sortby_btshop_article_title').html('<span class="float_left">Artikel' + image_txt + '</span>');
    if (column_id == 'sortby_btshop_type_id') $('#' + parent_id + ' #sortby_btshop_type_id').html('<span class="float_left">Typ' + image_txt + '</span>');
    if (column_id == 'sortby_btshop_product_price') $('#' + parent_id + ' #sortby_btshop_product_price').html('<span class="float_left">Pris' + image_txt + '</span>');

    if (column_id == 'sortby_author_userlist') $('#' + parent_id + ' #sortby_author_userlist').html('<span class="float_left">Användare' + image_txt + '</span>');
    if (column_id == 'sortby_title_userlist') $('#' + parent_id + ' #sortby_title_userlist').html('<span class="float_left">Titel' + image_txt + '</span>');
    if (column_id == 'sortby_regdate') $('#' + parent_id + ' #sortby_regdate').html('<span class="float_left">Regdate' + image_txt + '</span>');
    if (column_id == 'sortby_message') $('#' + parent_id + ' #sortby_message').html('<span class="float_left">Inlägg' + image_txt + '</span>');
    if (column_id == 'sortby_vote') $('#' + parent_id + ' #sortby_vote').html('<span class="float_left">Röster' + image_txt + '</span>');
    if (column_id == 'sortby_totallogin') $('#' + parent_id + ' #sortby_totallogin').html('<span class="float_left">Inlogg' + image_txt + '</span>');
    if (column_id == 'sortby_lastlogin') $('#' + parent_id + ' #sortby_lastlogin').html('<span class="float_left">Senaste' + image_txt + '</span>');
}

/*!
 *
 * This function sets the image for users article in myprofile page as per the order.
 *
 */
function setArticleAnalysisOrderImage(column_id, order, parent_id) {
    if (order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="desc" />';
    if (order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="asc" />';

    if (parent_id == 'profile_article_list_table') {
        if (column_id == 'sortby_date') $('#' + parent_id + ' #sortby_date').html('<span class="float_left">Publ.' + image_txt + '</span>');
        if (column_id == 'sortby_title') $('#' + parent_id + ' #sortby_title').html('<span class="float_left">Rubrik' + image_txt + '</span>');
        if (column_id == 'sortby_category') $('#' + parent_id + ' #sortby_category').html('<span class="float_left">Kategori' + image_txt + '</span>');
        if (column_id == 'sortby_type') $('#' + parent_id + ' #sortby_type').html('<span class="float_left">Typ' + image_txt + '</span>');
        if (column_id == 'sortby_object') $('#' + parent_id + ' #sortby_object').html('<span class="float_left">Objekt' + image_txt + '</span>');
        if (column_id == 'sortby_author') $('#' + parent_id + ' #sortby_author').html('<span class="float_left">Författare' + image_txt + '</span>');
    }

    if (parent_id == 'profile_analysis_list_table') {
        if (column_id == 'sortby_date') $('#' + parent_id + ' #sortby_date').html('<span class="float_left">Publ.' + image_txt + '</span>');
        if (column_id == 'sortby_title') $('#' + parent_id + ' #sortby_title').html('<span class="float_left">Rubrik' + image_txt + '</span>');
        if (column_id == 'sortby_category') $('#' + parent_id + ' #sortby_category').html('<span class="float_left">Kategori' + image_txt + '</span>');
        if (column_id == 'sortby_type') $('#' + parent_id + ' #sortby_type').html('<span class="float_left">Typ' + image_txt + '</span>');
        if (column_id == 'sortby_object') $('#' + parent_id + ' #sortby_object').html('<span class="float_left">Objekt' + image_txt + '</span>');
        if (column_id == 'sortby_author') $('#' + parent_id + ' #sortby_author').html('<span class="float_left">Författare' + image_txt + '</span>');
    }
}

/*!
 *
 * This function sets the image for user profile , user article page as per the order.
 *
 */
function setOrderImageForUserAllArticle(column_id, order, parent_id) {
    if (order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="desc" />';
    if (order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="asc" />';

    if (parent_id == 'profile_article_list_table') {
        if (column_id == 'sortby_date') $('#' + parent_id + ' #sortby_date').html('<span class="float_left">Publ.' + image_txt + '</span>');
        if (column_id == 'sortby_title') $('#' + parent_id + ' #sortby_title').html('<span class="float_left">Rubrik' + image_txt + '</span>');
        if (column_id == 'sortby_category') $('#' + parent_id + ' #sortby_category').html('<span class="float_left">Kategori' + image_txt + '</span>');
        if (column_id == 'sortby_type') $('#' + parent_id + ' #sortby_type').html('<span class="float_left">Typ' + image_txt + '</span>');
        if (column_id == 'sortby_object') $('#' + parent_id + ' #sortby_object').html('<span class="float_left">Objekt' + image_txt + '</span>');
        if (column_id == 'sortby_author') $('#' + parent_id + ' #sortby_author').html('<span class="float_left">Författare' + image_txt + '</span>');
    }

    if (parent_id == 'profile_analysis_list_table') {
        if (column_id == 'sortby_date') $('#' + parent_id + ' #ana_sortby_date').html('<span class="float_left">Publ.' + image_txt + '</span>');
        if (column_id == 'sortby_title') $('#' + parent_id + ' #ana_sortby_title').html('<span class="float_left">Rubrik' + image_txt + '</span>');
        if (column_id == 'sortby_category') $('#' + parent_id + ' #ana_sortby_category').html('<span class="float_left">Kategori' + image_txt + '</span>');
        if (column_id == 'sortby_type') $('#' + parent_id + ' #ana_sortby_type').html('<span class="float_left">Typ' + image_txt + '</span>');
        if (column_id == 'sortby_object') $('#' + parent_id + ' #ana_sortby_object').html('<span class="float_left">Objekt' + image_txt + '</span>');
        if (column_id == 'sortby_author') $('#' + parent_id + ' #ana_sortby_author').html('<span class="float_left">Författare' + image_txt + '</span>');
    }
}

/*!
 *
 * This function is used to set the opacity for search all tab.
 *
 */
function showHideForAllTab(parent_id) {
    div_id_arr = Array('borst_result', 'sbt_result', 'blog_result', 'forum_result', 'btchart_result', 'btshop_result', 'userlist_result');

    for (var i = 0; i < div_id_arr.length; i++) {
        //		if(div_id_arr[i] != parent_id)
        {
            $('#' + div_id_arr[i]).css("opacity", "0.5");
        }
    }
    //	$('#'+parent_id).find("tr.classnot").each(function(index){
    //			$(this).addClass('withOpacity');
    //	});            	
}

/*!
 *
 * This function sets the image for user list page as per the order.
 *
 */
function setUserListOrderImage(column_id, order) {
    if (order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="desc" />';
    if (order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="asc" />';

    if (column_id == 'sortby_author') $('#sortby_author').html('<span class="float_left" style="padding-left:6px;" >Användare' + image_txt + '</span>');
    if (column_id == 'sortby_title') $('#sortby_title').html('<span class="float_left">Titel' + image_txt + '</span>');
    if (column_id == 'sortby_regdate') $('#sortby_regdate').html('<span class="float_left">Regdate' + image_txt + '</span>');
    if (column_id == 'sortby_message') $('#sortby_message').html('<span class="float_left">Inlägg' + image_txt + '</span>');
    if (column_id == 'sortby_vote') $('#sortby_vote').html('<span class="float_left">Röster' + image_txt + '</span>');
    if (column_id == 'sortby_totallogin') $('#sortby_totallogin').html('<span class="float_left">Inlogg' + image_txt + '</span>');
    if (column_id == 'sortby_lastlogin') $('#sortby_lastlogin').html('<span class="float_left">  Senaste' + image_txt + '</span>');
}

/*!
 *
 * This function is used to show the message box.
 *
 */
function allMessageBox(dialog_id, form_id, other) {

    // This Dialog box is used on user profile page, when anyone wants to post a message to specific user	
    $('#sbt_messages_message_detail').val(' ');
    $('#message_error').css({
        'display': 'none',
        'visibility': 'hidden'
    });
    $('#' + dialog_id).dialog('destroy');

    var classname = $('#' + dialog_id).attr('class');
    $('#' + dialog_id).removeClass(classname).addClass('show_div');

    $('#' + dialog_id).dialog({
        autoOpen: false,
        width: 600,
        draggable: false,
        buttons: {
            "Post": function() {
                var text = trim($('#sbt_messages_message_detail').val());

                if (text == "" || text.length == 0) {
                    $('#message_error').css({
                        'display': 'block',
                        'visibility': 'visible'
                    });
                } else {
                    var user_id = $('#current_user').val();

                    if (other == 'msg_post_message') {

                        $.ajax({
                            type: 'POST',
                            data: $('#profile_msg_postmessage_form').serialize(),
                            url: '/sbt/sbtMinProfileMessage?id=' + user_id,
                            success: function(data) {

                                $('#profile_msg_postmessage_dialog').dialog("close");
                                $("#profile_data_container").html(data);
                            }
                        });
                    }

                    if (other == 'post_message') {
                        $.ajax({
                            type: 'POST',
                            data: $('#profile_msg_postmessage_form').serialize(),
                            url: '/sbt/sbtMinProfile?id=' + user_id,
                            success: function(data) {
                                //$('#profile_msg_postmessage_dialog').dialog("close"); 
                                $(this).dialog("close");
                                location.reload();
                            }
                        });
                    }

                    //$(this).dialog("close"); 
                }
            },
            "Cancel": function() {
                $('#message_error').css({
                    'display': 'none',
                    'visibility': 'hidden'
                });
                $('#sbt_messages_message_detail').val('');
                $(this).dialog("close");
            }
        }
    });
    $('#' + dialog_id).dialog('open');
}

function showFriendRequest() {
    // This Dialog box is used to send a friend request.
    $('#friend_request_message').val('');
    $('#friend_message_error').css({
        'display': 'none',
        'visibility': 'hidden'
    });
    $('#friend_request_box').dialog('destroy');

    var classname = $('#friend_request_box').attr('class');
    $('#friend_request_box').removeClass(classname).addClass('show_div');

    $('#friend_request_box').dialog({
        autoOpen: false,
        width: 600,
        buttons: {
            Avbryt: function() {
                $(this).dialog("close");
            },
            "Skicka meddelande": function() {
                var text = trim($('#friend_request_message').val());
                if (text == "" || text.length == 0) {
                    $('#friend_message_error').css({
                        'display': 'block',
                        'visibility': 'visible'
                    });
                } else {
                    var user_id = $('#current_user').val();
                    $.ajax({
                        type: 'POST',
                        data: $('#friend_request_form').serialize(),
                        url: '/sbt/sbtMinProfile?id=' + user_id,
                        success: function(data) {
                            $('#friend_request_box').dialog("close");
                            //location.reload();
                            $('#send_friend_req').addClass('hide_div');
                            $('#send_friend_req_msg').html('Din vänförfrågan har skickats');
                            $('#friend_req_msg').css({
                                'display': 'block',
                                'visibility': 'visible'
                            });
                            $('#friend_req_msg').html('You Friend Request has been sent successfully..!')
                        }
                    });

                }
            }
        }
    });
    $('#friend_request_box').dialog('open');
}

function updateAnalysisCombos() {
    var typeid = $('#analysis_type').val();
    $('.indicator').show();
    $.get("/sbt/setCombos?typeid=" + typeid + "&blog_article=analysis", function(data) {
        $('#combo_outer').html(data);
        $('.indicator').hide();
        initAllAnalysisCombos();
    });
}

function updateBlogCombos() {
    var typeid = $('#sbt_user_blog_ublog_type_id').val();
    var blog_article = $('#blog_article').val();
    if ($('#blog_article').length < 1) // means edit blog
        blog_article = 'blog';

    $.get("/sbt/setCombos?typeid=" + typeid + "&blog_article=" + blog_article, function(data) {
        $('#blog_combo_outer').html(data);
        initAllBlogCombos();
    });
}

function updateAnalysisInternalCombos() {
    var typeid = $('#analysis_type').val();
    //var blog_article = $('#blog_article').val();
    blog_article = 'analysis';
    var marketid = $('#analysis_market').val();
    var stocklistid = $('#analysis_stocklist').val();
    var sectorid = $('#analysis_sector').val();
    $('.indicator').show();
    $('#type_analysis').hide();
    $.get("/sbt/fromAnalysisMarket?marketid=" + marketid + "&stocklistid=" + stocklistid + "&blog_article=" + blog_article + "&sectorid=" + sectorid + "&typeid=" + typeid, function(data) {
        $('#combo_outer').html(data);
        $('.indicator').hide();
        initAllAnalysisCombos();
    });
}

function updateBlogInternalCombos() {
    var typeid = $('#sbt_user_blog_ublog_type_id').val();
    var blog_article = $('#blog_article').val();
    if ($('#blog_article').length < 1)
        blog_article = 'blog';
    var marketid = $('#sbt_user_blog_ublog_market_id').val();
    var stocklistid = $('#sbt_user_blog_ublog_stocklist_id').val();
    var sectorid = $('#sbt_user_blog_ublog_sector_id').val();

    $('.indicator').show();
    $('#type_analysis').hide();
    $.get("/sbt/fromAnalysisMarket?marketid=" + marketid + "&stocklistid=" + stocklistid + "&blog_article=" + blog_article + "&sectorid=" + sectorid + "&typeid=" + typeid, function(data) {
        $('#blog_combo_outer').html(data);
        $('.indicator').hide();
        initAllBlogCombos();
    });
}

function initAllAnalysisCombos() {
    $('#analysis_type').unbind('change');
    $('#analysis_type').change(updateAnalysisCombos);

    $('#analysis_market').unbind('change');
    $('#analysis_market').change(updateAnalysisInternalCombos);

    $('#analysis_stocklist').unbind('change');
    $('#analysis_stocklist').change(updateAnalysisInternalCombos);

    $('#analysis_sector').unbind('change');
    $('#analysis_sector').change(updateAnalysisInternalCombos);
}

function initAllBlogCombos() {
    $('#sbt_user_blog_ublog_type_id').unbind('change');
    $('#sbt_user_blog_ublog_type_id').change(updateBlogCombos);

    $('#sbt_user_blog_ublog_market_id').unbind('change');
    $('#sbt_user_blog_ublog_market_id').change(updateBlogInternalCombos);

    $('#sbt_user_blog_ublog_stocklist_id').unbind('change');
    $('#sbt_user_blog_ublog_stocklist_id').change(updateBlogInternalCombos);

    $('#sbt_user_blog_ublog_sector_id').unbind('change');
    $('#sbt_user_blog_ublog_sector_id').change(updateBlogInternalCombos);

}

/* This function removes already existing image of a perticular user. */
function removeUserProfilePhoto(user_id) {
    $.ajax({
        url: '/sbt/removeProfileImage?user_id=' + user_id,
        success: function(data) {
            $('#photo_text_div').html(data);
            location.reload();
        }
    });
}

function showProfileImageUploadBox() {
    // This Dialog box is used to upload user profile image.
    $('#change_userprofile_image_box').dialog('destroy');
    var box_width = '';
    var classname = $('#change_userprofile_image_box').attr('class');
    $('#change_userprofile_image_box').removeClass(classname).addClass('show_div');

    // To adjust the popups width in mac safari.
    var jQbrowser = navigator.userAgent.toLowerCase();
    jQuery.os = {
        mac: /mac/.test(jQbrowser),
        win: /win/.test(jQbrowser),
        linux: /linux/.test(jQbrowser)
    };


    if (jQuery.os.mac) {
        if (jQuery.browser.safari) {
            box_width = 350;
        }
    } else
        box_width = 350;

    $('#change_userprofile_image_box').dialog({
        autoOpen: false,
        width: box_width,
        modal: true,
        buttons: {
            "Cancel": function() {
                $(this).dialog("close");
            },
            "Save Image": function() {

                $('#change_userprofile_image_form').submit();

                var browse_box_text = $('#browse_box_div').html();
                $('#browse_box_div').html('<span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" />');
                //checkMessage();
            }
        }
    });
    $('#change_userprofile_image_box').dialog('open');
}

function checkMessage() {
    var upload_response = $('#profile_image_upload_error').html();
    if (upload_response == 'File Uploaded Successfully') {
        $('#browse_box_div').html('');
        var img_name = $('#profile_img_new').val();
        $('#change_userprofile_image_box').dialog("close");
        //location.reload();

        var profile_image_name = img_name;
        showUploadedImage(profile_image_name);
    } else {
        $('#browse_box_div').html('<div class="float_left" style="width:20px;"></div>');
        setTimeout('checkMessage()', 1000);
    }
}

function showUploadedImage(profile_image_name) {
    // This Dialog box is used to upload user profile image.
    $('#upload_userprofile_image_box').dialog('destroy');

    var classname = $('#upload_userprofile_image_box').attr('class');
    $('#upload_userprofile_image_box').removeClass(classname).addClass('show_div');

    //var img = new Image();
    //img.src = "http://"+window.location.hostname+"/uploads/userThumbnail/"+profile_image_name;
    //alert(img.width + 'x' + img.height);
    $('#image_container').html('');
    var img_str = "/uploads/userThumbnail/" + profile_image_name;

    //	$('#image_container').css({'width':'1px solid #BDC2BE'});
    $('#image_container').html('<img src="' + img_str + '" id="cropbox" />');

    $('#img_nm').val(profile_image_name);

    $('#upload_userprofile_image_box').dialog({
        autoOpen: false,
        width: 600,
        modal: true,
        buttons: {
            "Cancel": function() {
                $('#browse_box_div').html('');
                $('#upload_userprofile_image_box').dialog("close");
                $('#upload_userprofile_image_box').dialog('destroy');

                $.ajax({
                    url: '/sbt/cancelCropImage?filename=' + profile_image_name,
                    success: function(data) {
                        location.reload();
                    }
                });
            },
            "Crop Image": function() {

                $.ajax({
                    type: 'POST',
                    data: $('#image_upload_form').serialize(),
                    url: '/sbt/forSavingImage?image_nm=' + profile_image_name,
                    success: function(data) {
                        $('#upload_userprofile_image_box').dialog('destroy');
                        show_reply(data);
                        //location.reload();
                    }
                });

                //$('#image_upload_form').submit();
                $('#upload_userprofile_image_box').dialog("close");
            }
        }

    });

    $('#upload_userprofile_image_box').dialog('open');
    $('#cropbox').Jcrop({
        aspectRatio: 1,
        onSelect: updateCoords,
        setSelect: [0, 0, 107, 107],
        minSize: [107, 107]
    });
}

function updateCoords(c) {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
};

function checkCoords() {
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
};


function showBlogProfileImageUploadBox() {
    // This Dialog box is used to upload user profile image.
    $('#change_userblogprofile_image_box').dialog('destroy');

    $('#blog_profile_image_upload_error').html('');
    $('#change_userblogprofile_image_form').get(0).reset();

    var box_width = '';
    var classname = $('#change_userblogprofile_image_box').attr('class');
    $('#change_userblogprofile_image_box').removeClass(classname).addClass('show_div');

    // To adjust the popups width in mac safari.
    var jQbrowser = navigator.userAgent.toLowerCase();
    jQuery.os = {
        mac: /mac/.test(jQbrowser),
        win: /win/.test(jQbrowser),
        linux: /linux/.test(jQbrowser)
    };


    if (jQuery.os.mac) {
        if (jQuery.browser.safari) {
            box_width = 350;
        }
    } else
        box_width = 350;

    $('#change_userblogprofile_image_box').dialog({
        autoOpen: false,
        width: box_width,
        modal: true,
        buttons: {
            "Cancel": function() {
                $(this).dialog("close");
            },
            "Save Image": function() {

                $('#change_userblogprofile_image_form').submit();

                var browse_box_text = $('#browse_blog_user_img_box_div').html();
                $('#browse_blog_user_img_box_div').html('<span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" />');
                //checkMessage();
            }
        }
    });
    $('#change_userblogprofile_image_box').dialog('open');
}

function checkBlogProfileImageMessage() {
    var upload_response = $('#blog_profile_image_upload_error').html();
    if (upload_response == 'File Uploaded Successfully') {
        $('#browse_blog_user_img_box_div').html('');
        var img_name = $('#blog_profile_img_new').val();
        $('#change_userblogprofile_image_box').dialog("close");
        //location.reload();

        var profile_image_name = img_name;
        showUploadedBlogProfileImage(profile_image_name);
    } else {
        $('#browse_blog_user_img_box_div').html('<div class="float_left" style="width:20px;"></div>');
        setTimeout('checkBlogProfileImageMessage()', 1000);
    }
}

function showUploadedBlogProfileImage(profile_image_name) {
    // This Dialog box is used to upload user profile image.
    $('#change_userblogprofile_image_box').dialog('destroy');

    var classname = $('#upload_bloguserprofile_image_box').attr('class');
    $('#upload_bloguserprofile_image_box').removeClass(classname).addClass('show_div');

    //var img = new Image();
    //img.src = "http://"+window.location.hostname+"/uploads/userThumbnail/"+profile_image_name;
    //alert(img.width + 'x' + img.height);
    $('#blog_image_container').html('');
    var img_str = "/uploads/userBlogProfileImage/" + profile_image_name;

    //	$('#image_container').css({'width':'1px solid #BDC2BE'});
    $('#blog_image_container').html('<img src="' + img_str + '" id="blogImageCropbox" />');

    $('#img_nm').val(profile_image_name);

    $('#upload_bloguserprofile_image_box').dialog({
        autoOpen: false,
        width: 600,
        modal: true,
        buttons: {
            "Cancel": function() {
                $('#browse_blog_user_img_box_div').html('');
                $('#upload_bloguserprofile_image_box').dialog("close");
                $('#upload_bloguserprofile_image_box').dialog('destroy');

                $.ajax({
                    url: '/sbt/cancelCropBlogProfileImage?filename=' + profile_image_name,
                    success: function(data) {
                        location.reload();
                    }
                });
            },
            "Crop Image": function() {

                $.ajax({
                    type: 'POST',
                    data: $('#blog_profile_image_upload_form').serialize(),
                    url: '/sbt/forSavingBlogProfileImage?image_nm=' + profile_image_name,
                    success: function(data) {
                        $('#upload_bloguserprofile_image_box').dialog('destroy');
                        show_blog_profile_image_reply(data, profile_image_name);
                        //location.reload();
                    }
                });

                //$('#image_upload_form').submit();
                $('#upload_bloguserprofile_image_box').dialog("close");
            }
        }

    });

    $('#upload_bloguserprofile_image_box').dialog('open');
    $('#blogImageCropbox').Jcrop({
        aspectRatio: 0,
        onSelect: updateBlogImageCoords,
        setSelect: [0, 0, 80, 80],
        minSize: [80, 80],
        maxSize: [585, 320]
    });
}

function updateBlogImageCoords(c) {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
};

function showTextDiv() {
    $('#author_name_div').toggle();
    getNameList();
}

function getNameList() {

    $.ajax({
        url: '/sbt/getAllUsernames',
        success: function(data) {
            var names = data.split(',')
            $("#name_list").autocomplete({
                source: names
            });
        }
    });
}

function set_combine_author() {
    getNameList();
    var name_str = $('#combined_author_names').val();
    var name_arr = name_str.split(',');

    if (name_arr.length > 0) {
        $('#is_combined').attr("checked", "checked");
        $('#author_name_div').toggle();
        var i = 1;
        for (var j = 0; j < name_arr.length; j++) {
            $('#list_div').css({
                'border': '1px solid #BDC2BE'
            });

            var author_name = name_arr[j];
            var div_id = 'd' + i;
            var image_id = 'i' + i;
            var name_list = '<div id=' + div_id + ' class="float_left widthall"><img id=' + image_id + ' class="float_left cursor" src="/images/cross.png" style="margin:2px 5px 7px 5px;" align="cross" />' + author_name + '</div>';

            var exisiting_data = $('#list_div').html();
            $('#list_div').html(exisiting_data + name_list);

            i++;
        }
    }
}

/* Saving data on edit article.*/
function save_edit_article() {
    var analysis_title_flag = analysis_desc_flag = '';
    var analysis_title = trim($('#sbt_analysis_title').val());
    var type_id = $('#analysis_type').val();
    var analysis_description = tinyMCE.activeEditor.getContent();
    var analysis_title_flag = 0;
    var analysis_desc_flag = 0;
    var combined_author_names_flag = 0;
    var analysis_type_flag = 0;

    if (analysis_title == '' || analysis_title.length == 0) {
        $('#analysis_title_error').html('Required');
        $('#sbt_analysis_title').focus();
        analysis_title_flag = 1;
    } else {
        $('#analysis_title_error').html('');
        analysis_title_flag = 0;
    }

    if (type_id < 1) {
        $('#type_error').html('Please select the type');
        $('#analysis_type').focus();
        analysis_type_flag = 1;
    } else {
        $('#type_error').html('');
        analysis_type_flag = 0;
    }

    if (analysis_description == " " || analysis_description.length == 0) {
        $('#article_desc_error').html('Required');
        $('#sbt_analysis_description').focus();
        analysis_desc_flag = 1;
    } else {
        $('#article_desc_error').html('');
        analysis_desc_flag = 0;
    }

    var combined_author_names_flag = 0;
    if ($('input[name=is_combined]').is(':checked')) {
        var div_cnt = $("#list_div > div").size();
        var name_str = '0';
        if (div_cnt == 0) {
            $('#combined_author_names_error').html('You have not added any user.');
            $('#name_list').focus();
            combined_author_names_flag = 1;
        } else {
            $("#list_div").find("div").each(function(index) {
                var str_arr = $(this).html().split('>');

                if (name_str == '0') name_str = str_arr[1];
                else name_str = name_str + ',' + str_arr[1];
            });
            $('#combined_author_names').val(name_str);
            $('#combined_author_names_error').html('');
            combined_author_names_flag = 0;
        }

    } else {
        combined_author_names_flag = 0;
    }

    if ((analysis_title_flag == 0) && (analysis_type_flag == 0) && (analysis_desc_flag == 0) && (combined_author_names_flag == 0)) {
        //tinyMCE.triggerSave();
        //$('#edit_analysis_form').submit();

        var has_publication_rights = $('#edit_has_publication_rights').val();
        var analysis_status = $('#edit_analysis_status').val();


        if (analysis_status == 1 && has_publication_rights == 0) {
            show_edit_analysis_first_confirmation('Din artikel är publicerad i din blogg och i ditt artikelarkiv men du har ännu ej rätt att publicera artiklar på BT Insiders förstasida. Vill du skicka en publiceringsansökan för denna artikel till BT Insiders administratör?');

        }

        if (analysis_status == 1 && has_publication_rights == 1) {
            edit_confirmation_before_publish_analysis('Vill du verkligen skicka denna artikel för publicering? Kom ihåg att korrekturläsa!');
        }

        var process_analysis_button = $('#edit_process_analysis_outer').html();
        var processing_str = '<span class="float_left">' + process_analysis_button + '</span>  <span class="float_left" style="padding-left:5px;"><img src="../images/indicator.gif" /></span>';

        if (analysis_status == 6) {
            $('#edit_process_analysis_outer').html(processing_str);
            save_edit_analysis_blog_data('6');
        }
        if (analysis_status == 7) {
            $('#edit_process_analysis_outer').html(processing_str);
            save_edit_analysis_blog_data('7');
        }

    }
}

function show_edit_analysis_first_confirmation(msg) {
    $('#edit_request_for_publish_analysis_box_1').dialog('destroy');

    var classname = $('#edit_request_for_publish_analysis_box_1').attr('class');
    $('#edit_request_for_publish_analysis_box_1').removeClass(classname).addClass('show_div');

    $('#edit_publish_analysis_box_1_message').css({
        'display': 'block',
        'visibility': 'visible'
    });

    $('#edit_publish_analysis_box_1_message').html(msg);

    // This Dialog box is used before sending a publish analysis request.		
    $('#edit_request_for_publish_analysis_box_1').dialog({
        autoOpen: false,
        modal: true,
        width: 600,
        buttons: {
            "JA": function() {

                $('#edit_request_for_publish_analysis_box_1').dialog("close");
                show_edit_analysis_secound_confirmation('Vill du verkligen skicka denna artikel för ansökan om publicering? Kom ihåg att korrekturläsa!');
            },
            "NEJ": function() {

                save_edit_analysis_blog_data('7');
                $('#edit_request_for_publish_analysis_box_1').dialog("close");
            }
        }
    });

    $('#edit_request_for_publish_analysis_box_1').dialog('open');
}

function show_edit_analysis_secound_confirmation(msg) {
    $('#edit_request_for_publish_analysis_box_2').dialog('destroy');

    var classname = $('#edit_request_for_publish_analysis_box_2').attr('class');
    $('#edit_request_for_publish_analysis_box_2').removeClass(classname).addClass('show_div');

    $('#edit_publish_analysis_box_2_message').css({
        'display': 'block',
        'visibility': 'visible'
    });

    $('#edit_publish_analysis_box_2_message').html(msg);

    // This Dialog box is used before sending a publish analysis request.		
    $('#edit_request_for_publish_analysis_box_2').dialog({
        autoOpen: false,
        modal: true,
        width: 600,
        buttons: {
            "JA": function() {

                save_edit_analysis_blog_data('0');
                $('#edit_request_for_publish_analysis_box_2').dialog("close");
            },
            "AVBRYT": function() {
                save_edit_analysis_blog_data('7');
                $('#edit_request_for_publish_analysis_box_2').dialog("close");
            }
        }
    });

    $('#edit_request_for_publish_analysis_box_2').dialog('open');
}

function edit_confirmation_before_publish_analysis(msg) {
    $('#edit_confirmation_before_publish_box').dialog('destroy');

    var classname = $('#confirmation_before_publish_box').attr('class');
    $('#edit_confirmation_before_publish_box').removeClass(classname).addClass('show_div');

    $('#edit_confirmation_before_publish_box_message').css({
        'display': 'block',
        'visibility': 'visible'
    });

    $('#edit_confirmation_before_publish_box_message').html(msg);

    // This Dialog box is used before sending a publish analysis request.		
    $('#edit_confirmation_before_publish_box').dialog({
        autoOpen: false,
        modal: true,
        width: 600,
        buttons: {
            "JA": function() {

                save_edit_analysis_blog_data('1');
                $('#edit_confirmation_before_publish_box').dialog("close");
            },
            "AVBRYT": function() {
                save_edit_analysis_blog_data('7');
                $('#edit_confirmation_before_publish_box').dialog("close");
            }
        }
    });

    $('#edit_confirmation_before_publish_box').dialog('open');
}

function save_edit_analysis_blog_data(publish_status) {
    var analysis_description = tinyMCE.activeEditor.getContent();
    $('#edit_analysis_form #sbt_published').val(publish_status);
    $('#edit_analysis_desc_hid').val(analysis_description);
    tinyMCE.triggerSave();

    var article_id = $('#edit_analysis_form #sbt_id').val();

    $.ajax({
        type: 'POST',
        data: $('#edit_analysis_form').serialize(),
        url: '/sbt/editAnalysis?article_id=' + article_id,
        success: function(data1) {
            window.location = 'http://' + window.location.hostname + '/sbt/sbtArticleDetails/article_id/' + data1;

            $.ajax({
                type: 'POST',
                data: $('#create_analysis_form').serialize(),
                url: '/email/analysisCreationMail',
                success: function(data) {
                    //$("#create_blog").html(data1);
                    //$('html, body').animate( { scrollTop: 0 }, 0 );
                    //initCombos('analysis');
                    closeMCE();
                }
            });

        }
    });

}

/*!
 *
 * This function sets the image for forum topic listing as per the order.
 *
 */
function setForumTopicListOrderImage(column_id, order) {
    if (order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="desc" />';
    if (order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="asc" />';

    if (column_id == 'sortby_subject') $('#sortby_subject').html('<span class="float_left" style="width:60px;">Rubrik' + image_txt + '</span>');
    if (column_id == 'sortby_category') $('#sortby_category').html('<span class="float_left" style="width:70px;">Ämne' + image_txt + '</span>');
    if (column_id == 'sortby_author') $('#sortby_author').html('<span class="float_left" style="width:83px;">Skapad av' + image_txt + '</span>');
    if (column_id == 'sortby_reply') $('#sortby_reply').html('<span class="float_left" style="width:55px;">Inlägg' + image_txt + '</span>');
    if (column_id == 'sortby_view') $('#sortby_view').html('<span class="float_left" style="width:55px;">Visad' + image_txt + '</span>');
    if (column_id == 'sortby_date') $('#sortby_date').html('<span class="float_left" style="width:70px;">Senaste' + image_txt + '</span>');
}

function shopChartHeight() {
    $(".rightbanner").css({
        "height": "auto"
    });
    $(".btshopleftdiv").css({
        "height": "auto"
    });
    var leftHeight = $(".btshopleftdiv").height();
    var rightHeight = $(".rightbanner").height();
    var maxHeight = 0;

    if (rightHeight > leftHeight) {
        maxHeight = rightHeight;
    } else {
        maxHeight = leftHeight;
    }

    $(".rightbanner").css({
        "height": maxHeight + "px"
    });
    $(".btshopleftdiv").css({
        "min-height": maxHeight + "px"
    });
}

function setHeightOnAllPage(left_class, right_class) {
    $("." + left_class).css({
        "height": "auto"
    });
    $("." + right_class).css({
        "height": "auto"
    });
    var leftHeight = $("." + left_class).height();
    var rightHeight = $("." + right_class).height();
    var maxHeight = 0;

    if (rightHeight > leftHeight) {
        maxHeight = rightHeight;
    } else {
        maxHeight = leftHeight;
    }

    $("." + left_class).css({
        "height": maxHeight + "px"
    });
    $("." + right_class).css({
        "min-height": maxHeight + "px"
    });
}

function check_adv_search_parameter() {
    var adv_phrase_in_page = trim($('#adv_phrase_in_page').val());
    var adv_author_name = trim($('#adv_author_name').val());
    var start_date_text = trim($('#start_date_text').val());
    var end_date_text = trim($('#end_date_text').val());
    var checkbox_count = 0;

    $('#adv_search_form').find(".checkbox").each(function(index) {
        if ($('#' + this.id).attr('checked')) {
            checkbox_count = checkbox_count + 1;
        }
    });
    if ($('#search_from_userlist').attr('checked') && checkbox_count == 1)
        var userlist = 1;
    else
        var userlist = 0;

    if (adv_phrase_in_page.length == 0 && adv_author_name.length == 0 && start_date_text.length == 0 && end_date_text.length == 0 && userlist == 0) {
        var div1_str = trim($('#adv_search_cat_type_combo').html()).length;
        var div2_str = trim($('#adv_search_combo_set').html()).length;
        if (div1_str > 0 || div2_str > 0)
            return true;
        $('#adv_search_error').html('Please fill atleast one field.');
        return false;
    } else {
        $('#adv_search_error').val('');
        return true;
    }
}

function show_reply(reply_message) {
    $('#show_reply_box').dialog('destroy');

    var classname = $('#show_reply_box').attr('class');
    $('#show_reply_box').removeClass(classname).addClass('show_div');
    $('#show_reply_message').html(reply_message);

    $('#show_reply_box').dialog({
        autoOpen: false,
        width: 300,
        modal: true,
        buttons: {
            "Ok": function() {
                $('#show_reply_box').dialog("close");
                location.reload();
            }
        }

    });
    $('#show_reply_box').dialog('open');
}

function show_blog_profile_image_reply(reply_message, blog_profile_image_name) {
    $('#show_blog_profile_image_reply_box').dialog('destroy');

    var classname = $('#show_blog_profile_image_reply_box').attr('class');
    $('#show_blog_profile_image_reply_box').removeClass(classname).addClass('show_div');
    $('#show_blog_profile_image_reply_message').html(reply_message);

    $('#show_blog_profile_image_reply_box').dialog({
        autoOpen: false,
        width: 300,
        modal: true,
        buttons: {
            "Ok": function() {
                $('#show_blog_profile_image_reply_box').dialog("close");
                $('#blog_profile_crop_reply').html(reply_message);
                $('#blog_header_image').val(blog_profile_image_name);
                //location.reload();
            }
        }

    });
    $('#show_blog_profile_image_reply_box').dialog('open');
}

function show_forum_preview() {
    var title = $('#btforum_rubrik').val();
    var desc = tinyMCE.activeEditor.getContent();
    var q1 = desc.split("[quote]");
    var q2 = desc.split("[/quote]");
    var q3 = desc.split("[quotename]");
    var q4 = desc.split("[/quotename]");
    var q5 = desc.split("[quotedesc]");
    var q6 = desc.split("[/quotedesc]");
    for (var i = 0; i <= q1.length; i++) {
        desc = desc.replace("[quote]", "<div class='bb-quote'>");
    }
    for (var i = 0; i <= q2.length; i++) {
        desc = desc.replace("[/quote]", "</div>");
    }
    for (var i = 0; i <= q3.length; i++) {
        desc = desc.replace("[quotename]", "<div class='forum_post_quote_ref widthall'>");
    }
    for (var i = 0; i <= q4.length; i++) {
        desc = desc.replace("[/quotename]", "</div>");
    }
    for (var i = 0; i <= q5.length; i++) {
        desc = desc.replace("[quotedesc]", "<div class='forum_post_quote widthall'>");
    }
    for (var i = 0; i <= q6.length; i++) {
        desc = desc.replace("[/quotedesc]", "</div>");
    }

    $('#preview_forum_topic').html(title);
    $('#preview_forum_desc').html(desc);

    $('#show_forum_preview_box').dialog('destroy');
    var classname = $('#show_forum_preview_box').attr('class');
    $('#show_forum_preview_box').removeClass(classname).addClass('show_div');

    $('#show_forum_preview_box').dialog({
        autoOpen: false,
        width: 650,
        modal: true,
        buttons: {
            "Ok": function() {
                $(this).dialog("close");
            }
        }
    });
    $('#show_forum_preview_box').dialog('open');
}

/*!
 *
 * to open confirmation box.
 *
 */
function open_confirmation(mess, str, dialog_divid, msgdivid) {
    //alert(str);
    $('#' + dialog_divid).dialog('open');
    $('#' + msgdivid).html(mess);

    if (dialog_divid == 'delete_forum_topic_confirm_box')
        $('#delete_forum_topic_id').val(str);
    else
        $('#delete_forum_topic_id').val('');

    if (dialog_divid == 'deleteblog_confirm_box')
        $('#delete_blog_id').val(str);
    else
        $('#delete_blog_id').val('');

}
/*--------------------------------------------------- BT article comment-------------------------------------------------------------------*/

/*
 *
 * Function to open confirmation box before delete any article comment
 *
 */

function open_confirmation_delete_article_comment(mess, str, dialog_divid, msgdivid) {
    $('#' + dialog_divid).dialog('open');
    $('#' + msgdivid).html(mess);
    $("#delete_comment_by_id").val(str);
}
/*---------------------------------------------------End of BT article comment-------------------------------------------------------------*/
/*--------------------------------------------------- SBT article comment------------------------------------------------------------------*/

/*
 *
 * Function to open confirmation box before delete any article comment for SBT
 *
 */

function open_confirmation_delete_article_comment_sbt(mess, str, dialog_divid, msgdivid) {
    $('#' + dialog_divid).dialog('open');
    $('#' + msgdivid).html(mess);
    $("#delete_comment_by_id_sbt").val(str);
}
/*---------------------------------------------------End of SBT article comment------------------------------------------------------------*/
/*--------------------------------------------------- Forum article comment------------------------------------------------------------------*/

/*
 *
 * Function to open confirmation box before delete any article comment for Forum
 *
 */

function open_confirmation_delete_article_comment_forum(mess, str, dialog_divid, msgdivid) {
    $('#' + dialog_divid).dialog('open');
    $('#' + msgdivid).html(mess);
    $("#delete_comment_by_id_forum").val(str);
}
/*---------------------------------------------------End of SBT article comment------------------------------------------------------------*/

function show_analysis_first_confirmation(msg) {
    $('#request_for_publish_analysis_box_1').dialog('destroy');

    var classname = $('#request_for_publish_analysis_box_1').attr('class');
    $('#request_for_publish_analysis_box_1').removeClass(classname).addClass('show_div');

    $('#publish_analysis_box_1_message').css({
        'display': 'block',
        'visibility': 'visible'
    });

    $('#publish_analysis_box_1_message').html(msg);

    // This Dialog box is used before sending a publish analysis request.		
    $('#request_for_publish_analysis_box_1').dialog({
        autoOpen: false,
        modal: true,
        width: 600,
        buttons: {
            "JA": function() {

                $('#request_for_publish_analysis_box_1').dialog("close");
                show_analysis_secound_confirmation('Vill du verkligen skicka denna artikel för ansökan om publicering? Kom ihåg att korrekturläsa!');
            },
            "NEJ": function() {

                save_analysis_blog_data('7');
                $('#request_for_publish_analysis_box_1').dialog("close");
            }
        }
    });

    $('#request_for_publish_analysis_box_1').dialog('open');
}

function show_analysis_secound_confirmation(msg) {
    $('#request_for_publish_analysis_box_2').dialog('destroy');

    var classname = $('#request_for_publish_analysis_box_2').attr('class');
    $('#request_for_publish_analysis_box_2').removeClass(classname).addClass('show_div');

    $('#publish_analysis_box_2_message').css({
        'display': 'block',
        'visibility': 'visible'
    });

    $('#publish_analysis_box_2_message').html(msg);

    // This Dialog box is used before sending a publish analysis request.		
    $('#request_for_publish_analysis_box_2').dialog({
        autoOpen: false,
        modal: true,
        width: 600,
        buttons: {
            "JA": function() {

                save_analysis_blog_data('8');
                $('#request_for_publish_analysis_box_2').dialog("close");
            },
            "AVBRYT": function() {
                save_analysis_blog_data('7');
                $('#request_for_publish_analysis_box_2').dialog("close");
            }
        }
    });

    $('#request_for_publish_analysis_box_2').dialog('open');
}

function confirmation_before_publish_analysis(msg) {
    $('#confirmation_before_publish_box').dialog('destroy');

    var classname = $('#confirmation_before_publish_box').attr('class');
    $('#confirmation_before_publish_box').removeClass(classname).addClass('show_div');

    $('#confirmation_before_publish_box_message').css({
        'display': 'block',
        'visibility': 'visible'
    });

    $('#confirmation_before_publish_box_message').html(msg);

    // This Dialog box is used before sending a publish analysis request.		
    $('#confirmation_before_publish_box').dialog({
        autoOpen: false,
        modal: true,
        width: 600,
        buttons: {
            "JA": function() {

                save_analysis_blog_data('1');
                $('#confirmation_before_publish_box').dialog("close");
            },
            "AVBRYT": function() {
                save_analysis_blog_data('7');
                $('#confirmation_before_publish_box').dialog("close");
            }
        }
    });

    $('#confirmation_before_publish_box').dialog('open');
}

function save_analysis_blog_data(publish_status) {
    var analysis_description = tinyMCE.activeEditor.getContent();
    $('#sbt_published').val(publish_status);
    $('#analysis_desc_hid').val(analysis_description);
    tinyMCE.triggerSave();
    $('#blog_article').val(0);
    $.ajax({
        type: 'POST',
        data: $('#create_analysis_form').serialize(),
        url: '/sbt/sbtAddAnalysis',
        success: function(data1) {
            window.location = 'http://' + window.location.hostname + '/sbt/sbtArticleDetails/article_id/' + data1;

            $.ajax({
                type: 'POST',
                data: $('#create_analysis_form').serialize(),
                url: '/email/analysisCreationMail',
                success: function(data) {
                    //$("#create_blog").html(data1);
                    //$('html, body').animate( { scrollTop: 0 }, 0 );
                    //initCombos('analysis');
                    closeMCE();
                }
            });

        }
    });

}

function paymentMethod(method_id) {
    if (method_id == 1) $('.bank_selection_outer').hide();
    if (method_id == 2) $('.bank_selection_outer').show();
    if (method_id == 3) $('.bank_selection_outer').hide();
}

/*!
 *
 * This function validates the eduSignUpForm and returns the errors if any.
 *
 */
function validateEduSignUoForm() {
    var firstname = $('#edu_firstname').val();
    var lastname = $('#edu_lastname').val();
    var email = $('#edu_email').val();
    var edu_street = $('#edu_street').val();
    var edu_zipcode = $('#edu_zipcode').val();
    var edu_city = $('#edu_city').val();
    var edu_city = $('#edu_city').val();

    var firstname_flag = 0;
    var lastname_flag = 0;
    var email_flag = 0;
    var enq_type_flag = 0;
    var enq_subject_flag = 0;
    var user_question_flag = 0;

    if (!firstname) {
        $('#edu_firstname_error').html('<strong>OBS!</strong> Förnamnsfältet är tomt.<br/>');
        $('#firstname').focus();
        firstname_flag = 1;
    } else $('#edu_firstname_error').html('');

    if (!lastname) {
        $('#edu_lastname_error').html('<strong>OBS!</strong> Efternamnsfältet är tomt.<br/>');
        $('#lastname').focus();
        lastname_flag = 1;
    } else $('#edu_lastname_error').html('');

    if (!email) {
        $('#edu_email_error').html('<strong>OBS!</strong> Du har inte fyllt i någon e-postadress.<br>');
        $('#email').focus();
        email_flag = 1;
    } else {

        apos = email.indexOf("@");
        dotpos = email.lastIndexOf(".");
        if (apos < 1 || dotpos - apos < 2) {
            $('#edu_email_error').html('<b>OBS!</b> Inmatad e-post har inte rätt syntax!<br/>');
            $('#email').focus();
            email_flag = 1;
        } else $('#edu_email_error').html('');
    }

    if (enq_type <= 0) {
        $('#contact_enq_type_error').html('<strong>OBS!</strong> Välj typ av förfrågan.<br/>');
        $('#enq_type').focus();
        enq_type_flag = 1;
    } else $('#contact_enq_type_error').html('');

    if (!enq_subject) {
        $('#contact_enq_subject_error').html('<strong>OBS!</strong> Du har inte fyllt i någon rubrik.<br/>');
        $('#enq_subject').focus();
        enq_subject_flag = 1;
    } else $('#contact_enq_subject_error').html('');

    if (user_question == " " || user_question.length == 0) {
        $('#contact_enq_question_error').html('<strong>OBS!</strong> Frågan är tom.<br/>');
        $('#contact_enquiry_user_question').focus();
        user_question_flag = 1;
    } else $('#contact_enq_question_error').html('');

    if (firstname_flag == 0 && lastname_flag == 0 && email_flag == 0 && enq_type_flag == 0 && enq_subject_flag == 0 && user_question_flag == 0)
        $('#contactus').submit();

    /*$.get("/borst/validateContactForm?firstname="+firstname+'&lastname='+lastname+'&email='+email+'&enq_type='+enq_type+'&enq_subject='+enq_subject, function(data){
    		if(data=='') $('#contactus').submit();
    		else $('#contact_form_error').html(data);
    	});*/
}

/*!
 *
 * This function sets the image for blogtoplist page as per the order.
 *
 */
function setBlogTopListOrderImage(column_id, order) {

    //	if(order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="desc" />';
    //	if(order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="asc" />';

    if (column_id == 'sortby_title') $('#sortby_title').html('<span class="float_left">Rubrik</span>');
    if (column_id == 'sortby_author') $('#sortby_author').html('<span class="float_left">Författare</span>');
    if (column_id == 'sortby_date') $('#sortby_date').html('<span class="float_left">Uppdaterad</span>');
    if (column_id == 'sortby_vote') $('#sortby_vote').html('<span class="float_right">Röster</span>');
    if (column_id == 'sortby_view') $('#sortby_view').html('<span class="float_right ">Visad</span>');

}

/*!
 *
 * This function sets the image for analysistoplist page as per the order.
 *
 */
function setAnalysisTopListOrderImage(column_id, order) {
    //if(order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="desc" />';
    //if(order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="asc" />';

    if (column_id == 'sortby_title') $('#sortby_title').html('<span class="float_left">Rubrik</span>');
    if (column_id == 'sortby_author') $('#sortby_author').html('<span class="float_left">Författare</span>');
    if (column_id == 'sortby_date') $('#sortby_date').html('<span class="float_left">Uppdaterad</span>');
    if (column_id == 'sortby_vote') $('#sortby_vote').html('<span class="float_left">Röster</span>');
    if (column_id == 'sortby_view') $('#sortby_view').html('<span class="float_left">Läst</span>');

}

/*!
 *
 * This function sets the image for articletoplist page as per the order.
 *
 */
function setArticleTopListOrderImage(column_id, order) {
    //	if(order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="desc" />';
    //	if(order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="asc" />';

    if (column_id == 'sortby_title') $('#sortby_title').html('<span class="float_left">Rubrik</span>');
    if (column_id == 'sortby_author') $('#sortby_author').html('<span class="float_left" >Författare</span>');
    if (column_id == 'sortby_date') $('#sortby_date').html('<span class="float_left">Datum</span>');
    if (column_id == 'sortby_comment') $('#sortby_comment').html('<span class="float_right">Komm</span>');
    if (column_id == 'sortby_view') $('#sortby_view').html('<span class="float_right">Läst</span>');
}

/*!
 *
 * This function sets the image for usertoplist page as per the order.
 *
 */
function setUserTopListOrderImage(column_id, order) {
    //if(order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="desc" />';
    //	if(order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="asc" />';

    if (column_id == 'sortby_author') $('#sortby_author').html('<span class="float_left">Användare</span>');
    if (column_id == 'sortby_vote') $('#sortby_vote').html('<span class="float_left">Röster</span>');
    if (column_id == 'sortby_activity') $('#sortby_activity').html('<span class="float_right">Aktiviteter</span>');
}


/* To show the opened window in center of page. */
function openWindowInCenter(post_url, new_width, new_height, window_name) {
    var url = "http://" + window.location.hostname + "/" + post_url;
    var name = window_name;
    var w = new_width;
    var h = new_height;

    // Fudge factors for window decoration space.
    // In my tests these work well on all platforms & browsers.
    w += 32;
    h += 96;
    wleft = (screen.width - w) / 2;
    wtop = (screen.height - h) / 2;
    // IE5 and other old browsers might allow a window that is
    // partially offscreen or wider than the screen. Fix that.
    // (Newer browsers fix this for us, but let's be thorough.)
    if (wleft < 0) {
        w = screen.width;
        wleft = 0;
    }
    if (wtop < 0) {
        h = screen.height;
        wtop = 0;
    }
    var win = window.open(url,
        name,
        'width=' + w + ', height=' + h + ', ' +
        'left=' + wleft + ', top=' + wtop + ', ' +
        'location=no, menubar=no, ' +
        'status=no, toolbar=no, scrollbars=yes, resizable=yes');
    // Just in case width and height are ignored
    win.resizeTo(w, h);
    // Just in case left and top are ignored
    win.moveTo(wleft, wtop);
    win.focus();

    //window.open("http://"+window.location.hostname+"/epolicy.php","mywindow","menubar=1,resizable=1,width=500,height=525");
}

function autoHeightOnPage() {
    //$(".forumlistingleftdiv").css({"height":"auto"});
}

function autoHeightForListingLeft() {
    $('.listingleftdiv').css({
        "height": "auto"
    });
}

function confirmation_delete_blog(row_id) {
    $('#deleteblog_confirm_box').dialog('destroy');

    var classname = $('#deleteblog_confirm_box').attr('class');
    $('#deleteblog_confirm_box').removeClass(classname).addClass('show_div');

    // This Dialog box is used when a blog topic is to be deleted.
    $('#deleteblog_confirm_box').dialog({
        autoOpen: false,
        width: 400,
        modal: true,
        buttons: {
            "Delete Blog Topic": function() {
                $(this).dialog("close");
                $('#myblog_list_page #' + row_id).remove();

                $.get("/sbt/deleteBlogAndRelatedData?blog_id=" + row_id, function(data) {
                    //$("#blog_detail_div").html(data);
                });
            },
            "Cancel": function() {
                $(this).dialog("close");
            }
        }
    });

    $('#deleteblog_confirm_box').dialog('open');
}

/* This function deletes selected blog from showAllBlogPostOfUser page. */
function confirmation_delete_blog_showallpage(row_id) {
    $('#deleteblog_confirm_box').dialog('destroy');

    var classname = $('#deleteblog_confirm_box').attr('class');
    $('#deleteblog_confirm_box').removeClass(classname).addClass('show_div');

    var arr = row_id.split('_');

    // This Dialog box is used when a blog topic is to be deleted.
    $('#deleteblog_confirm_box').dialog({
        autoOpen: false,
        width: 400,
        modal: true,
        buttons: {
            "Delete Blog Topic": function() {
                $(this).dialog("close");
                $('#blogsection_' + arr[1]).remove();

                $.get("/sbt/deleteBlogAndRelatedData?blog_id=" + row_id, function(data) {
                    //$("#blog_detail_div").html(data);
                });
            },
            "Cancel": function() {
                $(this).dialog("close");
            }
        }
    });

    $('#deleteblog_confirm_box').dialog('open');
}

/*delete blog and redirect page to min blog*/
function confirmation_delete_blog_redirect_to_min_list(row_id) {
    $('#deleteblog_confirm_box').dialog('destroy');

    var classname = $('#deleteblog_confirm_box').attr('class');
    $('#deleteblog_confirm_box').removeClass(classname).addClass('show_div');

    // This Dialog box is used when a blog topic is to be deleted.
    $('#deleteblog_confirm_box').dialog({
        autoOpen: false,
        width: 400,
        modal: true,
        buttons: {
            "Delete Blog Topic": function() {
                $(this).dialog("close");
                $('#myblog_list_page #' + row_id).remove();

                $.get("/sbt/deleteBlogAndRelatedData?blog_id=" + row_id, function(data) {
                    window.location.href = 'http://' + window.location.hostname + '/sbt/showListOfUserBlog';
                });
            },
            "Cancel": function() {
                $(this).dialog("close");
            }
        }
    });

    $('#deleteblog_confirm_box').dialog('open');
}

function cancelProfileChanges() {
    window.location = 'http://' + window.location.hostname + '/sbt/sbtUserProfile';
}

function setHeightOnForum() {
    //var hArray = new Array();
    //var ht = 0;

    //ht = $('#forum_data_container #forum_content').height() +  200 ;

    //hArray[0] = ht;
    //hArray[1] = $("#forum_data_container .rightbanner").height();

    //if(hArray[0] > hArray[1])
    //	var maxHeight = hArray[0];
    //else
    //	var maxHeight = hArray[1];


    //$(".forumlistingleftdiv").css({"height":maxHeight+"px"});
    //$(".rightbanner").css({"height":maxHeight+"px"});
}

function validateForumTopic() {
    var btforum_category_flag = btforum_subject_flag = btforum_desc_flag = 0;

    var cat_id = $('#btforum_btforum_category_id').val();
    if (cat_id < 1) {
        $('#btforum_category_error').html('Please select the category.');
        btforum_category_flag = 1;
        return false;
    } else {
        $('#btforum_category_error').html('');
        var rubrik = trim($('#btforum_rubrik').val());
        var forum_description = tinyMCE.activeEditor.getContent();

        if (rubrik == '' || rubrik.length == 0) {
            $('#btforum_subject_error').html('Required');
            btforum_subject_flag = 1;
        } else {
            $('#btforum_subject_error').html('');
        }

        if (forum_description == '' || forum_description.length == 0) {
            $('#btforum_desc_error').html('Required');
            btforum_desc_flag = 1;
        } else {
            $('#btforum_desc_error').html('');
        }

        if (btforum_category_flag == 0 && btforum_subject_flag == 0 && btforum_desc_flag == 0) {
            //$('#create_forumtopic_form').submit();
            return true;
        } else {
            return false;
        }
    }

}

function pricePerQty(obj) {

    var id = $(obj).attr("id");
    var qty = $(obj).val();
    if (qty > 0) {
        $.ajax({
            url: '/borst_shop/getCartData?qty_index=' + id + '&qty=' + qty,
            success: function(data) {
                $("#shop_rightbanner").html(data);
                setShopPaymentItemList();
                //setShippingCost();
                //if($.browser.msie)	initQty();
                //shopChartHeight();
                //if($.browser.msie)	initQty();
                $.ajax({
                    url: '/borst_shop/getCartDataCount',
                    success: function(data1) {
                        $('.cart_count').html(data1);
                    }
                });
            }
        });

    } else {
        return false;
    }
}

function initQty() {

    //$('input.no_of_product').live('blur','',pricePerQty);

}

function setShopPaymentItemList() {
    $('.btshopleftdiv').removeClass('greyOut');
    $('.btshopleftdiv').css('opacity', 1);
    $.ajax({
        url: '/borst_shop/itemPricing',
        success: function(data) {
            $("#productlistwr").html(data);
            result = $(data).filter('#cart_is_empty').attr("id");
            if (result == 'cart_is_empty') {
                $('#user_cart_details').hide();
                $('.cart_payment_steps').hide();
                $('.shop_note').hide();
            }
        }
    });

}

function setShippingCost() {
    $.ajax({
        url: '/borst_shop/getShippingCostPerCounty?county_code=' + $('#user_country').val(),
        dataType: 'json',
        success: function(data) {
            $('.frakt').html(data.shipping);
            $('.total_amt').html(data.total_price);
            $('.vat_amt').html(data.vat);

        },
        beforeSend: function() {
            $('#indicator').show();
        },
        complete: function() {
            $('#indicator').hide();
        }

    });
}

function setEmbedObject() {
    //jquery for embed object


    setEmbedObjectByName('blogdetail_desc');
    setEmbedObjectByName('popularblog_desc');
}

function setEmbedObjectByName(name) {
    $('.' + name).each(function() {

        var width = $(this).width();
        if (!width)
            width = 555;
        var height = width * 0.13;
        setEmbedChildWidth($(this), width, height);




    });
}

function setEmbedChildWidth(obj, width, height) {
    if (!obj)
        return;
    $(obj).children().each(function() {
        var ww = $(obj).width();
        if (ww > 600) {
            $(this).width(width);
            $(this).height(height);
        }
        setEmbedChildWidth($(this), width, height);
    });

}

function setPrintCss() {
    var obj1 = $('.innerleftdiv');
    var obj2 = $('.wrapper_main');
    addNonPrintCSS(obj2, 'nonPrintCss');

    addNonPrintCSS($('.article_details_ad_wrap'), 'nonPrintCss');
    addNonPrintCSS($('.article_left_list'), 'nonPrintCss');
    addNonPrintCSS($('.article_center_list'), 'nonPrintCss');
    addNonPrintCSS($('.paginationwrapperNew'), 'nonPrintCss');
    addNonPrintCSS($('.social_icons'), 'nonPrintCss');
    addNonPrintCSS($('.breadcrum_menus'), 'nonPrintCss');



    addPrintCSS(obj1, 'printCss');
    addNonPrintCSS(obj1, 'printCss');
    $(obj1).removeClass('nonPrintCss');
    $(obj1).addClass('printCss');
    setTimeout('printCall()', 1000);

}

function printCall() {
    window.print();
}

function addPrintCSS(obj, css) {
    if (!obj)
        return;
    $(obj).parent().each(function() {
        $(this).addClass(css);
        $(this).removeClass('nonPrintCss');
        addPrintCSS($(this), css);
    });
}

function addNonPrintCSS(obj, css) {
    if (!obj)
        return;
    $(obj).children().each(function() {
        if (!$(obj).is('script')) {
            $(this).removeClass('nonPrintCss');
            $(this).addClass(css);
        }

        addNonPrintCSS($(this), css);
    });
}

function userInvoice(id) {
    //$('#myaccount_data_container').html('<span class="float_left" style="text-align:center; padding-bottom:10px; width:100%;"><img src="/images/indicator.gif" /></span>');
    $('#pop-box-over').show();
    $('.indicator').css('display', 'block');
    $.ajax({
        url: '/sbt/sbtMinProfileInvoice?id=' + id,
        success: function(data) {
            $('#myaccount_data_container').html(data);
            $('.indicator').hide();
            $('#pop-box-over').hide();
        }
    });
}

function getFormForreplay(editpost_id, userName) {
    var userLogin = $("#userLogin").val();
    if (userLogin == 1) {
        $.get("/forum/GetForumPostDataForComment?editpost_id=" + editpost_id + "&userName=" + userName, function(data) {
            tinyMCE.activeEditor.setContent(data);
            var pagination_numbers = $('.forum_comment_list_listing:last').html();
            $('#forum_comment_list_listing, .forum_comment_list_listing').html(pagination_numbers);
            $('#postid').val("");
            goToLastPageOnForum();
        });
    } else {
        alert("Logga in för att svara på detta foruminlägg!");
    }
}

function goToLastPageOnForum() {
    var page = $("#lastpage").val(); //$(this).attr("id");
    if (page != 0) {
        var koppling_id = $('#koppling_id').val();

        var pagination_numbers = $('#forum_comment_list_listing, .forum_comment_list_listing').html();
        $('#forum_comment_list_listing, .forum_comment_list_listing').html('<span class="">' + pagination_numbers + '</span>  <span class="" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        //$('.indicator').show();	
        $('html, body').scrollTo($('.indicator'));
        $.get("/forum/saveCommentOnForum?page=" + page + "&koppling_id=" + koppling_id, function(data) {
            $("#forum_comment_list_div").html(data);
            var pagination_numbers = $('.forum_comment_list_listing:last').html();
            $('#forum_comment_list_listing, .forum_comment_list_listing').html(pagination_numbers);
            //setHeightOnForum();
            //$('.indicator').hide();
            $('html, body').scrollTo($('#borst_forum_reply'));
        });
    } else {
        $('html, body').scrollTo($('#borst_forum_reply'));
    }
}

function paginationPopupAllPostsGo(obj) {
    var column_id = $('#column_id').val();
    var parent_id = $('#parent_id').val();
    var user_id = $('#current_user').val();
    var page = $(obj).prev().val();
    var _parent = $(obj).parents(".profile_useralldata_list_listing");
    var paginationFor = "";
    if ($(_parent).attr("data") != "") {
        paginationFor = "-" + $(_parent).attr("data");
    }

    var current_column_order = $('#useralldata_list_current_column_order').val();

    var pagination_numbers = $(_parent).html();
    //$(_parent).html(pagination_numbers+'<span class="" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');
    $(_parent).html(pagination_numbers + '');
    $('#pop-box-over').show();
    $('.indicator').css('display', 'block');
    $.post("/sbt/getSbtMinProfileAllPost?column_id=" + column_id + '&id=' + user_id + "&page" + paginationFor + "=" + page + '&parent_id=' + parent_id + '&useralldata_list_current_column_order=' + current_column_order, function(data) {
        $('#profile_data_container').html(data);
        $('.indicator').hide();
        $('#pop-box-over').hide();
        setSearchOrderImageForAll('sortby_' + column_id, current_column_order, parent_id);
    });
}

