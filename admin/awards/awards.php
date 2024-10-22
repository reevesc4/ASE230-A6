<?php
$awards = [
    ['id' => 1, 'award' => 'Aerospace Company of the Decade by Aviation Weekly', 'year' => '2023'],
    ['id' => 2, 'award' => 'Launched three Galactic Cruiser™ missions to Mars', 'year' => '2022'],
    ['id' => 3, 'award' => 'SkySailor Drones™ adopted for environmental monitoring', 'year' => '2021'],
    ['id' => 4, 'award' => 'Partnership with NASA and SpaceX for propulsion technologies', 'year' => '2021'],
];

file_put_contents('awards_data.json', json_encode($awards));
?>
