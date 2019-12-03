<!--[if IE 7]>
<style>
input.registerbuttontext{
padding:2px 4px 3px 4px;
}
</style>
<![endif]-->
<script language="javascript" type="text/javascript">
    $(window).load(function(){


        var checkRight = $(".rightbanner").height();
        var checkLeft = $(".btshopleftdiv").height();
	
        if(checkLeft > checkRight)
        {
            $(".rightbanner").css({"height":checkLeft+"px"});
        }	
        else
        {
            $(".btshopleftdiv").css({"height":checkRight+"px"});
        }
        var leftDiv = $('.inner-page-contetn-left').height();
        var rightDiv = $('.rightbanner').height();
        if(rightDiv > leftDiv){
            $('.rightbanner').css('border-left','1px solid #d3d3d3');
        }else{
            $('.inner-page-contetn-left').css('border-right','1px solid #d3d3d3');
        }
    });
</script>
<div class="maincontentpage">
    <div class="inner-page-contetn-left" >
        <div class="breadcrumb">
            <ul>
                <li><?php
include_component('isicsBreadcrumbs', 'show', array(
    'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'user/forgetPassword')
))
?> </li>
            </ul>
        </div>
        <div class="inner_page_divider">&nbsp;</div>
        <div class="float_l_width_100 mrg_left_70">
            <div class="inner_page_content_main">        
                <div class="whp_title"><?php echo __('Har du glömt ditt lösenord eller användarnamn?') ?></div>
                <div class="blank_10h widthall">&nbsp;</div>
                <form name="loginform" id="loginform" method="post" action="">
                    <div class="float_left widthall">
                        <table width="100%" border="0" cellspacing="0" cellpadding="3" id="forget_password_page">
                            <tr>
                                <td><?php echo __('Ange den e-postadress du använde när du skapade ditt konto, så skickas ett mail med dina användaruppgifter dit på en gång: ') ?></td>
                            </tr>
                            <tr>
                                <td class="redColor"><?php echo $msg ?></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="email" id="email" class="width_277 contactus-inputs form_input"/></td>
                            </tr>
                            <tr>
                                <td class="padding_top_10"><input type="submit" class="send_forgetpass submit " value="" name="submit" /></td>
                            </tr>
                            <tr>
                                <td class="padding_top_10 padding_bottom_0"><a href="http://<?php echo $host_str ?>/user/loginWindow">Logga in</a></td>
                            </tr>
                            <tr>
                                <td class="padding_top_0"><a href="http://<?php echo $host_str ?>/sbt/sbtHome">Hem</a></td>
                            </tr>
                           
                            <tr>
                                <td>
								
								<div class="whp_subheading">E-postadressen ej längre tillgänglig?</div>
								
								<?php echo __('Om du inte längre har tillgång till den e-postadress du valde när du registrerade dig, kontakta oss och lämna namn, personnummer och andra uppgifter du tror kan hjälpa oss att hitta dig!') ?></td>
                            </tr>
                        </table>
                    </div>
                </form>
                <?php echo include_partial('global/inner_bottom_footer'); ?>
            </div>
        </div>
    </div>
    <div class="rightbanner padding_0 font_0 margin_top_ann">
        <div class="home_ad_r float_left font_size_12 ">Annons</div>
        <div id="whitepage_ads">
            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'ad_4' => $ad_4, 'set_margin' => '1')) ?>
        </div>
    </div>
</div>