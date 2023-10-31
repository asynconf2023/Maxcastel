<?php

namespace App\Entity;

use App\Repository\KilometragesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KilometragesRepository::class)]
class Kilometrages
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $minKmParAn = null;

    #[ORM\Column]
    private ?int $maxKmParAn = null;

    #[ORM\Column(nullable: true)]
    private ?int $KmNoteEco = null;

    #[ORM\OneToMany(mappedBy: 'kilometrage', targetEntity: Voitures::class)]
    private Collection $voitures;

    public function __construct()
    {
        $this->voitures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMinKmParAn(): ?int
    {
        return $this->minKmParAn;
    }

    public function setMinKmParAn(int $minKmParAn): static
    {
        $this->minKmParAn = $minKmParAn;

        return $this;
    }

    public function getMaxKmParAn(): ?int
    {
        return $this->maxKmParAn;
    }

    public function setMaxKmParAn(int $maxKmParAn): static
    {
        $this->maxKmParAn = $maxKmParAn;

        return $this;
    }

    public function getKmNoteEco(): ?int
    {
        return $this->KmNoteEco;
    }

    public function setKmNoteEco(?int $KmNoteEco): static
    {
        $this->KmNoteEco = $KmNoteEco;

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
            $voiture->setKilometrage($this);
        }

        return $this;
    }

    public function removeVoiture(Voitures $voiture): static
    {
        if ($this->voitures->removeElement($voiture)) {
            // set the owning side to null (unless already changed)
            if ($voiture->getKilometrage() === $this) {
                $voiture->setKilometrage(null);
            }
        }

        return $this;
    }
}
