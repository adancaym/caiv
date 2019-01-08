<div class="table-responsive">
    <table class="table table-condensed table-bordered table-hover" id="dateTable<?php echo sizeof($entidades)>0 ? $table:'' ?>">
        <thead>
        <tr>
            <?php
                $tamaño = 90/sizeof($headers);
                foreach ($headers as $header) {
                ?>
                <th class="text-center" width="<?= $tamaño?>%">
                    <?php echo $header?>
                </th>
             <?php } ?>
            <th class="text-center" width="10%">
                Acciones
            </th>
        </tr>
        </thead>
        <tbody>
        <?php if (sizeof($entidades)>0){?>
            <?php foreach ($entidades as $entidad) { ?>
                <tr>
                    <?php foreach ($fields as $field){?>
                    <td>
                        <?= $entidad->$field ?>
                    </td>
                    <?php } ?>
                    <td class="text-center">
                        <a data-id="<?= $entidad->$id ?>" class="btn-xs karym_update btn btn-warning" href="#modificar_<?php echo $table?>?id=<?= $entidad->$id?>">
                            <i class="fa fa-pen"></i>
                        </a>
                        <a data-id="<?= $entidad->$id ?>" class="btn-xs karym_delete btn btn-danger" href="#eliminar_<?php echo $table?>?id=<?= $entidad->$id?>">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        <?php } else {?>
            <tr>
                <td colspan="<?= sizeof($headers) +1 ?>" class="text-center">
                    No existen <?php echo $plural?> en el sistema
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?= $pager->links() ?>
</div>