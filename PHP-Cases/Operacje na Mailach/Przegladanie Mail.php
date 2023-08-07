public function fetchAndSaveEmails(Request $request)
    {
        // Dane do logowania do serwera poczty
        $hostname = '{imap.example.com:993/imap/ssl}INBOX';
        $username = 'your_email@example.com';
        $password = 'your_email_password';

        // Połączenie z serwerem IMAP
        $inbox = imap_open($hostname, $username, $password);

        if (!$inbox) {
            return response()->json(['error' => 'Nie można połączyć się z serwerem IMAP'], 500);
        }

        // Pobieranie informacji o skrzynce pocztowej
        $emails = imap_search($inbox, 'ALL');

        $messages = [];

        // Przeglądanie odebranych wiadomości
        foreach ($emails as $email_number) {
            // Pobieranie nagłówka wiadomości
            $header = imap_headerinfo($inbox, $email_number);

            // Pobieranie treści wiadomości
            $message = [
                'subject' => isset($header->subject) ? $header->subject : '',
                'from' => isset($header->fromaddress) ? $header->fromaddress : '',
                'date' => isset($header->date) ? $header->date : '',
                'body' => imap_fetchbody($inbox, $email_number, 1),
            ];

            // Dodawanie wiadomości do tablicy
            $messages[] = $message;
        }

        // Zamknięcie połączenia
        imap_close($inbox);

        return response()->json($messages);
    }