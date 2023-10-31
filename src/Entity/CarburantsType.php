<?php

namespace App\Entity;

use App\Repository\CarburantsTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

#[ORM\Entity(repositoryClass: CarburantsTypeRepository::class)]
class CarburantsType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(nullable: true)]
    private ?int $noteEco = null;

    #[ORM\OneToMany(mappedBy: 'carburantType', targetEntity: Voitures::class)]
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
            $voiture->setCarburantType($this);
        }

        return $this;
    }

    public function removeVoiture(Voitures $voiture): static
    {
        if ($this->voitures->removeElement($voiture)) {
            // set the owning side to null (unless already changed)
            if ($voiture->getCarburantType() === $this) {
                $voiture->setCarburantType(null);
            }
        }

        return $this;
    }
}
