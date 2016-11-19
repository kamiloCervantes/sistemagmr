<div class="cohortes col-sm-12">
    <h3><?= __('Cohortes') ?> <?= $this->Html->link(__('Nueva Cohorte'), ['action' => 'add'], ['class' => 'btn btn-default btn-xs']) ?></h3>
    <table cellpadding="0" cellspacing="0" class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Instituciones_id', 'Institución') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_creacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_inicio') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cohortes as $cohorte): ?>
            <tr>
                <td><?= $this->Number->format($cohorte->id) ?></td>
                <td><?= $cohorte->has('institucione') ? $this->Html->link($cohorte->institucione->nombre, ['controller' => 'Instituciones', 'action' => 'view', $cohorte->institucione->id]) : '' ?></td>
                <td><?= h($cohorte->nombre) ?></td>
                <td><?= h($cohorte->fecha_creacion) ?></td>
                <td><?= h($cohorte->fecha_inicio) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $cohorte->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $cohorte->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $cohorte->id], ['confirm' => __('¿Está seguro que desea eliminar {0}?', $cohorte->nombre)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
