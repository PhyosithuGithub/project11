<?php
namespace App\Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Mail{
    private $mail;
    public function __construct()
    {
        $this->mail = new PHPMailer();
        $this->setUp();
    }

    public function setUp(){
        if(getenv("APP_ENV") === "local"){
            $this->mail->SMTPDebug =2;
        }
        $this->mail->isSMTP();
        $this->mail->Host =getenv("SMTP_HOST");
        $this->mail->SMTPAuth =true;
        $this->mail->Username =getenv("MAIL_USERNAME");
        $this->mail->Password =getenv("MAIL_PASSWORD");
        $this->mail->Port = getenv("SMTP_PORT");

        $this->mail->isHTML(true);
        $this->mail->SingleTo =true;

        $this->mail->From =getenv("ADMIN_MAIL");
        $this->mail->FromName ="Mr.Phyo";
    }
    public function send($data){
        $this->mail->addAddress($data["to"],$data["to_name"]);
        $this->mail->Subject =$data["subject"];
        $this->mail->Body=make($data["filename"],$data);
        return $this->mail->send();
    }
}