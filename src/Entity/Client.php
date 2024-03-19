<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $NomSociete = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $TypeActivite = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $NomContact = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Poste = null;

    #[ORM\Column]
    private ?int $NumeroContact = null;

    #[ORM\Column(length: 255)]
    private ?string $EmailContact = null;

    #[ORM\Column(nullable: true)]
    private ?int $Notes = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSociete(): ?string
    {
        return $this->NomSociete;
    }

    public function setNomSociete(string $NomSociete): static
    {
        $this->NomSociete = $NomSociete;

        return $this;
    }

    public function getTypeActivite(): ?string
    {
        return $this->TypeActivite;
    }

    public function setTypeActivite(string $TypeActivite): static
    {
        $this->TypeActivite = $TypeActivite;

        return $this;
    }

    public function getNomContact(): ?string
    {
        return $this->NomContact;
    }

    public function setNomContact(string $NomContact): static
    {
        $this->NomContact = $NomContact;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->Poste;
    }

    public function setPoste(string $Poste): static
    {
        $this->Poste = $Poste;

        return $this;
    }

    public function getNumeroContact(): ?int
    {
        return $this->NumeroContact;
    }

    public function setNumeroContact(int $NumeroContact): static
    {
        $this->NumeroContact = $NumeroContact;

        return $this;
    }

    public function getEmailContact(): ?string
    {
        return $this->EmailContact;
    }

    public function setEmailContact(string $EmailContact): static
    {
        $this->EmailContact = $EmailContact;

        return $this;
    }

    public function getNotes(): ?int
    {
        return $this->Notes;
    }

    public function setNotes(?int $Notes): static
    {
        $this->Notes = $Notes;

        return $this;
    }
}
