<?php
	if(is_array($data))	{
		for($i = 0; $i != count($data); $i++) { ?>

			<form action="<?php echo "/site/" . $lang . "/profiles/save"?>" method="post">
				<table>
					<tr>
						<td><img src="<?="../" . $data[$i]['avatar']?>" alt="avatar" 
							height="150" width="150" />
						</td>
						<td>
							<?=$this->form_2['login']?><?=$data[$i]['login'] ?><br/>
							
							<?=$this->form_2['email']?><?=$data[$i]['email'] ?><br/>
							
							<?=$this->form_2['status']?><?=$data[$i]['status'] ?><br/>
							
							<?=$this->form_2['login_time']?><?=$data[$i]['login_time'] ?><br/>
							
							<?=$this->form_2['registered']?><?=$data[$i]['registration_date'] ?><br/>
						</td>
						<td>
							<input type="radio" name="status" 
								value="user" /> <?=$this->form_2['user']?> <br/>
							<input type="radio" name="status" value="redactor" /> 
								<?=$this->form_2['redactor']?> <br/>
							<input type="radio" name="status" value="blocked" /> 
								<?=$this->form_2['blocked']?> <br/>
							<input type="submit" name="edit" 
								value="<?=$this->form_2[save_button]?>" /> <br/>
							<input type="hidden" name="id" value="<?=$data[$i]['id']?>" />
						</td>
					</tr>
				</table>
			</form>
<?php
			}
		}
?>