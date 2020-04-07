<html>
	<head>
		<title>
			Войти в систему
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
			    if(isset($_GET['reg'])) {
			?>
		            <p id = "reg" class = "newInformation" >			
				        Вы успешно зарегистрировались!
			        </p>
			<?php
			    }
				if(isset($_GET['err'])) {
			?>
			        <p id = "err" class = "errorInformation" >			
				        Проверьте введенные данные!
			        </p>
			<?php
				}
			?>
			<form action = "validate.php" class="formOfAuth" method = "POST" >
				<p id = "textByUser">
				    Войти в систему:
				</p>
				<input type = "text" id = "loginByUser" value = "<?php if(isset($_GET["loginByUser"])) echo $_GET["loginByUser"]; ?>" onkeyup = "if(/[^a-zA-Z0-9_]/.test(this.value))this.value=this.value.replace(/[^a-zA-Z0-9_]+/g,'')" placeholder = "Ваш логин ..." name = "loginByUser" required />
				<br /><br />
				<input type = "password" id = "pswByUser"  placeholder = "Ваш пароль ..." name = "pswByUser" required />
				<br /><br />
				<button type = "submit" class = "buttonOfAuth">
					Войти
				</button>
				<a href = "registration.php" class = "buttonOfRegistration">
					Регистрация
				</a>
			</form>
		</div>
	</body>
</html>