<?php

$reguly = [
    '*.0' => 'required|integer',
    '*.1' => 'required|integer',
    '*' => 'array|size:2',
];
/*
W powyższych regułach wykorzystujemy symbol * do odwoływania się do każdego elementu tablicy. Reguła '*.0' oznacza, że oczekujemy, że każdy element tablicy będzie miał na pozycji 0 liczbę całkowitą, podobnie jak reguła '*.1' wymaga, aby każdy element tablicy miał na pozycji 1 liczbę całkowitą. Reguła '*' wymaga, aby każdy element tablicy był tablicą dwuelementową.

Możemy teraz utworzyć instancję klasy Validator i wykorzystać ją do zwalidowania tablicy.
*/

$tablica = [[1,2],[3,4]];

$validator = Validator::make(['tablica' => $tablica], ['tablica' => 'required|array', 'tablica.*.*' => $reguly]);

if ($validator->passes()) {
    // walidacja zakończyła się sukcesem
} else {
    // walidacja nie powiodła się, obsłuż błędy
}

/*
W powyższym przykładzie przekazujemy tablicę do walidacji jako wartość klucza 'tablica' w tablicy asocjacyjnej przekazywanej jako pierwszy argument do metody Validator::make(). W drugim argumencie przekazujemy regułę 'tablica.*.*' jako regułę dla każdego elementu tablicy. Za pomocą tej reguły walidacji, Laravel zwaliduje każdy element tablicy zgodnie z określonymi regułami, a wynik walidacji zostanie zwrócony jako wynik wywołania metody passes().
*/