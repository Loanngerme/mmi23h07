<?php

namespace App\Entity;

use App\Repository\GarageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GarageRepository::class)]
class Garage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom_garage = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Voiture $Nom_voiture = null;

    /**
     * @var Collection<int, Lieu>
     */
    #[ORM\OneToMany(targetEntity: Lieu::class, mappedBy: 'garage_nom')]
    private Collection $lieus;

    public function __construct()
    {
        $this->lieus = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomGarage(): ?string
    {
        return $this->Nom_garage;
    }

    public function setNomGarage(string $Nom_garage): static
    {
        $this->Nom_garage = $Nom_garage;

        return $this;
    }

    public function getNomVoiture(): ?Voiture
    {
        return $this->Nom_voiture;
    }

    public function setNomVoiture(?Voiture $Nom_voiture): static
    {
        $this->Nom_voiture = $Nom_voiture;

        return $this;
    }

    /**
     * @return Collection<int, Lieu>
     */
    public function getLieus(): Collection
    {
        return $this->lieus;
    }

    public function addLieu(Lieu $lieu): static
    {
        if (!$this->lieus->contains($lieu)) {
            $this->lieus->add($lieu);
            $lieu->setGarageNom($this);
        }

        return $this;
    }

    public function removeLieu(Lieu $lieu): static
    {
        if ($this->lieus->removeElement($lieu)) {
            // set the owning side to null (unless already changed)
            if ($lieu->getGarageNom() === $this) {
                $lieu->setGarageNom(null);
            }
        }

        return $this;
    }
}
