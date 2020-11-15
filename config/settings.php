<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Settings Path
    |--------------------------------------------------------------------------
    |
    | This is where your settings are stored on disk within your application's
    | `storage` directory. Note: any subdirectories must already exist.
    |
    | Defaults to 'app/settings.json' if not specified here.
    |
    */

    'path' => 'app/settings.json',

    /*
    |--------------------------------------------------------------------------
    | Navigation Title
    |--------------------------------------------------------------------------
    |
    | This is the text Nova's navigation sidebar will display for this tool.
    |
    | Defaults to 'Settings' if not specified here.
    |
    */

    'navigation' => 'Paramètres',

    /*
    |--------------------------------------------------------------------------
    | Settings
    |--------------------------------------------------------------------------
    |
    | This is the good stuff :). Each 'panel' will be shown grouped together
    | under its 'title'. Each 'setting' in a panel will display a row in Nova,
    | and you can specify the key used to store its value on disk, its display
    | name in Nova, a description, its type (only boolean or text for now),
    | and a link for more information.
    |
    | Each setting must include at least a key, name, and type.
    |
    */

    'panels' => [

        [

            'name' => 'Paramètres',

            'settings' => [

                [
                    'key' => 'title',
                    'name' => 'Titre Méta du site',
                    'type' => 'text',
                    'description' => 'Titre à afficher sur le site',
                ],

                [
                    'key' => 'description',
                    'name' => 'Description Méta du site',
                    'type' => 'textarea',
                ],
                [
                    'key' => 'ga_code',
                    'name' => 'Code Google Analytics',
                    'type' => 'text',
                ],

                [
                      'key' => 'live_title',
                      'name' => 'Titre du live',
                      'type' => 'text',
                      'description' => 'Titre à afficher sur le live streaming',
                ],
                [
                      'key' => 'live_user',
                      'name' => 'Login du live',
                      'type' => 'text',
                      'description' => 'Nom d\'utilisateur pour acceder au live',
                ],
                [
                      'key' => 'live_password',
                      'name' => 'Mot de passe du live',
                      'type' => 'text',
                      'description' => 'Mot de passe pour acceder au live',
                ],
                [
                      'key' => 'live_url',
                      'name' => 'Clé de streaming',
                      'type' => 'text',
                ],
            ],

        ],

    ],

];
