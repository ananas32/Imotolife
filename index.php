<?php
//copy paste form http://www.freecontactform.com/email_form.php
if (isset($_POST['name'])) {
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "romantarasovich@gmail.com";
    $email_subject = "Your email subject line";

    function died()
    {
        echo "Нажаль сталася помилка при відправці форми, поверніться будь-ласка і перевірте валідність даних";
        die();
    }

    if (empty($_POST['name']) && empty($_POST['text'])) {
        died();
    }

    $name = $_POST['name']; // required
    $email = $_POST['email'];
    $text = $_POST['text']; // required

    $email_message = "Form details below.\n\n";


    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Ім'я: " . clean_string($name) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Текст: " . clean_string($text) . "\n";

    // create email headers
    $headers = 'From: ' . 'mail@imoto.life' . "\r\n" .
        'Reply-To: ' . 'mail@imoto.life' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Imotolife, мототуризм, мототема, мотоцикл, байк, байкери">

    <title>Imotolife</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i"
          rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/coming-soon.min.css" rel="stylesheet">

</head>

<body>

<div class="overlay"></div>

<div class="masthead">
    <div class="masthead-bg"></div>
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-12 my-auto">
                <div class="masthead-content text-white py-5 py-md-0">
                    <?if (isset($_POST['name'])) {
                        echo '<div class="alert alert-success"><strong>Дані успішно відправлені</strong></div>';
                    }?>
                    <h1 class="mb-3">Мотоцикли!</h1>
                    <p class="mb-5">Допоможіть нам зробити краще, но це не точна
                    <form action="/" method="POST">
                        <input type="text" name="name" class="form-control" placeholder="Ваше ім'я" required="required">
                        <br>
                        <input type="text" name="email" class="form-control" placeholder="Ваш email">
                        <br>
                        <textarea name="text" class="form-control" placeholder="Побажання" rows="4" required="required"></textarea>
                        <br>
                        <button class="btn btn-secondary" type="submit">Відправити побажання</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="social-icons">
    <ul class="list-unstyled text-center mb-0">
        <li class="list-unstyled-item">
            <a href="#">
                <i class="fa fa-facebook"></i>
            </a>
        </li>
        <li class="list-unstyled-item">
            <a href="#">
                <i class="fa fa-instagram"></i>
            </a>
        </li>
    </ul>
</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/vide/jquery.vide.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/coming-soon.min.js"></script>

</body>

</html>
