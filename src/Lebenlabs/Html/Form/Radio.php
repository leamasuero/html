<?php


namespace Lebenlabs\Html\Form;


class Radio extends Checkbox
{

    public function render(): string
    {
        return sprintf('<input type="radio" name="%s" value="%s" %s %s %s %s %s %s %s />',
            $this->getName(),
            $this->getValue(),
            $this->getClass(),
            $this->getId(),
            $this->getChecked(),
            $this->getDisabled(),
            $this->getReadonly(),
            $this->getTitle(),
            $this->getForm(),
        );
    }

}

