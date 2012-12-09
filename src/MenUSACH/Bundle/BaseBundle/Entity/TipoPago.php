<?php

namespace MenUSACH\Bundle\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoPago
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TipoPago
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tp_descripcion", type="string", length=50)
     */
    private $tp_descripcion;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tp_descripcion
     *
     * @param string $tpDescripcion
     * @return TipoPago
     */
    public function setTpDescripcion($tpDescripcion)
    {
        $this->tp_descripcion = $tpDescripcion;
    
        return $this;
    }

    /**
     * Get tp_descripcion
     *
     * @return string 
     */
    public function getTpDescripcion()
    {
        return $this->tp_descripcion;
    }
}
