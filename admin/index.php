<?php
	error_reporting( E_ERROR );
	$f=file_get_contents(dirname($_SERVER['SCRIPT_FILENAME']).'/password.txt');
	settype($f, 'string');

	$config=file_get_contents(dirname($_SERVER['SCRIPT_FILENAME']).'/../scripts/config.json');
	settype($config, 'string');
	$parsed=json_decode($config, true);
?>
<html>
	<head>
		<meta charset='UTF-8'>
		<title>Admin panel</title>
		<link rel="stylesheet" href="../styles/admin.css">
	</head>
	<body>
		<div class="container">
			<h1>Админ-панель сайта baellerry-italia.in.ua</h1>
			<?php
				if(!isset($_POST['password'])){
			?>
			<form method='POST'>
				Пароль: <input type='password' name='password'><br>
				<button type='submit' class='btn btn-success'>Вход</button>
			</form>
		<?php
			}else{
				if(md5($_POST['password']) == $f || $_POST['password'] == $f){
					?>
					<form method='post'>
					<table class='table table-striped table-bordered table-hover table-condensed'>
						<tr>
							<td>
								Почта для отправки запросов:
							</td>
							<td>
								<input type='text' name='mail' value="<?php echo $parsed['mail'];?>">
							</td>
						</tr>
						<tr>
							<td>
								Цена до акции:
							</td>
							<td>
								<input type='number' name='original-price' value="<?php echo $parsed['original-price'];?>"> грн
							</td>
						</tr>
						<tr>
							<td>
								Процент скидки (в зависимости от этого значения считается новая цена товара):
							</td>
							<td>
								<input type='number' name='discount' value="<?php echo $parsed['discount'];?>"> %
							</td>
						</tr>
						<tr>
							<td>
								Новая цена (если указана, процент скидки не считает значение новой цены):
							</td>
							<td>
								<input type='number' name='new-price' value="<?php echo $parsed['new-price'];?>"> грн
							</td>
						</tr>
						<tr>
							<td>
								Дата конца акции:
							</td>
							<td>
								<input type='number' name='discount-end-date-day' min='1' max='31' value="<?php echo explode('.', $parsed['discount-end']['date'])[0]; ?>">
								<input type='number' name='discount-end-date-month' min='1' max='12' value="<?php echo explode('.', $parsed['discount-end']['date'])[1]; ?>">
								<input type='number' name='discount-end-date-year' min='2015' value="<?php echo explode('.', $parsed['discount-end']['date'])[2]; ?>">
							</td>
						</tr>
						<tr>
							<td>
								Время конца акции:
							</td>
							<td>
								<input type='number' name='discount-end-time-hours' min='0' max='23' value="<?php echo explode(':', $parsed['discount-end']['time'])[0]; ?>">
								<span>:</span>
								<input type='number' name='discount-end-time-minutes' min='0' max='59' value="<?php echo explode(':', $parsed['discount-end']['time'])[1]; ?>">
							</td>
						</tr>
						<tr>
							<td>
								Пароль админ-панели:
							</td>
							<td>
								<input type='text' name='new-password' value="<?php echo $_POST['password'];?>">
							</td>
						</tr>
					</table>
					<button class='btn btn-success' type='submit'>Сохранить настройки!</button>
					</form>
					<?php
				}
				else{
					mail($parsed['mail'], 'Уведомление от baellerry-it!', "Используйте этот код как пароль аккаунта админ-панели: $f", "Content-type: text/plain; charset=utf-8");
					echo "Неверный пароль! На почту <b>".$parsed['mail']."</b> было отправлено уведомление с кодом восстановения пароля.";
				}
			}
		?>
		<?php
			$discountEndDateDay=$_POST['discount-end-date-day'];
			$discountEndDateMonth=$_POST['discount-end-date-month'];
			$discountEndDateYear=$_POST['discount-end-date-year'];
			$discountEndTimeHours=$_POST['discount-end-time-hours'];
			$discountEndTimeMinutes=$_POST['discount-end-time-minutes'];

			$originalPrice=$_POST['original-price'];
			$newPrice=$_POST['new-price'];
			$discount=$_POST['discount'];
			$newPassword=$_POST['new-password'];
			$mail=$_POST['mail'];

			if(isset($_POST['mail']) && isset($_POST['original-price']) && isset($_POST['new-password'])){
				if(!isset($_POST['discount-end-date-day'])) $discountEndDateDay='01';
				if(!isset($_POST['discount-end-date-month'])) $discountEndDateMonth='01';
				if(!isset($_POST['discount-end-date-year'])) $discountEndDateYear='2015';
				if(!isset($_POST['discount-end-time-hours'])) $discountEndTimeHours='00';
				if(!isset($_POST['discount-end-time-minutes'])) $discountEndTimeMinutes='00';
				if(!isset($_POST['original-price'])) $originalPrice='900';
				if(!isset($_POST['new-price'])) $newPrice='499';
				if(!isset($_POST['discount'])) $discount='50';

				$discountEndDate=$discountEndDateDay.'.'.$discountEndDateMonth.'.'.$discountEndDateYear;
				$discountEndTime=$discountEndTimeHours.':'.$discountEndTimeMinutes;

				$arr=array(
					'mail' => $mail,
					'original-price' => $originalPrice,
					'new-price' => $newPrice,
					'discount' => $discount,
					'discount-end' => array(
						'date' => $discountEndDate,
						'time' => $discountEndTime
					)
				);
				$newJSON=json_encode($arr);
				$fp = fopen(dirname($_SERVER['SCRIPT_FILENAME']).'/../scripts/config.json', 'w');
				fwrite($fp, $newJSON);
				fclose($fp);
				$fp1 = fopen(dirname($_SERVER['SCRIPT_FILENAME']).'/password.txt', 'w');
				fwrite($fp1, md5($newPassword));
				fclose($fp1);
				mail($_POST['mail'], 'Уведомление от baellerry-it!', "Пароль аккаунта админ-панели сменен: $newPassword", "Content-type: text/plain; charset=utf-8");
				echo "<br/>На почту <b>".$_POST['mail']."</b> было отправлено уведомление о смене пароля.";
			}
		?>
		</div>
	</body>
</html>
