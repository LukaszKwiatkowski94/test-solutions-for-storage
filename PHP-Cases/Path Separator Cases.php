<?

// Case 1

$windowsPath = '.\\..\\folder\\file.txt';  // Przykładowa ścieżka na systemie Windows
$unixPath = str_replace('\\', '/', $windowsPath); // Zamiana odwrotne ukośniki na ukośniki

echo $unixPath; // Wyświetlenie ścieżki z ukośnikami


// Case 2

$path = '.\\..\\folder\\file.txt';  // Przykładowa ścieżka na systemie Windows lub Unix
$fixedPath = str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $path);

echo $fixedPath; // Wyświetlenie ścieżki z ukośnikami odpowiednimi dla systemu


// Case 3

$path = '.\\..\\folder\\file.txt';  // Przykładowa ścieżka na systemie Windows lub Unix
$fixedPath = strtr($path, '\\/', DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR);

echo $fixedPath; // Wyświetlenie ścieżki z ukośnikami odpowiednimi dla systemu
