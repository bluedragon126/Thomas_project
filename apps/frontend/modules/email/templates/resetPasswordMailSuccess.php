<div class="maincontentpage">
    <div class="inner-page-contetn-left">
        <div class="breadcrumb">
            <ul>
                <li><?php
include_component('isicsBreadcrumbs', 'show', array(
    'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'user/forgetPasswordDone')
))
?> </li>
            </ul>
        </div>
        <div class="inner_page_divider">&nbsp;</div>
        <div class="float_l_width_100 mrg_left_70">
            <div class="inner_page_content_main">
                <div class="shop_detail_title2 redfont"><?php echo __("Glömt lösenord") ?></div>
                <!--    <div class="shoph3 widthall">Rubrik hr d</div>-->
                <div class="blank_10h widthall">&nbsp;</div>
                <div class="float_left widthall">
                    <table width="100%" border="0" cellspacing="0" cellpadding="3" id="forget_password_page">
                        <tr>
                            <td><?php echo __('Ett nytt lösenord har skickats till din e-post!') ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php echo include_partial('global/inner_bottom_footer'); ?>
        </div>
    </div>
    <div class="rightbanner">
        <div class="advertdiv"><img src="/images/1advert.jpg" alt="adv"/></div>
        <div class="advertdiv"><img src="/images/spxad.jpg" alt="adv"/></div>
    </div>
</div>