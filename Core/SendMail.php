<?php

namespace Core;

use phpDocumentor\Reflection\Types\Boolean;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require dirname(__DIR__) . '/vendor/autoload.php';


class SendMail{
    public static function sendOneMail($destinataire, $objet, $message) : string{
        try{
            // Vérification des paramètres
            if (empty($destinataire)) {
                return 'Erreur : Destinataire non défini';
            } 
            if (empty($objet)){
                return 'Erreur : Objet du mail non défini';
            }
            if (empty($message)){
                return 'Erreur : Message non défini';
            }

            $mail = new PHPMailer(true); // TRUE pour activer les exceptions

            $username="dev@cesi.fr";
            $password="CESIcubes";
            // Configuration du serveur SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $username; // Utilise les variables d'environnement
            $mail->Password = $password; // Utilise les variables d'environnement
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->CharSet = 'UTF-8';

            // Configuration de l'email
            $mail->setFrom('dev@cesi.fr', 'CESIcubes');
            $mail->addAddress($destinataire);
            $mail->Subject = $objet;
            $mail->isHTML(true);
            $mail->Body = $message;

            // Envoi de l'email
            $mail->send();
            return 'Le mail a bien été envoyé';
            
        } catch (Exception $e) {
            return 'Erreur : Une erreur est survenue pendant l\'envoi du mail : ' . $mail->ErrorInfo;
        }
    }
}