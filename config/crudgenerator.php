<?php

return [

    'custom_template' => true,



    /*
    |--------------------------------------------------------------------------
    | Crud Generator Controller middleware
    |--------------------------------------------------------------------------
    |
    | Set the middleware to be used by the generator
    |
    */
    //'middleware' => false,
    'middleware' => 'auth',
    
    /*
    |--------------------------------------------------------------------------
    | Crud Generator Layout
    |--------------------------------------------------------------------------
    |
    | Set the layout to be extended
    |
    */
    'extend_layout' => 'adminlte::layouts.app',
    
    /*
    |--------------------------------------------------------------------------
    | Crud Generator Content Name
    |--------------------------------------------------------------------------
    |
    | Set the content section name
    |
    */
    'section_name' => 'main-content',
    
    /*
    |--------------------------------------------------------------------------
    | Crud Generator Template Stubs Storage Path
    |--------------------------------------------------------------------------
    |
    | Here you can specify your custom template path for the generator.
    |
     */

    'path' => base_path('resources/crud-generator/'),

];
