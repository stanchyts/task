<html>
	<head>
		<title>
			Избранные контакты
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
			<?php
			    $resOfQeury = $_SESSION['curUser']->userGetFavContacts();
				for ($i = 1; $i < count($resOfQeury); $i++ ) {
					$resOfContact = $_SESSION['curUser']->sqlQueryGetContact($resOfQeury[$i]);
			        $itemByContact = $resOfContact->fetch_assoc();	
			?>
					<div class = "itemOfProduct">
						<div class = "mainOfProduct">
							<h3>
								<?php 
								    echo $itemByContact['name']."<br/>".$itemByContact['tel'];
							    ?>
							</h3>
							<a href = "<?php echo "delfav.php?idByContact=".$itemByContact['id']; ?>" class = "buttonOfRegistration">
								Удалить
							</a>
						</div>
					</div>
			<?php
				}
				if($_SESSION['curUser']->userIsEmptyFavContact()) {
			?>
			        <div style = "margin-left:45%;">
						<p class = "errorInformation">
							Нет контактов в избранном!
						</p>
					</div> 
			<?php
				}
			?>
		</div>
	</body>
</html>