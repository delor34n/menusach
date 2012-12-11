<?php

namespace MenUSACH\Bundle\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categoria
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Categoria
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
     * @ORM\Column(name="cat_des", type="string", length=50)
     */
    private $cat_des;

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
     *
     * @ORM\ManyToOne(targetEntity="Ingrediente", inversedBy="categorias")
     * @ORM\JoinColumn(name="ingrediente_id", referencedColumnName="id")
     *
     */
    private $ingredientes;

    /**
     * Set cat_des
     *
     * @param string $catDes
     * @return Categoria
     */
    public function setCatDes($catDes)
    {
        $this->cat_des = $catDes;
    
        return $this;
    }

    /**
     * Get cat_des
     *
     * @return string 
     */
    public function getCatDes()
    {
        return $this->cat_des;
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
     * @return Categoria
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

    public function __toString()
    {
        return strval($this->id);
    }
}