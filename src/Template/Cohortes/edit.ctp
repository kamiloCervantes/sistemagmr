
<div class="cohortes col-sm-12">
    <?= $this->Form->create($cohorte) ?>
    <fieldset>
        <legend><?= __('Editar Cohorte') ?></legend>
        <?php            
            echo $this->Form->input('nombre',['class' => 'form-control']);
            echo $this->Form->input('Instituciones_id', ['options' => $instituciones,
           'class' => 'form-control', 'label' => 'Institución']);
            echo $this->Form->input('fecha_inicio', ['type' => 'text','class' => 'form-control' ] );
        ?>
    </fieldset>
     <br/>
    <?= $this->Form->button(__('Guardar'),['class' => 'btn btn-default']) ?>
    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'],['class' => 'btn btn-default']) ?>
    <?= $this->Form->end() ?>
</div>

<?php $this->append('scripts'); ?>
<script src="/vendor/bootstrap-datepicker-1.6.4-dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="/vendor/bootstrap-datepicker-1.6.4-dist/locales/bootstrap-datepicker.es.min.js" type="text/javascript"></script>
<script src="/js/app/cohortes/add.js" type="text/javascript"></script>
<?php $this->end(); ?>

<?php $this->append('css'); ?>
<link rel="stylesheet" href="/vendor/bootstrap-datepicker-1.6.4-dist/css/bootstrap-datepicker3.min.css"/>   
<?php $this->end(); ?>
