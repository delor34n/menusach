<?php

namespace MenUSACH\Bundle\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Local
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Local
{
    /**
     * @var integer
     *
     * @ORM\Column(name="loc_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $loc_id;

    /**
     * @var string
     *
     * @ORM\Column(name="loc_ubicacion", type="string", length=30)
     */
    private $loc_ubicacion;

    /**
     * @var float
     *
     * @ORM\Column(name="loc_ranking", type="float")
     */
    private $loc_ranking;


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
     * Set loc_ubicacion
     *
     * @param string $locUbicacion
     * @return Local
     */
    public function setLocUbicacion($locUbicacion)
    {
        $this->loc_ubicacion = $locUbicacion;
    
        return $this;
    }

    /**
     * Get loc_ubicacion
     *
     * @return string 
     */
    public function getLocUbicacion()
    {
        return $this->loc_ubicacion;
    }

    /**
     * Set loc_ranking
     *
     * @param float $locRanking
     * @return Local
     */
    public function setLocRanking($locRanking)
    {
        $this->loc_ranking = $locRanking;
    
        return $this;
    }

    /**
     * Get loc_ranking
     *
     * @return float 
     */
    public function getLocRanking()
    {
        return $this->loc_ranking;
    }
}
