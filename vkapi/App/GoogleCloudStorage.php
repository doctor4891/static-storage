<?php
namespace App;

use Google\Cloud\Storage\StorageClient;

class GoogleCloudStorage
{

    public $cloudStorage;

    public function __construct()
    {
        $credentials = json_decode(file_get_contents(__DIR__ . '/credentials.json'),true);
        $this->cloudStorage = new StorageClient(['keyFile' => $credentials]);

    }

    public function uploadPhoto($path)
    {
        $bucket = $this->cloudStorage->bucket(Config::$bucketName);
        $response = $bucket->upload(fopen($path, 'r'));
    }

    public function deletePhoto($data)
    {
        // TODO: Implement deletePhoto() method.
    }

    public function getPublicPhoto($basename)
    {
       return 'https://storage.googleapis.com/' . Config::$bucketName . '/' . $basename;
    }

    public function existPhoto($data){
        $bucket = $this->cloudStorage->bucket(Config::$bucketName);
        $object = $bucket->object($data);
        $exist = $object->exists();
        if($exist)
        {
            return true;
        }else return false;
    }
}