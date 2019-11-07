<script type="text/JavaScript">

    $(window).load(function(){
    
        $(".user_img").corner("7px");       
    
    });
  
    $(document).ready(function(){
        //$('#edit_prof_frnd_list').css('display', 'none');
        $('#edit_prof_slider').click(function(){
            $('#edit_prof_frnd_list').toggle(250);
        }).next().hide();
    });

</script>
<div class="minsid_lefttopdiv">
  <!--<h2 class="minleft_heading"><?php //echo ucfirst($user_details->user_title)    ?></h2>-->
    <div class="mrg_btm_10"><img src="/images/new_home/konto.png" width="300" /></div>
    
         
        <div class="konto_namn"><?php echo $user_profile->getFullUserName($user_id); ?></div>
        
        
        
        
        
        
 
	
	
	
    <div class="home_ad_r float_left" style="margin-left: 0px;">Annons</div></div>
