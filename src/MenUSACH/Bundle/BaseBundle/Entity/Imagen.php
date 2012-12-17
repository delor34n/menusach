<?php

namespace MenUSACH\Bundle\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Imagen
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
    
    /**
     * @Assert\File(maxSize="6000000")
     */
    public $file;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;

    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // la ruta absoluta del directorio donde se deben guardar los archivos cargados
        return __DIR__.'/MenUSACH/Bundle/BaseBundle/Resources/public/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // se libra del __DIR__ para no desviarse al mostrar `doc/image` en la vista.
        return 'img/';
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
     * Set path
     *
     * @param string $path
     * @return Imagen
     */
    public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }
}