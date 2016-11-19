<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $persona->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $persona->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="personas form large-9 medium-8 columns content">
    <?= $this->Form->create($persona) ?>
    <fieldset>
        <legend><?= __('Edit Persona') ?></legend>
        <?php
            echo $this->Form->input('primer_nombre');
            echo $this->Form->input('segundo_nombre');
            echo $this->Form->input('apellidos');
            echo $this->Form->input('fecha_nacimiento');
            echo $this->Form->input('num_identificacion');
            echo $this->Form->input('tipo_identificacion');
            echo $this->Form->input('num_contacto');
            echo $this->Form->input('email');
            echo $this->Form->input('lugar_residencia');
            echo $this->Form->input('fecha_creacion', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
