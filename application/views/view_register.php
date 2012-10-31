		<form action=<?="/site/" . $lang . "/register/registration"?> 
				method="post">
			<table align="center">
				<tr><h2 align="center"><?=$this->form_2['title']?></h2></tr>
				<tr>
					<td><?=$this->form_2['login']?></td>
					<td><input type="text" name="login" /></td>
				</tr>
				<tr>
					<td><?=$this->form_2['email']?></td>
					<td><input type="text" name="email" /></td>
				</tr>
				<tr>
					<td><?=$this->form_2['password']?></td>
					<td><input type="password" name="password" /></td>
				</tr>
				<tr>
					<td><?=$this->form_2['retype']?></td>
					<td><input type="password" name="retype" /></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" name="send" 
							value="<?=$this->form_2['send_button']?>" /></td>
				</tr>
			</table>
		</form>