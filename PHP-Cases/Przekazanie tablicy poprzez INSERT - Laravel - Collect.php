<?php

use App\Models\User;
use Illuminate\Support\Collection;

// ...

$dane = [
    ['name' => 'Jan Kowalski', 'email' => 'jan@example.com'],
    ['name' => 'Anna Nowak', 'email' => 'anna@example.com'],
];

$collection = collect($dane);

User::insert($collection->toArray());
