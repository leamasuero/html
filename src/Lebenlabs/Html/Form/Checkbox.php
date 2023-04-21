<?php

namespace Lebenlabs\Html\Form;

class Checkbox
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $value;

    /**
     * @var bool
     */
    protected $checked;

    /**
     * @var array
     */
    protected $classes;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $form;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var bool
     */
    protected $disabled;

    /**
     * @var bool
     */
    protected $readonly;

    public function __construct(string $name, string $value, ?bool $checked = false)
    {
        $this->id = null;
        $this->name = $name;
        $this->classes = [];
        $this->value = $value;
        $this->checked = $checked;

        $this->data = [];

        $this->title = null;
        $this->form = null;
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

    public function form(string $form): Checkbox
    {
        $this->form = $form;
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

    protected function getName(): string
    {
        return $this->name;
    }

    protected function getClass(): ?string
    {
        $class = join(' ', $this->classes);
        return $this->classes ? "class='{$class}'" : '';
    }

    protected function getTitle(): string
    {
        return $this->title ? "title='{$this->title}'" : '';
    }

    protected function getForm(): string
    {
        return $this->form ? "form='{$this->form}'" : '';
    }

    protected function getId(): string
    {
        return $this->id ? "id='{$this->id}'" : '';
    }

    protected function getValue(): string
    {
        return $this->value;
    }

    protected function getChecked(): string
    {
        return $this->checked ? "checked" : '';
    }

    protected function getDisabled(): string
    {
        return $this->disabled ? 'disabled' : '';
    }

    protected function getReadonly(): string
    {
        return $this->readonly ? 'readonly' : '';
    }

    protected function getData(): string
    {
        $data = "";
        foreach ($this->data as $key => $value) {
            $data .= " data-{$key}=\"{$value}\"";
        }

        return $data;
    }

    public function render(): string
    {
        return sprintf('<input type="checkbox" name="%s" value="%s" %s %s %s %s %s %s %s %s />',
            $this->getName(),
            $this->getValue(),
            $this->getData(),
            $this->getClass(),
            $this->getId(),
            $this->getChecked(),
            $this->getDisabled(),
            $this->getReadonly(),
            $this->getTitle(),
            $this->getForm()
        );
    }

    public function __toString()
    {
        return $this->render();
    }

}
