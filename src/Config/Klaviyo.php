<?php
/**
 * 
 * This file is auto generate by Nicelizhi\Apps\Commands\Create
 * @author Steve
 * @date 2025-02-27 13:49:53
 * @link https://github.com/xxxl4
 * 
 */
return [
    /**
     * 
     * The name of the package
     */
    'name' => 'Klaviyo',
    /**
     * 
     * The version of the package
     */
    'version' => '1.0.0',
    /**
     * 
     * The version number of the package
     */
    'versionNum' => '100',

    /**
     *
     * Enabled
     */
     'enable' => env('Klaviyo.ENABLED', true),

     /*
      * Composer Package Name
     */
    'composer' => 'nexa-merchant/klaviyo',

    /**
     * 
     * The api key of the package
     */
    'api_key' => env('KLAVIYO_API_KEY', ''),

    /**
     * 
     * The description of the package
     */
    'description' => '',

    /**
     * 
     * The author of the package
     */
    'author' => 'Steve',

    /**
     * 
     * The email of the author
     */
    'email' => 'email@example.com',

    /**
     * 
     * The homepage of the package
     */
    'homepage' => 'https://github.com/xxl4',

    /**
     * 
     * The keywords of the package
     */
    'keywords' => [],

    /**
     * 
     * The license of the package
     */
    'license' => 'MIT',

    /**
     * 
     * The type of the package
     */
    'type' => 'library',

    /**
     * 
     * The support of the package
     */
    'support' => [
        'email' => 'email@example.com',
        'issues' => 'https://github.com/xxl4'
    ],
];