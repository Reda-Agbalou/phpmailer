<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You!</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Message Sent Successfully!</h1>
    <p>Thank you for contacting us, <?php echo htmlspecialchars($_POST['username']); ?>.</p>
    <p>We have received your message and will respond to you as soon as possible.</p>
    <p>Your contact details:</p>
    <ul>
        <li>Email: <?php echo htmlspecialchars($_POST['email']); ?></li>
        <li>Phone: <?php echo htmlspecialchars($_POST['phone']); ?></li>
    </ul>
    <p>In the meantime, you can explore our website or check out our FAQ section.</p>
    <a href="index.php">Go to Home Page</a>
    <a href="faq.php">Visit FAQ</a>
</body>
</html>
