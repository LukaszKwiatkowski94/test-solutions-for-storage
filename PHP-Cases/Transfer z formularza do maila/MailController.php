<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        // Pobieramy wszystkie pliki (klucze dynamicznie nazwane jako file_0, file_1, itd.)
        $files = $request->allFiles();
        if (empty($files)) {
            return response()->json(['error' => 'No files uploaded.'], 400);
        }

        // Inicjalizacja PHPMailer
        $mail = new PHPMailer(true);
        try {
            // Konfiguracja SMTP (przykład, dostosuj do swojego serwera)
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com'; // Zastąp swoim hostem SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'your_email@example.com';
            $mail->Password = 'your_password';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Ustawienia wiadomości e-mail
            $mail->setFrom('your_email@example.com', 'Nadawca');
            $mail->addAddress('recipient@example.com'); // Odbiorca

            $mail->isHTML(true);
            $mail->Subject = 'Pliki przesłane z formularza';
            $mail->Body    = 'Poniżej załączone pliki.';

            // Dodanie załączników
            foreach ($files as $file) {
                if ($file->isValid()) {
                    $mail->addAttachment($file->getPathname(), $file->getClientOriginalName());
                }
            }

            // Wysyłka wiadomości
            $mail->send();

            return response()->json(['message' => 'Mail sent successfully!']);
        } catch (Exception $e) {
            return response()->json(['error' => 'Mail not sent. Error: ' . $mail->ErrorInfo], 500);
        }
    }
}
