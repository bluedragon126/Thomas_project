<table width="75%"cellspacing="0" cellpadding="10" border=0>
	<span class="shoph3">Mejllista för outlook</span>
	<tr>
		<td><?php 
			echo("<b>" . count($emails) . "</b>. ");
			$mail = "";
			
			for($i=0; $i < count($emails); $i++) 
			{ 
				$mail = $mail . ", " . $emails[$i];
			}
			
			//strip of the leading coma
			$mail = substr($mail, 1);
			echo($mail);
			?>
		</td>
	</tr>
</table>