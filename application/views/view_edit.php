		<form action=<?="/site/" . $lang . "/edit/save"?> method="post">
		<table>
			<tr>
				<td>
					<textarea cols="100" rows="1" name="header"><?=$data[0][$lang . '_header']?></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<textarea cols="100" rows="20" name="text"><?=$data[0][$lang . '_text']?></textarea>
				</td>
			</tr>
			<tr>
				<td align="center">
					<input type="submit" name="save" 
						value="<?=$this->form_2[save_button]?>"/>
					<input type="hidden" name="article_id" value=<?=$data[0]['id']?>>
				</td>
			</tr>
		</table>
		</form>