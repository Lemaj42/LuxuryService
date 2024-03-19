<?php

namespace App\Entity;

use App\Repository\CandidacyRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidacyRepository::class)]
class Candidacy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Time = null;

    #[ORM\Column]
    private ?bool $Approved = null;

    #[ORM\ManyToOne(inversedBy: 'candidacies')]
    private ?Job $job = null;

    #[ORM\ManyToOne(inversedBy: 'candidacies')]
    private ?Candidate $candida = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->Time;
    }

    public function setTime(\DateTimeInterface $Time): static
    {
        $this->Time = $Time;

        return $this;
    }

    public function isApproved(): ?bool
    {
        return $this->Approved;
    }

    public function setApproved(bool $Approved): static
    {
        $this->Approved = $Approved;

        return $this;
    }

    public function getJob(): ?Job
    {
        return $this->job;
    }

    public function setJob(?Job $job): static
    {
        $this->job = $job;

        return $this;
    }

    public function getCandida(): ?Candidate
    {
        return $this->candida;
    }

    public function setCandida(?Candidate $candida): static
    {
        $this->candida = $candida;

        return $this;
    }
}
