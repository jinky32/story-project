<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Child;
use AppBundle\Form\ChildType;

/**
 * Child controller.
 *
 * @Route("/profile/{parentName}/{childName}")
 */
class ChildController extends Controller
{

    /**
     * Lists all Child entities.
     *
     * @Route("/all", name="child")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Child')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Child entity.
     *
     * @Route("/", name="child_create")
     * @Method("POST")
     * @Template("AppBundle:Child:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Child();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('child_show', array('parentName' =>$this->getUser()->getUsername(), 'childName' => $entity->getName())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Child entity.
     *
     * @param Child $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Child $entity)
    {
        $form = $this->createForm(new ChildType(), $entity, array(
            'action' => $this->generateUrl('child_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Child entity.
     *
     * @Route("/new", name="child_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Child();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Child entity.
     *
     * @Route("/", name="child_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($childName)
    {
        //TODO update the show, edit, update and delete action so that we can use childs name in URL rather than ID.  Need ot use parent name or some unique ID so chlidren with smae name arent deleted? Or use a redirect?
//        $name ="Samanta Weimann";
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBundle:Child')->findOneByName($childName);
//        dump($test);
//        $entity = $em->getRepository('AppBundle:Child')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Child entity.');
        }

        $deleteForm = $this->createDeleteForm($childName);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Child entity.
     *
     * @Route("/edit", name="child_edit")
     * @Method("GET")
     * @Template()
     */

    public function editAction($childName)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Child')->findOneByName($childName);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Child entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($childName);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Child entity.
    *
    * @param Child $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Child $entity)
    {
//        $parentName ="John";
//        $parentName = $entity->getParent()->getUsername();
        $form = $this->createForm(new ChildType(), $entity, array(
            'action' => $this->generateUrl('child_update', array('parentName' =>$this->getUser()->getUsername(),'childName' => $entity->getName())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Child entity.
     *
     * @Route("/", name="child_update")
     * @Method("PUT")
     * @Template("AppBundle:Child:edit.html.twig")
     */
    public function updateAction(Request $request, $childName)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Child')->findOneByName($childName);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Child entity.');
        }

        $deleteForm = $this->createDeleteForm($childName);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('child_edit', array('parentName' =>$this->getUser()->getUsername(), 'childName' => $childName)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Child entity.
     *
     * @Route("/", name="child_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $childName)
    {
        $form = $this->createDeleteForm($childName);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Child')->findOneByName($childName);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Child entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('child'));
    }

    /**
     * Creates a form to delete a Child entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($childName)
    {
                return $this->createFormBuilder()
            ->setAction($this->generateUrl('child_delete', array('parentName' =>$this->getUser()->getUsername(), 'childName' => $childName)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
