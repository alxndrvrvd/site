		<table align="center" border="1">
			<tr>
				<td colspan="2"><img src="<?="../" . $_SESSION['avatar']?>" 
					width="150" height="150" alt="avatar"/>
				</td>
				<td>
					<?=$this->form_2['login']?><?=$_SESSION['login'] ?><br/>
	
					<?=$this->form_2['email']?><?=$_SESSION['email'] ?><br/>
			
					<?=$this->form_2['status']?><?=$_SESSION['status'] ?><br/>
		
					<?=$this->form_2['registered']?><?=$_SESSION['registration_date'] ?><br/>
				
					<?=$this->form_2['login_time']?><?=$_SESSION['login_time'] ?><br/>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
				<form action="<?="/site/" . $lang . "/profile/edit"?>" method="post">
						<div>
							<input type="submit" name="edit" value="<?=$this->form_2[edit_button]?>" />
						</div>
				</form>
				</td>
				<td colspan="2" align="center">
					<form action="<?="/site/" . $lang . "/profile/delete"?>"
				 		method="post">
						<div>
							<input type="submit" name="delete" value="<?=$this->form_2[delete_button]?>" />
						</div>
					</form>
				</td>
			</tr>
		</table>