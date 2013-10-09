<?php

/* TallerCursoBundle:Inicio:inicio.html.twig */
class __TwigTemplate_c117c6dd290d8c3f3a78aa01aa1b9633 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Taller";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "
\t<nav>
\t\t<ul>
\t\t\t<li>
\t\t\t\t<a href=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("alumno_create");
        echo "\">
\t                Alumno
\t            </a>
\t\t\t</li>
\t\t\t<li>
\t\t\t\t<a href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("curso_new");
        echo "\">
\t                Curso
\t            </a>
\t\t\t</li>
\t\t\t<li>
\t\t\t\t<a href=\"";
        // line 20
        echo $this->env->getExtension('routing')->getPath("materia_new");
        echo "\">
\t                Materia
\t            </a>
\t\t\t</li>
\t\t</ul>
\t</nav>

";
    }

    public function getTemplateName()
    {
        return "TallerCursoBundle:Inicio:inicio.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 20,  52 => 15,  44 => 10,  38 => 6,  35 => 5,  29 => 3,);
    }
}
