<div class="estudiantes col-sm-12">
    <?= $this->Form->create($estudiante) ?>
    <fieldset>
        <legend><?= __('Agregar Estudiante') ?></legend>
        <div class="panel panel-default">
            <div class="panel-heading">Información básica</div>
            <div class="panel-body">
               <?php
                    echo $this->Form->input('primer_nombre',['class' => 'form-control']);
                    echo $this->Form->input('segundo_nombre',['class' => 'form-control']);
                    echo $this->Form->input('apellidos',['class' => 'form-control']);
                    echo $this->Form->input('fecha_nacimiento',['class' => 'form-control']);
                    echo $this->Form->input('num_identificacion',['class' => 'form-control']);
                    echo $this->Form->input('tipo_identificacion',['class' => 'form-control']);
                    echo $this->Form->input('num_contacto',['class' => 'form-control']);
                    echo $this->Form->input('email',['class' => 'form-control']);
                    echo $this->Form->input('lugar_residencia',['class' => 'form-control', 'options' => $municipios]);
                ?>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Datos de ingreso</div>
            <div class="panel-body">
               <?php
                    echo $this->Form->input('fecha_ingreso',['class' => 'form-control']);
                    echo $this->Form->input('institucion',['options' => $instituciones,'class' => 'form-control']);
                    echo $this->Form->input('Cohortes_id', ['class' => 'form-control', 'label' => 'Cohorte']);
                ?>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Datos de acceso</div>
            <div class="panel-body">
               <?php
                    echo $this->Form->input('username',['class' => 'form-control']);
                    echo $this->Form->input('password',['class' => 'form-control']);
                ?>
            </div>
        </div>
       
    </fieldset>
    <br/>
    <div style="text-align: center">
    <?= $this->Form->button(__('Guardar'),['class' => 'btn btn-default']) ?>
    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'],['class' => 'btn btn-default']) ?>
    </div>
    <?= $this->Form->end() ?>
    <br/>
</div>
<?php $this->append('scripts'); ?>
<script src="/vendor/bootstrap-datepicker-1.6.4-dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="/vendor/bootstrap-datepicker-1.6.4-dist/locales/bootstrap-datepicker.es.min.js" type="text/javascript"></script>
<script src="/vendor/select2-4.0.3/js/select2.min.js" type="text/javascript"></script>
<script src="/vendor/select2-4.0.3/js/i18n/es.js" type="text/javascript"></script>
<script src="/js/app/estudiantes/add.js" type="text/javascript"></script>
<?php $this->end(); ?>

<?php $this->append('css'); ?>
<link rel="stylesheet" href="/vendor/bootstrap-datepicker-1.6.4-dist/css/bootstrap-datepicker3.min.css"/>   
<link rel="stylesheet" href="/vendor/select2-4.0.3/css/select2.min.css"/>   
<link rel="stylesheet" href="/vendor/select2-4.0.3/css/select2-bootstrap.min.css"/>   
<?php $this->end(); ?>