<?php

namespace App\Entity;

use App\Repository\EntreprisesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntreprisesRepository::class)]
class Entreprises
{



    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"id_entreprise")]
    private ?int $id_entreprise = null;

    #[ORM\Column]
    private ?int $id_representant = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column]
    private ?int $tel_entreprise = null;

    #[ORM\Column(length: 255)]
    private ?string $description_entreprise = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\OneToMany(mappedBy: 'entreprise_offre_de_travail', targetEntity: OffresDeTravail::class)]
    private Collection $offresDeTravails;

    public function __construct()
    {
        $this->offresDeTravails = new ArrayCollection();
    }

    public function getId_entreprise(): ?int
    {
        return $this->id_entreprise;
    }

    public function getIdRepresentant(): ?int
    {
        return $this->id_representant;
    }

    public function setIdRepresentant(int $id_representant): self
    {
        $this->id_representant = $id_representant;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelEntreprise(): ?int
    {
        return $this->tel_entreprise;
    }

    public function setTelEntreprise(int $tel_entreprise): self
    {
        $this->tel_entreprise = $tel_entreprise;

        return $this;
    }

    public function getDescriptionEntreprise(): ?string
    {
        return $this->description_entreprise;
    }

    public function setDescriptionEntreprise(string $description_entreprise): self
    {
        $this->description_entreprise = $description_entreprise;

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

    /**
     * @return Collection<int, OffresDeTravail>
     */
    public function getOffresDeTravails(): Collection
    {
        return $this->offresDeTravails;
    }

    public function addOffresDeTravail(OffresDeTravail $offresDeTravail): self
    {
        if (!$this->offresDeTravails->contains($offresDeTravail)) {
            $this->offresDeTravails->add($offresDeTravail);
            $offresDeTravail->setEntrepriseOffreDeTravail($this);
        }

        return $this;
    }

    public function removeOffresDeTravail(OffresDeTravail $offresDeTravail): self
    {
        if ($this->offresDeTravails->removeElement($offresDeTravail)) {
            // set the owning side to null (unless already changed)
            if ($offresDeTravail->getEntrepriseOffreDeTravail() === $this) {
                $offresDeTravail->setEntrepriseOffreDeTravail(null);
            }
        }

        return $this;
    }
}
