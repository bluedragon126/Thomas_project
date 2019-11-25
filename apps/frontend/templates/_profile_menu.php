<?php $class = 'class="selectedtab"'; $blank = ''; ?>

<?php if($show_top_links == 1):?>
<ul class="minsid_listingtab dashboard_title" id="profile_top_menu">
        <li><a id="sbtMinProfileMyAccount" class="for_profile_menu " style="cursor:pointer;">Mitt konto</a></li>
</ul>
<?php else:?>
<ul class="minsid_listingtab dashboard_title" id="profile_top_menu_other_user">        
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/sbtUserProfile/take_to_profile/1" id="sbtMinProfileMyAccount" class="for_profile_menu cursor" style="cursor:pointer;">Mitt konto</a></li>
        <li><a class="main_link_color cursor blog_welc_links cursor" id="sbtMinProfileBlogPost" style="cursor:pointer;">Blogg </a></li>
        <li><a class="main_link_color cursor blog_welc_links" id="getSbtMinProfileOnlyForumPost">Forumposter </a></li>
        <li><a class="main_link_color cursor blog_welc_links" id="getSbtMinProfileAllPost">Alla poster </a></li>
</ul>
<?php endif;?>