<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>  
        <link rel="shortcut icon" href="/images/favicon.png" />
        <meta name="description" content="<?php echo $metatags_desc ? $metatags_desc : "Vill du tjäna på börsen? Börstjänaren ger dig aktieanalyser, affärsförslag och utbildning!"; ?>" />
        <meta name="keywords" content="<?php echo $metatags_keywords ? $metatags_keywords : "gnyrrvler aktier börs börshandel börstjänaren börsanalys råvaror valuta valutor aktieutbildning cfd omx ericsson guld olja nasdaq courtage analys aktieanalyser trading trejding trejdning swingtrading daytrading råd placering traders teknisk analys aktietips"; ?>" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=IE9" />
            <meta property="og:title"         content="<?php echo $sf_user->getAttribute('meta_title_page') ? $sf_user->getAttribute('meta_title_page') : 'Börstjänaren - Aktieanalys och utbildning | Nu med Bitcoin och krypto!'; ?>" />
            <meta property="og:description"   content="<?php echo $sf_user->getAttribute('meta_desc_page') ? $sf_user->getAttribute('meta_desc_page') : 'Vill du tjäna på börsen? Börstjänaren ger dig aktieanalyser, affärsförslag och utbildning!' ?>" />
            <meta property="og:image"         content="http://www.hallenborgsandstrom.se/images/new_home/borst_facebook_img.png" />
            <meta name="title" content="AddThis Tour" /> 
            <meta name="description" content="Watch the AddThis Tour video." />
            <link rel="image_src" content="http://i2.ytimg.com/vi/1F7DKyFt5pY/default.jpg" />
            <title><?php echo ($metatags_title ? $metatags_title : "Börstjänaren - Aktieanalys och utbildning | Nu med nätverket BT Insider!"); ?></title>
            <link href="/css/print.css" media="print" type="text/css" rel="stylesheet"/>
            <?php include_stylesheets() ?>
            <?php include_javascripts() ?>
            <?php if (!strpos($_SERVER['HTTP_USER_AGENT'], "MSIE 9")): ?>
                <?php use_javascript("/js/jquery.bgiframe.min.js"); ?>
            <?php endif; ?>
            <!--[if IE]>
                        <link rel="stylesheet" type="text/css" media="screen" href="/css/style_ie.css" />
                <![endif]-->
            <!--[if IE 7]>
                        <link rel="stylesheet" type="text/css" media="screen" href="/css/main_ie7.css" />
                <![endif]-->
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-8054826-1"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag() {
                    dataLayer.push(arguments);
                }
                gtag('js', new Date());

                gtag('config', 'UA-8054826-1');
            </script>
            <style>
                .popup {
                    position: fixed;
                    max-width: 800px;
                    top: 30%;
                    left: 30%;
                    width:600px;
                    height:480px;
                    z-index: 999;
                    display:none;
                }
            </style>
    </head>
    <div class="wrapper_main">
        <?php if ($sf_user->isAuthenticated()): ?>
        <?php else: ?>
            <div id="container" class="popup">
                <div id="exampleModal" class="reveal-modal">
                    <div class="popup_left"></div>
                    <div class="popup_right">
                        <div class="closePopup floatRight" >&nbsp;</div>
                        <div class="pop_title">ANMÄL DIG NU!</div>
                        <div class="pop_sub_title">Och få Börstjänarens kostnadsfria marknadsbrev direkt hem i mejlboxen.</div>
                        <div><input type="text" id="getemail" class="pop_e-mail" placeholder="FYLL I DIN E-POSTADRESS HÄR"/></div>
                        <div class="error_popup"><p class="success_message margin_left_40">E-postadressen  tillagd.</p><p class="error_valid_email">Vänligen ange en korrekt e-postadress.</p><p class="error_email_exist">Den här e-postadressen är redan registrerad.</p></div>
                        <div class="margin_top_10"><input type="button" id="submitEmail" value="Skicka" class="popup_btn"/></div>
                        <div class="pop_subtitle">Nya affärsförslag varje vecka!</div>
                        <div class="pop_img_div">
                            <!-- <img src="/images/new_home/POP-UP_VT.png" alt="ad1" width="188" style="margin-right:1px;" /> -->
                            <img src="/images/new_home/POP-UP_VM2.png" alt="ad2" width="376"/>                            
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="wrapper">
            <?php $right_ads_value = array(27, 50); ?>
            <?php $right_ads_count = 0; ?>
            <div class="loginBar">
                <div class="loginDiv">

                    <?php //if($sf_user->getAttribute('username','','userProperty')):?>
                    <?php if ($sf_user->isAuthenticated()): ?>
                        <?php include_component('user', 'afterlogin') ?>
                    <?php else: ?>
                        <?php include_component('user', 'userlogin') ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="cookie_bg">
                <div class="cookie_wrap">
                    <div class="cookie">Vi använder cookies för att ge dig en bättre upplevelse av Börstjänarens webbplats.</div>
                    <a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstCookie"><div class="cookie_link">Om våra cookies.</div></a>
                    <div class="cookie_button_bg" id="cookie_ok"><span class="cookie_button">OK</span></div>
                </div>
            </div>
            <div class="headerDiv">
                <div class="bt_head-divide width_25">
                    <div class="floatLeft"><a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] ?>" class="logo"><img src="/images/new_home/logo_bt.png" alt="logo"/></a></div>
                    <div class="floatLeft bt_head_date_wrap">
                        <div class="bt_head_week">VECKA <?php echo date('W');?></div>
                        <div class="bt_head_day">Torsdag</div>
                        <div class="bt_head_date">17</div>
                        <div class="bt_head_month">maj</div>
                    </div>
                </div>
                <div class="bt_head-divide">
                    <div class="bt_head-ad-wrap">
                        <?php include_component('user', 'topAd') ?>
                    </div>                    
                </div>
            </div>
            
            <?php include_partial('global/top_menu') ?>
            <?php //include_partial('global/third_menu') ?>

            <div class="content_main_div">

                <?php echo $sf_content ?>

                <!--<div class="bottom_footer_divider">&nbsp;</div>-->
                <div class="up_div"><div class="up_sub_div"><a href="#"><img src="/images/new_home/up_1.png" /></a></div></div>
                <div class="copyright_div bottom_copyright">© Copyright Morningbriefing Börstjänaren AB <?php echo date('Y'); ?></div>
            </div>   
        </div>
    </div>
    <div class="footer_bottom_div">&nbsp;</div>
    <?php //include_javascripts() ?>
    <script type="text/javascript">
        $(document).ready(function ()
        {
            $.ajaxSetup({
                cache: false
            });
            $.get('/track/update');

            $(".closePopup").live("click", function () {
                createCookie('closepopup', 840, 1);
                $(".popup").hide();
            });

            $("#submitEmail").live("click", function () {
                var getEmail = $("#getemail").val();
                if (validateEmail(getEmail)) {
                    $.post("/email/emailCollection", {"email_id": getEmail}, function (data) {
                        if (data == "success") {
                            createCookie("sentEmail", 1, 30);
                            $('.success_message').fadeIn().delay(3000).fadeOut();
                            setTimeout(function () {
                                $(".popup").hide();
                            }, 5000);
                        } else if (data == 'email exist') {
                            $('.error_email_exist').fadeIn().delay(3000).fadeOut();
                        }
                    });
                } else {
                    $('.error_valid_email').fadeIn().delay(3000).fadeOut();
                }
            });

            /*$(".social_wrapper .custome_button_twitter").live("click",function(){
             var twitimagetext = '<?php echo $article_image_text ? html_entity_decode($article_image_text) : "" ?>';
             var currentUrl = window.location.href;
             if((twitimagetext.length + currentUrl.length) > 140)
             {
             twitimagetext = twitimagetext.substring(0,139 - (currentUrl.length + 3));
             twitimagetext = twitimagetext + "...";
             }
             var url = "https://twitter.com/share?text="+twitimagetext+"&url="+currentUrl;
             window.open(url, "Share on twitter", "top=300,left=350,width=500,height=500");
             });*/
        });
        setInterval(setYahooUpdates, 500000);//300000 4000

