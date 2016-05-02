<?php 
session_start();
$digit = rand(1, 100);
$_SESSION['digit'] = $digit;
?>
<html>
<head>
	<title>Второе задание</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#again').hide();
			$('#try').click(function() {
				$(this).attr('disabled', 'disabled');
				$('#guess').attr('disabled', 'disabled');
				var digit = $('#guess').val();
				$.post(
					'ajax.php',
					{
						guess: digit
					},
					function(data) {
						$('.info').html('');
						$('.info').html(data);
						$('#again').show();
					}
				);
				return false;
			});

			$('#again').click(function(){
				window.location.reload();
			});
		});
	</script>
</head>
<body>
	<h1>Игра: угадай число</h1>
	<p>Компьютер загадывает число, пользователь вводит свое число. Если число совпадает - вы победитель.</p>
	<br/>
	<label for="guess">Введите число от 1 до 100</label><br/>
	<input type="text" name="guess" id="guess" />
	<button type="button" href="#" id="try">Угадать</button>
	<br/><br/>
	<div class="info"></div>
	<br/>
	<button type="button" href="#" id="again">Попробовать еще раз</button>
</body>
</html>