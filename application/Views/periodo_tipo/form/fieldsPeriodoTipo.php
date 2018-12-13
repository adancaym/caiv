

<input type="hidden" name="id_periodo_tipo" value="<?= $periodo_tipo->id_periodo_tipo?>">

<div class="form-group">
    <label for="">Tipo de periodo</label>
    <input type="text" class="form-control" value="<?= $periodo_tipo->periodo_tipo?>" name="periodo_tipo">
</div>
<div class="form-group">
    <label for="">Dias</label>
    <input type="text" class="form-control" value="<?= $periodo_tipo->dias?>" name="dias">
</div>
<div class="form-group">
    <input type="submit" value="Guardar" class="btn btn-info float-right karym_submit">
</div>