<?php
    /* @var $this PersonaController */
    /* @var $personas Array */
?>
<div class="container">
    <div class="row">
        <div id="columna-form" class="" style="display: none;">
            <br>
            <?php $this->renderPartial("form"); ?>
        </div>
        <div id="columna-tabla" class="col-xs-12">
            <?php $this->renderPartial("lista", array('personas'=>$personas)); ?>
        </div>
    </div>
    <div class="row">
        <button class="btn btn-primary" id="boton">Ver Rest WebService</button>
    </div>
</div>