<?php if ($sf_user->isAuthenticated()): ?>
<?php else: ?>
            setInterval(loginPopup, 1000);
<?php endif; ?>

        function loginPopup() {
            var cookieVal = getCookie("popupLogin");
            var sentEmail = getCookie("sentEmail");
            var threeMin = 0;
            var popupcutout = 900;
            if (getCookie('closepopup') != '' && getCookie('closepopup') != 'undefined') {
                popupcutout = getCookie('closepopup');
            }
            if (isNaN(cookieVal)) {
            } else {
                var threeMin = parseInt(cookieVal) + 1;
            }
            //console.log(threeMin);
            createCookie("popupLogin", threeMin, 1);
            if (threeMin == popupcutout && sentEmail != 1) {
                $(".popup").fadeIn(1000);
            }
            if (threeMin > popupcutout) {
                createCookie("popupLogin", 0, 1);
            }
        }

        function createCookie(name, value, days) {
            var expires;
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toGMTString();
            } else {
                expires = "";
            }
            document.cookie = name + "=" + value + expires + "; path=/";
        }

        function getCookie(c_name) {
            if (document.cookie.length > 0) {
                c_start = document.cookie.indexOf(c_name + "=");
                if (c_start != -1) {
                    c_start = c_start + c_name.length + 1;
                    c_end = document.cookie.indexOf(";", c_start);
                    if (c_end == -1) {
                        c_end = document.cookie.length;
                    }
                    return unescape(document.cookie.substring(c_start, c_end));
                }
            }
            return "";
        }

        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }
    </script>
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=401454126615766&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
</body>
<div id="unclickableDiv"></div>
</html>