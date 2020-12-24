<?php

namespace Lebenlabs\Html\Form;

class Select
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
     * @var array
     */
    private $options;

    /**
     * @var strings
     */
    private $selected;

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
    private $multiple;

    /**
     * @var bool
     */
    private $readonly;

    public function __construct(string $name, ?array $options = [])
    {
        $this->id = null;
        $this->name = $name;
        $this->class = null;
        $this->selected = null;
        $this->options = $options;

        $this->title = null;
        $this->multiple = false;
        $this->disabled = false;
        $this->readonly = false;
    }

    public static function create(string $name, ?array $options = []): Select
    {
        return new self($name, $options);
    }

    public function id(string $id): Select
    {
        $this->id = $id;
        return $this;
    }

    public function class(string $class): Select
    {
        $this->class = $class;
        return $this;
    }

    public function disabled(?bool $disabled = true): Select
    {
        $this->disabled = $disabled;
        return $this;
    }

    public function title(string $title): Select
    {
        $this->title = $title;
        return $this;
    }

    public function multiple(bool $multiple): Select
    {
        $this->multiple = $multiple;
        return $this;
    }

    public function readonly(?bool $readonly = true): Select
    {
        $this->readonly = $readonly;
        return $this;
    }

    public function selected(?string $selected): Select
    {
        $this->selected = $selected;
        return $this;
    }

    private function getName(): string
    {
        return $this->name;
    }

    private function getTitle(): string
    {
        return $this->title ? "title='{$this->title}'" : '';
    }

    private function getClass(): ?string
    {
        return $this->class ? "class='{$this->class}'" : '';
    }

    private function getId(): ?string
    {
        return $this->id ? "id='{$this->id}'" : '';
    }

    private function getOptions(): string
    {
        $optionsHtml = '';
        foreach ($this->options as $id => $value) {
            $selected = $this->selected && $this->selected == $id ? 'selected' : '';
            $optionsHtml .= sprintf('<option value="%s" %s>%s</option>', $id, $selected, $value);
        }

        return $optionsHtml;
    }

    private function getDisabled(): string
    {
        return $this->disabled ? 'disabled' : '';
    }

    private function getReadonly(): string
    {
        return $this->readonly ? 'readonly' : '';
    }

    private function getMultiple(): string
    {

    }

    public function render(): string
    {
        return sprintf('<select name="%s" %s %s %s %s %s >%s</select>',
            $this->getName(),
            $this->getClass(),
            $this->getId(),
            $this->getDisabled(),
            $this->getReadonly(),
            $this->getTitle(),
            $this->getMultiple(),
            $this->getOptions()
        );
    }

    public function __toString()
    {
        return $this->render();
    }
}