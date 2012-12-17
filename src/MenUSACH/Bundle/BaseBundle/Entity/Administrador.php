<?php

namespace MenUSACH\Bundle\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Administrador
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Administrador extends \MenUSACH\Bundle\BaseBundle\Entity\Persona
{

    /**
     * @var integer
     *
     * @ORM\Column(name="adm_fono", type="integer")
     */
    private $adm_fono;

    
    /**
     * Set adm_fono
     *
     * @param integer $admFono
     * @return Propietario
     */
    public function setAdmFono($admFono)
    {
        $this->adm_fono = $admFono;
    
        return $this;
    }

    /**
     * Get adm_fono
     *
     * @return integer 
     */
    public function getAdmFono()
    {
        return $this->adm_fono;
    }
}
