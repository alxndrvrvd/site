		<table style="border-align:right">
			<tr>
				<td colspan="2">
					<img src="<?="/site/" . $_SESSION['avatar']?>" alt="avatar" />
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<?=$this->form_1['login']?><?=$_SESSION['login']?>
				</td>
			</tr>
			<tr>
				<td>
					<form action="<?="/site/" . $lang . "/profile"?>" method="post">
					<div><input type="submit" name="profile" value="<?=$this->form_1[view_profile_button]?>"/></div>
					<!--<input type="hidden" name="users_id" value="<?=$users_info[id]?>"/>-->
					</form>
				</td>
				<td>
					<form action="<?="/site/" . $lang . "/exit"?>" method="post">
					<div>
						<input type="submit" name="exit" value="<?=$this->form_1[exit_button]?>"/>
					</div>
					</form>
				</td>
			</tr>
				<?php if($_SESSION['login'] === 'admin') { ?>
			<tr>
				<td colspan="2" align="center">
					<form action="<?="/site/" . $lang . "/profiles"?>" method="post">
					<div><input type="submit" name="profiles" value="<?=$this->form_1[view_profiles_button]?>"/></div>
					</form>
				</td>
			</tr>
				<?php } ?>
		</table>