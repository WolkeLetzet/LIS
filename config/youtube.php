<?php

return [

    /**
     * Client ID.
     */
    'client_id' => env('GOOGLE_CLIENT_ID', null),

    /**
     * Client Secret.
     */
    'client_secret' => env('GOOGLE_CLIENT_SECRET', null),

    /**
     * Scopes.
     */
    'scopes' => [
        'https://www.googleapis.com/auth/youtube',
        'https://www.googleapis.com/auth/youtube.upload',
        'https://www.googleapis.com/auth/youtube.readonly'
    ],

    /**
     * Route URI's
     */
    'routes' => [

        /** 
         * Determine if the Routes should be disabled.
         * Note: We recommend this to be set to "false" immediately after authentication.
         */
        'enabled' => true,

         /**
         * The prefix for the below URI's
         */
        'prefix' => '$2y$10$21gLSUok79GCLed7ZqF3Zu31TEKFFuoVZYMA/GV26PFcOKPxyyBJy',

        /**
         * Redirect URI
         */
        'redirect_uri' => '$2y$10$z.fcdUDAVdLCzLRyXALhWejVCn7HI/rrRPFmQ5RTsmXpIBfpJkbRu',

        /**
         * The autentication URI
         */
        'authentication_uri' => '$2y$10$iCMJt3DpD7ycAu6DyTZ6nOx87IzAQLE6DRq2M04GoHWajOj1yYvpO',

    ]

];
