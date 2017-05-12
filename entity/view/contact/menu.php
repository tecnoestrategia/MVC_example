<body>
	<header id="header-banner">
		<nav class="navbar navbar-default navbar-fixed-top fadeIn" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#dropdown-box-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="navbar-brand">
						<a href="#"><?php echo TITLE;?></a>
					</div>
				</div>
				<!-- Collect the nav links and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="dropdown-box-1">
					<ul class="nav navbar-nav">
						<li><a href="?c=index"><?php echo MENU_HOME;?></a></li>
						<li><a href="?c=about"><?php echo MENU_ABOUT;?></a></li>
						<li class="dropdown" role="presentation">
							<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo MENU_BOOK_ENTITY;?> <span class="caret"></span>
							</a>
							<ul class="dropdown-menu bullet fadeIn" role="menu">
								<li><a href="?c=book"><?php echo MENU_BOOK_ALL;?></a></li>
							  <li><a href="?c=bookcategory"><?php echo MENU_BOOK_CATEGORIES;?></a></li>
							  <li><a href="?c=author"><?php echo MENU_BOOK_AUTHORS;?></a></li>
							</ul>
						</li>
						<li class="active"><a href="?c=contact"><?php echo MENU_CONTACT;?></a></li>
					</ul>
				</div>
			</div> <!-- /.container -->
		</nav> <!-- /.nav -->
	</header>
