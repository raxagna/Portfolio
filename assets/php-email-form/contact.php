<?php

if(isset($_POST['Email'])) 
{
    $email_to = "razan.i.omer@gmail.com";

    function problem($error)
    {
        echo "There are error(s) with the form you submitted as shown below.";
        echo $error . "<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }

    if(!isset($_POST['Name']) || !isset($_POST['Email']) || !isset($_POST['Message']))
    {
        problem("There appears to be a problem with the form you submitted.")
    }

    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $subject = $_POST['Subject'];
    $message = $_POST['Message'];

    $error_message = "";

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    if(!preg_match($email_exp, $email))
    {
        $error_message .= 'The email address you entered does not appear to be valids.<br>'
    }

    $string_exp = "/^[A-Za-z .'-]+$/";
    if(!preg_match($string_exp, $name))
    {
        $error_message .= 'The name you entered does not appear to be valid.<br>';
    }

    if(strlen($message) < 2)
    {
        $error_message .= 'The message you entered is below the expected word count.<br>';
    }

    if(strlen($error_message) > 0)
    {
        problem($error_message);
    }

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_subject .= 'New Portfolio Message: ' . clean_string($subject);

    $email_message = "Form details below. \n\n";

    $email_message .= 'Name: ' . clean_string($name) . '\n';
    $email_message .= 'Email: ' . clean_string($email) . '\n';
    $email_message .= 'Message: ' . clean_string($message) . '\n';

    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($email_to, $email_subject, $email_message, $headers);

}

?>