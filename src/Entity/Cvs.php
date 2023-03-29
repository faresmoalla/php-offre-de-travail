<?php

namespace App\Entity;

use App\Repository\CvsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
#[ORM\Entity(repositoryClass: CvsRepository::class)]
class Cvs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"bio is required")]
    private ?string $bio_cv = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"diplome is required")]
    private ?string $diplome = null;

    #[ORM\Column]
    #[Assert\NotBlank(message:"annee is required")]
    private ?int $annee_diplome = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"institut is required")]
    private ?string $institut = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"specialite is required")]
    private ?string $specialite = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"images is required")]
    private ?string $image = null;

    #[ORM\Column]
    private ?int $id_freelancer = null;






    public function getId (): ?int
    {
        return $this->id ;
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

    public function getIdFreelancer(): ?int
    {
        return $this->id_freelancer;
    }

    public function setIdFreelancer(int $id_freelancer): self
    {
        $this->id_freelancer = $id_freelancer;

        return $this;
    }


}
