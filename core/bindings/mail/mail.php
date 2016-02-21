<?php

require $__PATH . 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

class Mail {

    public static function send($view, $data, $callback){

        global $__CONFIG;

        $mail = new PHPMailer;

        $mail->setFrom($__CONFIG['app']['email'], $__CONFIG['app']['name']);

        if ($__CONFIG['app']['mail']['type'] == 'smtp'){

            $mail->isSMTP();
            $mail->Host = $__CONFIG['app']['mail']['smtp']['host'];
            $mail->SMTPAuth = true;
            $mail->Username = $__CONFIG['app']['mail']['smtp']['username'];
            $mail->Password = $__CONFIG['app']['mail']['smtp']['password'];
            $mail->SMTPSecure = $__CONFIG['app']['mail']['smtp']['encryption'];
            $mail->Port = $__CONFIG['app']['mail']['smtp']['port'];

            $mail->setFrom($__CONFIG['app']['mail']['smtp']['username'], $__CONFIG['app']['name']);

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
