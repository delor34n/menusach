<?php

namespace MenUSACH\Bundle\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Local
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Local
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
     * @ORM\Column(name="loc_nombre", type="string", length=30)
     */
    private $loc_nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="loc_ubicacion", type="string", length=30)
     */
    private $loc_ubicacion;

    /**
     * @var float
     *
     * @ORM\Column(name="loc_ranking", type="float")
     */
    private $loc_ranking;

    /**
     * @ORM\OneToMany(targetEntity="Menu", mappedBy="local")
     */
    protected $menus;

    /**
     * @ORM\ManyToOne(targetEntity="Propietario", inversedBy="locales")
     * @ORM\JoinColumn(name="propietario_id", referencedColumnName="id")
     */
    protected $propietario;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->menus = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set loc_nombre
     *
     * @param string $locNombre
     * @return Local
     */
    public function setLocNombre($locNombre)
    {
        $this->loc_nombre = $locNombre;
    
        return $this;
    }

    /**
     * Get loc_nombre
     *
     * @return string 
     */
    public function getLocNombre()
    {
        return $this->loc_nombre;
    }

    /**
     * Set loc_ubicacion
     *
     * @param string $locUbicacion
     * @return Local
     */
    public function setLocUbicacion($locUbicacion)
    {
        $this->loc_ubicacion = $locUbicacion;
    
        return $this;
    }

    /**
     * Get loc_ubicacion
     *
     * @return string 
     */
    public function getLocUbicacion()
    {
        return $this->loc_ubicacion;
    }

    /**
     * Set loc_ranking
     *
     * @param float $locRanking
     * @return Local
     */
    public function setLocRanking($locRanking)
    {
        $this->loc_ranking = $locRanking;
    
        return $this;
    }

    /**
     * Get loc_ranking
     *
     * @return float 
     */
    public function getLocRanking()
    {
        return $this->loc_ranking;
    }

    /**
     * Add menus
     *
     * @param \MenUSACH\Bundle\BaseBundle\Entity\Menu $menus
     * @return Local
     */
    public function addMenu(\MenUSACH\Bundle\BaseBundle\Entity\Menu $menus)
    {
        $this->menus[] = $menus;
    
        return $this;
    }

    /**
     * Remove menus
     *
     * @param \MenUSACH\Bundle\BaseBundle\Entity\Menu $menus
     */
    public function removeMenu(\MenUSACH\Bundle\BaseBundle\Entity\Menu $menus)
    {
        $this->menus->removeElement($menus);
    }

    /**
     * Get menus
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMenus()
    {
        return $this->menus;
    }

    /**
     * Set propietario
     *
     * @param \MenUSACH\Bundle\BaseBundle\Entity\Propietario $propietario
     * @return Local
     */
    public function setPropietario(\MenUSACH\Bundle\BaseBundle\Entity\Propietario $propietario = null)
    {
        $this->propietario = $propietario;
    
        return $this;
    }

    /**
     * Get propietario
     *
     * @return \MenUSACH\Bundle\BaseBundle\Entity\Propietario 
     */
    public function getPropietario()
    {
        return $this->propietario;
    }
}