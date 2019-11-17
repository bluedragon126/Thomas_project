<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="account_links" class="hide-show">
    <div class="dashbord_link mrg_top_10">
        <div class="dashbord_link_col floatLeft">
            <span class="float-left"><a href="http://<?php echo $host_str ?>/sbt/editProfile/edit_user_id/<?php echo $user_id ?>" class="main_link_color float_left widthall for_profile_dashboard_menu selectedtab">Editera profil</a></span>
            <!-- <span class="float-left"><a id="profile_visibility" name="<?php echo $logged_user; ?>" class="main_link_color float_left widthall cursor for_profile_dashboard_menu">Visa/dölj profil</a></span> -->
            <span class="float-left"><a id="my_subscription" class="main_link_color float_left widthall cursor for_profile_dashboard_menu">Abonnemang</a></span>
            <span class="float-left"><a  id="invoice_records" class="main_link_color float_left widthall cursor for_profile_dashboard_menu">Order</a></span> <?php /*onclick="userInvoice(<?php //echo $logged_user; ?>)"*/?>
            <span class="float-left"><a id="my_e_newsletter"  class="main_link_color float_left widthall cursor for_profile_dashboard_menu"><a id="my_e_newsletter"  class="main_link_color float_left widthall cursor for_profile_dashboard_menu">E-postutskick</a></span>
            <span class="float-left"><a id="my_favorite_links" class="main_link_color float_left widthall cursor for_profile_dashboard_menu">Favoriter</a></span>
        </div>
    </div>
</div>
<div id="myaccount_data_container" class="float_left widthall"></div>
<script>
    var url = window.location.pathname;
    var reg = url.split('/');
    if(reg[2] == 'editBlogProfile'){
        $('.dashbord_link_col').find('.selectedtab').removeClass();
        $('.editblogprofile').addClass('selectedtab');
    }
</script>