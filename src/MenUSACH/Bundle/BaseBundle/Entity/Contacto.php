<?php
namespace MenUSACH\Bundle\BaseBundle\Entity;

class Contacto
{
    protected $Nombre;

    protected $Email;

    protected $Asunto;

    protected $Comentario;

    public function getNombre()
    {
        return $this->Nombre;
    }

    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    public function getEmail()
    {
        return $this->Email;
    }

    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    public function getAsunto()
    {
        return $this->Asunto;
    }

    public function setAsunto($Asunto)
    {
        $this->Asunto = $Asunto;
    }

    public function getComentario()
    {
        return $this->Comentario;
    }

    public function setComentario($Comentario)
    {
        $this->Comentario = $Comentario;
    }
}
