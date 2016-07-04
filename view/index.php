<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="view/style.css" rel="stylesheet">
</head>

<body>

<div class="wrapper">

	<header class="header">
		<strong><?php print $vars['header']?></strong>
		<p align ='center'><font size="5" face="Arial"><b>Book-Catalog</b></font></p>
	</header><!-- .header-->

	<div class="middle">

		<div class="container">
			<main class="content">
				<h1><?php print $vars['title'] ?></h1>
				<div>
					<?php print $vars['message'] ?>
				</div>
				<?php print $vars['content'] ?>
			</main><!-- .content -->
		</div><!-- .container-->

		<aside class="left-sidebar">
			<?php print $vars['sidebar']?>
			
		</aside><!-- .left-sidebar -->

	</div><!-- .middle-->

</div><!-- .wrapper -->

<footer class="footer">
		<?php print $vars['footer']?>
</footer><!-- .footer -->

</body>
</html>