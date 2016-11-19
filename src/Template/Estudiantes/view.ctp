<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Estudiante'), ['action' => 'edit', $estudiante->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Estudiante'), ['action' => 'delete', $estudiante->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estudiante->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Estudiantes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estudiante'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cohortes'), ['controller' => 'Cohortes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cohorte'), ['controller' => 'Cohortes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trabajos Grado'), ['controller' => 'TrabajosGrado', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trabajos Grado'), ['controller' => 'TrabajosGrado', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="estudiantes view large-9 medium-8 columns content">
    <h3><?= h($estudiante->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Fecha Ingreso') ?></th>
            <td><?= h($estudiante->fecha_ingreso) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cohorte') ?></th>
            <td><?= $estudiante->has('cohorte') ? $this->Html->link($estudiante->cohorte->id, ['controller' => 'Cohortes', 'action' => 'view', $estudiante->cohorte->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Persona') ?></th>
            <td><?= $estudiante->has('persona') ? $this->Html->link($estudiante->persona->id, ['controller' => 'Personas', 'action' => 'view', $estudiante->persona->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($estudiante->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= $this->Number->format($estudiante->estado) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Trabajos Grado') ?></h4>
        <?php if (!empty($estudiante->trabajos_grado)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Resumen') ?></th>
                <th scope="col"><?= __('Palabras Clave') ?></th>
                <th scope="col"><?= __('Fecha Creacion') ?></th>
                <th scope="col"><?= __('Fecha Publicacion') ?></th>
                <th scope="col"><?= __('Estado') ?></th>
                <th scope="col"><?= __('Grupo Investigacion') ?></th>
                <th scope="col"><?= __('Director') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($estudiante->trabajos_grado as $trabajosGrado): ?>
            <tr>
                <td><?= h($trabajosGrado->id) ?></td>
                <td><?= h($trabajosGrado->nombre) ?></td>
                <td><?= h($trabajosGrado->resumen) ?></td>
                <td><?= h($trabajosGrado->palabras_clave) ?></td>
                <td><?= h($trabajosGrado->fecha_creacion) ?></td>
                <td><?= h($trabajosGrado->fecha_publicacion) ?></td>
                <td><?= h($trabajosGrado->estado) ?></td>
                <td><?= h($trabajosGrado->grupo_investigacion) ?></td>
                <td><?= h($trabajosGrado->director) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TrabajosGrado', 'action' => 'view', $trabajosGrado->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TrabajosGrado', 'action' => 'edit', $trabajosGrado->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TrabajosGrado', 'action' => 'delete', $trabajosGrado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trabajosGrado->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
