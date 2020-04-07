<html>
	<head>
		<title>
			Регистрация нового пользователя
		</title>
		<meta http-equiv = "Content-Type" content = "text/html; charset = utf-8" />	
		<link rel = "stylesheet" href = "../css/styles.css" />
	</head>
	<body>
	    <div class = "mainMenu">
			<ul class = "blocksOfMainMenu">
				<li>
					<a href = "index.php">
						Войти
					</a>
				</li>
				<li>
					<a href = "registration.php">
						Регистрация
					</a>
				</li>
			</ul>
		</div>
		<div class = "textAuth">
		    <?php
			    if(isset($_GET['err'])) {
			?>
		            <p id = "err" class = "errorInformation" >			
			            Такой пользователь уже существует, придумайте другой логин!
			        </p>
			<?php
			    }
			    if(isset($_GET['errType'])) {
			?>
		            <p id = "errType" class = "errorInformation" >			
			            Добавьте, пожалуйста, фото с расширением .jpeg, .gif или .png!
			        </p>
			<?php
			    }
			?>
			<form action = "adduser.php" class="formOfAuth" method = "POST" enctype = "multipart/form-data">  
				<p id = "textByUser">
				    Регистрация пользователя:
				</p>
				<input type = "text" id = "loginByUser" value = "<?php if(isset($_GET["loginByUser"])) echo $_GET["loginByUser"]; ?>" onkeyup = "if(/[^a-zA-Z0-9_]/.test(this.value))this.value=this.value.replace(/[^a-zA-Z0-9_]+/g,'')" placeholder = "Придумайте логин ..." name = "loginByUser" required />
				<br /><br />
				<input type = "password" id = "pswByUser"  placeholder = "Придумайте пароль ..." name = "pswByUser" required />
				<br /><br />
				<input type="file" style = "border:none;" accept = "image/jpeg, image/gif, image/png" name = "photoByUser" required />
				<br /><br />
				<button type = "submit" class = "buttonOfAuth">
					Создать
				</button>
			</form>
		</div>
	</body>
</html>