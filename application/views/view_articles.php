	<?php foreach ($data as $article) { ?>
	<form action=<?="/site/" . $lang . "/read"?> method="post">
	<table width="700" align="center">
		<tr>
			<td align="center" colspan="2"><h3><?=$article[$lang . '_header']?></h3></td>
		</tr>
		<tr>
			<td align="justify" colspan="2"><?=$article[$lang . '_text']?></td>
		</tr>
		<tr>
			<td align="left"><?=$this->form_2['author']?><?=$article['author']?></td>
		
			<td align="right"><?=$this->form_2['created']?> <?=$article['date']?></td>
		</tr>
		<tr>
			<td colspan="2" align="right"><input type="submit" name="read" 
				value="<?=$this->form_2[read_more_button]?>"/></td>
			<input type="hidden" name="id" value=<?=$article['id']?>>
		</tr>
	</table>
	</form>
	<?php } ?>