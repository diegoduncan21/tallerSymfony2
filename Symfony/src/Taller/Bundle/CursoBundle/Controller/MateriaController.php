<?php

namespace Taller\Bundle\CursoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Taller\Bundle\CursoBundle\Entity\Materia;
use Taller\Bundle\CursoBundle\Form\MateriaType;

/**
 * Materia controller.
 *
 * @Route("/materia")
 */
class MateriaController extends Controller
{

    /**
     * Lists all Materia entities.
     *
     * @Route("/", name="materia")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TallerCursoBundle:Materia')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Materia entity.
     *
     * @Route("/", name="materia_create")
     * @Method("POST")
     * @Template("TallerCursoBundle:Materia:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Materia();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('materia_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Materia entity.
    *
    * @param Materia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Materia $entity)
    {
        $form = $this->createForm(new MateriaType(), $entity, array(
            'action' => $this->generateUrl('materia_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Materia entity.
     *
     * @Route("/new", name="materia_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Materia();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Materia entity.
     *
     * @Route("/{id}", name="materia_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TallerCursoBundle:Materia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Materia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Materia entity.
     *
     * @Route("/{id}/edit", name="materia_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TallerCursoBundle:Materia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Materia entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Materia entity.
    *
    * @param Materia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Materia $entity)
    {
        $form = $this->createForm(new MateriaType(), $entity, array(
            'action' => $this->generateUrl('materia_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Materia entity.
     *
     * @Route("/{id}", name="materia_update")
     * @Method("PUT")
     * @Template("TallerCursoBundle:Materia:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TallerCursoBundle:Materia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Materia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('materia_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Materia entity.
     *
     * @Route("/{id}", name="materia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TallerCursoBundle:Materia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Materia entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('materia'));
    }

    /**
     * Creates a form to delete a Materia entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('materia_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
