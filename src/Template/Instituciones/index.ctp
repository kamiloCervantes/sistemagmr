<div class="instituciones col-sm-12">
    <h3><?= __('Instituciones') ?> <?= $this->Html->link(__('Nueva Institución'), ['action' => 'add'],['class' => 'btn btn-default btn-xs']) ?></h3>
    <table cellpadding="0" cellspacing="0" class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('direccion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefono') ?></th>
                <th scope="col"><?= $this->Paginator->sort('web') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Municipios_id', 'Municipio') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($instituciones as $institucione): ?>
            <tr>
                <td><?= $this->Number->format($institucione->id) ?></td>
                <td><?= h($institucione->nombre) ?></td>
                <td><?= h($institucione->direccion) ?></td>
                <td><?= h($institucione->telefono) ?></td>
                <td><?= h($institucione->web) ?></td>
                <td><?= $institucione->has('municipio') ? $this->Html->link($institucione->municipio->nombre, ['controller' => 'Municipios', 'action' => 'view', $institucione->municipio->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $institucione->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $institucione->id], ['confirm' => __('¿Está seguro que desea eliminar la Institución {0}?', $institucione->nombre)]) ?>
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
