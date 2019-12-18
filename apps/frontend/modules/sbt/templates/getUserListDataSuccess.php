<div class="float_left widthall">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="user_list">
        <input type="hidden" id="userlist_current_column_order" name="userlist_current_column_order" value="<?php echo $current_column_order; ?>" />
        <input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
        <tr id="user_list_column_row">
            <th scope="col" width="7%">Avatar</th>
            <th scope="col" width="20%"><a id="sortby_author" class="float_left cursor width_107"><span class="float_left">&nbsp;&nbsp;Användare<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
            <th scope="col" width="10%"><a id="sortby_title"  class="float_left cursor width_65"><span class="float_left">Titel<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
            <th scope="col" width="13%"><a id="sortby_regdate"  class="float_left cursor width_87"><span class="float_left">Regdate<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
            <th scope="col" width="10%"><a id="sortby_message"  class="float_left cursor width_75"><span class="float_left">Inlägg<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
            <th scope="col" width="10%"><a id="sortby_vote"  class="float_left cursor width_80"><span class="float_left">Röster<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
            <th scope="col" width="10%"><a id="sortby_totallogin"  class="float_left cursor width_75"><span class="float_left">Inlogg<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
            <th scope="col" width="20%"><a id="sortby_lastlogin"  class="float_left" cursor width_98><span class="float_left">Senaste<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
        </tr>
        <?php foreach ($pager->getResults() as $user): ?>
            <tr class="classnot">
                <td class="padding_right_10px"><a class="bluegrayfont" href="<?php echo 'https://' . $host_str . '/sbt/sbtMinProfile/id/' . $user->user_id; ?>">
                        <?php if ($user_arr[$user->user_id] != ''): ?>
                            <img src="/uploads/userThumbnail/<?php echo str_replace('.', '_mid.', $user_arr[$user->user_id]); ?>" alt="user_photo"/>
                        <?php else: ?>
                            <?php if ($user->gender == 1): ?>
                                <img src="/images/user_photo.jpg" alt="adv"/>
                            <?php else: ?>
                                <img src="/images/avatar_photo.jpg" alt="adv"/>
                            <?php endif; ?>
                        <?php endif; ?>
                    </a></td>
                <td class="bluegrayfont padding_right_10px padding_left_5px">&nbsp;&nbsp;<a class="bluegrayfont" href="<?php echo 'https://' . $host_str . '/sbt/sbtMinProfile/id/' . $user->user_id; ?>"><?php echo $user->firstname . ' ' . $user->lastname ?></a></td>
                <td class="skincolor padding_right_10px" ><?php echo $user->how_is_user($user->user_id) ?></td>
                <td><?php echo substr($user->regdate, 0, 10); ?></td>
                <td class="bluegrayfont padding_right_10px"  align="center"><?php echo $user->getTotalMessagesReceived($user->user_id) ?></td>
                <td class="lightgreenfont padding_right_10px"  align="center"><?php echo $user->getTotalVotesReceived($user->user_id) ? $user->getTotalVotesReceived($user->user_id) : 0; ?></td>
                <td class="lightbluefont padding_right_10px"  align="center"><?php echo $user->inlog ?></td>
                <td class="darkbluefont"><?php echo substr($user->inlogdate, 0, 16) ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
    </table>
</div>
<div class="paginationwrapper">
    <div class="pagination" id="user_list_listing">
        <?php if ($pager->haveToPaginate()): ?>
            <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"> <img src="/images/pag_arrow_left.jpg" alt="arrow" /> </a> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> < </a>
            <?php
            $links = $pager->getLinks(11);
            foreach ($links as $page):
                ?>
                <?php if ($page == $pager->getPage()): ?>
                    <?php echo '<span class="selected">' . $page . '</span>' ?>
                <?php else: ?>
                    <a id="<?php echo $page; ?>" class="cursor"><?php echo $page; ?> </a>
                <?php endif; ?>
                <?php if ($page != $pager->getCurrentMaxLink()): ?>
                    -
                <?php endif ?>
            <?php endforeach ?>
            <a id="<?php echo $pager->getNextPage(); ?>" class="cursor"> > </a> <a id="<?php echo $pager->getLastPage(); ?>" class="cursor"> <img src="/images/pag_arrow_right.jpg" alt="arrow" /> </a>
            <?php endif ?>
    </div>
</div>
