<?php

namespace Taller\Bundle\CursoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Curso
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Taller\Bundle\CursoBundle\Entity\CursoRepository")
 */
class Curso
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
     * @ORM\ManyToMany(targetEntity="Alumno", inversedBy="cursos")
     * @ORM\JoinTable(name="cursos_Alumno",
     *      joinColumns={@ORM\JoinColumn(name="curso_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="alumno_id", referencedColumnName="id")}
     *      )
     */
    private $alumnos;

    /**
     * @ORM\OneToMany(targetEntity="Curso", mappedBy="curso")
     */
    protected $materias;

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
     * @return Curso
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
     * Set materia
     *
     * @param \Taller\Bundle\CursoBundle\Entity\Materia $materia
     * @return Curso
     */
    public function setMateria(\Taller\Bundle\CursoBundle\Entity\Materia $materia = null)
    {
        $this->materia = $materia;
    
        return $this;
    }

    /**
     * Get materia
     *
     * @return \Taller\Bundle\CursoBundle\Entity\Materia 
     */
    public function getMateria()
    {
        return $this->materia;
    }

    /**
     * Set alumno
     *
     * @param \Taller\Bundle\CursoBundle\Entity\Alumno $alumno
     * @return Curso
     */
    public function setAlumno(\Taller\Bundle\CursoBundle\Entity\Alumno $alumno = null)
    {
        $this->alumno = $alumno;
    
        return $this;
    }

    /**
     * Get alumno
     *
     * @return \Taller\Bundle\CursoBundle\Entity\Alumno 
     */
    public function getAlumno()
    {
        return $this->alumno;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->alumnos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->materias = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add alumnos
     *
     * @param \Taller\Bundle\CursoBundle\Entity\Alumno $alumnos
     * @return Curso
     */
    public function addAlumno(\Taller\Bundle\CursoBundle\Entity\Alumno $alumnos)
    {
        $this->alumnos[] = $alumnos;
    
        return $this;
    }

    /**
     * Remove alumnos
     *
     * @param \Taller\Bundle\CursoBundle\Entity\Alumno $alumnos
     */
    public function removeAlumno(\Taller\Bundle\CursoBundle\Entity\Alumno $alumnos)
    {
        $this->alumnos->removeElement($alumnos);
    }

    /**
     * Get alumnos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAlumnos()
    {
        return $this->alumnos;
    }

    /**
     * Add materias
     *
     * @param \Taller\Bundle\CursoBundle\Entity\Curso $materias
     * @return Curso
     */
    public function addMateria(\Taller\Bundle\CursoBundle\Entity\Curso $materias)
    {
        $this->materias[] = $materias;
    
        return $this;
    }

    /**
     * Remove materias
     *
     * @param \Taller\Bundle\CursoBundle\Entity\Curso $materias
     */
    public function removeMateria(\Taller\Bundle\CursoBundle\Entity\Curso $materias)
    {
        $this->materias->removeElement($materias);
    }

    /**
     * Get materias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMaterias()
    {
        return $this->materias;
    }

    public function __toString()
    {
        return (string)$this->nombre;
    }
}