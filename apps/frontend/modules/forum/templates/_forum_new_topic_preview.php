<?php if ($sf_user->isAuthenticated()): ?>
    <?php $user_id = $sf_user->getGuardUser()->getId() ?>
    <div class="forum_comment_wrapper">
        <div class="forum_comment_top_wraper float_left forum_comment_top_odd margin_top_5">
            <div class="forum_comment_top_left float_left"><?php //echo $preview_information['today_data']; ?><?php echo __('Förhandsgranska inlägg'); ?></div>
            <div class="forum_comment_top_left"></div>
            <div class="forum_comment_top_right float_right">Rapportera</div>
            <div class="forum_comment_top_right float_right pad_rgt_13">Citera</div>
        </div>
        <div class="blank_24h float_left widthall">&nbsp;</div>
        <div class="comment_content_wrapper float_left widthall">
            <div class="width_120 float_left comment_content_img_wrapper">
                <?php if ($preview_information['user_photo'] != ''): ?>
                    <a href="<?php echo "https://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $user_id ?>" class=""><img src="/uploads/userThumbnail/<?php echo str_replace('.', '_large.', $preview_information['user_photo']); ?>" alt="user_photo"/></a>
                <?php else: ?>
                    <a href="<?php echo "https://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $user_id ?>" class=""><img src="/images/forum_userphoto.png" alt="photo" width="110" /></a>
                <?php endif; ?>
                <div class="forum_comment_user_name widthall float_left">
                    <a href="<?php echo "https://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $user_id ?>" class=""><?php echo ($new_profile && $sf_user->getGuardUser()) ? ucwords($new_profile->getFullUserName($sf_user->getGuardUser()->getId())) : ucwords($preview_information['name']); ?> </a></div>
                <div class="forum_comment_detail float_left">
                    <div class="widthall float_left"></div>
                    <div class="widthall float_left">Aktiv: <?php echo $preview_information['user_active']; ?></div>
                    <div class="widthall float_left"><?php echo $preview_information['user_login']; ?> inlägg</div>
                    <div class="widthall float_left"><span class="upcase">Online</span></div>
                    <div class="widthall float_left">
                        Redigera
                    </div>
                    <div class="widthall float_left">Radera</div>
                </div>
            </div>
            <div class="float_left width_445 widthall">
                <div class="widthall forum_post_bread" id="preview_forum_desc">
                    <p>test</p>
                </div>
            </div>
        </div>
        <div class="blank_40h float_left">&nbsp;</div>
    </div>
<?php endif; ?>