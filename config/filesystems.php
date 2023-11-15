<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'univers_path' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/univers'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'rayon_path' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/rayons'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'sous_categorie_path' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/sous_categorie'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'produit_path' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/produits'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'user_path' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/ptofil-imgs'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'caracteristique_path' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/caracteristiques'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        /**'rayon_path2' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images3/rayons'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],*/

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
