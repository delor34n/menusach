<?php

namespace MenUSACH\Bundle\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Persona
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="per_tipo", type="integer")
 * @ORM\DiscriminatorMap({"1" = "Propietario", "2" = "Cliente", "3" = "Administrador"})
 */
class Persona
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
     * @ORM\Column(name="per_nombre", type="string", length=30)
     */
    private $per_nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="per_apellido_paterno", type="string", length=15)
     */
    private $per_apellido_paterno;

    /**
     * @var string
     *
     * @ORM\Column(name="per_apellido_materno", type="string", length=15)
     */
    private $per_apellido_materno;

    /**
     * @var string
     *
     * @ORM\Column(name="per_usuario", type="string", length=15)
     */
    private $per_usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="per_password", type="string", length=30)
     */
    private $per_password;

    /**
     * @var string
     *
     * @ORM\Column(name="per_email", type="string", length=30)
     */
    private $per_email;


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
     * Set per_nombre
     *
     * @param string $perNombre
     * @return Persona
     */
    public function setPerNombre($perNombre)
    {
        $this->per_nombre = $perNombre;
    
        return $this;
    }

    /**
     * Get per_nombre
     *
     * @return string 
     */
    public function getPerNombre()
    {
        return $this->per_nombre;
    }

    /**
     * Set per_apellido_paterno
     *
     * @param string $perApellidoPaterno
     * @return Persona
     */
    public function setPerApellidoPaterno($perApellidoPaterno)
    {
        $this->per_apellido_paterno = $perApellidoPaterno;
    
        return $this;
    }

    /**
     * Get per_apellido_paterno
     *
     * @return string 
     */
    public function getPerApellidoPaterno()
    {
        return $this->per_apellido_paterno;
    }

    /**
     * Set per_apellido_materno
     *
     * @param string $perApellidoMaterno
     * @return Persona
     */
    public function setPerApellidoMaterno($perApellidoMaterno)
    {
        $this->per_apellido_materno = $perApellidoMaterno;
    
        return $this;
    }

    /**
     * Get per_apellido_materno
     *
     * @return string 
     */
    public function getPerApellidoMaterno()
    {
        return $this->per_apellido_materno;
    }

    /**
     * Set per_usuario
     *
     * @param string $perUsuario
     * @return Persona
     */
    public function setPerUsuario($perUsuario)
    {
        $this->per_usuario = $perUsuario;
    
        return $this;
    }

    /**
     * Get per_usuario
     *
     * @return string 
     */
    public function getPerUsuario()
    {
        return $this->per_usuario;
    }

    /**
     * Set per_password
     *
     * @param string $perPassword
     * @return Persona
     */
    public function setPerPassword($perPassword)
    {
        $this->per_password = $perPassword;
    
        return $this;
    }

    /**
     * Get per_password
     *
     * @return string 
     */
    public function getPerPassword()
    {
        return $this->per_password;
    }

    /**
     * Set per_email
     *
     * @param string $perEmail
     * @return Persona
     */
    public function setPerEmail($perEmail)
    {
        $this->per_email = $perEmail;
    
        return $this;
    }

    /**
     * Get per_email
     *
     * @return string 
     */
    public function getPerEmail()
    {
        return $this->per_email;
    }
}