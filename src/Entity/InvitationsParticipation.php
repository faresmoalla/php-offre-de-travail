<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\InvitationsParticipationRepository;

#[ORM\Entity(repositoryClass: InvitationsParticipationRepository::class)]
class InvitationsParticipation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idInvitationParti = null;

    #[ORM\Column(length: 50)]
    private ?string $typeInviParti = null;


    #[ORM\ManyToOne(targetEntity: "Utilisateurs", inversedBy: 'InvitationsParticipation')]
    private ?Utilisateurs $idFreelancer = null;


    #[ORM\ManyToOne(targetEntity: "Evenements", inversedBy: 'InvitationsParticipation')]
    private ?Evenements $idEvenement = null;

    public function getIdInvitationParti(): ?int
    {
        return $this->idInvitationParti;
    }

    public function getTypeInviParti(): ?string
    {
        return $this->typeInviParti;
    }

    public function setTypeInviParti(string $typeInviParti): self
    {
        $this->typeInviParti = $typeInviParti;

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

    public function getIdEvenement(): ?Evenements
    {
        return $this->idEvenement;
    }

    public function setIdEvenement(?Evenements $idEvenement): self
    {
        $this->idEvenement = $idEvenement;

        return $this;
    }
}
