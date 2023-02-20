<?php
require($_SERVER['DOCUMENT_ROOT'] .'/config.php');
require($_SERVER['DOCUMENT_ROOT'] . '/src/PHPMailer.php');
require($_SERVER['DOCUMENT_ROOT'] . '/src/SMTP.php');
require($_SERVER['DOCUMENT_ROOT'] . '/src/Exception.php');

 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
$mail = new PHPMailer(true);
 
try {
	$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host = 'smtp-mail.outlook.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'seu e-mail aqui';
	$mail->Password = 'sua senha aqui';
	$mail->Port = 587;
 
	$mail->setFrom('seu e-mail aqui');
	$mail->addAddress($_POST['con_email']);

 
	$mail->isHTML(true);
	$mail->Subject = 'Email de confirmação';
	$mail->Body = 'Seus dados foram salvos!';
	$mail->AltBody = 'Chegou o email teste';

	if($mail->send()) {
		header("location:contact.php");
	} else {
		echo 'Email não enviado';
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}  

echo "<script>
alert ('Email enviado');
document.location.href = 'contact.php';
</script>
";
