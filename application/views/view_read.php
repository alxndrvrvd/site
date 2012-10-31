	<table width="780" align="center">
		<tr>
			<td colspan="2" align="center"><h2><?=$article[0][$lang . '_header']?></h2></td>
		</tr>
<!--////////////////////////////GRADES STATISTIC////////////////////////////////// -->
		<?php if(!isset($_SESSION['grades'])) { ?>
		<tr>
			<td><h3 style="color:red"><?=$this->form_2['vote_message']?></h3></td>
		</tr>
		<?php } else { ?>
		<tr>
			<td align="center">
				<strong><?=$this->form_2['average_grade']?><?=$_SESSION['average_grade']?></strong>
			</td>
			<td align="center">
				<strong><?=$this->form_2['votes']?><?=$_SESSION['grades']?></strong>
			</td>
		</tr>
		<?php } ?>
<!--//////////////////////////////////////////////////////////////////////////////-->
		<tr>
			<td colspan="2" align="justify"><?=$article[0][$lang . '_text']?></td>
		</tr>
		<tr>
			<td align="left"><?=$this->form_2['author']?><?=$article[0]['author']?></td>
			<td align="right"><?=$this->form_2['created']?><?=$article[0]['date']?></td>
		</tr>
		<!--///////////////////////////////EDIT ARTICLE////////////////////////////////////////-->
		<?php if(isset($_SESSION['login']) && !empty($_SESSION['login']) 
					&& ($_SESSION['status'] === 'redaction' || $_SESSION['status'] === 'admin')){ ?>
		<tr>
			<!-- //////////////////////////EDIT ARTICLE BUTTON//////////////////////////////// -->
			<form action=<?="/site/" . $lang . "/edit"?> method="post">
			<td align="center"><input type="submit" name="edit" 
				value="<?=$this->form_2[edit_article_button]?>"/>
				<input type="hidden" name="article_id" value=<?=$article[0]['id']?>></td>
			</form>
			<!-- ////////////////////////////////////////////////////////////////////////////////
			/////////////////////////DELETE ARTICLE BUTTON//////////////////////////////////// -->
			<form action=<?="/site/" . $lang . "/edit/delete"?> method="post">
			<td align="center"><input type="submit" name="delete" 
				value="<?=$this->form_2[delete_article_button]?>"/>
				<input type="hidden" name="article_id" value=<?=$article[0]['id']?>></td>
			</form>
			<!-- ///////////////////////////////////////////////////////////////////////////// -->
		</tr>
		<?php } ?>
		<!--////////////////////////////////////VOTE FOR ARTICLE//////////////////////////////-->
		<?php if(!empty($_SESSION['login']) && empty($_SESSION['user_grade'])) { ?>
		<tr>
			<td colspan="2" align="center">
				<form action=<?="/site/" . $lang . "/read/vote"?> method="post">
					1<input type="radio" name="grade" value="1"/>
					2<input type="radio" name="grade" value="2"/>
					3<input type="radio" name="grade" value="3"/>
					4<input type="radio" name="grade" value="4"/>
					5<input type="radio" name="grade" value="5"/>
					<input type="submit" name="vote_button" 
						value="<?=$this->form_2[vote]?>"/>
					<input type="hidden" name="login" value=<?=$_SESSION['login']?>>
					<input type="hidden" name="article_id" value=<?=$article[0]['id']?>>
				</form>
			</td>
		</tr>
		<?php } elseif(!empty($_SESSION['login']) && !empty($_SESSION['user_grade'])) { ?>
		<tr>
			<td align="center"><?=$this->form_2['thank_for_grade']?> 
				<?=$_SESSION['user_grade']?></td>
				<!--///////////////////////////////////DELETE GRADE////////////////////////////////-->
			<td>
				<form action=<?="/site/" . $lang . "/read/delete_grade"?> method="post">
					<input type="submit" name="delete_grade" 
						value="<?=$this->form_2[delete_grade_button]?>">
					<input type="hidden" name="login" value=<?=$_SESSION['login']?>>
					<input type="hidden" name="article_id" value=<?=$article[0]['id']?>>
				</form>
			</td>
		</tr>
		<?php } ?>
		<!-- ////////////////////////////////////COMMENTS///////////////////////////////////// -->
		<?php for($i = 0; $i != count($comments); $i++) { ?>
		<?php if(!empty($comments[$i]['comment_theme_' . $lang])) { ?>
		<tr>
			<table align="center" width="600">
				<tr>
					<td colspan="2" align="center"><?=$comments[$i]['comment_theme_' . $lang]?></td>
				</tr>
				<tr>
					<td colspan="2"><?=$comments[$i]['comment_text_' . $lang]?></td>
				</tr>
				<tr>
					<td align="left"><?=$this->form_2['author']?><?=$comments[$i]['author']?></td>
					<td align="right"><?=$this->form_2['created']?><?=$comments[$i]['comment_date']?></td>
				</tr>
				<!-- //////////////////////////DELETE COMMENT/////////////////////////// -->
				<tr>
					<td colspan="2" align="center">
				<?php if($_SESSION['login'] === 'admin') { ?>
				<form action=<?="/site/" . $lang . "/read/delete_comment"?> method="post">
					<input type="submit" name="delete" 
						value="<?=$this->form_2[delete_comment_button]?>"/>
					<input type="hidden" name="comment_id" value=<?=$comments[$i]['id']?>>
				</form>
				<?php } ?>
					</td>
				</tr>
				<!-- ///////////////////////////////////////////////////////////////////////// -->
			</table>
		</tr>
		<?php } ?>
		<?php } ?>
		<!--//////////////////////////////////////////////////////////////////////////////////
		//////////////////////////////////////ADD COMMENT///////////////////////////////////// -->	
		<tr>
			<?php if(isset($_SESSION['login'])) { ?>
			<form action=<?="/site/" . $lang . "/read/add_comment"?> method="post">
			<table border="1" align="center">
				<tr>
					<td align="center"><h3><?=$this->form_2['add_comment']?></h3></td>
				<tr>
					<td align="center">
						<textarea cols="80" rows="1" name="comment_header"></textarea>
					</td>
				</tr>
				<tr>
					<td align="center">
						<textarea cols="80" rows="10" name="comment_text" required></textarea>
					</td>
				</tr>
				<tr>
					<td align="center"><input type="submit" name="add" 
							value="<?=$this->form_2[send_button]?>"/>
						<input type="hidden" name="article_id" value=<?=$article[0]['id']?>>
						<input type="hidden" name="author" value=<?=$_SESSION['login']?>>
					</td>
				</tr>
			</table>
			</form>
			<?php } ?>
		</tr>
		<!--///////////////////////////////////////////////////////////////////////////////// -->
	</table>