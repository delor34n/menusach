<?php

namespace MenUSACH\Bundle\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ingrediente
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Ingrediente
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
     * @ORM\Column(name="ing_nombre", type="string", length=20)
     */
    private $ing_nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="ing_categoria", type="string", length=15)
     */
    private $ing_categoria;

    /**
     * @ORM\ManyToOne(targetEntity="Menu", inversedBy="ingredientes")
     * @ORM\JoinColumn(name="menu_id", referencedColumnName="id")
     */
    protected $menu;

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
     * Set ing_nombre
     *
     * @param string $ingNombre
     * @return Ingrediente
     */
    public function setIngNombre($ingNombre)
    {
        $this->ing_nombre = $ingNombre;
    
        return $this;
    }

    /**
     * Get ing_nombre
     *
     * @return string 
     */
    public function getIngNombre()
    {
        return $this->ing_nombre;
    }

    /**
     * Set ing_categoria
     *
     * @param string $ingCategoria
     * @return Ingrediente
     */
    public function setIngCategoria($ingCategoria)
    {
        $this->ing_categoria = $ingCategoria;
    
        return $this;
    }

    /**
     * Get ing_categoria
     *
     * @return string 
     */
    public function getIngCategoria()
    {
        return $this->ing_categoria;
    }

    /**
     * Set menu
     *
     * @param \MenUSACH\Bundle\BaseBundle\Entity\Menu $menu
     * @return Ingrediente
     */
    public function setMenu(\MenUSACH\Bundle\BaseBundle\Entity\Menu $menu = null)
    {
        $this->menu = $menu;
    
        return $this;
    }

    /**
     * Get menu
     *
     * @return \MenUSACH\Bundle\BaseBundle\Entity\Menu 
     */
    public function getMenu()
    {
        return $this->menu;
    }
}