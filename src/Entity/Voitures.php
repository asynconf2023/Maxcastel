<?php

namespace App\Entity;

use App\Repository\VoituresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoituresRepository::class)]
class Voitures
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'voitures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?VoituresType $voitureType = null;

    #[ORM\ManyToOne(inversedBy: 'voitures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CarburantsType $carburantType = null;

    #[ORM\ManyToOne(inversedBy: 'voitures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Kilometrages $kilometrage = null;

    #[ORM\ManyToOne(inversedBy: 'voitures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Annees $annee = null;

    #[ORM\ManyToOne(inversedBy: 'voitures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TauxEmpreint $tauxEmpreint = null;

    #[ORM\ManyToOne(inversedBy: 'voitures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Passagers $passager = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVoitureType(): ?VoituresType
    {
        return $this->voitureType;
    }

    public function setVoitureType(?VoituresType $voitureType): static
    {
        $this->voitureType = $voitureType;

        return $this;
    }

    public function getCarburantType(): ?CarburantsType
    {
        return $this->carburantType;
    }

    public function setCarburantType(?CarburantsType $carburantType): static
    {
        $this->carburantType = $carburantType;

        return $this;
    }

    public function getKilometrage(): ?Kilometrages
    {
        return $this->kilometrage;
    }

    public function setKilometrage(?Kilometrages $kilometrage): static
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getAnnee(): ?Annees
    {
        return $this->annee;
    }

    public function setAnnee(?Annees $annee): static
    {
        $this->annee = $annee;

        return $this;
    }

    public function getTauxEmpreint(): ?TauxEmpreint
    {
        return $this->tauxEmpreint;
    }

    public function setTauxEmpreint(?TauxEmpreint $tauxEmpreint): static
    {
        $this->tauxEmpreint = $tauxEmpreint;

        return $this;
    }

    public function getPassager(): ?Passagers
    {
        return $this->passager;
    }

    public function setPassager(?Passagers $passager): static
    {
        $this->passager = $passager;

        return $this;
    }
}
