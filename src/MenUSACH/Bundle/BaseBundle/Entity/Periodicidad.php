<?php

namespace MenUSACH\Bundle\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MenUSACH\Bundle\BaseBundle\Entity\Periodicidad
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Periodicidad
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
     * @var integer $id_menu
     *
     * @ORM\Column(name="id_menu", type="integer")
     */
    private $id_menu;

    /**
     * @var integer $dia_menu
     *
     * @ORM\Column(name="dia_menu", type="integer")
     */
    private $dia_menu;


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
     * Set id_menu
     *
     * @param integer $idMenu
     * @return Periodicidad
     */
    public function setIdMenu($idMenu)
    {
        $this->id_menu = $idMenu;
    
        return $this;
    }

    /**
     * Get id_menu
     *
     * @return integer 
     */
    public function getIdMenu()
    {
        return $this->id_menu;
    }

    /**
     * Set dia_menu
     *
     * @param integer $diaMenu
     * @return Periodicidad
     */
    public function setDiaMenu($diaMenu)
    {
        $this->dia_menu = $diaMenu;
    
        return $this;
    }

    /**
     * Get dia_menu
     *
     * @return integer 
     */
    public function getDiaMenu()
    {
        return $this->dia_menu;
    }
}