<?php

if (!function_exists('checkbox')) {

    function checkbox(string $name, string $value, ?bool $checked = false): \Lebenlabs\Html\Form\Checkbox
    {
        return new \Lebenlabs\Html\Form\Checkbox($name, $value, $checked);
    }
}


if (!function_exists('select')) {

    function select(string $name, ?array $options = []): \Lebenlabs\Html\Form\Select
    {
        return new \Lebenlabs\Html\Form\Select($name, $options);
    }
}


if (!function_exists('datalist')) {

    function datalist(string $name, ?array $options = []): \Lebenlabs\Html\Form\Datalist
    {
        return new \Lebenlabs\Html\Form\Datalist($name, $options);
    }
}