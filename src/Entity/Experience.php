<?php

namespace App\Entity;

use App\Repository\ExperienceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExperienceRepository::class)]
class Experience
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Experience = null;

    #[ORM\OneToOne(mappedBy: 'experience', cascade: ['persist', 'remove'])]
    private ?Candidate $candidate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExperience(): ?string
    {
        return $this->Experience;
    }

    public function setExperience(string $Experience): static
    {
        $this->Experience = $Experience;

        return $this;
    }

    public function getCandidate(): ?Candidate
    {
        return $this->candidate;
    }

    public function setCandidate(Candidate $candidate): static
    {
        // set the owning side of the relation if necessary
        if ($candidate->getExperience() !== $this) {
            $candidate->setExperience($this);
        }

        $this->candidate = $candidate;

        return $this;
    }
}
