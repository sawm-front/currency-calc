<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	//От кого письмо
	$mail->setFrom('saawm@mail.ru', 'asdf');
	//Кому отправить
	$mail->addAddress('thejew1488@gmail.com');
	//Тема письма
	$mail->Subject = 'Новая заявка на конвертацию';

	

	//Тело письма
	$body = '<h1>Новое письмоооооо!</h1>';
	
	if(trim(!empty($_POST['sumRub']))){
		$body.='<p><strong>Сумма в рублях:</strong> '.$_POST['sumRub'].'</p>';
	}
	if(trim(!empty($_POST['email']))){
		$body.='<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';
	}
	if(trim(!empty($_POST['sumValute']))){
		$body.='<p><strong>Сумма в валюте:</strong> '.$_POST['sumValute'].'</p>';
	}
  
  if(trim(!empty($_POST['valuteSelect']))){
     $body.='<p><strong>Выбранная валюта:</strong> '.$_POST['valuteSelect'].'</p>';
  }

	$mail->Body = $body;

	//Отправляем
	if (!$mail->send()) {
		$message = 'Ошибка';
	} else {
		$message = 'Данные отправлены!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>