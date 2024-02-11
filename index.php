<?php
session_start();
if(isset($_POST['send'])){
    //extraction des variables
    extract($_POST);
    //verifions si les varibles existent et ne sont pas vides if(isset($username) && $username != "" &&
    if(isset($username) && $username != "" && 
        isset($email) && $email != "" && 
        isset($phone) && $phone != "" && 
        isset($message) && $message != ""){
            $to = "agbalou9889@gmail.com";
            $subject = "Vous avez recu un email de : " . $email;
            
            $message = "
                <p> Vous avez recu un email de <strong> ". $email."</strong></p>
                <p><strong>Nom : </strong>". $username."</p>
                <p><strong>Telephone : </strong>". $phone."</p>
                <p><strong>Message : </strong>". $message."</p>
            ";
            
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // More headers
            $headers .= 'From: <'. $username.'>' . "\r\n";
            //$headers .= 'Cc: myboss@example.com' . "\r\n";
            
            $send = mail($to,$subject,$message,$headers);

            if($send){
                $_SESSION['succes_message'] = "message envoyé";
                header('Location: thank-you.php');
                exit();
            }else{
                $info = "message non envoyé";
            }


                }else {
    //si elle sont vides
    $info = "veuillez remplir tous les champs !";
    $color = "red";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send an email with a form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        // Afficher le message d'erreur
        if(isset($info)) { ?>
            <p class="request_message" style="color:red">
                <?= $info ?>
            </p>
        <?php 
        } 
    ?>
    
<?php
// Afficher le message de succes
if(isset($_SESSION['succes_message'])) { ?>
    <p class="request_message" style="color:green">
        <?= $_SESSION['succes_message'] ?>
    </p>
    <?php
    // Clear the session variable to prevent showing the message again
    unset($_SESSION['succes_message']);
}
?>

    
    <form action="" method="POST">
        <h2> Contact Us</h2>
        
        <label>Username</label>
        <input type="text" name="username" required > 
        
        <label>Email</label>
        <input type="email" name="email">

        <label>phone</label>
        <input type="number" name="phone" required>
        
        <label>Message</label>
        <textarea name="message" cols="30" rows="10"></textarea>
        <button name="send">send</button>
    </form>
</body>
</html>