
-- Struktura tabeli list_economy odtworzona z kodu aplikacji

CREATE TABLE `list_economy` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `date` DATE NOT NULL,
  `name_bill` VARCHAR(255),
  `name_ec` VARCHAR(255),
  `place` VARCHAR(255),
  `fromEC` VARCHAR(255),
  `typ` VARCHAR(100),
  `cost` DECIMAL(10,2)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Indeksy dla lepszej wydajności (opcjonalne)
CREATE INDEX idx_date ON list_economy(date);
CREATE INDEX idx_name_ec ON list_economy(name_ec);

-- 1. SELECT - pokazuje jak będą pogrupowane transakcje
SELECT 
    date,
    place,
    COUNT(*) as liczba_wpisow,
    GROUP_CONCAT(id ORDER BY id) as id_wpisow,
    (184 + ROW_NUMBER() OVER (ORDER BY date ASC, place ASC)) as nowy_numer_transakcji
FROM list_economy 
WHERE place IS NOT NULL AND place != ''
GROUP BY date, place 
ORDER BY date ASC, place ASC;

-- 2. UPDATE - przypisuje numery transakcji na podstawie daty i miejsca
UPDATE list_economy le1
JOIN (
    SELECT 
        date,
        place,
        (184 + ROW_NUMBER() OVER (ORDER BY date ASC, place ASC)) as transaction_num
    FROM (
        SELECT DISTINCT date, place 
        FROM list_economy 
        WHERE place IS NOT NULL AND place != ''
    ) as unique_transactions
) as tn ON le1.date = tn.date AND le1.place = tn.place
SET le1.transaction_number = tn.transaction_num
WHERE le1.place IS NOT NULL AND le1.place != '';