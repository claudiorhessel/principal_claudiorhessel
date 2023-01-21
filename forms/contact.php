<?php
  include_once '../assets/vendor/autoload.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  $receiving_email_address = 'smtp@claudiorhessel.com.br';

  $mail = new PHPMailer(true);

  try {
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.titan.email;';
    $mail->SMTPAuth = true;
    $mail->Username = 'smtp@claudiorhessel.com.br';
    $mail->Password = '';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom($receiving_email_address);
    $mail->addAddress($receiving_email_address);

    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body = "E-mail: " . $_POST['email'] . "<br />";
    $mail->Body .= "Nome: " . $_POST['name'] . "<br />";
    $mail->Body .= "Mensagem: " . $_POST['message'];

    echo $mail->send();
  } catch (Exception $e) {
    echo "A mensagem não pode ser enviada. Erro: {$mail->ErrorInfo}";
  }
?>
