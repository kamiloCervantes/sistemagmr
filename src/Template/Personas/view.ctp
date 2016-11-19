<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Persona'), ['action' => 'edit', $persona->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Persona'), ['action' => 'delete', $persona->id], ['confirm' => __('Are you sure you want to delete # {0}?', $persona->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Personas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Persona'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="personas view large-9 medium-8 columns content">
    <h3><?= h($persona->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Primer Nombre') ?></th>
            <td><?= h($persona->primer_nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Segundo Nombre') ?></th>
            <td><?= h($persona->segundo_nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellidos') ?></th>
            <td><?= h($persona->apellidos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Nacimiento') ?></th>
            <td><?= h($persona->fecha_nacimiento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Num Identificacion') ?></th>
            <td><?= h($persona->num_identificacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo Identificacion') ?></th>
            <td><?= h($persona->tipo_identificacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Num Contacto') ?></th>
            <td><?= h($persona->num_contacto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($persona->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($persona->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lugar Residencia') ?></th>
            <td><?= $this->Number->format($persona->lugar_residencia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Creacion') ?></th>
            <td><?= h($persona->fecha_creacion) ?></td>
        </tr>
    </table>
</div>
