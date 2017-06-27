<?php

namespace AppBundle\Controller;

# Entity
use AppBundle\Entity\PhoneDirectory;

# Form
use AppBundle\Form\PhoneDirectoryType;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Persistence\ManagerRegistry;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;


class DefaultController extends Controller
{

    //Entity
    const entityPhDir = 'AppBundle:PhoneDirectory';

    //init vars
    private $em;

    function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/", name="index")
     */
    public function indexAction()
    {
        // render
        return $this->render('default/index.html.twig');
    }


    /**
     * @Route("/list", name="list")
     */
    public function listAction()
    {
        // query for all entry order by
        $phDir = $this->em->getRepository(self::entityPhDir)
            ->createQueryBuilder('p')
            ->orderBy('p.surname', 'ASC')
            ->getQuery()
            ->getResult();

        // render
        return $this->render('default/list.html.twig', [
            'results' =>  $phDir
        ]);
    }



    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function deleteAction($id)
    {

        $phDir = $this->em->getRepository(self::entityPhDir)->find($id);

        if (!$phDir) {
            throw $this->createNotFoundException(
                'No entry found for id '.$id
            );
        }

        $this->em->remove($phDir);
        $this->em->flush();

        return new RedirectResponse($this->generateUrl('list'));
    }


    /**
     * @Route("/add", name="add")
     */
    public function addAction()
    {

        // get the form following the entity
        $phDir = new PhoneDirectory();
        $form = $this->createForm(PhoneDirectoryType::class, $phDir);
        $form->handleRequest(Request::createFromGlobals());

        //if submit & valid
        if ($form->isSubmitted() && $form->isValid()) {

            // save it!
            $this->em->persist($phDir);
            $this->em->flush();

            return $this->redirectToRoute('list');
        }


        return $this->render('default/add.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function editAction($id)
    {
        $phDir = $this->em->getRepository(self::entityPhDir)->find($id);

        if (!$phDir) {
            throw $this->createNotFoundException(
                'No entry found for id '.$id
            );
        }

        $form = $this->createForm(PhoneDirectoryType::class, $phDir);
        $form->handleRequest(Request::createFromGlobals());

        //if submit & valid
        if ($form->isSubmitted() && $form->isValid()) {

            $phDir = $form->getData();

            // save it!
            $this->em->persist($phDir);
            $this->em->flush();

            return $this->redirectToRoute('list');
        }

        // render
        return $this->render('default/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
