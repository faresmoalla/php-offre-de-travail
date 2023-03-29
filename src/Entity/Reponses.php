<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReponsesRepository;

#[ORM\Entity(repositoryClass: ReponsesRepository::class)]

class Reponses
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idReponse = null;

    #[ORM\Column(length:1000)]
    private ?string $descriptionReponse = null;

    #[ORM\ManyToOne(targetEntity: "Reclamations", inversedBy: 'Reponses')]
    private ?Reclamations $idReclamation = null;

    public function getIdReponse(): ?int
    {
        return $this->idReponse;
    }

    public function getDescriptionReponse(): ?string
    {
        return $this->descriptionReponse;
    }

    public function setDescriptionReponse(string $descriptionReponse): self
    {
        $this->descriptionReponse = $descriptionReponse;

        return $this;
    }

    public function getIdReclamation(): ?Reclamations
    {
        return $this->idReclamation;
    }

    public function setIdReclamation(?Reclamations $idReclamation): self
    {
        $this->idReclamation = $idReclamation;

        return $this;
    }


}
