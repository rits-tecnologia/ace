<?php

return [
    'actions' => [
        'no_actions' => 'No actions available',

        /**
         * Model to be used when creating a new crud.
         */
        'resource' => [
            'label' => 'Resources',
            'index' => 'Listing resources',
            'new' => 'Create resource',
            'edit' => 'Edit resource',
            'save' => 'Save changes',

            'success' => [
                'created' => 'New resource created.',
                'updated' => 'Resource updated.',
            ],

            'failed' => [
                'created' => 'Failed to create resource.',
                'updated' => 'Failed to update resource.',
            ],
        ],
    ],
];
