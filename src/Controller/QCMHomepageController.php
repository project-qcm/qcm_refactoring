<?php

namespace App\Controller;

use App\Repository\QcmTableRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;



class QCMHomepageController extends AbstractController
{
    /**
     * @var QcmTableRepository
     */
    private $qcm;

    /**
     * @var EntityManagerInterface
     */
    private $em;


    public function __construct(QcmTableRepository $qcm, EntityManagerInterface $em)
    {
        $this->qcm = $qcm;
        $this->em = $em;

    }
    /**
     * @Route("/qcm_homepage", name="qcm_homepage")
     */
    public function index(): Response
    {
        $listLastQcm = $this->qcm->findAll();
        return $this->render('auth/QCMHomePage.html.twig',
            compact('listLastQcm')
        );
    }

    /**
     * @Route("/qcmm", name="qcmm", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $option = new QuestionTable();
        $form = $this->createForm(QuestionTable::class, $option);
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