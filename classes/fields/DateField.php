<?php

use tobimori\DreamForm\Fields\Field;

class DateField extends Field
{
    public static function blueprint(): array
    {
        return [
            'title' => t('dreamform.field.date.title'),
            'preview' => 'text-field',
            'label' => '{{ label }}',
            'wysiwyg' => true,
            'icon' => 'calendar',
            'tabs' => [
                'field' => [
                    'label' => t('dreamform.field'),
                    'fields' => [
                        'key' => 'dreamform/fields/key',
                        'label' => 'dreamform/fields/label',
                        'default' => [
                            'label' => t('dreamform.field.date.default.label'),
                            'type' => 'date',
                            'required' => false,
                            'width' => '1/2'
                        ],
                        'min' => [
                            'label' => t('dreamform.field.date.min.label'),
                            'type' => 'date',
                            'required' => false,
                            'help' => t('dreamform.field.date.min.help'),
                            'width' => '1/2'
                        ],
                        'max' => [
                            'label' => t('dreamform.field.date.max.label'),
                            'type' => 'date',
                            'required' => false,
                            'help' => t('dreamform.field.date.max.help'),
                            'width' => '1/2'
                        ],
                        'today' => [
                            'label' => t('dreamform.field.date.today.label'),
                            'type' => 'toggle',
                            'required' => false,
                            'help' => t('dreamform.field.date.today.help'),
                            'width' => '1/2'
                        ],
                        'future' => [
                            'label' => t('dreamform.field.date.future.label'),
                            'type' => 'toggle',
                            'required' => false,
                            'help' => t('dreamform.field.date.future.help'),
                            'width' => '1/2'
                        ]
                    ]
                ],
                'validation' => [
                    'label' => t('dreamform.validation'),
                    'fields' => [
                        'required' => 'dreamform/fields/required',
                        'errorMessage' => 'dreamform/fields/error-message',
                    ]
                ]
            ]
        ];
    }

    public static function type(): string
    {
        return 'date';
    }

    public function validate(): true|string
    {
        // If the field is required, check if it's empty
        if ($this->block()->required()->toBool() && $this->value()->isEmpty()) {
            return $this->errorMessage();
        }

        // If there is a value, check the syntax
        if (!$this->value()->isEmpty() && !preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $this->value())) {
            return $this->errorMessage();
        }

        // If only future dates are allowed, check if the value conforms to that
        if ($this->block()->future()->toBool() && $this->value() < date('Y-m-d')) {
            return $this->errorMessage();
        }

        // If there is a min value, check if the value is above that
        $min = $this->block()->min()->or(null)?->value();
        if ($min && $this->value() < $min) {
            return $this->errorMessage();
        }

        // If there is a max value, check if the value is below that
        $max = $this->block()->max()->or(null)?->value();
        if ($max && $this->value() > $max) {
            return $this->errorMessage();
        }

        return true;
    }

    public function submissionBlueprint(): array|null
    {
        return [
            'label' => $this->block()->label()->value() ?? t('dreamform.field.date.title'),
            'icon' => 'calendar',
            'type' => 'date'
        ];
    }
}
