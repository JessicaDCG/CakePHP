<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Persona $persona
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Persona'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="persona form large-9 medium-8 columns content">
    <?= $this->Form->create($persona) ?>
    <fieldset>
        <legend><?= __('Add Persona') ?></legend>
        <?php
            echo $this->Form->control('Nombre');
            echo $this->Form->control('Apellido_Paterno');
            echo $this->Form->control('Apellido_Materno');
            echo $this->Form->control('FechaNacimiento', ['empty' => true]);            
            
            $options = [1 => 'Femenino', 2 => 'Masculino'];
            echo $this->Form->input('sexo', array(
                'options' => $options,
                'type' => 'select',
                'empty' => 'Selecciona sexo',
                'label' => 'Sexo'
               )
            );

            echo $this->Form->input('Correo');
            
           
        ?>    
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
