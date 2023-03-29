<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\OffresServicesRepository;
use DateTime;
use Symfony\Component\Validator\Constraints\Date;

#[ORM\Entity(repositoryClass: OffresServicesRepository::class)]

class OffresServices
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idOffreService = null;


    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column(length:100)]
    private?string $descriptionOffreService = null;
  
    #[ORM\Column(nullable: true)]
    private ?float $note = null;

   
    #[ORM\Column(length:100)]
    private $pays;

    
    #[ORM\Column(nullable: true)]
    private ?DateTime $derniereCommande ;

    #[ORM\Column]
    private ?int $dateDepuisDerniereCommande = -1;
    
    #[ORM\Column(length:100)]
    private ?string $imageOffreService = null;
    
    #[ORM\Column]
    private ?int $nbCommandePassee = null;
   
    #[ORM\ManyToOne(targetEntity: "CategoriesServices", inversedBy: 'offresServices')]
    private ?CategoriesServices $categorieService = null;

    #[ORM\ManyToOne(targetEntity: "Utilisateurs", inversedBy: 'offresServices')]
    private ?Utilisateurs $freelancerProprietaire = null ;

    public function getIdOffreService(): ?int
    {
        return $this->idOffreService;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDescriptionOffreService(): ?string
    {
        return $this->descriptionOffreService;
    }

    public function setDescriptionOffreService(string $descriptionOffreService): self
    {
        $this->descriptionOffreService = $descriptionOffreService;

        return $this;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(?float $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getDerniereCommande(): ?\DateTimeInterface
    {
        return $this->derniereCommande;
    }

    public function setDerniereCommande(?\DateTimeInterface $derniereCommande): self
    {
        $this->derniereCommande = $derniereCommande;

        return $this;
    }

    public function getDateDepuisDerniereCommande(): ?int
    {
        return $this->dateDepuisDerniereCommande;
    }

    public function setDateDepuisDerniereCommande(?int $dateDepuisDerniereCommande): self
    {
        $this->dateDepuisDerniereCommande = $dateDepuisDerniereCommande;

        return $this;
    }

    public function getImageOffreService(): ?string
    {
        return $this->imageOffreService;
    }

    public function setImageOffreService(string $imageOffreService): self
    {
        $this->imageOffreService = $imageOffreService;

        return $this;
    }

    public function getNbCommandePassee(): ?int
    {
        return $this->nbCommandePassee;
    }

    public function setNbCommandePassee(?int $nbCommandePassee): self
    {
        $this->nbCommandePassee = $nbCommandePassee;

        return $this;
    }

    public function getCategorieService(): ?CategoriesServices
    {
        return $this->categorieService;
    }

    public function setCategorieService(?CategoriesServices $categorieService): self
    {
        $this->categorieService = $categorieService;

        return $this;
    }

    public function getFreelancerProprietaire(): ?Utilisateurs
    {
        return $this->freelancerProprietaire;
    }

    public function setFreelancerProprietaire(?Utilisateurs $freelancerProprietaire): self
    {
        $this->freelancerProprietaire = $freelancerProprietaire;

        return $this;
    }


}
