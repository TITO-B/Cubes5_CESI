<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Adresse email de destination
    $to = 'votre_email@example.com';  // Remplacez par votre adresse email
    $subject = "Contact depuis le site";
    $full_message = "Message de $name ($email):\n\n$message";
    $headers = "From: $email";

    // Envoyer l'email
    if (mail($to, $subject, $full_message, $headers)) {
        // Rediriger vers une page de remerciement
        header("Location: ../Views/Product/ThankYou.html");
    } else {
        echo "Erreur lors de l'envoi de l'email.";
    }
    exit();
}
?>
