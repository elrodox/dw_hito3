<?php
/* @var $this PersonaController */
/* @var $personas Array */
?>

<div class="row">
    <h1>Listado de Personas de Rest WebService</h1>
    <button class="mostrar-form-nueva-persona btn btn-success"><span class="glyphicon glyphicon-add"></span>Nueva Persona</button>
</div>
<br>
<!--<div class="table-responsive">-->
<table class="table table-hover table-striped">
    <tr>
        <th>id</th>
        <th>nombre</th>
        <th>paterno</th>
        <th>materno</th>
        <th>email</th>
        <th>createdAt</th>
        <th>updatedAt</th>
    </tr>
    <tbody class="lista-personas">
    <?php foreach($personas as $persona): ?>
        <?php $this->renderPartial('_ver', array("persona"=>$persona)) ?>
    <?php endforeach ?>
    </tbody>
</table>
<!--</div>-->