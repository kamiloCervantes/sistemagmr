<div class="instituciones col-sm-12">
    <?= $this->Form->create($institucione) ?>
    <fieldset>
        <legend><?= __('Editar Institución') ?></legend>
        <?php
            echo $this->Form->input('nombre', ['class'=>'form-control']);
            echo $this->Form->input('direccion', ['class'=>'form-control']);
            echo $this->Form->input('telefono', ['class'=>'form-control']);
            echo $this->Form->input('web', ['class'=>'form-control']);
            echo $this->Form->input('Municipios_id', 
                        ['options' => $municipios, 
                         'class'=>'form-control',
                         'label'=>'Municipio'                            
                            ]);
        ?>
    </fieldset>
    <br/>
    <?= $this->Form->button(__('Guardar'),['class' => 'btn btn-default']) ?>
    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'],['class' => 'btn btn-default']) ?>
    <?= $this->Form->end() ?>
</div>
