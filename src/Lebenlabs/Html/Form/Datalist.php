<?php

namespace Lebenlabs\Html\Form;


class Datalist
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
    private $listId;

    /**
     * @var array
     */
    private $options;

    /**
     * @var array
     */
    private $data;

    /**
     * @var strings
     */
    private $selected;

    /**
     * @var array
     */
    private $classes;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $placeHolder;

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

    /**
     * @var bool
     */
    private $autocomplete;

    public function __construct(string $name, ?array $options = [])
    {
        $this->id = null;
        $this->name = $name;
        $this->classes = [];
        $this->selected = null;
        $this->listId = null;
        $this->options = $options;

        $this->data = [];

        $this->title = null;
        $this->placeHolder = 'Seleccionar';
        $this->multiple = false;
        $this->disabled = false;
        $this->readonly = false;
        $this->autocomplete = false;
    }

    public static function create(string $name, ?array $options = []): Datalist
    {
        return new self($name, $options);
    }

    public function id(string $id): Datalist
    {
        $this->id = $id;
        return $this;
    }

    public function class(string $class, bool $condition = true): Datalist
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
    public function classes(array $classes): Datalist
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

    public function disabled(?bool $disabled = true): Datalist
    {
        $this->disabled = $disabled;
        return $this;
    }

    public function title(string $title): Datalist
    {
        $this->title = $title;
        return $this;
    }

    public function placeHolder(string $placeHolder): Datalist
    {
        $this->placeHolder = $placeHolder;
        return $this;
    }

    public function multiple(bool $multiple): Datalist
    {
        $this->multiple = $multiple;
        return $this;
    }

    public function readonly(?bool $readonly = true): Datalist
    {
        $this->readonly = $readonly;
        return $this;
    }


    public function autocomplete(?bool $autcomplete = true): Datalist
    {
        $this->autocomplete = $autcomplete;
        return $this;
    }

    public function selected(?string $selected): Datalist
    {
        $this->selected = $selected;
        return $this;
    }

    public function listId(?string $listId): Datalist
    {
        $this->listId = $listId;
        return $this;
    }

    public function data(string $key, string $value): Datalist
    {
        $this->data[$key] = $value;
        return $this;
    }

    private function getName(): string
    {
        return $this->name;
    }

    private function getListId(): string
    {
        return $this->listId ? $this->listId : "{$this->name}s";
    }

    private function getMultiple(): string
    {
        return $this->multiple ? 'multiple="multiple"' : '';
    }

    private function getTitle(): string
    {
        return $this->title ? "title='{$this->title}'" : '';
    }

    private function getSelected(): string
    {
        return $this->selected ? "value='{$this->selected}'" : '';
    }

    private function getPlaceHolder(): string
    {
        return $this->placeHolder ? "placeholder='{$this->placeHolder}'" : '';
    }

    private function getClass(): ?string
    {
        $class = join(' ', $this->classes);
        return $this->classes ? "class='{$class}'" : '';
    }

    private function getAutocomplete(): string
    {
        return $this->autocomplete ? "autocomplete=on" : "autocomplete=off";
    }

    private function getId(): ?string
    {
        return $this->id ? "id='{$this->id}'" : '';
    }

    private function getOptions(): string
    {
        if (count($this->options) == 0) {
            return '';
        }

        $optionsHtml = '';
        foreach ($this->options as $id => $value) {
            $optionsHtml .= "<option data-id='{$id}' data-value='{$value}' value='{$value}'>{$value}</option>";
        }

        return "<datalist id='{$this->getListId()}'>{$optionsHtml}</datalist>";
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
        return sprintf('<input name="%s" %s %s %s %s %s %s %s %s %s list="%s"/>%s',
            $this->getName(),
            $this->getData(),
            $this->getSelected(),
            $this->getAutocomplete(),
            $this->getPlaceholder(),
            $this->getClass(),
            $this->getId(),
            $this->getDisabled(),
            $this->getReadonly(),
            $this->getTitle(),
            $this->getListId(),
            $this->getOptions()
        );
    }

    public function __toString()
    {
        return $this->render();
    }
}
