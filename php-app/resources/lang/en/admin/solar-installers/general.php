<?php
return [

    'status'  => [
        'updated'           => 'Solar installer successfully updated',
        'deleted'           => 'Solar installer successfully deleted',
        'si-doesnot-exist'  => 'Solar installer doesn\'t exist',
    ],

    'error'   => [
        'cant-be-edited'    => 'Solar installer cannot be edited',
        'cant-be-deleted'   => 'Solar installer cannot be deleted',
    ],

    'page'    => [
        'create'  => [
            'title'         => 'Admin | Solar Installer | Create',
            'description'   => 'Creating a new solar installer',
            'section-title' => 'New solar installer'
        ],
        'index'   => [
            'title'         => 'Admin | Solar Installers',
            'description'   => 'List of solar installers',
            'table-title'   => 'Solar installer list',
        ],
        'project' => [
            'title'         => 'Admin | Solar Installer | Projects',
            'description'   => 'List of all Projects of :name'
        ],
        'edit'    => [
            'title'         => 'Admin | Solar Installer | Edit',
            'description'   => 'Editing solar installer: :name',
            'section-title' => 'Edit solar installer'
        ],
    ],

    'columns' => [
        'id'                =>  'ID',
        'name'              =>  'Company Name',
        'no_of_projects'    =>  'Number of Projects',
        'phone'             =>  'Phone',
        'website'           =>  'Webiste',
        'business_location' =>  'Business Location',
        'created'           =>  'Created',
        'updated'           =>  'Updated',
        'actions'           =>  'Actions',
    ],



];

