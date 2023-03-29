<?php

namespace App\Entity;

use App\Repository\OffresDeTravailRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OffresDeTravailRepository::class)]
class OffresDeTravail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"id_offre_de_travail")]
    private ?int $id_offre_de_travail = null;

    #[ORM\Column(length: 255)]
    private ?string $titre_offre_de_travail = null;

    #[ORM\Column(length: 255)]
    private ?string $type_offre_de_travail = null;

    #[ORM\Column(length: 255)]
    private ?string $salaire_offre_de_travail = null;

    #[ORM\Column(length: 255)]
    private ?string $specialite_offre_de_travail = null;

    #[ORM\Column(length: 255)]
    private ?string $description_offre_de_travail = null;

    #[ORM\ManyToOne(inversedBy: 'offresDeTravails')]
    private ?Entreprises $entreprise_offre_de_travail = null;

    public function getId_offre_de_travail(): ?int
    {
        return $this->id_offre_de_travail;
    }

    public function getTitreOffreDeTravail(): ?string
    {
        return $this->titre_offre_de_travail;
    }

    public function setTitreOffreDeTravail(string $titre_offre_de_travail): self
    {
        $this->titre_offre_de_travail = $titre_offre_de_travail;

        return $this;
    }

    public function getTypeOffreDeTravail(): ?string
    {
        return $this->type_offre_de_travail;
    }

    public function setTypeOffreDeTravail(string $type_offre_de_travail): self
    {
        $this->type_offre_de_travail = $type_offre_de_travail;

        return $this;
    }

    public function getSalaireOffreDeTravail(): ?string
    {
        return $this->salaire_offre_de_travail;
    }

    public function setSalaireOffreDeTravail(string $salaire_offre_de_travail): self
    {
        $this->salaire_offre_de_travail = $salaire_offre_de_travail;

        return $this;
    }

    public function getSpecialiteOffreDeTravail(): ?string
    {
        return $this->specialite_offre_de_travail;
    }

    public function setSpecialiteOffreDeTravail(string $specialite_offre_de_travail): self
    {
        $this->specialite_offre_de_travail = $specialite_offre_de_travail;

        return $this;
    }

    public function getDescriptionOffreDeTravail(): ?string
    {
        return $this->description_offre_de_travail;
    }

    public function setDescriptionOffreDeTravail(string $description_offre_de_travail): self
    {
        $this->description_offre_de_travail = $description_offre_de_travail;

        return $this;
    }

    public function getEntrepriseOffreDeTravail(): ?Entreprises
    {
        return $this->entreprise_offre_de_travail;
    }

    public function setEntrepriseOffreDeTravail(?Entreprises $entreprise_offre_de_travail): self
    {
        $this->entreprise_offre_de_travail = $entreprise_offre_de_travail;

        return $this;
    }
}
