<?php

namespace Taller\Bundle\CursoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Materia
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Taller\Bundle\CursoBundle\Entity\MateriaRepository")
 */
class Materia
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
     * @ORM\Column(name="nombre", type="string", length=30)
     */
    private $nombre;

    /**
     * @ORM\ManyToOne(targetEntity="Curso", inversedBy="materias")
     * @ORM\JoinColumn(name="curso_id", referencedColumnName="id")
     */
    protected $curso;


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
     * @return Materia
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
     * Constructor
     */
    public function __construct()
    {
        $this->cursos = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add cursos
     *
     * @param \Taller\Bundle\CursoBundle\Entity\Materia $cursos
     * @return Materia
     */
    public function addCurso(\Taller\Bundle\CursoBundle\Entity\Materia $cursos)
    {
        $this->cursos[] = $cursos;
    
        return $this;
    }

    /**
     * Remove cursos
     *
     * @param \Taller\Bundle\CursoBundle\Entity\Materia $cursos
     */
    public function removeCurso(\Taller\Bundle\CursoBundle\Entity\Materia $cursos)
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

    /**
     * Set curso
     *
     * @param \Taller\Bundle\CursoBundle\Entity\Curso $curso
     * @return Materia
     */
    public function setCurso(\Taller\Bundle\CursoBundle\Entity\Curso $curso = null)
    {
        $this->curso = $curso;
    
        return $this;
    }

    /**
     * Get curso
     *
     * @return \Taller\Bundle\CursoBundle\Entity\Curso 
     */
    public function getCurso()
    {
        return $this->curso;
    }

    public function __toString()
    {
        return (string)$this->nombre;
    }
}