<?php

use Kirby\Cms\App as Kirby;
use tobimori\DreamForm\DreamForm;

@include_once __DIR__ . '/classes/fields/DateField.php';

DreamForm::register(DateField::class);

Kirby::plugin('watnweb/datefield', [
    'snippets' => [
        'dreamform/fields/date' => __DIR__ . '/snippets/fields/date.php'
    ],
    'translations' => [
        'en' => [
            'dreamform.field.date.title'            => 'Date',
            'dreamform.field.date.default.label'    => 'Default',
            'dreamform.field.date.min.label'        => 'Minimum',
            'dreamform.field.date.min.help'         => 'The earliest date that can be selected',
            'dreamform.field.date.max.label'        => 'Maximum',
            'dreamform.field.date.max.help'         => 'The latest date that can be selected',
            'dreamform.field.date.today.label'      => 'Default Today',
            'dreamform.field.date.today.help'       => 'Set today as the default date',
            'dreamform.field.date.future.label'     => 'Future Dates Only',
            'dreamform.field.date.future.help'      => 'Only allow dates from today onwards',
        ],
    ]
]);
