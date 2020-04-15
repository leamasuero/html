<?php

namespace Html\Form;

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

    public function __construct(string $name, ?array $options = [])
    {
        $this->id = null;
        $this->name = $name;
        $this->class = null;
        $this->selected = null;
        $this->options = $options;
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

    public function selected(string $selected): Select
    {
        $this->selected = $selected;
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

    private function getOptions(): string
    {
        $optionsHtml = '';
        foreach ($this->options as $id => $value) {
            $selected = $this->selected && $this->selected == $id ? 'selected' : '';
            $optionsHtml .= sprintf('<option value="%s" %s>%s</option>', $id, $selected, $value);
        }

        return $optionsHtml;
    }

    public function render(): string
    {
        return sprintf('<select name="%s" %s %s>%s</select>', $this->getName(), $this->getClass(), $this->getId(), $this->getOptions());

    }
}