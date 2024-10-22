<?php
$products = [
    ['id' => 1, 'product' => 'Galactic Cruiser™', 'desc' => 'An innovative spacecraft designed for deep space exploration.'],
    ['id' => 2, 'product' => 'SkySailor Drones™', 'desc' => 'Environmentally-friendly drones powered by solar and wind energy.'],
    ['id' => 3, 'product' => 'Nebula Stations™', 'desc' => 'Modular space habitats intended for research, tourism and colonization.'],
    ['id' => 4, 'product' => 'AeroAcademy™', 'desc' => 'An immersive training institution.']
];

file_put_contents('products_data.json', json_encode($products));
?>
