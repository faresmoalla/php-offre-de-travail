<?php

namespace App\Entity;

use App\Repository\CvsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CvsRepository::class)]
class Cvs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"id_cv")]
    private ?int $id_cv = null;

    #[ORM\Column(length: 255)]
    private ?string $bio_cv = null;

    #[ORM\Column(length: 255)]
    private ?string $diplome = null;

    #[ORM\Column]
    private ?int $annee_diplome = null;

    #[ORM\Column(length: 255)]
    private ?string $institut = null;

    #[ORM\Column(length: 255)]
    private ?string $specialite = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\ManyToOne(inversedBy: 'cvs')]
    private ?Utilisateurs $id_freelancer = null;




    public function getId_cv (): ?int
    {
        return $this->id_cv ;
    }

    public function getBioCv(): ?string
    {
        return $this->bio_cv;
    }

    public function setBioCv(string $bio_cv): self
    {
        $this->bio_cv = $bio_cv;

        return $this;
    }

    public function getDiplome(): ?string
    {
        return $this->diplome;
    }

    public function setDiplome(string $diplome): self
    {
        $this->diplome = $diplome;

        return $this;
    }

    public function getAnneeDiplome(): ?int
    {
        return $this->annee_diplome;
    }

    public function setAnneeDiplome(int $annee_diplome): self
    {
        $this->annee_diplome = $annee_diplome;

        return $this;
    }

    public function getInstitut(): ?string
    {
        return $this->institut;
    }

    public function setInstitut(string $institut): self
    {
        $this->institut = $institut;

        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getIdFreelancer(): ?Utilisateurs
    {
        return $this->id_freelancer;
    }

    public function setIdFreelancer(?Utilisateurs $id_freelancer): self
    {
        $this->id_freelancer = $id_freelancer;

        return $this;
    }
}
