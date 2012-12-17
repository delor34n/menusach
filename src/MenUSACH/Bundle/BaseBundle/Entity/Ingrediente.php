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
     * @ORM\ManyToOne(targetEntity="Categoria")
     * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
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
}