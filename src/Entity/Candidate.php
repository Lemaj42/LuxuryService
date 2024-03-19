<?php

namespace App\Entity;

use App\Repository\CandidateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidateRepository::class)]
class Candidate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $Gender = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $FirstName = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $LastName = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Adress = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Country = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Nationality = null;

    #[ORM\Column]
    private ?bool $Passport = null;

    #[ORM\Column(length: 255)]
    private ?string $PassportFile = null;

    #[ORM\Column(length: 255)]
    private ?string $CurriculumVitae = null;

    #[ORM\Column(length: 255)]
    private ?string $ProfilPicture = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $CurrentLocation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateOfBirth = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $PlaceOfBirth = null;

    #[ORM\Column(length: 255)]
    private ?string $EmailAdress = null;

    #[ORM\Column(length: 255)]
    private ?string $ConfirmEmail = null;

    #[ORM\Column(length: 255)]
    private ?string $Password = null;

    #[ORM\Column(length: 255)]
    private ?string $ConfirmPassword = null;

    #[ORM\Column]
    private ?bool $Availability = null;

    #[ORM\Column(length: 255)]
    private ?string $JobCategory = null;

    #[ORM\Column(length: 255)]
    private ?string $Experience = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $ShortDescription = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Notes = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateCreated = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateUpdated = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateDeleted = null;

    #[ORM\Column(length: 255)]
    private ?string $Files = null;

    #[ORM\OneToOne(inversedBy: 'candidate', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Experience $experience = null;

    #[ORM\OneToMany(targetEntity: Candidacy::class, mappedBy: 'candida')]
    private Collection $candidacies;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?User $user = null;

    public function __construct()
    {
        $this->candidacies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isGender(): ?bool
    {
        return $this->Gender;
    }

    public function setGender(bool $Gender): static
    {
        $this->Gender = $Gender;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(string $FirstName): static
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): static
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->Adress;
    }

    public function setAdress(string $Adress): static
    {
        $this->Adress = $Adress;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->Country;
    }

    public function setCountry(string $Country): static
    {
        $this->Country = $Country;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->Nationality;
    }

    public function setNationality(string $Nationality): static
    {
        $this->Nationality = $Nationality;

        return $this;
    }

    public function isPassport(): ?bool
    {
        return $this->Passport;
    }

    public function setPassport(bool $Passport): static
    {
        $this->Passport = $Passport;

        return $this;
    }

    public function getPassportFile(): ?string
    {
        return $this->PassportFile;
    }

    public function setPassportFile(string $PassportFile): static
    {
        $this->PassportFile = $PassportFile;

        return $this;
    }

    public function getCurriculumVitae(): ?string
    {
        return $this->CurriculumVitae;
    }

    public function setCurriculumVitae(string $CurriculumVitae): static
    {
        $this->CurriculumVitae = $CurriculumVitae;

        return $this;
    }

    public function getProfilPicture(): ?string
    {
        return $this->ProfilPicture;
    }

    public function setProfilPicture(string $ProfilPicture): static
    {
        $this->ProfilPicture = $ProfilPicture;

        return $this;
    }

    public function getCurrentLocation(): ?string
    {
        return $this->CurrentLocation;
    }

    public function setCurrentLocation(string $CurrentLocation): static
    {
        $this->CurrentLocation = $CurrentLocation;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->DateOfBirth;
    }

    public function setDateOfBirth(\DateTimeInterface $DateOfBirth): static
    {
        $this->DateOfBirth = $DateOfBirth;

        return $this;
    }

    public function getPlaceOfBirth(): ?string
    {
        return $this->PlaceOfBirth;
    }

    public function setPlaceOfBirth(string $PlaceOfBirth): static
    {
        $this->PlaceOfBirth = $PlaceOfBirth;

        return $this;
    }

    public function getEmailAdress(): ?string
    {
        return $this->EmailAdress;
    }

    public function setEmailAdress(string $EmailAdress): static
    {
        $this->EmailAdress = $EmailAdress;

        return $this;
    }

    public function getConfirmEmail(): ?string
    {
        return $this->ConfirmEmail;
    }

    public function setConfirmEmail(string $ConfirmEmail): static
    {
        $this->ConfirmEmail = $ConfirmEmail;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): static
    {
        $this->Password = $Password;

        return $this;
    }

    public function getConfirmPassword(): ?string
    {
        return $this->ConfirmPassword;
    }

    public function setConfirmPassword(string $ConfirmPassword): static
    {
        $this->ConfirmPassword = $ConfirmPassword;

        return $this;
    }

    public function isAvailability(): ?bool
    {
        return $this->Availability;
    }

    public function setAvailability(bool $Availability): static
    {
        $this->Availability = $Availability;

        return $this;
    }

    public function getJobCategory(): ?string
    {
        return $this->JobCategory;
    }

    public function setJobCategory(string $JobCategory): static
    {
        $this->JobCategory = $JobCategory;

        return $this;
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

    public function getShortDescription(): ?string
    {
        return $this->ShortDescription;
    }

    public function setShortDescription(string $ShortDescription): static
    {
        $this->ShortDescription = $ShortDescription;

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

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->DateCreated;
    }

    public function setDateCreated(\DateTimeInterface $DateCreated): static
    {
        $this->DateCreated = $DateCreated;

        return $this;
    }

    public function getDateUpdated(): ?\DateTimeInterface
    {
        return $this->DateUpdated;
    }

    public function setDateUpdated(\DateTimeInterface $DateUpdated): static
    {
        $this->DateUpdated = $DateUpdated;

        return $this;
    }

    public function getDateDeleted(): ?\DateTimeInterface
    {
        return $this->DateDeleted;
    }

    public function setDateDeleted(\DateTimeInterface $DateDeleted): static
    {
        $this->DateDeleted = $DateDeleted;

        return $this;
    }

    public function getFiles(): ?string
    {
        return $this->Files;
    }

    public function setFiles(string $Files): static
    {
        $this->Files = $Files;

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
            $candidacy->setCandida($this);
        }

        return $this;
    }

    public function removeCandidacy(Candidacy $candidacy): static
    {
        if ($this->candidacies->removeElement($candidacy)) {
            // set the owning side to null (unless already changed)
            if ($candidacy->getCandida() === $this) {
                $candidacy->setCandida(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

}
