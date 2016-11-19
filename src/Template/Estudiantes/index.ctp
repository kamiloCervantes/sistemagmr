<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Estudiante'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cohortes'), ['controller' => 'Cohortes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cohorte'), ['controller' => 'Cohortes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trabajos Grado'), ['controller' => 'TrabajosGrado', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trabajos Grado'), ['controller' => 'TrabajosGrado', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="estudiantes index large-9 medium-8 columns content">
    <h3><?= __('Estudiantes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_ingreso') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Cohortes_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Personas_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estudiantes as $estudiante): ?>
            <tr>
                <td><?= $this->Number->format($estudiante->id) ?></td>
                <td><?= h($estudiante->fecha_ingreso) ?></td>
                <td><?= $estudiante->has('cohorte') ? $this->Html->link($estudiante->cohorte->id, ['controller' => 'Cohortes', 'action' => 'view', $estudiante->cohorte->id]) : '' ?></td>
                <td><?= $estudiante->has('persona') ? $this->Html->link($estudiante->persona->id, ['controller' => 'Personas', 'action' => 'view', $estudiante->persona->id]) : '' ?></td>
                <td><?= $this->Number->format($estudiante->estado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $estudiante->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $estudiante->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $estudiante->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estudiante->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
