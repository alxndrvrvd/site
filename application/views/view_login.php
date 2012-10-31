	<form action=<?="/site/" . $lang . "/login"?> method="post">
	<table>
		<tr>
			<td><?=$this->form_1['login']?></td>
			<td><input type="text" name="login" size="15" maxlength="15" /></td>
		</tr>
		<tr>
			<td><?=$this->form_1['password']?></td>
			<td><input type="password" name="password" size="15" maxlength="15" /></td>
		</tr>
		<tr>
			<td><a href=<?="http://localhost/site/" . $lang . "/register"?>>
				<?=$this->form_1['register']?></a></td>
			<td><input type="submit" name="submit" 
				value="<?=$this->form_1[enter_button]?>" /></td>
		</tr>
	</table>
	</form>