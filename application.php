<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if (isset($_POST['discord'])) {

    function problem($error)
    {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br><br>";
        echo $error . "<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }

    // validation expected data exists
    if (
        !isset($_POST['discord']) ||
        !isset($_POST['accessLevel']) ||
        !isset($_POST['micRadios']) ||
        !isset($_POST['interests']) ||
        !isset($_POST['positionRadios']) ||
        !isset($_POST['membership']) ||
        !isset($_POST['bio']) ||
        !isset($_POST['specialize']) ||
        !isset($_POST['experience']) ||
        !isset($_POST['questions'])
    ) {
        problem('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $discord = $_POST['discord'];
    $accessLevel = $_POST['accessLevel'];
    $interests  = 'None';
        if(isset($_POST['interests']) && is_array($_POST['interests']) && count($_POST['interests']) > 0){
            $interests = implode(', ', $_POST['interests']);
        }
    $mic = $_POST['micRadios'];
    $position = $_POST['positionRadios'];
    $membership = $_POST['membership'];
    $bio = $_POST['bio'];
    $specialize = $_POST['specialize'];
    $experience= $_POST['experience'];
    $questions = $_POST['questions'];

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $mail = new PHPMailer(true);

try {

    $mail->isSMTP();
    $mail->Host       = 'apostlesoftheabyss.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'admin@apostlesoftheabyss.com';
    $mail->Password   = '+23@[bb#@r}1';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    $mail->setFrom('admin@apostlesoftheabyss.com', 'ApostlesoftheAbyss');

    $mail->addAddress('magicofgaia@gmail.com', 'Kino');
    $mail->addAddress('darktemplar260@gmail.com', 'Jade');
    $mail->addAddress('stokes.t.spencer@gmail.com', 'Haldol');
    $mail->addAddress('bnieman741@gmail.com', 'Billy');
    $mail->addAddress('connor.v.finucan@gmail.com', 'Durlz');
    $mail->addAddress('sdcassetta@gmail.com', 'Spud');

    // Content

    $body = "<main><h3>Discord:</h3> " . clean_string($discord) . "<br>
    <h3>Game Access:</h3> " . clean_string($accessLevel) . "<br>
    <h3>Mic:</h3> " . clean_string($mic) . "<br>
    <h3>In-game Interests:</h3> " . clean_string($interests) . "<br>
    <h3>Membership:</h3> " . clean_string($position) . "<br>
    <h3>Leadership Role Wanted:</h3> " . clean_string($membership) . "<br>
    <h3>Personality:</h3> " . clean_string($bio) . "<br>
    <h3>Activites of Interest:</h3> " . clean_string($specialize) . "<br>
    <h3>Past Experience:</h3> " . clean_string($experience) . "<br>
    <h3>Questions for Guild:</h3> " . clean_string($questions) . "</main>";

    $mail->isHTML(true);
    $mail->Subject = 'New Guild Application from: ' . clean_string($discord);
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}
?>

<!doctype html>
<html lang="en">

<head>
   <!-- Global site tag (gtag.js) - Google Analytics -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=G-Y1NT7093LG"></script>
   <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
   gtag('js', new Date());

   gtag('config', 'G-Y1NT7093LG');
   </script>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="shortcut icon" type="image/jpg" href="assets/favicon-32x32.png">
   <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700&display=swap" rel="stylesheet">
   <script src="https://kit.fontawesome.com/c6e1b22131.js" crossorigin="anonymous"></script>
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <link rel="stylesheet" href="app.css">
   <title>Apostles of the Abyss</title>
</head>

<body class="text-light d-flex flex-column vh-100" id="application">
   <header class="border-bottom border-warning">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         <a class="navbar-brand" href="index.html">Apostles of the Abyss</a>
         <a class="sub-brand mr-auto">An Ashes of Creation PvX Guild</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
      
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="home.html">HOME</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="apply.html">APPLY</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="faq.html">FAQ</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="https://discord.com/channels/735220428397609023/735220428645204097" target="_blank">DISCORD</a>
               </li>
         </div>
      </nav>
   </header>

   <main class="m-auto">
      <div class="container alert alert-dark py-3 my-sm-5 m-2" role="alert">
            <h1 class="alert-heading">Thank you for submitting your application!</h1>
            <br>
            <h3>We will be in touch with you shortly. Please make sure to join our discord <a href="https://discord.com/channels/735220428397609023/735220428645204097" class="alert-link">here</a>.</h3>
      </div>
   </main>

   <footer class="fluid-container mt-auto">
      <div class="container">
         <div class="row p-3">
            <div class="col-md-6 text-center mb-3 align-self-center">
               <h3 class="my-4">Apostles of the Abyss</h3>
               <h5 class="my-4">An Ashes of Creation Guild</h5>
               <h5 class="my-4">Find Us Here</h5>
               <a href="https://twitter.com/AbyssApostles"><i class="fab fa-twitter"></i></a>
               <a href="https://www.twitch.tv/apostlesoftheabyss"><i class="fab fa-twitch"></i></a>
               <a href="https://discord.com/channels/735220428397609023/735220428645204097"><i class="fab fa-discord"></i></a>
            </div>
            <div class="col-md-6">
               <iframe src="https://discordapp.com/widget?id=735220428397609023&amp;theme=dark" width="100%" height="100%"
                  allowtransparency="true" frameborder="0"
                  sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
            </div>
         </div>
      </div>
   </footer>

   <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
      crossorigin="anonymous"></script>
</body>

</html>