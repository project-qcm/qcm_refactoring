<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QcmTable
 *
 * @ORM\Table(name="qcm_table", indexes={@ORM\Index(name="fk_qcm_table_user1_idx", columns={"user_id_user"})})
 * @ORM\Entity
 */
class QcmTable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_qcm", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idQcm;

    /**
     * @var string
     *
     * @ORM\Column(name="title_movie", type="string", length=64, nullable=false)
     */
    private $titleMovie;

    /**
     * @var string|null
     *
     * @ORM\Column(name="poster_movie", type="string", length=128, nullable=true)
     */
    private $posterMovie;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_at", type="datetime", nullable=true)
     */
    private $dateAt;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id_user", referencedColumnName="id_user")
     * })
     */
    private $userIdUser;

    public function getIdQcm(): ?int
    {
        return $this->idQcm;
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

    public function getPosterMovie(): ?string
    {
        return $this->posterMovie;
    }

    public function setPosterMovie(?string $posterMovie): self
    {
        $this->posterMovie = $posterMovie;

        return $this;
    }

    public function getDateAt(): ?\DateTimeInterface
    {
        return $this->dateAt;
    }

    public function setDateAt(?\DateTimeInterface $dateAt): self
    {
        $this->dateAt = $dateAt;

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
