<?php
if ($_POST['submit']) {
    $to = 'mfiqrin@gmail.com'; //ganti email dg email admin (email penerima pesan)
    $name    = htmlentities($_POST['name']);
    $email    = htmlentities($_POST['email']);
    $subject    = htmlentities($_POST['subject']);
    $message   = htmlentities($_POST['message']);

    $headers = "From: $email";
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";



    $logo = 'assets/img/Logo_HT-1__1_-removebg-preview.png';
    $link = '#';

    $body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
    $body .= "<table style='width: 100%;'>";
    $body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
    $body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
    $body .= "</td></tr></thead><tbody><tr>";
    $body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
    $body .= "<td style='border:none;'><strong>Email:</strong> {$email}</td>";
    $body .= "</tr>";
    $body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$subject}</td></tr>";
    $body .= "<tr><td></td></tr>";
    $body .= "<tr><td colspan='2' style='border:none;'>{$message}</td></tr>";
    $body .= "</tbody></table>";
    $body .= "</body></html>";

    if (mail($to, $subject, $body, $headers)) {
        header("Location: contact.php");
    } else {
        echo 'ERROR: Try Again. <a href="index.html">Back</a>';
    }
} else {
    header("Location: index.html");
}
