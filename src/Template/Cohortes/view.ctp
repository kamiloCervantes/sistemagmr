<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cohorte'), ['action' => 'edit', $cohorte->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cohorte'), ['action' => 'delete', $cohorte->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cohorte->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cohortes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cohorte'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Instituciones'), ['controller' => 'Instituciones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Institucione'), ['controller' => 'Instituciones', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cohortes view large-9 medium-8 columns content">
    <h3><?= h($cohorte->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Institucione') ?></th>
            <td><?= $cohorte->has('institucione') ? $this->Html->link($cohorte->institucione->id, ['controller' => 'Instituciones', 'action' => 'view', $cohorte->institucione->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($cohorte->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cohorte->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Creacion') ?></th>
            <td><?= h($cohorte->fecha_creacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Inicio') ?></th>
            <td><?= h($cohorte->fecha_inicio) ?></td>
        </tr>
    </table>
</div>
