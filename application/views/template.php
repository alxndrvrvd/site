<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?=$page_title?></title>
</head>
<body>
	<table width="800" align="center">
		<tr>
			<td align="center"><a href=<?="/site/" . $lang ?>>
				<?=View::$lang_array['template_page']['template_page_title']?></a></td>
			<td align="center">
				<a href="/site/ua">
					<img src="/site/img/Ukraine.png" width="32" height="32" alt="ua"/>
				</a>
				<a href="/site/en">
					<img src="/site/img/United States.png" width="32" height="32" alt="en"/>
				</a>
			</td>
		</tr>
		<tr>
			<td width="645">
				<h1 align="center"><?=View::$lang_array['template_page']['site_name']?></h1>
			</td>
			<td width="155">	
				<?php require_once $sign_in . ".php"?>
			</td>
		</tr>
		<tr>
			<td colspan="2" width="600">
				<?php require_once $content . ".php"?>
			</td>
		</tr>
		<?php if(isset($_SESSION['login']) && ($_SESSION['status'] === 'admin'
					|| $_SESSION['status'] === 'redactor')
					&& ($_SERVER['REQUEST_URI'] == "/site/" . $lang)) { ?> 
			<td colspan="2" align="center">
				<form action=<?=$lang . "/add"?> method="post">
					<input type="submit" name="add" 
					value="<?=View::$lang_array['template_page']['add_button']?>"/>
				</form>
			</td>
		<?php } ?> 
	</table>
</body>
</html>