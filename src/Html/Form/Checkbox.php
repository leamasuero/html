<?php

namespace Lebenlabs\Html\Form;

class Checkbox
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $value;

    /**
     * @var bool
     */
    private $checked;

    /**
     * @var string
     */
    private $class;

    public function __construct(string $name, string $value, ?bool $checked = false)
    {
        $this->id = null;
        $this->name = $name;
        $this->class = null;
        $this->value = $value;
        $this->checked = $checked;
    }

    public static function create(string $name, string $value, ?bool $checked = false): Checkbox
    {
        return new self($name, $value, $checked);
    }


    public function id(string $id): Checkbox
    {
        $this->id = $id;
        return $this;
    }

    public function class(string $class): Checkbox
    {
        $this->class = $class;
        return $this;
    }

    public function checked(bool $checked = true): Checkbox
    {
        $this->checked = $checked;
        return $this;
    }

    private function getName(): string
    {
        return $this->name;
    }

    private function getClass(): ?string
    {
        return $this->class ? "class='{$this->class}'" : '';
    }

    private function getId(): ?string
    {
        return $this->id ? "id='{$this->id}'" : '';
    }

    private function getValue(): string
    {
        return $this->value;
    }

    private function getChecked(): ?string
    {
        return $this->checked ? "checked" : '';
    }

    public function render(): string
    {
        return sprintf('<input type="checkbox" name="%s" value="%s" %s %s %s/>', $this->getName(), $this->getValue(), $this->getClass(), $this->getId(), $this->getChecked());

    }

}