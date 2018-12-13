/*
-- Query: select * from accion where id_accion >5
-- Date: 2018-12-11 16:29
*/
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Asignaturas','Asignatura::index',1,'asignatura',5,1);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Agregar ciclo escolar','Asignatura::agregar',1,'nuevo_asignatura',5,0);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Guardar ciclo escolar','Asignatura::guardar',1,'guardar_asignatura',5,0);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Modificar ciclo escolar','Asignatura::modificar',1,'modificar_asignatura',5,0);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Eliminar ciclo escolar','Asignatura::eliminar',1,'eliminar_asignatura',5,0);


INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Grados','Grado::index',1,'grado',5,1);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Agregar grado','Grado::agregar',1,'nuevo_grado',5,0);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Guardar grado','Grado::guardar',1,'guardar_grado',5,0);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Modificar grado','Grado::modificar',1,'modificar_grado',5,0);


INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Grupos','Grupo::index',1,'grupo',5,1);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Agregar grupo','Grupo::agregar',1,'nuevo_grupo',5,0);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Guardar grupo','Grupo::guardar',1,'guardar_grupo',5,0);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Modificar grupo','Grupo::modificar',1,'modificar_grupo',5,0);


INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Grupos','GrupoEscuela::index',1,'grupo_escuela',5,1);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Agregar grupo_escuela','GrupoEscuela::agregar',1,'nuevo_grupo_escuela',5,0);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Guardar grupo_escuela','GrupoEscuela::guardar',1,'guardar_grupo_escuela',5,0);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Modificar grupo_escuela','GrupoEscuela::modificar',1,'modificar_grupo_escuela',5,0);



INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Periodos','Periodo::index',1,'periodo',5,1);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Agregar periodo','Periodo::agregar',1,'nuevo_periodo',5,0);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Guardar periodo','Periodo::guardar',1,'guardar_periodo',5,0);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Modificar periodo','Periodo::modificar',1,'modificar_periodo',5,0);


INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Tipos de periodos','PeriodoTipo::index',1,'periodo_tipo',30,1);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Agregar periodo_tipo','PeriodoTipo::agregar',1,'nuevo_periodo_tipo',30,0);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Guardar periodo_tipo','PeriodoTipo::guardar',1,'guardar_periodo_tipo',30,0);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Modificar periodo_tipo','PeriodoTipo::modificar',1,'modificar_periodo_tipo',30,0);


INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Eliminar ciclo escolar','Asignatura::eliminar',1,'eliminar_asignatura',5,0);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Eliminar grado','Grado::eliminar',1,'eliminar_grado',5,0);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Eliminar grupo','Grupo::eliminar',1,'eliminar_grupo',5,0);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Eliminar grupo_escuela','GrupoEscuela::eliminar',1,'eliminar_grupo_escuela',5,0);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Eliminar periodo','Periodo::eliminar',1,'eliminar_periodo',5,0);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Eliminar periodo_tipo','PeriodoTipo::eliminar',1,'eliminar_periodo_tipo',30,0);


INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Archivos','Archivo::index',1,'archivo',5,1);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Agregar archivo','Archivo::agregar',1,'nuevo_archivo',5,0);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Guardar archivo','Archivo::guardar',1,'guardar_archivo',5,0);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Modificar archivo','Archivo::modificar',1,'modificar_archivo',5,0);
INSERT INTO `accion` (`id_accion`,`accion`,`ruta`,`id_cuenta`,`link`,`id_accion_padre`,`visible`) VALUES (null,'Eliminar archivo','Archivo::eliminar',1,'eliminar_archivo',5,0);