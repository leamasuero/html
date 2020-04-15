# html helper

## Checkbox

     Checkbox::create('name', '1')
     ->checked()
     ->render();

## Select

     Select::create('name', [1 => 'option 1'])
     ->selected(1)
     ->class('form-control')
     ->render();

