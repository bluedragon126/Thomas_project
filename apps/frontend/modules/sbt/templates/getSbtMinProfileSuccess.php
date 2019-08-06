<div class="blog_prof_detail">
    <div class="blog_user_profile widthall">Användarprofil</div>
    <div class="blog_user_profile_padd"><img src="/images/new_home/blog_line_nav.png" width="600"/></div>
    <div class="basfakta_detail widthall">
        <div class="prof_subheader widthall mrg_btm_10 mrg_top_30">Basfakta</div>
        <span class="prof_a">Ålder:</span>
        <span class="prof_q"><?php echo $data_arr['user_age'] ?></span><br/>

        <?php $my_occ = explode(':', $user_details->my_occupation); ?>
        <?php
        if ($my_occ[0] == 'other')
            $occ = $my_occ[1];
        else
            $occ = $occupation_arr[$my_occ[0]];
        ?>

        <span class="prof_a">Sysselsättning:</span>
        <span class="prof_q"><?php echo $occ ?></span><br/>

        <span class="prof_a">När jag inte är på börsen... </span>
        <span class="prof_q"><?php echo $user_details->not_on_stock ?></span>
    </div>

    <div class="trejdingprofil_detail widthall">
        <div class="prof_subheader widthall mrg_btm_10 mrg_top_30">Trejdingprofil</div>
        <span class="prof_a">Typ av spekulant:</span>
        <span class="prof_q"><?php echo ucfirst($type_investor_arr[$user_details->type_of_speculator]) ?></span><br/>

        <span class="prof_a">Vilken mäklare använder du?</span>
        <span class="prof_q"><?php echo ucfirst($user_details->broker_used) ?></span><br/>

        <span class="prof_a">Vad handlar du?</span>
        <span class="prof_q"><?php echo $my_trade; ?></span><br/>

        <span class="prof_a">Storlek på portfölj:</span>
        <span class="prof_q"><?php echo $is_millionaire[$user_details->is_millionaire] ?></span><br/>

        <span class="prof_a">Mina fem bästa rekar:</span>
        <span class="prof_q"><?php echo str_replace(',', ' , ', $user_details->my_five_best_recommendations) ?></span><br/>

        <span class="prof_a">Min blankningslista:</span>
        <span class="prof_q"><?php echo str_replace(',', ' , ', $user_details->my_shortlist) ?></span><br/>

        <span class="prof_a">Min bästa affär:</span>
        <span class="prof_q"><?php echo $user_details->my_best_trade ?></span><br/>

        <span class="prof_a">Min sämsta affär:</span>
        <span class="prof_q"><?php echo $user_details->my_worst_trade ?></span><br/>
    </div>

    <div class="med_egna_ord_detail widthall">
        <div class="prof_subheader widthall mrg_btm_10 mrg_top_30">Med egna ord</div>
        <span class="prof_q"><?php echo html_entity_decode($user_details->my_own_writing) ?></span><br/>
    </div>

    <div class="denna_sida_detail widthall">
        <div class="prof_subheader widthall mrg_btm_10 mrg_top_30">Denna sida:</div>
        <span class="prof_q"><a href="http://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $user_id ?>" class="viocolor"><?php echo 'http://' . $host_str . '/sbt/sbtMinProfile/id/' . $user_id ?></a></span><br/>
    </div>

    <div class="statistik_detail widthall">
        <div class="prof_subheader widthall mrg_btm_10 mrg_top_30">Statistik</div>
        <div class="blog_prof_stat widthall">Poster totalt:</div>
        <span class="prof_a">Antal poster:</span>
        <span class="prof_q">
            <?php
            $votes = $user_profile->getTotalActivitiesOfUser($user_data->user_id, $user_data->firstname . ' ' . $user_data->lastname);
            echo $votes;
            ?>
        </span><br/>
        <span class="prof_a">Antal poster per dag:</span>
        <span class="prof_q">                    <?php
            $days = (strtotime(date("Y-m-d")) - strtotime(substr($user_data->regdate))) / (60 * 60 * 24);
            $ratio = $votes / $days;
            echo number_format($ratio, 4);
            ?>
        </span><br/>
        <!--<div class="blog_prof_stat widthall mrg_top_30">Besöksmeddelanden</div>

        <span class="prof_a">Antal besöksmeddelanden:</span>
        <span class="prof_q"><?php echo $message_cnt ?></span><br/>

        <span class="prof_a">Senaste meddelande:</span>
        <span class="prof_q"><?php
            if ($last_message->created_at)
                echo date("D j M Y", strtotime($last_message->created_at));
            else
                echo '-';
            ?>
        </span><br/>-->
        <?php //if ($is_logged_in_user != 1): ?>

            <!--<span class="prof_a">Antal besöksmeddelanden:</span>
            <span class="prof_q"><a id="post_message" class="viocolor" href="#">Skicka meddelande till <?php echo $user_profile->getFullUserName($user_id); ?></a></span><br/>-->
        <?php //endif; ?>
    </div>

    <div class="statistik_detail widthall">
        <div class="blog_prof_stat widthall mrg_top_30">Blogg</div>
        <span class="prof_q"><a class="main_link_color cursor" href="<?php echo 'http://' . $host_str . '/sbt/showListOfUserBlog/uid/' . $user_data->user_id ?>"><?php echo 'Visa alla blogbesök till ' . $user_profile->getFullUserName($user_id); ?></a></span><br/>
    </div>

    <div class="blogg_detail widthall">
        <div class="blog_prof_stat widthall mrg_top_30">Generell information</div>
        <span class="prof_a">Senaste aktivitet:</span>
        <span class="prof_q">
            <?php if ($user_data->inlogdate == '0000-00-00 00:00:00'): ?>
                <?php echo '-' ?>
                <?php else: ?>
                    <?php echo substr($user_data->inlogdate, 0, 10) ?>, <?php echo substr($user_data->inlogdate, 11, 5) ?>
                <?php endif; ?>
        </span><br/>
        <span class="prof_a">Medlem sedan:</span>
        <span class="prof_q"><?php echo substr($user_data->regdate, 0, 10) ?></span><br/>
    </div>
</div>
