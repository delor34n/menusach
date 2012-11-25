<?php

namespace MenUSACH\Bundle\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Menu
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
     * @ORM\Column(name="men_nombre", type="string", length=30)
     */
    private $men_nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="men_precio", type="integer")
     */
    private $men_precio;

    /**
     * @ORM\ManyToOne(targetEntity="Local", inversedBy="menus")
     * @ORM\JoinColumn(name="local_id", referencedColumnName="id")
     */
    protected $local;

    /**
     * @ORM\OneToMany(targetEntity="Ingrediente", mappedBy="menu")
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
     * Set local
     *
     * @param \MenUSACH\Bundle\BaseBundle\Entity\Local $local
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
     * @return \MenUSACH\Bundle\BaseBundle\Entity\Local 
     */
    public function getLocal()
    {
        return $this->local;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ingredientes = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add ingredientes
     *
     * @param \MenUSACH\Bundle\BaseBundle\Entity\Ingrediente $ingredientes
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
     * @param \MenUSACH\Bundle\BaseBundle\Entity\Ingrediente $ingredientes
     */
    public function removeIngrediente(\MenUSACH\Bundle\BaseBundle\Entity\Ingrediente $ingredientes)
    {
        $this->ingredientes->removeElement($ingredientes);
    }

    /**
     * Get ingredientes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIngredientes()
    {
        return $this->ingredientes;
    }
}