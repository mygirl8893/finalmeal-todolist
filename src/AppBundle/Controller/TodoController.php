<?php

namespace AppBundle\Controller;

use AppBundle\Form\TodoType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Todo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class TodoController extends Controller
{
    /**
     * @Route("/todos", name="todo_list")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request)
    {
        $todos = $this->getDoctrine()->getRepository('AppBundle:Todo')->findBy(array(), array('createDate' => 'DESC'));
        // createDate to DESC or set id to DESC/ASC

        return $this->render('todo/index.html.twig', array(
            'todos' => $todos
        ));
    }

    /**
     * @Route("/todo/create", name="todo_create")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $todo = new Todo();

        $form = $this->createForm(TodoType::class, $todo);

        $form->handleRequest($request);

        if ($form->isSubmitted() and $form->isValid()) {

            $now = new \DateTime('now');

            $todo->setName($form['name']->getData());
            $todo->setFinalmeal($form['finalmeal']->getData());
            $todo->setExtraOrder($form['extra_order']->getData());
            $todo->setFlight($form['flight']->getData());
            $todo->setCutlery($form['cutlery']->getData());
            $todo->setReminder($form['reminder']->getData());
            $todo->setCategory($form['category']->getData());
            $todo->setCreateDate($now);

            $em = $this->getDoctrine()->getManager();
            $em->persist($todo);
            $em->flush();

            $this->addFlash(
                'notice',
                'Final-Meal Figure Added'
            );

            return $this->redirectToRoute('todo_list');
        }

        return $this->render('todo/create.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/todo/edit/{id}", name="todo_edit")
     *
     * @param int $id
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction($id, Request $request)
    {
        $todo = $this->getDoctrine()->getRepository('AppBundle:Todo')->findOneBy(array('id' => $id));

        $now = new \DateTime('now');

        //$current = date('H:i:s \O\n d/m/Y');

        $todo->setName($todo->getName());
        $todo->setFinalmeal($todo->getFinalmeal());
        $todo->setExtraOrder($todo->getExtraOrder());
        $todo->setFlight($todo->getFlight());
        $todo->setCategory($todo->getCategory());
        $todo->setReminder($todo->getReminder());
        $todo->setCutlery($todo->getCutlery());
        $todo->setCreateDate($todo->getCreateDate());
        //$todo->setCreateDate($now);

        $form = $this->createForm(TodoType::class, $todo);

        $form->handleRequest($request);

        if ($form->isSubmitted() and $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $todo = $em->getRepository('AppBundle:Todo')->find($id);
            $todo->setName($form['name']->getData());
            $todo->setFinalmeal($form['finalmeal']->getData());
            $todo->setExtraOrder($form['extra_order']->getData());
            $todo->setFlight($form['flight']->getData());
            $todo->setCutlery($form['cutlery']->getData());
            $todo->setReminder($form['reminder']->getData());
            $todo->setCategory($form['category']->getData());
            $todo->setCreateDate($form['create_date']->getData());
            //$todo->setCreateDate($now);
            $em->flush();

            $this->addFlash(
                'notice',
                'Figure Updated'
            );

            return $this->redirectToRoute('todo_list');
        }

        return $this->render('todo/edit.html.twig', array(
            'todo' => $todo,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/todo/details/{id}", name="todo_details")
     *
     * @param int $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function detailsAction($id)
    {
        $todo = $this->getDoctrine()->getRepository('AppBundle:Todo')->findOneBy(array('id' => $id));

        return $this->render('todo/details.html.twig', array(
            'todo' => $todo
        ));
    }

    /**
     * @Route("/todo/delete/{id}", name="todo_delete")
     *
     * @param int $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove( $this->getDoctrine()->getRepository('AppBundle:Todo')->find($id) );
        $em->flush();

        $this->addFlash(
            'notice',
            'Final-Meal have been deleted successfully'
        );

        return $this->redirectToRoute('todo_list');
    }
}
