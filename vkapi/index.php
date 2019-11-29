<?php

use App\GoogleCloudStorage;

require __DIR__ . '/vendor/autoload.php';
$storage = new GoogleCloudStorage();
//$storage->uploadPhoto('test.jpg');
$exist = $storage->existPhoto('test.jpg');
if ($exist) {
    $url = $storage->getPublicPhoto('test.jpg');
}
