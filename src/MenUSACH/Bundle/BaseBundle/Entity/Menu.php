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
}
