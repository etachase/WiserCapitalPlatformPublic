<?php
return [
    'tabs' => [
        'edit' => 'Edit File',
        'add'  => 'Add Files'
    ],
    'audit-log'           => [
        'msg-store'             => 'Added new agreement document :documentName by user :username.',
        'msg-update'            => 'Updated document :documentName by user :username.',
        'msg-destroy'           => 'Deleted document :documentName by user :username.',
    ],

    'status'              => [
        'created'                   => 'Document added successfully',
        'updated'                   => 'Document updated successfully',
        'deleted'                   => 'Document deleted successfully',
        'global-enabled'            => 'All documents of agreement :name enabled.',
        'global-disabled'           => 'All documents of agreement :name disabled.',
        'enabled'                   => 'Document enabled.',
        'disabled'                  => 'Document disabled.',
        'document-doesnot-exist'    => 'Requested agreement document doesn\'t exist',
        'select-file'               => 'Please select atleast one file',
        'error-file-extension'      => 'File extension :name should be docx please repload the file',
        'success-file'              => 'File uploaded successfully: :name',
        'no-success-file'           => 'No file successfully uploaded',
        'no-error-file'             => 'No file unsuccessfully uploaded',
        'no-file-exist'             => 'The file you are trying to download is no more exist',
        'select-file'               => 'File not available corresponding to :name',
    ],

    'page'              => [
        'create'            => [
            'title'            => 'Admin | Agreement File | Create',
            'description'      => 'Add a new document',
            'section-title'    => 'New agreement file'
        ],
        'edit'              => [
            'title'            => 'Admin | Agreement File | Edit',
            'description'      => 'Editing agreement document: :name',
            'section-title'    => 'Edit agreement file'
        ],
    ],

    'columns'           => [
        'id'            =>  'ID',
        'name'          =>  'Name',
        'doc_title'     =>  'Document Title',
        'actions'       =>  'Actions',
    ],

    'button'               => [
        'create' =>  'Add Documents',
        'download' =>  'Download File',
    ],
];

