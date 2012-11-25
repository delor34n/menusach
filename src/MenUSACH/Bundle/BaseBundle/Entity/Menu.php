<?php

namespace MenUSACH\Bundle\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MenUSACH\Bundle\BaseBundle\Entity\Menu
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Menu
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $men_nombre
     *
     * @ORM\Column(name="men_nombre", type="string", length=30)
     */
    private $men_nombre;

    /**
     * @var integer $men_precio
     *
     * @ORM\Column(name="men_precio", type="integer")
     */
    private $men_precio;

    /**
     * @var boolean $men_activo
     *
     * @ORM\Column(name="men_activo", type="boolean")
     */
    private $men_activo;

    /**
     * @var integer $men_frecuencia
     *
     * @ORM\Column(name="men_frecuencia", type="integer")
     */
    private $men_frecuencia;
    
    /**
     * @var \DateTime $men_fecha_inicio
     *
     * @ORM\Column(name="men_fecha_inicio", type="date")
     */
    private $men_fecha_inicio;
        
    /**
     * @var \DateTime $men_fecha_termino
     *
     * @ORM\Column(name="men_fecha_termino", type="date")
     */
    private $men_fecha_termino;

    /**
     * @ORM\ManyToOne(targetEntity="Local", inversedBy="menus")
     * @ORM\JoinColumn(name="local_id", referencedColumnName="id")
     */
     protected $local;

    /**
     * @ORM\ManyToMany(targetEntity="Ingrediente", inversedBy="menus")
     * @ORM\JoinTable(name="MenuIngrediente")
     */

    protected $ingredientes;


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
     * Set men_nombre
     *
     * @param string $menNombre
     * @return Menu
     */
    public function setMenNombre($menNombre)
    {
        $this->men_nombre = $menNombre;
    
        return $this;
    }

    /**
     * Get men_nombre
     *
     * @return string 
     */
    public function getMenNombre()
    {
        return $this->men_nombre;
    }

    /**
     * Set men_precio
     *
     * @param integer $menPrecio
     * @return Menu
     */
    public function setMenPrecio($menPrecio)
    {
        $this->men_precio = $menPrecio;
    
        return $this;
    }

    /**
     * Get men_precio
     *
     * @return integer 
     */
    public function getMenPrecio()
    {
        return $this->men_precio;
    }

    /**
     * Set men_activo
     *
     * @param boolean $menActivo
     * @return Menu
     */
    public function setMenActivo($menActivo)
    {
        $this->men_activo = $menActivo;
    
        return $this;
    }

    /**
     * Get men_activo
     *
     * @return boolean 
     */
    public function getMenActivo()
    {
        return $this->men_activo;
    }

    /**
     * Set men_frecuencia
     *
     * @param boolean $menFrecuencia
     * @return Menu
     */
    public function setMenFrecuencia($menFrecuencia)
    {
        $this->men_frecuencia = $menFrecuencia;
    
        return $this;
    }

    /**
     * Get men_frecuencia
     *
     * @return boolean 
     */
    public function getMenFrecuencia()
    {
        return $this->men_frecuencia;
    }

    /**
     * Set men_fechain
     *
     * @param \DateTime $menFechain
     * @return Menu
     */
    public function setMenFechain($menFechain)
    {
        $this->men_fechain = $menFechain;
    
        return $this;
    }

    /**
     * Get men_fechain
     *
     * @return \DateTime 
     */
    public function getMenFechain()
    {
        return $this->men_fechain;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ingredientes = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set local
     *
     * @param MenUSACH\Bundle\BaseBundle\Entity\Local $local
     * @return Menu
     */
    public function setLocal(\MenUSACH\Bundle\BaseBundle\Entity\Local $local = null)
    {
        $this->local = $local;
    
        return $this;
    }

    /**
     * Get local
     *
     * @return MenUSACH\Bundle\BaseBundle\Entity\Local 
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * Add ingredientes
     *
     * @param MenUSACH\Bundle\BaseBundle\Entity\Ingrediente $ingredientes
     * @return Menu
     */
    public function addIngrediente(\MenUSACH\Bundle\BaseBundle\Entity\Ingrediente $ingredientes)
    {
        $this->ingredientes[] = $ingredientes;
    
        return $this;
    }

    /**
     * Remove ingredientes
     *
     * @param MenUSACH\Bundle\BaseBundle\Entity\Ingrediente $ingredientes
     */
    public function removeIngrediente(\MenUSACH\Bundle\BaseBundle\Entity\Ingrediente $ingredientes)
    {
        $this->ingredientes->removeElement($ingredientes);
    }

    /**
     * Get ingredientes
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getIngredientes()
    {
        return $this->ingredientes;
    }

    /**
     * Set men_fecha_inicio
     *
     * @param \DateTime $menFechaInicio
     * @return Menu
     */
    public function setMenFechaInicio($menFechaInicio)
    {
        $this->men_fecha_inicio = $menFechaInicio;
    
        return $this;
    }

    /**
     * Get men_fecha_inicio
     *
     * @return \DateTime 
     */
    public function getMenFechaInicio()
    {
        return $this->men_fecha_inicio;
    }

    /**
     * Set men_fecha_termino
     *
     * @param \DateTime $menFechaTermino
     * @return Menu
     */
    public function setMenFechaTermino($menFechaTermino)
    {
        $this->men_fecha_termino = $menFechaTermino;
    
        return $this;
    }

    /**
     * Get men_fecha_termino
     *
     * @return \DateTime 
     */
    public function getMenFechaTermino()
    {
        return $this->men_fecha_termino;
    }
}