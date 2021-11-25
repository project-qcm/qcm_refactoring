<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuestionTable
 *
 * @ORM\Table(name="question_table", indexes={@ORM\Index(name="fk_question_table_qcm_table1_idx", columns={"qcm_table_id_qcm"})})
 * @ORM\Entity
 */
class QuestionTable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_qestion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idQestion;

    /**
     * @var string
     *
     * @ORM\Column(name="question", type="string", length=128, nullable=false)
     */
    private $question;

    /**
     * @var string
     *
     * @ORM\Column(name="reply1", type="string", length=128, nullable=false)
     */
    private $reply1;

    /**
     * @var string
     *
     * @ORM\Column(name="reply2", type="string", length=128, nullable=false)
     */
    private $reply2;

    /**
     * @var string
     *
     * @ORM\Column(name="reply3", type="string", length=128, nullable=false)
     */
    private $reply3;

    /**
     * @var string
     *
     * @ORM\Column(name="reply4", type="string", length=128, nullable=false)
     */
    private $reply4;

    /**
     * @var string
     *
     * @ORM\Column(name="good_reply", type="string", length=128, nullable=false)
     */
    private $goodReply;

    /**
     * @var \QcmTable
     *
     * @ORM\ManyToOne(targetEntity="QcmTable")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="qcm_table_id_qcm", referencedColumnName="id_qcm")
     * })
     */
    private $qcmTableIdQcm;

    public function getIdQestion(): ?int
    {
        return $this->idQestion;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getReply1(): ?string
    {
        return $this->reply1;
    }

    public function setReply1(string $reply1): self
    {
        $this->reply1 = $reply1;

        return $this;
    }

    public function getReply2(): ?string
    {
        return $this->reply2;
    }

    public function setReply2(string $reply2): self
    {
        $this->reply2 = $reply2;

        return $this;
    }

    public function getReply3(): ?string
    {
        return $this->reply3;
    }

    public function setReply3(string $reply3): self
    {
        $this->reply3 = $reply3;

        return $this;
    }

    public function getReply4(): ?string
    {
        return $this->reply4;
    }

    public function setReply4(string $reply4): self
    {
        $this->reply4 = $reply4;

        return $this;
    }

    public function getGoodReply(): ?string
    {
        return $this->goodReply;
    }

    public function setGoodReply(string $goodReply): self
    {
        $this->goodReply = $goodReply;

        return $this;
    }

    public function getQcmTableIdQcm(): ?QcmTable
    {
        return $this->qcmTableIdQcm;
    }

    public function setQcmTableIdQcm(?QcmTable $qcmTableIdQcm): self
    {
        $this->qcmTableIdQcm = $qcmTableIdQcm;

        return $this;
    }


}
