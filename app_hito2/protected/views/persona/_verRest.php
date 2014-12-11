<?php
/* @var $this PersonaController */
/* @var $persona Array */
?>
<tr>
    <td class="id"><?php echo $persona['id'] ?></td>
    <td class="nombre"><?php echo $persona['nombre'] ?></td>
    <td class="apellido"><?php echo $persona['paterno'] ?></td>
    <td class="email"><?php echo $persona['materno'] ?></td>
    <td class="estudiante"><?php echo $persona['email'] ?></td>
    <td class="sexo"><?php echo $persona['createAt'] ?></td>
    <td class="color"><?php echo $persona['updateAt'] ?></td>
<!--    <td>-->
<!--        <button id="mostrar-form-editar-persona" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></button>-->
<!--        <button id="eliminar" class="btn btn-danger" href="index.php?r=persona/eliminar"><span class="glyphicon glyphicon-remove"></span></button>-->
<!--    </td>-->
</tr>