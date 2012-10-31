		<table align="right">
			<tr>
				<td colspan="2"><img src=<?="/site/" . $_SESSION['avatar']?> /></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><?=$this->form_1['login']?><?=$_SESSION['login']?></td>
			</tr>
			<tr>
				<td>
					<form action=<?="/site/" . $lang . "/profile"?> method="post">
					<input type="submit" name="profile" value="<?=$this->form_1[view_profile_button]?>"/>
					<input type="hidden" name="users_id" value=<?=$users_info['id']?>>
					</form>
				</td>
				<td>
					<form action=<?="/site/" . $lang . "/exit"?> method="post">
					<input type="submit" name="exit" value="<?=$this->form_1[exit_button]?>"/>
					</form>
				</td>
				<?php if($_SESSION['login'] === 'admin') { ?>
				<tr>
				<td colspan="2" align="center">
					<form action=<?="/site/" . $lang . "/profiles"?> method="post">
					<input type="submit" name="profiles" value="<?=$this->form_1[view_profiles_button]?>"/>
					</form>
				</td>
				</tr>
				<?php } ?>
			</tr>
		</table>