

<input type="hidden" name="id_ciclo_escolar" value="<?= $ciclo_escolar->id_ciclo_escolar?>">

<div class="form-group">
    <label for="">Ciclo escolar</label>
    <input type="text" class="form-control" value="<?= $ciclo_escolar->ciclo_escolar?>" name="ciclo_escolar">
</div>

<div class="form-group">
    <label for="">Fecha de inicio</label>
    <input type="date" class="form-control" value="<?= $ciclo_escolar->fecha_inicio?>" name="fecha_inicio">
</div>

<div class="form-group">
    <label for="">Fecha de termino</label>
    <input type="date" class="form-control" value="<?= $ciclo_escolar->fecha_termino?>" name="fecha_termino">
</div>

<div class="form-group">
    <input type="submit" value="Guardar" class="btn btn-info float-right karym_submit">
</div>