<?php if (sizeof($entidades)>0){?>
    <div class="row">
    <?php foreach ($entidades as $entidad) { ?>
        <div class="col-lg-2">
                <div class="card">
                    <div class="card-header text-center">
                        <?php echo $entidad->archivo?>
                    </div>
                    <div class="card-body">
                        <a data-id="<?= $entidad->$id ?>" class="karym_view_file" style="width: 33.333%" href="<?php echo $entidad->url?>">
                            <img class="img-responsive" width="100%" src="preview?id=<?php echo $entidad->id_archivo?>" alt="">
                        </a>
                    </div>
                    <div class="card-footer text-center">
                        <div class="btn-group" style="width: 100%" role="group">
                            <a data-id="<?= $entidad->$id ?>" class="btn-xs karym_update btn btn-warning" style="width: 50%" href="#modificar_<?php echo $table?>?id=<?= $entidad->$id?>&toFrame=true">
                                <i class="fa fa-pen"></i>
                            </a>
                            <a data-id="<?= $entidad->$id ?>" class="btn-xs karym_delete btn btn-danger" style="width: 50%" href="#eliminar_<?php echo $table?>?id=<?= $entidad->$id?>&toFrame=true">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
        </div>
<?php } ?>
    </div>
<?php } else {?>
<tr>
    <td colspan="<?= sizeof($headers) +1 ?>" class="text-center">
        No existen <?php echo $plural?> en el sistema
    </td>
</tr>
<?php } ?>
