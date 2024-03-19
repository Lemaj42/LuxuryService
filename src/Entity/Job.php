<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobRepository::class)]
class Job
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Reference = null;

    #[ORM\Column(length: 255)]
    private ?string $Client = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\Column]
    private ?bool $Active = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Notes = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $JobTitle = null;



    #[ORM\Column(length: 255)]
    private ?string $Location = null;



    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $ClosingDate = null;

    #[ORM\Column(length: 255)]
    private ?string $Salary = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateCreation = null;

    #[ORM\ManyToOne(inversedBy: 'jobs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?JobType $JobType = null;

    #[ORM\ManyToOne(inversedBy: 'jobs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?JobCategory $JobCategory = null;

    #[ORM\OneToMany(targetEntity: Candidacy::class, mappedBy: 'job')]
    private Collection $candidacies;

    #[ORM\ManyToOne(inversedBy: 'typeactivité')]
    private ?Client $client = null;

    public function __construct()
    {
        $this->candidacies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->Reference;
    }

    public function setReference(string $Reference): static
    {
        $this->Reference = $Reference;

        return $this;
    }

    public function getClient(): ?string
    {
        return $this->Client;
    }

    public function setClient(string $Client): static
    {
        $this->Client = $Client;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->Active;
    }

    public function setActive(bool $Active): static
    {
        $this->Active = $Active;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->Notes;
    }

    public function setNotes(string $Notes): static
    {
        $this->Notes = $Notes;

        return $this;
    }

    public function getJobTitle(): ?string
    {
        return $this->JobTitle;
    }

    public function setJobTitle(string $JobTitle): static
    {
        $this->JobTitle = $JobTitle;

        return $this;
    }


    public function getLocation(): ?string
    {
        return $this->Location;
    }

    public function setLocation(string $Location): static
    {
        $this->Location = $Location;

        return $this;
    }


    public function getClosingDate(): ?\DateTimeInterface
    {
        return $this->ClosingDate;
    }

    public function setClosingDate(\DateTimeInterface $ClosingDate): static
    {
        $this->ClosingDate = $ClosingDate;

        return $this;
    }

    public function getSalary(): ?string
    {
        return $this->Salary;
    }

    public function setSalary(string $Salary): static
    {
        $this->Salary = $Salary;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->DateCreation;
    }

    public function setDateCreation(\DateTimeInterface $DateCreation): static
    {
        $this->DateCreation = $DateCreation;

        return $this;
    }

    public function getJobType(): ?JobType
    {
        return $this->JobType;
    }

    public function setJobType(?JobType $JobType): static
    {
        $this->JobType = $JobType;

        return $this;
    }

    public function getJobCategory(): ?JobCategory
    {
        return $this->JobCategory;
    }

    public function setJobCategory(?JobCategory $JobCategory): static
    {
        $this->JobCategory = $JobCategory;

        return $this;
    }

    /**
     * @return Collection<int, Candidacy>
     */
    public function getCandidacies(): Collection
    {
        return $this->candidacies;
    }

    public function addCandidacy(Candidacy $candidacy): static
    {
        if (!$this->candidacies->contains($candidacy)) {
            $this->candidacies->add($candidacy);
            $candidacy->setJob($this);
        }

        return $this;
    }

    public function removeCandidacy(Candidacy $candidacy): static
    {
        if ($this->candidacies->removeElement($candidacy)) {
            // set the owning side to null (unless already changed)
            if ($candidacy->getJob() === $this) {
                $candidacy->setJob(null);
            }
        }

        return $this;
    }
}
