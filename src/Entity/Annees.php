<?php

namespace App\Entity;

use App\Repository\AnneesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnneesRepository::class)]
class Annees
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $minDate = null;

    #[ORM\Column]
    private ?int $maxDate = null;

    #[ORM\Column(nullable: true)]
    private ?int $AnneeNoteEco = null;

    #[ORM\OneToMany(mappedBy: 'annee', targetEntity: Voitures::class)]
    private Collection $voitures;

    public function __construct()
    {
        $this->voitures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMinDate(): ?int
    {
        return $this->minDate;
    }

    public function setMinDate(?int $minDate): static
    {
        $this->minDate = $minDate;

        return $this;
    }

    public function getMaxDate(): ?int
    {
        return $this->maxDate;
    }

    public function setMaxDate(?int $maxDate): static
    {
        $this->maxDate = $maxDate;

        return $this;
    }

    public function getAnneeNoteEco(): ?int
    {
        return $this->AnneeNoteEco;
    }

    public function setAnneeNoteEco(?int $AnneeNoteEco): static
    {
        $this->AnneeNoteEco = $AnneeNoteEco;

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
            $voiture->setAnnee($this);
        }

        return $this;
    }

    public function removeVoiture(Voitures $voiture): static
    {
        if ($this->voitures->removeElement($voiture)) {
            // set the owning side to null (unless already changed)
            if ($voiture->getAnnee() === $this) {
                $voiture->setAnnee(null);
            }
        }

        return $this;
    }
}
