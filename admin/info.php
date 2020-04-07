<html>
	<head>
		<title>
			Ваша информация
		</title>
		<meta http-equiv = "Content-Type" content = "text/html; charset = utf-8" />	
		<link rel = "shortcut icon" type = "image/x-icon" href = "../img/f.ico" />
		<link rel = "stylesheet" href = "../css/styles.css" />
	</head>
	<body>
		<div class = "mainMenu">
			<ul class = "blocksOfMainMenu">
				<li>
					<a href = "info.php">
						<?php
						    include '../lib/lib.php';
							session_start();
							echo 'Добрый день, '.$_SESSION['curUser']->getLogin();
						?>
					</a>
				</li>
				<li>
					<a href = "index.php">
						Общие контакты
					</a>
				</li>
				<li>
					<a href = "fav.php">
						Избранные контакты
					</a>
				</li>
				<li>
				    <a href = "exit.php">
						Выйти
					</a>	
				</li>
			</ul>
		</div>
		<div class = "rowsOfBlocksItem">				
			<div class = "itemOfProduct" style = "margin-left:35%;">
				<img src = "<?php echo $_SESSION["curUser"]->getPathByImage();?>" />
				<div class = "mainOfProduct" >
					<h3>
						<?php echo $_SESSION["curUser"]->getLogin();?>
					</h3>
				</div>
			</div>
		</div>		
	</body>
</html>