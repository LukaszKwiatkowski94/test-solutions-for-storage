<?php
// Ścieżka do folderu głównego
$mainFolder = __DIR__ . '/files/';

// Ścieżka do folderu, w którym chcemy zapisać plik
$targetFolder = $mainFolder . 'target_folder/';

// Upewnij się, że folder docelowy istnieje, jeśli nie, utwórz go
if (!file_exists($targetFolder)) {
    mkdir($targetFolder, 0777, true);
}

if ($_FILES['plik']['error'] === UPLOAD_ERR_OK) {
    // Pobierz nazwę pliku
    $fileName = $_FILES['plik']['name'];
    
    // Ścieżka docelowa, gdzie plik zostanie zapisany
    $targetPath = $targetFolder . $fileName;

    // Przesuń załączony plik do docelowej lokalizacji
    if (move_uploaded_file($_FILES['plik']['tmp_name'], $targetPath)) {
        echo "Plik został zapisany pomyślnie.";
    } else {
        echo "Wystąpił problem z zapisem pliku.";
    }
} else {
    echo "Wystąpił błąd podczas przesyłania pliku.";
}
?>
