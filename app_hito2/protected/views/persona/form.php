<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name; ?>


<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 id="titulo-formulario" class="panel-title">Nueva Persona</h3>
    </div>
    <div class="panel-body">
        <form id="formulario" action="create<?php // echo Yii::app()->createAbsoluteUrl('persona/create') ?>" method="post" class="form-horizontal">
            <div class="form-group">
                <label for="nombreInput" class="col-lg-2 control-label">Nombre</label>
                <div class="col-lg-10">
                    <input id="nombreInput" type="text" name="Persona[nombre]" class="form-control" placeholder="Ej: Claudio">
                </div>
            </div>
            <div class="form-group">
                <label for="apellidoInput" class="col-lg-2 control-label">Apellido</label>
                <div class="col-lg-10">
                    <input id="apellidoInput" type="text" name="Persona[apellido]" class="form-control" placeholder="Ej: Pérez" >
                </div>
            </div>
            <div class="form-group">
                <label for="emailInput" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                    <input id="emailInput" type="text" name="Persona[email]" class="form-control" placeholder="Ej: claudio.perez@gmail.com" >
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-lg-2">
                    <label> Sexo: </label>
                </div>
                <div class="col-lg-10">
                    <input class="sexo" type="radio" name="Persona[sexo]" value="hombre"> Hombre
                    <input class="sexo" type="radio" name="Persona[sexo]" value="mujer"> Mujer
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-lg-2"><label> Color favorito: </label></div>
                <div class="col-lg-10">
                    <select name="Persona[color]">
                        <option></option>
                        <option>Azul</option>
                        <option>rojo</option>
                        <option>Amarillo</option>
                        <option>Celeste</option>
                    </select>
                </div>
            </div>
            
            
            <div class="form-group">
                <div class="col-lg-10">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="Persona[estudiante]" checked> Estudiante
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-lg-3">
                    <input type="reset" class="btn btn-default cerrar-form" value="Cancelar">
                </div>
                <div class="col-lg-offset-3 col-lg-3">
                    <input type="reset" class="btn btn-default" value="Limpiar">
                </div>
                <div class="col-lg-3">
                    <input type="submit" class="btn btn-primary" value="Enviar">
                </div>
            </div>
            
        </form>
    </div>
</div>

<?php
    // Yii::app()->clientScript->registerCoreScript('boton.js');
    // Yii::app()->clientScript->registerCoreScript('jquery.min.js');
?>
