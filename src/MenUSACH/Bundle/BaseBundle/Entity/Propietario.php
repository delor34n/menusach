<?php

namespace MenUSACH\Bundle\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Propietario
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Propietario extends \MenUSACH\Bundle\BaseBundle\Entity\Persona
{

    /**
     * @var integer
     *
     * @ORM\Column(name="pro_fono", type="integer")
     */
    private $pro_fono;

    
    /**
     * Set pro_fono
     *
     * @param integer $proFono
     * @return Propietario
     */
    public function setProFono($proFono)
    {
        $this->pro_fono = $proFono;
    
        return $this;
    }

    /**
     * Get pro_fono
     *
     * @return integer 
     */
    public function getProFono()
    {
        return $this->pro_fono;
    }
}
