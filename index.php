<?php

include 'init.php';

$array['username'] = "mary2";
$array['password'] = "12345";
$array['email'] = "mary1@yahoo.com";
// User::action()->update_by_id($array, 2);
$data = User::action()->get_by_gender('male');
// $user = new User();
// $user = $user->action()->get_all();

echo "<pre>";
print_r($data);