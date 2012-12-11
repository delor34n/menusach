<?php

namespace MenUSACH\Bundle\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Persona
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="per_tipo", type="integer")
 * @ORM\DiscriminatorMap({"1" = "Propietario", "2" = "Cliente", "3" = "Administrador"})
 */
class Persona //implements UserInterface
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
     * @ORM\Column(name="username", type="string", length=15)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;
        
    /**
     * @var string
     *
     * @ORM\Column(name="per_email", type="string", length=30)
     */
    private $per_email;
        
    public function __construct()
    {
        $this->persona_roles = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }
    
    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
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
     * Set username
     *
     * @param string $username
     * @return Persona
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }
}