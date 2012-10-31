	<form action="<?="/site/" . $lang . "/add/add_article"?>" method="post">
		<table style="margit:0 auto 0 auto">
			<tr>
				<td align="center"><strong><?=$this->form_2['first_message']?></strong></td>
				<td align="center"><strong><?=$this->form_2['second_message']?></strong></td>
			</tr>
			<tr>
				<td><textarea cols="70" rows="1" name="ua_header" style="resize:none" required="required"></textarea></td>
				<td><textarea cols="70" rows="1" name="en_header" style="resize:none" required="required"></textarea></td>
			</tr>
			<tr>
				<td><textarea cols="70" rows="15" name="ua_text" style="resize:none" required="required"></textarea></td>
				<td><textarea cols="70" rows="15" name="en_text" style="resize:none" required="required"></textarea></td>
			</tr>
			<tr>
				<td colspan="4" align="center">
					<input type="submit" name="add" value="<?=$this->form_2[send_button]?>"/>
				</td>
			</tr>
		</table>
	</form>