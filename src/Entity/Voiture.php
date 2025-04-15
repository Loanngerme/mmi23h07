<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lien_image = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prix_location = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): static
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getLienImage(): ?string
    {
        return $this->lien_image;
    }

    public function setLienImage(?string $lien_image): static
    {
        $this->lien_image = $lien_image;

        return $this;
    }

    public function getPrixLocation(): ?string
    {
        return $this->prix_location;
    }

    public function setPrixLocation(?string $prix_location): static
    {
        $this->prix_location = $prix_location;

        return $this;
    }
}
