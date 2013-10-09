<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/alumno')) {
            // alumno
            if (rtrim($pathinfo, '/') === '/alumno') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_alumno;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'alumno');
                }

                return array (  '_controller' => 'Taller\\Bundle\\CursoBundle\\Controller\\AlumnoController::indexAction',  '_route' => 'alumno',);
            }
            not_alumno:

            // alumno_create
            if ($pathinfo === '/alumno/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_alumno_create;
                }

                return array (  '_controller' => 'Taller\\Bundle\\CursoBundle\\Controller\\AlumnoController::createAction',  '_route' => 'alumno_create',);
            }
            not_alumno_create:

            // alumno_new
            if ($pathinfo === '/alumno/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_alumno_new;
                }

                return array (  '_controller' => 'Taller\\Bundle\\CursoBundle\\Controller\\AlumnoController::newAction',  '_route' => 'alumno_new',);
            }
            not_alumno_new:

            // alumno_show
            if (preg_match('#^/alumno/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_alumno_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'alumno_show')), array (  '_controller' => 'Taller\\Bundle\\CursoBundle\\Controller\\AlumnoController::showAction',));
            }
            not_alumno_show:

            // alumno_edit
            if (preg_match('#^/alumno/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_alumno_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'alumno_edit')), array (  '_controller' => 'Taller\\Bundle\\CursoBundle\\Controller\\AlumnoController::editAction',));
            }
            not_alumno_edit:

            // alumno_update
            if (preg_match('#^/alumno/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_alumno_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'alumno_update')), array (  '_controller' => 'Taller\\Bundle\\CursoBundle\\Controller\\AlumnoController::updateAction',));
            }
            not_alumno_update:

            // alumno_delete
            if (preg_match('#^/alumno/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_alumno_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'alumno_delete')), array (  '_controller' => 'Taller\\Bundle\\CursoBundle\\Controller\\AlumnoController::deleteAction',));
            }
            not_alumno_delete:

        }

        if (0 === strpos($pathinfo, '/curso')) {
            // curso
            if (rtrim($pathinfo, '/') === '/curso') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_curso;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'curso');
                }

                return array (  '_controller' => 'Taller\\Bundle\\CursoBundle\\Controller\\CursoController::indexAction',  '_route' => 'curso',);
            }
            not_curso:

            // curso_create
            if ($pathinfo === '/curso/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_curso_create;
                }

                return array (  '_controller' => 'Taller\\Bundle\\CursoBundle\\Controller\\CursoController::createAction',  '_route' => 'curso_create',);
            }
            not_curso_create:

            // curso_new
            if ($pathinfo === '/curso/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_curso_new;
                }

                return array (  '_controller' => 'Taller\\Bundle\\CursoBundle\\Controller\\CursoController::newAction',  '_route' => 'curso_new',);
            }
            not_curso_new:

            // curso_show
            if (preg_match('#^/curso/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_curso_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'curso_show')), array (  '_controller' => 'Taller\\Bundle\\CursoBundle\\Controller\\CursoController::showAction',));
            }
            not_curso_show:

            // curso_edit
            if (preg_match('#^/curso/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_curso_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'curso_edit')), array (  '_controller' => 'Taller\\Bundle\\CursoBundle\\Controller\\CursoController::editAction',));
            }
            not_curso_edit:

            // curso_update
            if (preg_match('#^/curso/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_curso_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'curso_update')), array (  '_controller' => 'Taller\\Bundle\\CursoBundle\\Controller\\CursoController::updateAction',));
            }
            not_curso_update:

            // curso_delete
            if (preg_match('#^/curso/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_curso_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'curso_delete')), array (  '_controller' => 'Taller\\Bundle\\CursoBundle\\Controller\\CursoController::deleteAction',));
            }
            not_curso_delete:

        }

        // taller_curso_inicio_inicio
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'taller_curso_inicio_inicio');
            }

            return array (  '_controller' => 'Taller\\Bundle\\CursoBundle\\Controller\\InicioController::inicioAction',  '_route' => 'taller_curso_inicio_inicio',);
        }

        if (0 === strpos($pathinfo, '/materia')) {
            // materia
            if (rtrim($pathinfo, '/') === '/materia') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_materia;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'materia');
                }

                return array (  '_controller' => 'Taller\\Bundle\\CursoBundle\\Controller\\MateriaController::indexAction',  '_route' => 'materia',);
            }
            not_materia:

            // materia_create
            if ($pathinfo === '/materia/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_materia_create;
                }

                return array (  '_controller' => 'Taller\\Bundle\\CursoBundle\\Controller\\MateriaController::createAction',  '_route' => 'materia_create',);
            }
            not_materia_create:

            // materia_new
            if ($pathinfo === '/materia/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_materia_new;
                }

                return array (  '_controller' => 'Taller\\Bundle\\CursoBundle\\Controller\\MateriaController::newAction',  '_route' => 'materia_new',);
            }
            not_materia_new:

            // materia_show
            if (preg_match('#^/materia/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_materia_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'materia_show')), array (  '_controller' => 'Taller\\Bundle\\CursoBundle\\Controller\\MateriaController::showAction',));
            }
            not_materia_show:

            // materia_edit
            if (preg_match('#^/materia/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_materia_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'materia_edit')), array (  '_controller' => 'Taller\\Bundle\\CursoBundle\\Controller\\MateriaController::editAction',));
            }
            not_materia_edit:

            // materia_update
            if (preg_match('#^/materia/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_materia_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'materia_update')), array (  '_controller' => 'Taller\\Bundle\\CursoBundle\\Controller\\MateriaController::updateAction',));
            }
            not_materia_update:

            // materia_delete
            if (preg_match('#^/materia/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_materia_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'materia_delete')), array (  '_controller' => 'Taller\\Bundle\\CursoBundle\\Controller\\MateriaController::deleteAction',));
            }
            not_materia_delete:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
