<form action="/guardar_<?php echo $model->table ?>" enctype="multipart/form-data">
    <?php  echo view($model->table.'/form/fields'.$model->module,$paramsFields)?>
</form>