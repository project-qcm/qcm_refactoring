<?php

namespace App\Controller;

use App\Entity\QcmTable;
use App\Entity\QuestionTable;
use App\Form\QcmTableType;
use App\Form\QcmType;
use App\Form\QuestionTableType;
use App\Repository\QcmTableRepository;
use App\Repository\QuestionTableRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class QcmtestController extends AbstractController
{
    /**
     * @var QuestionTableRepository
     */
    private $qcm;

    /**
     * @var EntityManagerInterface
     */
    private $em;


    public function __construct(QuestionTableRepository $qcm, EntityManagerInterface $em)
    {
        $this->qcm = $qcm;
        $this->em = $em;

    }
    /**
     * @Route("/qcmtest1", name="qcmtest1")
     */
    public function index(): Response
    {
        return $this->render('qcmtest/index.html.twig', [
            'controller_name' => 'QcmtestController',
        ]);
    }


    /**
     * @Route("/qcm1", name="qcm1", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $repo  = $this->qcm->find(1);
        $repo2 = $repo ['questionTableIdQestion'];
        $option = new QcmTable();
//        $option = new Table();
          $var =[1,2,3,4];

        $form = $this->createForm(QcmType::class, $option,['var' => $var, 'repo' => $repo2 ]);
//      $form = $this->createForm(QuestionTableType::class, $option);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($option);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('qcm.html.twig', [
            'option' => $option,
            'form' => $form->createView(),
        ]);
    }
}
