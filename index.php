<?php

include 'init.php';

// $array['username'] = "jimoh";
// $array['password'] = "12345";
// $array['email'] = "jimoh@yahoo.com";
// $array['gender'] = "Male";
// $array['date'] = "";
// User::action()->create($array);
// $data = User::action()->get_by_gender('male');
$user = new User();
$data = $user->action()->get_all();

echo "<pre>";
print_r($data);