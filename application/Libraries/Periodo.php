<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 11/12/18
 * Time: 05:28 PM
 */

namespace App\Libraries;


class Periodo
{
    protected $fecha_inicio;
    protected $fecha_termino;
    protected $vacaciones;

    public function __construct($fecha_inicio,$fecha_termino)
    {
        $this->fecha_inicio= $fecha_inicio;
        $this->fecha_termino= $fecha_termino;
    }

    public function getPeriodosDeTrabajo(){

        $startDateUnix = strtotime($this->getFechaInicio());
        $endDateUnix = strtotime($this->getFechaTermino());

        $currentDateUnix = $startDateUnix;

        $weekNumbers = array();
        $contador = 0;
        while ($currentDateUnix < $endDateUnix) {
            $temcurrentDate = $currentDateUnix;
            $weekNumbers[$contador]['numero'] = date('W', $currentDateUnix);
            $weekNumbers[$contador]['inicio'] = date('d-m-Y', $currentDateUnix);
            $weekNumbers[$contador]['termino'] = date('d-m-Y',strtotime('+5 day', $temcurrentDate));
            $currentDateUnix = strtotime('+1 week', $currentDateUnix);
            $contador++;
        }
        return $weekNumbers;
    }

    /**
     * @return mixed
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * @param mixed $fecha_inicio
     */
    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;
    }

    /**
     * @return mixed
     */
    public function getFechaTermino()
    {
        return $this->fecha_termino;
    }

    /**
     * @param mixed $fecha_termino
     */
    public function setFechaTermino($fecha_termino)
    {
        $this->fecha_termino = $fecha_termino;
    }

    /**
     * @return mixed
     */
    public function getVacaciones()
    {
        return $this->vacaciones;
    }

    /**
     * @param mixed $vacaciones
     */
    public function setVacaciones($vacaciones)
    {
        $this->vacaciones = $vacaciones;
    }




}