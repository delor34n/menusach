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
     *
     * @ORM\OneToMany(targetEntity="Categoria", mappedBy="ingredientes")
     *
     */
    private $categorias; 

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
     * Set categorias
     *
     * @param \MenUSACH\Bundle\BaseBundle\Entity\Categoria $categorias
     * @return Ingrediente
     */
    public function setCategorias(\MenUSACH\Bundle\BaseBundle\Entity\Categoria $categorias = null)
    {
        $this->categorias = $categorias;
    
        return $this;
    }

    /**
     * Get categorias
     *
     * @return \MenUSACH\Bundle\BaseBundle\Entity\Categoria 
     */
    public function getCategorias()
    {
        return $this->categorias;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categorias = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add categorias
     *
     * @param \MenUSACH\Bundle\BaseBundle\Entity\Categoria $categorias
     * @return Ingrediente
     */
    public function addCategoria(\MenUSACH\Bundle\BaseBundle\Entity\Categoria $categorias)
    {
        $this->categorias[] = $categorias;
    
        return $this;
    }

    /**
     * Remove categorias
     *
     * @param \MenUSACH\Bundle\BaseBundle\Entity\Categoria $categorias
     */
    public function removeCategoria(\MenUSACH\Bundle\BaseBundle\Entity\Categoria $categorias)
    {
        $this->categorias->removeElement($categorias);
    }
}