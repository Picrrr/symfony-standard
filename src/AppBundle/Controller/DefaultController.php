<?php

namespace AppBundle\Controller;

# Entity
use AppBundle\Entity\PhoneDirectory;

use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    const CLASSNAME = 'AppBundle:PhoneDirectory';

    private $em;

    function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/", name="index")
     */
    public function indexAction(Request $request)
    {

        // query for all entry order by
        $results = $this->em->getRepository(self::CLASSNAME)
            ->createQueryBuilder('p')
            ->orderBy('p.surname', 'ASC')
            ->getQuery()
            ->getResult();

        /*
        $phDir = new PhoneDirectory();
        $phDir->setSurname('Henri');
        $phDir->setForname('VIII');
        $phDir->setHomephone('+33489587412');
        $phDir->setCellphone('+33656849636');
        $phDir->setDepartment('89');


        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $this->em->persist($phDir);

        // actually executes the queries (i.e. the INSERT query)
        $this->em->flush();
        */

        // render
        return $this->render('default/index.html.twig', [
            'results' =>  $results //json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        ]);
    }

    /**
     * @Route("/add", name="add")
     */
    public function addAction()
    {
        // render
        return $this->render('default/add.html.twig');
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function deleteAction($id)
    {

    }

    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function editAction($id)
    {
        $result = $this->em->getRepository(self::CLASSNAME)->find($id);
        // render
        return $this->render('default/edit.html.twig', [
            'result' => $result
        ]);
    }
}
