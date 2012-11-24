<?php

namespace MenUSACH\Bundle\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comida
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Comida
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
     * @ORM\Column(name="com_nombre", type="string", length=50)
     */
    private $com_nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="com_categoria", type="string", length=15)
     */
    private $com_categoria;

    /**
     * @var integer
     *
     * @ORM\Column(name="com_precio", type="integer")
     */
    private $com_precio;

    /**
     * @var float
     *
     * @ORM\Column(name="com_ranking", type="float")
     */
    private $com_ranking;


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
     * Set com_nombre
     *
     * @param string $comNombre
     * @return Comida
     */
    public function setComNombre($comNombre)
    {
        $this->com_nombre = $comNombre;
    
        return $this;
    }

    /**
     * Get com_nombre
     *
     * @return string 
     */
    public function getComNombre()
    {
        return $this->com_nombre;
    }

    /**
     * Set com_categoria
     *
     * @param string $comCategoria
     * @return Comida
     */
    public function setComCategoria($comCategoria)
    {
        $this->com_categoria = $comCategoria;
    
        return $this;
    }

    /**
     * Get com_categoria
     *
     * @return string 
     */
    public function getComCategoria()
    {
        return $this->com_categoria;
    }

    /**
     * Set com_precio
     *
     * @param integer $comPrecio
     * @return Comida
     */
    public function setComPrecio($comPrecio)
    {
        $this->com_precio = $comPrecio;
    
        return $this;
    }

    /**
     * Get com_precio
     *
     * @return integer 
     */
    public function getComPrecio()
    {
        return $this->com_precio;
    }

    /**
     * Set com_ranking
     *
     * @param float $comRanking
     * @return Comida
     */
    public function setComRanking($comRanking)
    {
        $this->com_ranking = $comRanking;
    
        return $this;
    }

    /**
     * Get com_ranking
     *
     * @return float 
     */
    public function getComRanking()
    {
        return $this->com_ranking;
    }
}
