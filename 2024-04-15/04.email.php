<?php

$recipient = 'test@test.it, test2@domain.com';
$subject = 'Test email subject';
$content = 'Email content';

if (mail($recipient, $subject, $content)) {
    echo "Email accettata dal server di posta \n";
} else {
    echo "Invio email fallito\n";
}

$headers = "From: noreply@myserver.com" . PHP_EOL . 
           "Reply-To: info@myserver.com" . PHP_EOL . 
           "Cc: cc@myserver.com" . PHP_EOL . 
           "Bcc: bcc@myserver.com" . PHP_EOL . 
           "X-Priority: 1" . PHP_EOL .  // Priorità massima
           "X-Priority: 5" . PHP_EOL .  // Priorità minima
           "X-Mailer: PHP";

// Elenco completo delle intestazione su https://www.iana.org/assignments/message-headers/message-headers.xhtml

mail($recipient, $subject, $content, $headers);           