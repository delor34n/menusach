<?php

namespace MenUSACH\Bundle\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\Type(
     *  type="string",
     *  message="El valor {{ value }} no es un valor string válido."
     * )
     */
    private $men_nombre;

    /**
     * @var integer $men_precio
     *
     * @ORM\Column(name="men_precio", type="integer")
     *
     */
    private $men_precio;

   /**
     * @var integer $men_like
     *
     * @ORM\Column(name="men_like", type="integer")
     *
     */
    private $men_like;

   /**
     * @var integer $men_dislike
     *
     * @ORM\Column(name="men_dislike", type="integer")
     *
     */
    private $men_dislike;

    /**
     * @var boolean $men_activo
     *
     * @ORM\Column(name="men_activo", type="boolean")
     */
    private $men_activo;

    /**
     * @var integer $men_frecuencia
     *
     * @ORM\Column(name="men_frecuencia", type="boolean")
     * La frecuencia con 0 sera un dia y con 1 sera una fecha en especifico
     */
    private $men_frecuencia;

    /**
     * @var \DateTime $men_fecha
     *
     * @ORM\Column(name="men_fecha", type="date", nullable=true)
     */
    private $men_fecha;

    /**
     * @ORM\ManyToOne(targetEntity="Local", inversedBy="menus")
     * @ORM\JoinColumn(name="local_id", referencedColumnName="id")
     */
     protected $local;

    /**
     * @ORM\OneToMany(targetEntity="Comentario", mappedBy="menu")
     */
     protected $comentarios;


    /**
     * @ORM\ManyToMany(targetEntity="Ingrediente")
	 * @ORM\JoinTable(name="MenuIngrediente",
	 * joinColumns={@ORM\JoinColumn(name="menu_id", referencedColumnName="id")},
	 * inverseJoinColumns={@ORM\JoinColumn(name="ingrediente_id", referencedColumnName="id")}
	 * )
     */
    protected $ingredientes;
    /**
     * Constructor
     */
    public function __construct()
    {
		$this->ingredientes = new \Doctrine\Common\Collections\ArrayCollection();
		$this->men_like = 0;
		$this->men_dislike = 0;
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
     * @param integer $menFrecuencia
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
     * @return integer 
     */
    public function getMenFrecuencia()
    {
        return $this->men_frecuencia;
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

    /**
     * Set men_fecha
     *
     * @param \DateTime $menFecha
     * @return Menu
     */
    public function setMenFecha($menFecha)
    {
        $this->men_fecha = $menFecha;
    
        return $this;
    }

    /**
     * Get men_fecha
     *
     * @return \DateTime 
     */
    public function getMenFecha()
    {
        return $this->men_fecha;
    }

    /**
     * Add comentarios
     *
     * @param \MenUSACH\Bundle\BaseBundle\Entity\Comentario $comentarios
     * @return Menu
     */
    public function addComentario(\MenUSACH\Bundle\BaseBundle\Entity\Comentario $comentarios)
    {
        $this->comentarios[] = $comentarios;
    
        return $this;
    }

    /**
     * Remove comentarios
     *
     * @param \MenUSACH\Bundle\BaseBundle\Entity\Comentario $comentarios
     */
    public function removeComentario(\MenUSACH\Bundle\BaseBundle\Entity\Comentario $comentarios)
    {
        $this->comentarios->removeElement($comentarios);
    }

    /**
     * Get comentarios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }

    /**
     * Set men_like
     *
     * @param integer $menLike
     * @return Menu
     */
    public function setMenLike($menLike)
    {
        $this->men_like = $menLike;
    
        return $this;
    }

    /**
     * Get men_like
     *
     * @return integer 
     */
    public function getMenLike()
    {
        return $this->men_like;
    }

    /**
     * Set men_dislike
     *
     * @param integer $menDislike
     * @return Menu
     */
    public function setMenDislike($menDislike)
    {
        $this->men_dislike = $menDislike;
    
        return $this;
    }

    /**
     * Get men_dislike
     *
     * @return integer 
     */
    public function getMenDislike()
    {
        return $this->men_dislike;
    }
}
