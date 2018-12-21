<div class="row">

    <div class="col-lg-12">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                $active = true;
                foreach ($entidades as $entidad){ ?>
                    <div class="carousel-item <?= $active ? 'active':'' ?>" style="overflow-y: auto; height: 600px">
                        <a data-id="<?= $entidad->id_archivo ?>" class="karym_view_file" style="width: 33.333%" href="<?php echo $entidad->url?>">
                            <img width="100%" src="data:image/png;base64,<?php echo base64_encode( $entidad->blob )?>"/>
                        </a>
                    </div>
                    <?php
                    $active = false;
                } ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
