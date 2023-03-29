<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CategoriesServicesRepository;


#[ORM\Entity(repositoryClass: CategoriesServicesRepository::class)]
class CategoriesServices
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idCategorieService = null;

    
    #[ORM\Column(length:100)]
    private ?string $nomCategorieService = null;

    public function getIdCategorieService(): ?int
    {
        return $this->idCategorieService;
    }

    public function getNomCategorieService(): ?string
    {
        return $this->nomCategorieService;
    }

    public function setNomCategorieService(string $nomCategorieService): self
    {
        $this->nomCategorieService = $nomCategorieService;

        return $this;
    }


}
