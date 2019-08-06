<div id="account_links">
    <div class="dashbord_link mrg_top_30">
        <div class="dashbord_link_col floatLeft">
            <span class="float-left"><a href="http://<?php echo $host_str ?>/sbt/editProfile/edit_user_id/<?php echo $user_id ?>" class="main_link_color float_left widthall for_profile_dashboard_menu selectedtab">Editera profil</a></span>
            <span class="float-left"><a id="profile_visibility" name="<?php echo $logged_user; ?>" class="main_link_color float_left widthall cursor for_profile_dashboard_menu">Visa/dölj profil</a></span>
            <span class="float-left"><a id="my_subscription" class="main_link_color float_left widthall cursor for_profile_dashboard_menu">Abonnemang</a></span>
        </div>
        <div class="dashbord_link_col2 floatLeft">
            <span class="float-left"><a href="http://<?php echo $host_str?>/sbt/sbtAddAnalysisBlog" class="main_link_color float_left widthall for_profile_dashboard_menu">Skapa art/blogg</a></span>
            <span class="float-left"><a class="main_link_color float_left widthall cursor for_profile_dashboard_menu" href="<?php echo 'http://'.$host_str.'/sbt/editBlogProfile/edit_user_id/'.$logged_user; ?>">Editera bloggprofil</a></span>
        </div>
        <div class="dashbord_link_col3 floatLeft">
            <span class="float-left"><a  id="invoice_records" class="main_link_color float_left widthall cursor for_profile_dashboard_menu" <!--onclick="userInvoice(<?php //echo $logged_user; ?>)" -->Order</a></span>
            <span class="float-left"><a id="my_e_newsletter"  class="main_link_color float_left widthall cursor for_profile_dashboard_menu"><a id="my_e_newsletter"  class="main_link_color float_left widthall cursor for_profile_dashboard_menu">E-postutskick</a></span>
        </div>
        <div class="dashbord_link_col_last floatLeft">
            <span class="float-left"><a id="blocked_users" name="<?php echo $logged_user; ?>" class="main_link_color float_left widthall cursor for_profile_dashboard_menu">Blockerade användare</a></span>
            <span class="float-left"><a id="my_favorite_links" class="main_link_color float_left widthall cursor for_profile_dashboard_menu">Favoriter</a></span>
        </div>
    </div>
</div>
<div id="myaccount_data_container" class="float_left widthall"></div>