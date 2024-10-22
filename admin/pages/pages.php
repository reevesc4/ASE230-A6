<?php
$pages = [
    ['id' => 1, 'title' => 'About Us', 'content' => 'This is the About Us page content.'],
    ['id' => 2, 'title' => 'Our Services', 'content' => 'This is the Our Services page content.']
];

file_put_contents('pages_data.json', json_encode($pages));
?>
