

<input type="hidden" name="id_periodo" value="<?= $periodo->id_periodo?>">

<div class="form-group">
    <label for="">Periodo</label>
    <input type="text" class="form-control" value="<?= $periodo->periodo?>" name="periodo">
</div>
<div class="form-group">
    <label for="">Fecha de inicio</label>
    <input type="text" class="form-control" value="<?= $periodo->fecha_inicio?>" name="periodo">
</div>
<div class="form-group">
    <label for="">Techa de termino</label>
    <input type="text" class="form-control" value="<?= $periodo->fecha_termino?>" name="periodo">
</div>
<div class="form-group">
    <label for="">Tipo</label>
    <?php echo $periodo_tipo ?>
</div>

<div class="form-group">
    <input type="submit" value="Guardar" class="btn btn-info float-right karym_submit">
</div>