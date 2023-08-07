<?php

// Dane do połączenia z serwerem IMAP
$server = '{imap.example.com:993/imap/ssl}INBOX';
$username = 'your_username';
$password = 'your_password';

// Zapamiętany UID, od którego chcemy wyszukać wiadomości
$remembered_uid = 1234;

// Tworzymy połączenie z serwerem IMAP
$connection = imap_open($server, $username, $password);

if ($connection) {
    // Tworzymy kryteria wyszukiwania dla UID większych niż zapamiętany UID
    $search_criteria = 'UID ' . ($remembered_uid + 1) . ':*';

    // Wyszukujemy wiadomości spełniające kryteria
    $result = imap_search($connection, $search_criteria);

    if ($result) {
        echo "Znaleziono wiadomości:\n";
        foreach ($result as $uid) {
            // Pobieramy nagłówek wiadomości o danym UID
            $header = imap_fetchheader($connection, $uid);
            echo "UID: $uid\nNagłówek:\n$header\n";
        }
    } else {
        echo "Nie znaleziono wiadomości o wyższym UID od zapamiętanego.\n";
    }

    // Zamykamy połączenie z serwerem IMAP
    imap_close($connection);
} else {
    echo "Nie można połączyć się z serwerem IMAP.\n";
}
?>
