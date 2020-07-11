<?php

class validatephpunit
{
    protected $entero1;

    public function __construct($entero1)
    {
        $this->entero1 = $entero1;
    }

    public function duplicar()
    {
        $dobles = $this->entero1 * 2;
        return $dobles;
    }
}



