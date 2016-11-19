<div class="municipios col-sm-12">
    <h3><?= __('Municipios') ?> <?= $this->Html->link(__('Nuevo Municipio'), ['action' => 'add'],['class' => 'btn btn-default btn-xs']) ?></h3>
    <table cellpadding="0" cellspacing="0" class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($municipios as $municipio): ?>
            <tr>
                <td><?= $this->Number->format($municipio->id) ?></td>
                <td><?= h($municipio->nombre) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $municipio->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $municipio->id], ['confirm' => __('Está seguro que desea eliminar el municipio {0}?', $municipio->nombre)]) ?>
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
