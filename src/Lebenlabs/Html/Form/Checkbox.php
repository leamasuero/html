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
     * @var array
     */
    private $classes;

    /**
     * @var string
     */
    private $title;

    /**
     * @var array
     */
    private $data;

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
        $this->classes = [];
        $this->value = $value;
        $this->checked = $checked;

        $this->data = [];

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

    public function class(string $class, bool $condition = true): Checkbox
    {
        if ($condition) {
            $this->classes[] = $class;
        }
        return $this;
    }

    /**
     * @param array $classes
     * @return $this
     */
    public function classes(array $classes): Checkbox
    {
        foreach ($classes as $key => $value) {
            if (is_bool($value)) {
                if ($value) {
                    $this->classes[] = $key;
                }
            } else {
                $this->classes[] = $value;
            }
        }

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

    public function data(string $key, string $value): Checkbox
    {
        $this->data[$key] = $value;
        return $this;
    }

    private function getName(): string
    {
        return $this->name;
    }

    private function getClass(): ?string
    {
        $class = join(' ', $this->classes);
        return $this->classes ? "class='{$class}'" : '';
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

    private function getData(): string
    {
        $data = "";
        foreach ($this->data as $key => $value) {
            $data .= " data-{$key}=\"{$value}\"";
        }

        return $data;
    }

    public function render(): string
    {
        return sprintf('<input type="checkbox" name="%s" value="%s" %s %s %s %s %s %s %s />',
            $this->getName(),
            $this->getValue(),
            $this->getData(),
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
