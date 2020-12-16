<?php
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

    $email_message = "Discord: " . clean_string($discord) . "\n\n";
    $email_message .= "Game Access: " . clean_string($accessLevel) . "\n\n";
    $email_message .= "Mic: " . clean_string($mic) . "\n\n";
    $email_message .= "In-game Interests: " . clean_string($interests) . "\n\n";
    $email_message .= "Membership: " . clean_string($position) . "\n\n";
    $email_message .= "Leadership Role Wanted: " . clean_string($membership) . "\n\n";
    $email_message .= "Personality: " . clean_string($bio) . "\n\n";
    $email_message .= "Activites of Interest: " . clean_string($specialize) . "\n\n";
    $email_message .= "Past Experience: " . clean_string($experience) . "\n\n";
    $email_message .= "Questions for Guild: " . clean_string($questions) . "\n\n";

    $to = "magicofgaia@gmail.com, stokes.t.spencer@gmail.com, darktemplar260@gmail.com, bnieman741@gmail.com, connor.v.finucan@gmail.com";
    $subject = "New Guild Applicaiton";
    $headers = "From: <apostlesoftheabyss@gmail.com>" . "\r\n";

    @mail($to,$subject,$email_message,$headers);
?>

<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="shortcut icon" type="image/jpg" href="assets/favicon-32x32.png">
   <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700&display=swap" rel="stylesheet">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <link rel="stylesheet" href="style.css">
   <title>Apostles of the Abyss</title>
</head>

<body class="text-light bg-dark d-flex flex-column vh-100">
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
        <div class="container alert alert-secondary py-3 my-sm-5 m-2" role="alert">
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
               <a href="https://twitter.com/AbyssApostles">Twitter</a>
               <a href="https://www.twitch.tv/apostlesoftheabyss">Twitch</a>
               <a href="https://discord.com/channels/735220428397609023/735220428645204097">Discord</a>
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

<?php
}
?>