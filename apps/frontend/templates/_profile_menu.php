<?php $class = 'class="selectedtab"'; $blank = ''; ?>

<?php if($show_top_links == 1):?>
<ul class="minsid_listingtab dashboard_title" id="profile_top_menu">
        <li><a id="sbtMinProfileMyAccount" class="for_profile_menu " style="cursor:pointer;">Ordning och reda</a></li>
        
        
        
	<!--<li><a id="getSbtMinProfile" class="selectedtab for_profile_menu cursor" style="cursor:pointer;">Om mig</a></li>
        <li><a id="sbtMinProfileBlogPost" href="<?php echo 'http://'.$host_str.'/sbt/showListOfUserBlog/uid/'.$user_id ?>"style="cursor:pointer;">Blogg</a></li>
        <!--<li><a class="main_link_color cursor blog_welc_links for_profile_menu cursor" id="sbtMinProfileBlogPost" style="cursor:pointer;">Blogg </a></li>-->
        <!--<li><a class="main_link_color cursor blog_welc_links for_profile_menu" id="getSbtMinProfileOnlyForumPost">Forumposter </a></li>-->
        <!--<li><a class="main_link_color cursor blog_welc_links for_profile_menu" id="getSbtMinProfileAllPost">Alla poster </a></li>-->
        
        
        
        
        
        
        
        
        
	<!--<li><a id="sbtMinProfileMessage" class="for_profile_menu" style="cursor:pointer;">Kommentarer </a></li>
	<li><a id="sbtMinProfileFriends" class="for_profile_menu" style="cursor:pointer;">Vänner</a></li>
	<li><a id="sbtMinProfileAllArticle" class="for_profile_menu" style="cursor:pointer;">Artiklar</a></li>
	<li><a id="sbtMinProfileMeddelanden" class="for_profile_menu" style="cursor:pointer;">Meddelanden</a></li>-->
</ul>
<?php else:?>
<ul class="minsid_listingtab dashboard_title" id="profile_top_menu_other_user">
	<!--<li><a id="getSbtMinProfile" style="cursor:pointer;" class="selectedtab for_profile_menu">Om mig</a></li>
	<li><a id="sbtMinProfileMessage" class="for_profile_menu" style="cursor:pointer;">Kommentarer </a></li>
	<li><a id="sbtMinProfileFriends" class="for_profile_menu" style="cursor:pointer;">Vänner</a></li>
	<li><a id="sbtMinProfileBlogPost" href="<?php echo 'http://'.$host_str.'/sbt/showListOfUserBlog/uid/'.$user_id ?>" style="cursor:pointer;">Blogg</a></li>
	<li><a id="sbtMinProfileAllArticle" class="for_profile_menu" style="cursor:pointer;">Artiklar</a></li>
	<li><a id="sbtMinProfileForumPost" class="for_profile_menu" style="cursor:pointer;">Forumposter </a></li>
	<li><a id="sbtMinProfileAllPost" class="for_profile_menu" style="cursor:pointer;">Alla poster</a></li>-->
        
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/sbtUserProfile/take_to_profile/1" id="sbtMinProfileMyAccount" class="for_profile_menu cursor" style="cursor:pointer;">Mitt konto</a></li>
        <!--<li><a id="sbtMinProfileBlogPost" href="<?php echo 'http://'.$host_str.'/sbt/showListOfUserBlog/uid/'.$user_id ?>" style="cursor:pointer;">Blogg</a></li>-->
        <li><a class="main_link_color cursor blog_welc_links cursor" id="sbtMinProfileBlogPost" style="cursor:pointer;">Blogg </a></li>
        <li><a class="main_link_color cursor blog_welc_links" id="getSbtMinProfileOnlyForumPost">Forumposter </a></li>
        <li><a class="main_link_color cursor blog_welc_links" id="getSbtMinProfileAllPost">Alla poster </a></li>
</ul>
<?php endif;?>