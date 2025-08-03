<?php
return [

    'audit-log'           => [
        'category'              => 'Agreements',
        'msg-index'             => 'Accessed list of agreements.',
        'msg-show'              => 'Accessed details of agreement: :name.',
        'msg-store'             => 'Created new agreement: :name.',
        'msg-edit'              => 'Initiated edit of user: :username.',
        'msg-replay-edit'       => 'Initiated replay edit of user: :username.',
        'msg-update'            => 'Submitted edit of user: :username.',
        'msg-destroy'           => 'Deleted user: :username.',
        'msg-enable'            => 'Enabled user: :username.',
        'msg-disabled'          => 'Disabled user: :username.',
        'msg-enabled-selected'  => 'Enabled multiple user.',
        'msg-disabled-selected' => 'Disabled multiple user.',
    ],

    'status'              => [
        'created'                   => 'Agreement successfully created',
        'updated'                   => 'Agreement successfully updated',
        'deleted'                   => 'Agreement successfully deleted',
        'no-agreement-selected'     => 'No agreement selected.',
        'agreement-doesnot-exist'   => 'Requested agreement doesn\'t exist',
        'show-agreement'            => 'Agreement shown successfully',
        'hide-agreement'            => 'Agreement hidden successfully',
    ],

    'page'              => [
        'index'              => [
            'title'             => 'Admin | Agreements',
            'description'       => 'List of agreements',
            'table-title'       => 'Agreement list',
        ],
        'create'            => [
            'title'            => 'Admin | Agreement | Create',
            'description'      => 'Creating a new agreement',
            'section-title'    => 'New agreement'
        ],
        'edit'              => [
            'title'            => 'Admin | Agreement | Edit',
            'description'      => 'Editing agreement: :name',
            'section-title'    => 'Edit agreement'
        ],
    ],

    'columns'           => [
        'id'            =>  'ID',
        'name'          =>  'Name',
        'doc_title'     =>  'Document Title',
        'is_enable'     =>  'Enable/Disable',
        'position'      =>  'Position After',
        'agreement'     =>  'Agreement Type',
        'agreements'    =>  'Total Agreement',
        'project'       =>  'Select Project',
        'search_replace'=>  'Run Search & Replace',
        'active_si'=>  'Show folder to Solar Installer',
        'project_title' =>  'Project',
        'position_index'=>  'Position',
        'created'       =>  'Created',
        'updated'       =>  'Updated',
        'actions'       =>  'Actions',
    ],

    'button'               => [
        'create' =>  'Create new agreement',
    ],



];

