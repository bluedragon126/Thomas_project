<style type="text/css">
.listing table td{ border:0px;}
.listing table#remind_table2 th{ background-color:#99CCFF;}
.listing table td{ font-weight:normal;}
</style>
<div class="maincontentpage">
<div class="forumlistingleftdiv">
  <div class="forumlistingleftdivinner">
   <div class="shoph3 widthall">P&aring;minnelse</div>
   <?php if($greenmsg): ?>
   <div class="float_left listing" style="font-size:12px; line-height:16px; padding:4px 4px 5px 5px; color:#33CC00; border:1px solid #33CC00;;">
   	<?php echo html_entity_decode($greenmsg); ?>
   </div>
   <?php endif; ?>
	<div class="float_left listing">
	  <div class="float_left widthall" style="width:80%;">
	  	<div class="float_left widthall" style="border:1px solid #666666; width:80%;">
		<form id="remind_user_form" name="remind_user_form" method="POST" action="">
		  <table width="600" border="0" cellpadding="0" id="reminder_table">
			<tr>
			  <td valign="top">
			  <div id="remind_outer">
				  <input name="greenmsg" type="hidden" value="">
				  <input name="errormsg" type="hidden" value="">
				  <table width="95%" id="remind_table1">
					<tr valign="top" style="border:1px solid red;">
					  <td colspan="2"><strong> Påminn endast usernames (separera med komma-tecken):</strong><br>
						<input style="width: 98%" type="text" name="txt_remind_users"></td>
					</tr>
					<tr valign="top">
					  <td><strong>FAKTURA</strong></td>
					  <td>&nbsp;</td>
					</tr>
					<tr valign="top">
					  <td> Subject:<br>
						<input style="width: 175px" type="text" name="txt_subject_fa" value="Börstjänaren efaktura">
					  </td>
					  <td>Filen i templates/email heter:<br>
						<input style="width: 175px" type="text" name="txt_file_fa" value="_paminnelse_fa.php">
					  </td>
					</tr>
					<tr valign="top">
					  <td><strong>PROV</strong></td>
					  <td>&nbsp;</td>
					</tr>
					<tr valign="top">
					  <td>Subject<br>
						<input style="width: 175px" type="text" name="txt_subject_pr" value="Börstjänaren provabonnemang">
					  </td>
					  <td>Filen i templates/email heter:<br>
						<input style="width: 175px" type="text" name="txt_file_pr" value="_paminnelse_pr.php"></td>
					</tr>
					<tr valign="top">
					  <td><strong>AUTOGIRO</strong></td>
					  <td>&nbsp;</td>
					</tr>
					<tr valign="top">
					  <td>Subject<br>
						<input style="width: 175px" type="text" name="txt_subject_ag" value="Börstjänaren autogiro">
					  </td>
					  <td>Filen i templates/email heter:<br>
						<input style="width: 175px" type="text" name="txt_file_ag" value="_paminnelse_ag.php"></td>
					</tr>
				  </table>
				  <table width="99%" id="remind_table2" style="padding-top:10px;">
					<tr valign="top" id="first_row">
					  <th>Status</th>
					  <th>Abonnent</th>
					  <th>Mindre &auml;n eller lika med:</th>
					</tr>
					<tr valign="top">
					  <td><p>
						  <input type="checkbox" name="ny" value="1" checked>
						  Ny<br>
						  <input type="checkbox" name="betald" value="3" checked>
						  Betald<br>
						  <input type="checkbox" name="obetald" value="4">
						  Obetald <br>
						  <input type="checkbox" name="pamind" value="2">
						  P&aring;mind<br>
						  <input type="checkbox" name="avtackad" value="5">
						  Avtackad </td>
					  <td><input type="checkbox" name="chb_prov" value="1" checked>
						Prov<br>
						<input type="checkbox" name="chb_faktura" value="2" checked>
						Faktura<br>
						<input type="checkbox" name="chb_autogiro" value="3" checked>
						Autogiro</td>
					  <td><input style="width: 50px" type="text" name="time_left" value="10">
						dagar<br>
						kvar till stoppdatum <br>
						<br>
						<br>
						<!--<input type="button" name="btn_remind" id="send_remind_btn" value="Påminn!">--><input type="submit" name="btn_remind" value="Påminn!"></td>
					</tr>
				  </table>
				</div>
			  </td>
			</tr>
		  </table>
		</form>
		</div>
	  </div>
	</div>
	</div>
</div>

</div>