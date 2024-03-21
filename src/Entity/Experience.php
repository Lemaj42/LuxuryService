<?php

namespace App\Entity;

use App\Repository\ExperienceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExperienceRepository::class)]
class Experience
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $experience = null;

    #[ORM\OneToMany(targetEntity: Candidate::class, mappedBy: 'experience')]
    private Collection $candidate;

    public function __construct()
    {
        $this->candidate = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExperience(): ?string
    {
        return $this->experience;
    }

    public function setExperience(string $experience): static
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * @return Collection<int, Candidate>
     */
    public function getCandidate(): Collection
    {
        return $this->candidate;
    }

    public function addCandidate(Candidate $candidate): static
    {
        if (!$this->candidate->contains($candidate)) {
            $this->candidate->add($candidate);
            $candidate->setExperience($this);
        }

        return $this;
    }

    public function removeCandidate(Candidate $candidate): static
    {
        if ($this->candidate->removeElement($candidate)) {
            // set the owning side to null (unless already changed)
            if ($candidate->getExperience() === $this) {
                $candidate->setExperience(null);
            }
        }

        return $this;
    }


}
