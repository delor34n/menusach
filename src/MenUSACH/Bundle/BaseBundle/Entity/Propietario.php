<?php

namespace MenUSACH\Bundle\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Propietario
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Propietario extends \MenUSACH\Bundle\BaseBundle\Entity\Persona implements UserInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pro_fono", type="integer")
     */
    private $pro_fono;

    /**
     * @ORM\OneToMany(targetEntity="Local", mappedBy="propietario")
     */
    protected $locales;
    
    /**
     * Set pro_fono
     *
     * @param integer $proFono
     * @return Propietario
     */
    public function setProFono($proFono)
    {
        $this->pro_fono = $proFono;
    
        return $this;
    }
    
    /**
     * @ORM\Column(name="salt", type="string", length=255)
     */
    private $salt;
    
    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * Get pro_fono
     *
     * @return integer 
     */
    public function getProFono()
    {
        return $this->pro_fono;
    }
    
    /**
     * se utilizó user_roles para no hacer conflicto al aplicar ->toArray en getRoles()
     * @ORM\ManyToMany(targetEntity="Role")
     * @ORM\JoinTable(name="propietario_role",
     *     joinColumns={@ORM\JoinColumn(name="persona_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")}
     * )
     */
    private  $propietario_roles;
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->isActive = true;
        $this->salt = md5(uniqid(null, true));
        $this->locales = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add locales
     *
     * @param \MenUSACH\Bundle\BaseBundle\Entity\Local $locales
     * @return Propietario
     */
    public function addLocale(\MenUSACH\Bundle\BaseBundle\Entity\Local $locales)
    {
        $this->locales[] = $locales;
    
        return $this;
    }

    /**
     * Remove locales
     *
     * @param \MenUSACH\Bundle\BaseBundle\Entity\Local $locales
     */
    public function removeLocale(\MenUSACH\Bundle\BaseBundle\Entity\Local $locales)
    {
        $this->locales->removeElement($locales);
    }

    /**
     * Get locales
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLocales()
    {
        return $this->locales;
    }

    public function getNombreCompleto() {
        return $this->getPerNombre() . " " . $this->getPerApellidoPaterno() . " " . $this->getPerApellidoMaterno();
    }
    
    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }
        
    /**
     * Set salt
     *
     * @param string $salt
     * @return Persona
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }
    
    public function eraseCredentials() {
        
    }

    /**
     * Get roles
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getRoles()
    {
        $roles = array();
        foreach ($this->propietario_roles as $role) {
            $roles[] = $role->getRole();
        }
        return $roles;
    }

    /*
    public function getRoles()
    {
        return $this->propietario_roles->toArray(); //IMPORTANTE: el mecanismo de seguridad de Sf2 requiere ésto como un array
    }*/
    
    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Persona
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    
        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Add propietario_roles
     *
     * @param \MenUSACH\Bundle\BaseBundle\Entity\Role $propietarioRoles
     * @return Propietario
     */
    public function addPropietarioRole(\MenUSACH\Bundle\BaseBundle\Entity\Role $propietarioRoles)
    {
        $this->propietario_roles[] = $propietarioRoles;
    
        return $this;
    }

    /**
     * Remove propietario_roles
     *
     * @param \MenUSACH\Bundle\BaseBundle\Entity\Role $propietarioRoles
     */
    public function removePropietarioRole(\MenUSACH\Bundle\BaseBundle\Entity\Role $propietarioRoles)
    {
        $this->propietario_roles->removeElement($propietarioRoles);
    }

    /**
     * Get propietario_roles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPropietarioRoles()
    {
        return $this->propietario_roles;
    }
}
