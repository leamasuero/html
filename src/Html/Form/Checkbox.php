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

    /**
     * @var string
     */
    private $title;

    /**
     * @var bool
     */
    private $disabled;

    /**
     * @var bool
     */
    private $readonly;

    public function __construct(string $name, string $value, ?bool $checked = false)
    {
        $this->id = null;
        $this->name = $name;
        $this->class = null;
        $this->value = $value;
        $this->checked = $checked;

        $this->title = null;
        $this->disabled = false;
        $this->readonly = false;
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

    public function title(string $title): Checkbox
    {
        $this->title = $title;
        return $this;
    }

    public function checked(?bool $checked = true): Checkbox
    {
        $this->checked = $checked;
        return $this;
    }

    public function readonly(?bool $readonly = true): Checkbox
    {
        $this->readonly = $readonly;
        return $this;
    }

    public function disabled(?bool $disabled = true): Checkbox
    {
        $this->disabled = $disabled;
        return $this;
    }


    private function getName(): string
    {
        return $this->name;
    }

    private function getClass(): string
    {
        return $this->class ? "class='{$this->class}'" : '';
    }

    private function getTitle(): string
    {
        return $this->title ? "title='{$this->title}'" : '';
    }

    private function getId(): string
    {
        return $this->id ? "id='{$this->id}'" : '';
    }

    private function getValue(): string
    {
        return $this->value;
    }

    private function getChecked(): string
    {
        return $this->checked ? "checked" : '';
    }

    private function getDisabled(): string
    {
        return $this->disabled ? 'disabled' : '';
    }

    private function getReadonly(): string
    {
        return $this->readonly ? 'readonly' : '';
    }

    public function render(): string
    {
        return sprintf('<input type="checkbox" name="%s" value="%s" %s %s %s %s %s %s />',
            $this->getName(),
            $this->getValue(),
            $this->getClass(),
            $this->getId(),
            $this->getChecked(),
            $this->getDisabled(),
            $this->getReadonly(),
            $this->getTitle()
        );
    }

    public function __toString()
    {
        return $this->render();
    }

}