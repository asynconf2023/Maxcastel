<?php

namespace App\Entity;

use App\Repository\VoituresTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoituresTypeRepository::class)]
class VoituresType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(nullable: true)]
    private ?int $minKg = null;

    #[ORM\Column(nullable: true)]
    private ?int $maxKg = null;

    #[ORM\Column(nullable: true)]
    private ?float $noteEco = null;

    #[ORM\OneToMany(mappedBy: 'voitureType', targetEntity: Voitures::class)]
    private Collection $voitures;

    public function __construct()
    {
        $this->voitures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getMinKg(): ?int
    {
        return $this->minKg;
    }

    public function setMinKg(?int $minKg): static
    {
        $this->minKg = $minKg;

        return $this;
    }

    public function getMaxKg(): ?int
    {
        return $this->maxKg;
    }

    public function setMaxKg(?int $maxKg): static
    {
        $this->maxKg = $maxKg;

        return $this;
    }

    public function getNoteEco(): ?int
    {
        return $this->noteEco;
    }

    public function setNoteEco(?int $noteEco): static
    {
        $this->noteEco = $noteEco;

        return $this;
    }

    /**
     * @return Collection<int, Voitures>
     */
    public function getVoitures(): Collection
    {
        return $this->voitures;
    }

    public function addVoiture(Voitures $voiture): static
    {
        if (!$this->voitures->contains($voiture)) {
            $this->voitures->add($voiture);
            $voiture->setVoitureType($this);
        }

        return $this;
    }

    public function removeVoiture(Voitures $voiture): static
    {
        if ($this->voitures->removeElement($voiture)) {
            // set the owning side to null (unless already changed)
            if ($voiture->getVoitureType() === $this) {
                $voiture->setVoitureType(null);
            }
        }

        return $this;
    }
}
