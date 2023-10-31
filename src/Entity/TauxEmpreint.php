<?php

namespace App\Entity;

use App\Repository\TauxEmpreintRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TauxEmpreintRepository::class)]
class TauxEmpreint
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $scoreMinVoiture = null;

    #[ORM\Column]
    private ?int $scoreMaxVoiture = null;

    #[ORM\Column]
    private ?float $tauxEmpreintPourcentage = null;

    #[ORM\OneToMany(mappedBy: 'tauxEmpreint', targetEntity: Voitures::class)]
    private Collection $voitures;

    public function __construct()
    {
        $this->voitures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScoreMinVoiture(): ?int
    {
        return $this->scoreMinVoiture;
    }

    public function setScoreMinVoiture(int $scoreMinVoiture): static
    {
        $this->scoreMinVoiture = $scoreMinVoiture;

        return $this;
    }

    public function getScoreMaxVoiture(): ?int
    {
        return $this->scoreMaxVoiture;
    }

    public function setScoreMaxVoiture(int $scoreMaxVoiture): static
    {
        $this->scoreMaxVoiture = $scoreMaxVoiture;

        return $this;
    }

    public function getTauxEmpreintPourcentage(): ?float
    {
        return $this->tauxEmpreintPourcentage;
    }

    public function setTauxEmpreintPourcentage(float $tauxEmpreintPourcentage): static
    {
        $this->tauxEmpreintPourcentage = $tauxEmpreintPourcentage;

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
            $voiture->setTauxEmpreint($this);
        }

        return $this;
    }

    public function removeVoiture(Voitures $voiture): static
    {
        if ($this->voitures->removeElement($voiture)) {
            // set the owning side to null (unless already changed)
            if ($voiture->getTauxEmpreint() === $this) {
                $voiture->setTauxEmpreint(null);
            }
        }

        return $this;
    }
}
