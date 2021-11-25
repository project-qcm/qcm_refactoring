<?php

namespace App\Form;

use App\Entity\UserQcm;
use App\Repository\QuestionTableRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserQcmType extends AbstractType
{
    /**
     * @var QuestionTableRepository
     */
    private $qcm;

    public function __construct(QuestionTableRepository $qcm)
    {
        $this->qcm = $qcm;

    }

    public function convertObjToArray($repo)
    {
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

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $repo = $this->qcm->findTest(3);
        $response = $this->convertObjToArray($repo);
        $builder


            ->add('reply1', CheckboxType::class, [
                'label' => $response[0],
                'value' => 0,
                'required' => false,
            ])
            ->add('reply2', CheckboxType::class, [
                'label' => $response[1],
                'required' => false,
                'value' => 0,
            ])
            ->add('reply3', CheckboxType::class, [
                'label' => $response[2],
                'required' => false,
                'value' => 0,
            ])
            ->add('reply4', CheckboxType::class, [
                'label' => $response[3],
                'required' => false,
                'value' => 0,
            ])
//            ->add('scoreQcm')
//            ->add('userIdUser')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UserQcm::class,

        ]);
    }
}
