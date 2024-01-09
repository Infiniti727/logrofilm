<?php

require '../../vendor/autoload.php';
    
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
    

class Correo 
{
    private $remitente;
    private $destinatario;
    private $destinatarioCC;
    private $documento;

    public function __construct()
    {
        $this->remitente = "PaginaCompras@comp.com";
        $this->destinatario = $_SESSION["username"];
        $this->destinatarioCC = "";
        $this->documento = "";
    }

    public function enviar(){

        $mail = new PHPMailer(true);
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                
        $mail->Username   = 'ancamaju.jaf@gmail.com';                     
        $mail->Password   = 'ltdd okwx ifmf iksj ';                             
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
        $mail->Port       = 587;                                    
    
        $mail->setFrom($this->remitente, 'siwi');
        $mail->addAddress($this->destinatario);     
       // $mail->addCC($this->destinatarioCC);
        //$mail->addAttachment($this->documento);         

        $mail->isHTML(true);                                 
        $mail->Subject = 'Pedido';
        $mail->Body    = '<b>Se ha realizado tu pedido</b>';
        $mail->AltBody = 'Se ha realizado tu pedido';

        $mail->send();
        try {
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }
    public function getRemitente()
    {
        return $this->remitente;
    }

    public function setRemitente($remitente)
    {
        $this->remitente = $remitente;
    }

    public function getDestinatario()
    {
        return $this->destinatario;
    }

    public function setDestinatario($destinatario)
    {
        $this->destinatario = $destinatario;
    }

    public function getDestinatarioCC()
    {
        return $this->destinatarioCC;
    }

    public function setDestinatarioCC($destinatarioCC)
    {
        $this->destinatarioCC = $destinatarioCC;
    }

    public function getDocumento()
    {
        return $this->documento;
    }

    public function setDocumento($documento)
    {
        $this->documento = $documento;
    }
} 
