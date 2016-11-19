<div class="municipios form col-sm-12">
    <?= $this->Form->create($municipio) ?>
    <fieldset>
        <legend><?= __('Agregar Municipio') ?></legend>
        <?php
            echo $this->Form->input('nombre',['class' => 'form-control']);
        ?>
    </fieldset>
    <br/>
    <?= $this->Form->button(__('Guardar'),['class' => 'btn btn-default']) ?>
    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'],['class' => 'btn btn-default']) ?>
    <?= $this->Form->end() ?>
</div>
