<?php

namespace App\Controller;

use App\Entity\UserQcm;
use App\Form\UserQcmType;

use App\Repository\QuestionTableRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class QuestionController extends AbstractController
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
     * @Route("/qcmtest", name="qcmtest")
     */
    public function index(): Response
    {
        return $this->render('qcmtest/index.html.twig', [
            'controller_name' => 'QcmtestController',
        ]);
    }

    public function convertObjToArray ($repo){
        $prepaTest = $repo;
        $var0 = $prepaTest->getReply1();
        $var1 = $prepaTest->getReply2();
        $var2 = $prepaTest->getReply3();
        $var3 = $prepaTest->getReply4();
        $tab = [];
        $tab[0] = $var0;
        $tab[1] = $var1;
        $tab[2] = $var2;
        $tab[3] = $var3;
        return $tab;
    }

    /**
     * @Route("/qcmm", name="qcmm", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function Test(Request $request): Response{
        $repo = $this->qcm->findTest(3);
//        $tab = $this->convertObjToArray($repo);
        $test = new UserQcm();
        $form = $this->createForm(UserQcmType::class,$test);
//        $form = $this->createForm(UserQcmType::class,$tab);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $test->setTitleMovie('totoro');
            $this->em->persist($test);

            $this->em->flush();
            return $this->redirectToRoute('qcmtest');
        }
        return $this->render('qcm.html.twig', [
            'properties' => $repo,
            'form' => $form->createView(),
        ]);
    }
}
