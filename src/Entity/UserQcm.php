<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserQcm
 *
 * @ORM\Table(name="user_qcm", indexes={@ORM\Index(name="fk_user_qcm_user1_idx", columns={"user_id_user"})})
 * @ORM\Entity
 */
class UserQcm
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_result", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idResult;

    /**
     * @var string
     *
     * @ORM\Column(name="title_movie", type="string", length=32, nullable=false)
     */
    private $titleMovie;

    /**
     * @var binary
     *
     * @ORM\Column(name="reply1", type="binary", nullable=false)
     */
    private $reply1 = false;

    /**
     * @var binary
     *
     * @ORM\Column(name="reply2", type="binary", nullable=false)
     */
    private $reply2 = false;

    /**
     * @var binary
     *
     * @ORM\Column(name="reply3", type="binary", nullable=false)
     */
    private $reply3 = false;

    /**
     * @var binary
     *
     * @ORM\Column(name="reply4", type="binary", nullable=false)
     */
    private $reply4 = false;

    /**
     * @var int|null
     *
     * @ORM\Column(name="score_qcm", type="integer", nullable=true)
     */
    private $scoreQcm;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id_user", referencedColumnName="id_user")
     * })
     */
    private $userIdUser;

    public function getIdResult(): ?int
    {
        return $this->idResult;
    }

    public function getTitleMovie(): ?string
    {
        return $this->titleMovie;
    }

    public function setTitleMovie(string $titleMovie): self
    {
        $this->titleMovie = $titleMovie;

        return $this;
    }

    public function getReply1()
    {
        return $this->reply1;
    }

    public function setReply1($reply1): self
    {
        $this->reply1 = $reply1;

        return $this;
    }

    public function getReply2()
    {
        return $this->reply2;
    }

    public function setReply2($reply2): self
    {
        $this->reply2 = $reply2;

        return $this;
    }

    public function getReply3()
    {
        return $this->reply3;
    }

    public function setReply3($reply3): self
    {
        $this->reply3 = $reply3;

        return $this;
    }

    public function getReply4()
    {
        return $this->reply4;
    }

    public function setReply4($reply4): self
    {
        $this->reply4 = $reply4;

        return $this;
    }

    public function getScoreQcm(): ?int
    {
        return $this->scoreQcm;
    }

    public function setScoreQcm(?int $scoreQcm): self
    {
        $this->scoreQcm = $scoreQcm;

        return $this;
    }

    public function getUserIdUser(): ?User
    {
        return $this->userIdUser;
    }

    public function setUserIdUser(?User $userIdUser): self
    {
        $this->userIdUser = $userIdUser;

        return $this;
    }


}
