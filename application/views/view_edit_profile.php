		<form action=<?="/site/" . $lang . "/profile/save"?> 
			method="post" enctype="multipart/form-data">
			<table align="center">
				<tr>
					<td><?=$this->form_2['new_login']?></td>
					<td><input type="text" name="login" /></td>
				</tr>
				<tr>
					<td><?=$this->form_2['new_email']?></td>
					<td><input type="text" name="email" /></td>
				</tr>
				<tr>
					<td><input type="file" name="userfile" /></td>
					<td><input type="submit" name="save" 
						value="<?=$this->form_2[save_button]?>"/></td>
				</tr>
			</table>
		</form>