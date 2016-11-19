<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $estudiante->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $estudiante->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Estudiantes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cohortes'), ['controller' => 'Cohortes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cohorte'), ['controller' => 'Cohortes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trabajos Grado'), ['controller' => 'TrabajosGrado', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trabajos Grado'), ['controller' => 'TrabajosGrado', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="estudiantes form large-9 medium-8 columns content">
    <?= $this->Form->create($estudiante) ?>
    <fieldset>
        <legend><?= __('Edit Estudiante') ?></legend>
        <?php
            echo $this->Form->input('fecha_ingreso');
            echo $this->Form->input('Cohortes_id', ['options' => $cohortes]);
            echo $this->Form->input('Personas_id', ['options' => $personas]);
            echo $this->Form->input('estado');
            echo $this->Form->input('trabajos_grado._ids', ['options' => $trabajosGrado]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
