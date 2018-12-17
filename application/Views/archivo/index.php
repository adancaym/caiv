<?php $paramsList['plural'] = $model->plural ;?>
<?php $paramsList['table'] = $model->table;?>
<div class="container-fluid">

    <div class="row hidden-xs">
        <div class="col-lg-12">

            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/">Pagina Principal</a>
                </li>
                <li class="breadcrumb-item active">

                        <a href="#<?php echo $model->table ?>">  <?php echo ucfirst(str_ireplace('_',' ',$model->plural) )?></a>
                </li>
            </ol>
        </div>

    </div>



    <div class="card">
        <div class="card-header">
            Lista de  <?php echo ucfirst(str_ireplace('_',' ',$model->plural) )?>
            <a class="btn btn-info btn-sm float-right " href="#nuevo_<?php echo $model->table?>">
                <i class="fa fa-plus"> Nuevo</i>
            </a>
        </div>
        <div class="card-body">
            <?php echo view('/archivo/index/list',$paramsList)?>
        </div>
    </div>
</div>


