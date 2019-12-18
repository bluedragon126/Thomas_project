<?php if (!empty($errormsg)) { 

			echo '<div class="errormsg">';

			echo '<img src="https://'.$host_str.'/images/utrop.png" alt="" width="30" height="30" align="absmiddle" style="margin: 5px 0 5px" /><br>';

			echo html_entity_decode($errormsg);

			echo '</div>';

		}

	if (!empty($greenmsg)) { 

			echo '<div class="greenmsg">';

			echo '<img src="https://'.$host_str.'/images/utropgreen.png" alt="" width="30" height="30" align="absmiddle" style="margin: 5px 0 5px" /><br>';

			echo html_entity_decode($greenmsg);

			echo '</div>';

		}

		if (!empty($noticemsg)) {

			echo '<div class="noticemsg">';

			echo html_entity_decode($noticemsg);

			echo '</div>';

		} ?>

