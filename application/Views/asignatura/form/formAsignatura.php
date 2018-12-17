
<form action="/guardar_<?php echo $model->table ?>">
    <?php  echo view($model->table.'/form/fields'.$model->module,$paramsFields)?>
</form>