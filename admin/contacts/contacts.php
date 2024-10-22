<?php
$contacts = [
    ['id' => 1, 'type' => 'Email', 'details' => 'Support@info.com'],
    ['id' => 2, 'type' => 'Phone', 'details' => '+91 123 4556 789'],
    ['id' => 3, 'type' => 'Address', 'details' => '2976 Edwards Street Rocky Mount, NC 27804']
];

file_put_contents('contacts_data.json', json_encode($contacts));
?>