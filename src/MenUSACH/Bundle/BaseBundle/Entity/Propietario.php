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
     * @ORM\OneToMany(targetEntity="Local", mappedBy="propietario")
     */
    protected $locales;
    
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->locales = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add locales
     *
     * @param \MenUSACH\Bundle\BaseBundle\Entity\Local $locales
     * @return Propietario
     */
    public function addLocale(\MenUSACH\Bundle\BaseBundle\Entity\Local $locales)
    {
        $this->locales[] = $locales;
    
        return $this;
    }

    /**
     * Remove locales
     *
     * @param \MenUSACH\Bundle\BaseBundle\Entity\Local $locales
     */
    public function removeLocale(\MenUSACH\Bundle\BaseBundle\Entity\Local $locales)
    {
        $this->locales->removeElement($locales);
    }

    /**
     * Get locales
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLocales()
    {
        return $this->locales;
    }

    public function getNombreCompleto() {
        return $this->getPerNombre() . " " . $this->getPerApellidoPaterno() . " " . $this->getPerApellidoMaterno();
    }
}
