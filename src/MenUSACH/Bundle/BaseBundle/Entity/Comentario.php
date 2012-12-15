<?php

namespace MenUSACH\Bundle\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comentario
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Comentario
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
     * @ORM\Column(name="com_nombre", type="string", length=255)
     */
    private $com_nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="com_descripcion", type="string", length=255)
     */
    private $com_descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="com_fecha", type="date")
     */
    private $com_fecha;

    /**
     * @ORM\ManyToOne(targetEntity="Menu", inversedBy="comentarios")
     * @ORM\JoinColumn(name="men_id", referencedColumnName="id")
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
     * Set com_descripcion
     *
     * @param string $comDescripcion
     * @return Comentario
     */
    public function setComDescripcion($comDescripcion)
    {
        $this->com_descripcion = $comDescripcion;

        return $this;
    }

    /**
     * Get com_descripcion
     *
     * @return string
     */
    public function getComDescripcion()
    {
        return $this->com_descripcion;
    }

    /**
     * Set com_fecha
     *
     * @param \DateTime $comFecha
     * @return Comentario
     */
    public function setComFecha($comFecha)
    {
        $this->com_fecha = $comFecha;

        return $this;
    }

    /**
     * Get com_fecha
     *
     * @return \DateTime
     */
    public function getComFecha()
    {
        return $this->com_fecha;
    }

    /**
     * Set menu
     *
     * @param \MenUSACH\Bundle\BaseBundle\Entity\Menu $menu
     * @return Comentario
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

    /**
     * Set com_nombre
     *
     * @param string $comNombre
     * @return Comentario
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
}