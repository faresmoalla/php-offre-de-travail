<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProduitsRepository;

#[ORM\Entity(repositoryClass: ProduitsRepository::class)]

class Produits
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idProduit = null;

    #[ORM\Column(length:100)]
    private ?string $nomProduit = null;

    #[ORM\Column]
    private ?float $prixProduit = null;

    #[ORM\Column(length:100)]
    private ?string $imageProduit = null;

    #[ORM\ManyToOne(targetEntity: "CategoriesProduits", inversedBy: 'Produits')]
    private ?CategoriesProduits $idCategorie = null;

    #[ORM\ManyToOne(targetEntity: "Utilisateurs", inversedBy: 'Produits')]
    private ?Utilisateurs $idFreelancer = null;

    public function getIdProduit(): ?int
    {
        return $this->idProduit;
    }

    public function getNomProduit(): ?string
    {
        return $this->nomProduit;
    }

    public function setNomProduit(string $nomProduit): self
    {
        $this->nomProduit = $nomProduit;

        return $this;
    }

    public function getPrixProduit(): ?float
    {
        return $this->prixProduit;
    }

    public function setPrixProduit(float $prixProduit): self
    {
        $this->prixProduit = $prixProduit;

        return $this;
    }

    public function getImageProduit(): ?string
    {
        return $this->imageProduit;
    }

    public function setImageProduit(string $imageProduit): self
    {
        $this->imageProduit = $imageProduit;

        return $this;
    }

    public function getIdCategorie(): ?CategoriesProduits
    {
        return $this->idCategorie;
    }

    public function setIdCategorie(?CategoriesProduits $idCategorie): self
    {
        $this->idCategorie = $idCategorie;

        return $this;
    }

    public function getIdFreelancer(): ?Utilisateurs
    {
        return $this->idFreelancer;
    }

    public function setIdFreelancer(?Utilisateurs $idFreelancer): self
    {
        $this->idFreelancer = $idFreelancer;

        return $this;
    }


}
