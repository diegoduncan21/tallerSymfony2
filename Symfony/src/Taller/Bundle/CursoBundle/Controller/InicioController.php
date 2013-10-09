<?php

namespace Taller\Bundle\CursoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class InicioController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function inicioAction()
    {
    	return array();
    }

}
