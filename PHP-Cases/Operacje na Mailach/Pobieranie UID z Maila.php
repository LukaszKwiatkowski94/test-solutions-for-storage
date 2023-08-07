<?php

// Dane do połączenia z serwerem IMAP
$server = '{imap.example.com:993/imap/ssl}INBOX';
$username = 'your_username';
$password = 'your_password';

// Tworzymy połączenie z serwerem IMAP
$connection = imap_open($server, $username, $password);

if ($connection) {
    // Wyszukujemy UID dla wiadomości o określonym numerze sekwencyjnym
    $message_sequence_number = 5;
    $uid = imap_uid($connection, $message_sequence_number);

    if ($uid) {
        // Pobieramy nagłówek wiadomości o określonym UID
        $header = imap_fetchheader($connection, $uid);

        // Pobieramy treść wiadomości o określonym UID (np. treść HTML)
        $body = imap_fetchbody($connection, $uid, 1);

        echo "UID: $uid\n";
        echo "Nagłówek:\n$header\n";
        echo "Treść:\n$body\n";
    } else {
        echo "Nie znaleziono wiadomości o podanym numerze sekwencyjnym.\n";
    }

    // Zamykamy połączenie z serwerem IMAP
    imap_close($connection);
} else {
    echo "Nie można połączyć się z serwerem IMAP.\n";
}
?>