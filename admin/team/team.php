<?php
$team = [
    ['id' => 1, 'name' => 'Capt. Helena Vance', 'title' => 'Founder & CEO'],
    ['id' => 2, 'name' => 'Dr. Hiroshi Nakamura', 'title' => 'CTO'],
    ['id' => 3, 'name' => 'Leo Rodriguez', 'title' => 'Chief of Design'],
    ['id' => 4, 'name' => "Ava O'Connell", 'title' => 'VP of Operations'],
    ['id' => 5, 'name' => 'Dr. Imani Okoro', 'title' => 'Head of AeroAcademy™'],
];

file_put_contents('team_data.json', json_encode($team));
?>
