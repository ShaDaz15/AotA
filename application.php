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
        !isset($_POST['membership'])
    ) {
        problem('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $discord = $_POST['discord']; // required
    $accessLevel = $_POST['accessLevel']; // required
    $membership = $_POST['membership']; // required

   //  $error_message = "";
   //  $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

   //  if (!preg_match($email_exp, $email)) {
   //      $error_message .= 'The Email address you entered does not appear to be valid.<br>';
   //  }

   //  $string_exp = "/^[A-Za-z .'-]+$/";

   //  if (!preg_match($string_exp, $name)) {
   //      $error_message .= 'The Name you entered does not appear to be valid.<br>';
   //  }

   //  if (strlen($message) < 2) {
   //      $error_message .= 'The Message you entered do not appear to be valid.<br>';
   //  }

   //  if (strlen($error_message) > 0) {
   //      problem($error_message);
   //  }

    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Discord: " . clean_string($discord) . "\n";
    $email_message .= "Access Level: " . clean_string($accessLevel) . "\n";
    $email_message .= "Type of Membership: " . clean_string($membership) . "\n";

    @mail("dan.gallagher91@yahoo.com","New Application",$email_message);
?>

    <!-- include your success message below -->

    Thank you for contacting us. We will be in touch with you very soon.

<?php
}
?>