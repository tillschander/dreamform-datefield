# DreamForm Date Field Plugin

This plugin extends DreamForm for Kirby CMS by adding a `Date` field.

## Features

-   **Native Datepicker**: Style and customize it to your needs.
-   **Limit Dates**: Allows configuration of minimum and maximum date values.
-   **Default Value**: Can set the current date or a fixed date as the default value.
-   **Future Dates Only** Optionally prevent selection of past dates.
-   **Validation**: Includes built-in validation to ensure correct date input.

## Installation

1. Download the plugin files.
2. Place the plugin directory into your Kirby `site/plugins` folder.

## Styling

If you are using Tailwind or the demo styles I reccomend adding the following classes to your `dreamform/form` snippet:

```php
'date' => [
    "error" => ['class' => 'hidden group-data-[has-error]:group-has-[:invalid]:block text-red-500 text-sm'],
    "input" => ['class' => 'peer group-data-[has-error]:group-has-[:invalid]:mb-2 shadow-sm group-data-[has-error]:group-has-[:invalid]:border-red-500 w-full border border-gray-200 rounded p-2']
]
```

## Panel Preview

There currently is no panel preview for this field yet. For now it uses the text-field preview.
This way you can at least set basic attributes like the key or label inline. More settings can be found in the `Edit` overlay.
