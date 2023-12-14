<?php
namespace Classes;
use PHPMailer\PHPMailer\PHPMailer;

class Email{
    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }
  
    public function enviarConfirmacion(){
      
        //craer e objeto de email
        $mail = new PHPMailer();
       
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '7bc9585933b001';
        $mail->Password = '99a5af968b1629';
        

        $mail->setFrom('cuentas@appsalon.com', 'Mailer');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Confirma tu cuenta';

        //set HTML
        $mail->isHTML(true);
        $mail->CharSet='UTF-8';
        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->email . "</strong> 
        Has creado tu cuenta en App Salon, solo confirma en el siguiente enlace </p>";
        $contenido .= "<p>Presiona aquí <a href='http:://localhost:3000/confirmar-cuenta?token=" .$this->token. "'>Confirmar Cuenta</a> </p>";
        $contenido .= "<p> Si tu no solicitaste esta cuenta, ignora el mensaje </p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();
        

    }
}