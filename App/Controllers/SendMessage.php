<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Ici, vous pouvez mettre en place la logique pour envoyer l'email
    // Pour cet exemple, nous redirigeons simplement avec un paramètre GET 'status'

    // Simulez l'envoi d'email
    // Remarque : ceci est une simulation et ne fonctionnera pas sans un serveur de messagerie configuré
    // Utilisez PHPMailer ou une autre bibliothèque pour envoyer des emails en production
    // Exemple avec PHPMailer : https://github.com/PHPMailer/PHPMailer

    // Redirection avec le message "Message envoyé"
    header("Location: /product/{{ article.id }}?status=sent");
    exit;
} else {
    // Si le formulaire n'a pas été soumis correctement, vous pouvez gérer les erreurs ici
    // Par exemple, rediriger vers une page d'erreur ou afficher un message d'erreur
    // header("Location: /error-page.php");
    // exit;
}
?>
