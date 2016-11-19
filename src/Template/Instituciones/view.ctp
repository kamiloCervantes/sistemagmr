<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Institucione'), ['action' => 'edit', $institucione->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Institucione'), ['action' => 'delete', $institucione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $institucione->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Instituciones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Institucione'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Municipios'), ['controller' => 'Municipios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Municipio'), ['controller' => 'Municipios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="instituciones view large-9 medium-8 columns content">
    <h3><?= h($institucione->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($institucione->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Direccion') ?></th>
            <td><?= h($institucione->direccion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono') ?></th>
            <td><?= h($institucione->telefono) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Web') ?></th>
            <td><?= h($institucione->web) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Municipio') ?></th>
            <td><?= $institucione->has('municipio') ? $this->Html->link($institucione->municipio->id, ['controller' => 'Municipios', 'action' => 'view', $institucione->municipio->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($institucione->id) ?></td>
        </tr>
    </table>
</div>
