<?php

require $__PATH . 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

class Mail {

    public static function send($view, $data, $callback){

        global $__CONFIG;

        $mail = new PHPMailer;

        $mail->setFrom($__CONFIG['name']);

        if ($__CONFIG['mail']['type'] == 'smtp'){

            $mail->isSMTP();
            $mail->Host = $__CONFIG['mail']['smtp']['host'];
            $mail->SMTPAuth = true;
            $mail->Username = $__CONFIG['mail']['smtp']['username'];
            $mail->Password = $__CONFIG['mail']['smtp']['password'];
            $mail->SMTPSecure = $__CONFIG['mail']['smtp']['encryption'];
            $mail->Port = $__CONFIG['mail']['smtp']['port'];

            $mail->setFrom($__CONFIG['mail']['smtp']['username'], $__CONFIG['name']);

        }

        $mail->isHTML(true);
        $mail->Body = view($view, $data);

        $callback($mail);

        if(!$mail->send()) {
            throw new Exception($mail->ErrorInfo);
        }

    }

}

?>
