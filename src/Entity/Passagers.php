<?php

namespace App\Entity;

use App\Repository\PassagersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PassagersRepository::class)]
class Passagers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nbDePassagers = null;

    #[ORM\Column(length: 255)]
    private ?string $bonusOuMalus = null;

    #[ORM\Column]
    private ?float $bonusOuMalusPourcentage = null;

    #[ORM\OneToMany(mappedBy: 'passager', targetEntity: Voitures::class)]
    private Collection $voitures;

    public function __construct()
    {
        $this->voitures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbDePassagers(): ?int
    {
        return $this->nbDePassagers;
    }

    public function setNbDePassagers(int $nbDePassagers): static
    {
        $this->nbDePassagers = $nbDePassagers;

        return $this;
    }

    public function getBonusOuMalus(): ?string
    {
        return $this->bonusOuMalus;
    }

    public function setBonusOuMalus(string $bonusOuMalus): static
    {
        $this->bonusOuMalus = $bonusOuMalus;

        return $this;
    }

    public function getBonusOuMalusPourcentage(): ?float
    {
        return $this->bonusOuMalusPourcentage;
    }

    public function setBonusOuMalusPourcentage(float $bonusOuMalusPourcentage): static
    {
        $this->bonusOuMalusPourcentage = $bonusOuMalusPourcentage;

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
            $voiture->setPassager($this);
        }

        return $this;
    }

    public function removeVoiture(Voitures $voiture): static
    {
        if ($this->voitures->removeElement($voiture)) {
            // set the owning side to null (unless already changed)
            if ($voiture->getPassager() === $this) {
                $voiture->setPassager(null);
            }
        }

        return $this;
    }
}
