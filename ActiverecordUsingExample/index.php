<?php

include 'vendor/autoload.php';

$pdo = new PDO('sqlite:data/test.db');
ActiveRecord::setDb($pdo);

/*ActiveRecord::execute(
    'CREATE TABLE products (
        id INTEGER PRIMARY KEY,
        name TEXT NOT NULL,
        price DECIMAL DEFAULT 0
    );'
);

$faker = \Faker\Factory::create('ru_RU');
for($i = 0; $i < 10; $i++) {
    $query = "INSERT INTO products SET name = '{$faker->word}', price = {$faker->numberBetween(100, 60000)};";
    echo $i . ' ' . $query . PHP_EOL;

    $pdo->exec($query);
}
exit;*/

//$product = new \App\Models\Product();
/*
$faker = \Faker\Factory::create('ru_RU');
for($i = 0; $i < 10; $i++) {
    echo $i . PHP_EOL;
    $product->name = $faker->word;
    $product->price = $faker->numberBetween(100, 60000);
    $product->insert();
}*/

# Создаём #
//$product = new \App\Models\Product();

/*$product->name = 'Самокат';
$product->price = 12000;
$product->insert();*/

/*foreach ($product->findAll() as $item) {
    echo $item->name . '(' . $item->price . '):' . PHP_EOL;

    foreach ($item->rests as $rest) {
        echo "\t" . $rest->amount . ' шт.' . PHP_EOL;
    }
    echo '-------------------------------------' . PHP_EOL;
}*/

$rest = new \App\Models\ProductRest();

foreach ($rest->findAll() as $item) {
    /** @var $item \App\Models\ProductRest */
    echo $item->id . ': ' . $item->amount . ' шт (' . $item->product->name . ', ' . $item->product->price . ' руб.) ' . PHP_EOL;
    echo '-------------------------------------' . PHP_EOL;
}