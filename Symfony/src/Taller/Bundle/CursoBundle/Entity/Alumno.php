<?php

namespace Taller\Bundle\CursoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alumno
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Taller\Bundle\CursoBundle\Entity\AlumnoRepository")
 */
class Alumno
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
     * @ORM\Column(name="nombre", type="string", length=40)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=40)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="dni", type="string", length=8)
     */
    private $dni;


    /**
     * @ORM\ManyToMany(targetEntity="Curso", mappedBy="cursos")
     */
    private $cursos;


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
     * Set nombre
     *
     * @param string $nombre
     * @return Alumno
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     * @return Alumno
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    
        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set dni
     *
     * @param string $dni
     * @return Alumno
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    
        return $this;
    }

    /**
     * Get dni
     *
     * @return string 
     */
    public function getDni()
    {
        return $this->dni;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cursos = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add cursos
     *
     * @param \Taller\Bundle\CursoBundle\Entity\Alumno $cursos
     * @return Alumno
     */
    public function addCurso(\Taller\Bundle\CursoBundle\Entity\Alumno $cursos)
    {
        $this->cursos[] = $cursos;
    
        return $this;
    }

    /**
     * Remove cursos
     *
     * @param \Taller\Bundle\CursoBundle\Entity\Alumno $cursos
     */
    public function removeCurso(\Taller\Bundle\CursoBundle\Entity\Alumno $cursos)
    {
        $this->cursos->removeElement($cursos);
    }

    /**
     * Get cursos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCursos()
    {
        return $this->cursos;
    }

    public function __toString()
    {
        return (string)$this->dni;
    }
}