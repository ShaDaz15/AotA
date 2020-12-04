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

    $email_message = "Discord: " . clean_string($discord) . "\n";
    $email_message .= "Game Access: " . clean_string($accessLevel) . "\n";
    $email_message .= "Mic: " . clean_string($mic) . "\n";
    $email_message .= "In-game Interests: " . clean_string($interests) . "\n";
    $email_message .= "Membership: " . clean_string($position) . "\n";
    $email_message .= "Leadership Role Wanted: " . clean_string($membership) . "\n";
    $email_message .= "Personality: " . clean_string($bio) . "\n";
    $email_message .= "Activites of Interest: " . clean_string($specialize) . "\n";
    $email_message .= "Past Experience: " . clean_string($experience) . "\n";
    $email_message .= "Questions for Guild: " . clean_string($questions) . "\n";

    @mail("dan.gallagher91@yahoo.com","New Application",$email_message);

    echo($email_message);
?>

    <!-- include your success message below -->

    Thank you for contacting us. We will be in touch with you very soon.

<?php
}
?>