<?php

/**
 * @var \tobimori\DreamForm\Models\Submission|null $submission
 *
 * @var \Kirby\Cms\Block $block
 * @var \tobimori\DreamForm\Fields\DateField $field
 * @var \tobimori\DreamForm\Models\FormPage $form
 * @var array $attr
 */

use Kirby\Toolkit\A;

// Set up required base data structure for fields
$attr = A::merge($attr, [
    'date' => [
        'field' => [],
        'label' => [],
        'error' => [],
        'input' => [],
    ]
]);

// Set custom date attributes and their values
$min = $block->future()->toBool()
    ? max(date('Y-m-d'), $block->min()->or(null)?->value())
    : $block->min()->or(null)?->value();

$max = $block->max()->or(null)?->value();

$default = $block->today()->toBool()
    ? date('Y-m-d')
    : $block->default()->or(null)?->value();
$value = $form->valueFor($block->key())?->value() ?? $default;

// Render the field
snippet('dreamform/fields/text', [
    'block' => $block,
    'field' => $field,
    'form' => $form,
    'attr' => $attr,
    'type' => 'date',
    'input' => [
        'min' => $min,
        'max' => $max,
        'value' =>  $value
    ]
]);
