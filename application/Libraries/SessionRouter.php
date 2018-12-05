<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 4/12/18
 * Time: 10:20 PM
 */

namespace App\Libraries;


class SessionRouter
{
    public $session;
    public $user;
    public $cuenta;
    public $cuentaPadre;
    public $menus;


    public function __construct()
    {
        $this->session = session();
        $this->user = $this->session->user;
        $this->cuenta = $this->session->cuenta;
        $this->cuentaPadre = $this->session->cuentaPadre;
        $this->menus = $this->session->menus;
    }

    /**
     * @return string|null
     */
    public function getUser(): ?string
    {
        return $this->user;
    }

    /**
     * @param string|null $user
     */
    public function setUser(?string $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string|null
     */
    public function getCuenta(): ?string
    {
        return $this->cuenta;
    }

    /**
     * @param string|null $cuenta
     */
    public function setCuenta(?string $cuenta): void
    {
        $this->cuenta = $cuenta;
    }



    /**
     * @return \CodeIgniter\Session\Session|mixed|null
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @param \CodeIgniter\Session\Session|mixed|null $session
     */
    public function setSession($session): void
    {
        $this->session = $session;
    }





}