<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UtilisateursRepository;

#[ORM\Entity(repositoryClass: UtilisateursRepository::class)]
class Utilisateurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_utilisateur", type: "integer", nullable: false)]
    private $idUtilisateur;

    #[ORM\Column(name: "nom_utilisateur", type: "string", length: 100, nullable: false)]
    private $nomUtilisateur;

    #[ORM\Column(name: "email", type: "string", length: 100, nullable: false)]
    private $email;

    #[ORM\Column(name: "tel_utilisateur", type: "string", length: 100, nullable: false)]
    private $telUtilisateur;

    #[ORM\Column(name: "date_naissance", type: "string", length: 100, nullable: false)]
    private $dateNaissance;

    #[ORM\Column(name: "genre", type: "string", length: 100, nullable: false)]
    private $genre;

    #[ORM\Column(name: "mot_de_passe", type: "string", length: 100, nullable: false)]
    private $motDePasse;

    #[ORM\Column(name: "code_verification", type: "string", length: 100, nullable: false)]
    private $codeVerification;

    #[ORM\Column(name: "status", type: "integer", nullable: false)]
    private $status = '0';

    #[ORM\Column(name: "role", type: "string", length: 100, nullable: false)]
    private $role;

    #[ORM\Column(name: "img_profil", type: "string", length: 100, nullable: false)]
    private $imgProfil;

    #[ORM\Column(name: "etat", type: "integer", nullable: false, options: ["default" => "1"])]
    private $etat = 1;

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function getNomUtilisateur(): ?string
    {
        return $this->nomUtilisateur;
    }

    public function setNomUtilisateur(string $nomUtilisateur): self
    {
        $this->nomUtilisateur = $nomUtilisateur;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelUtilisateur(): ?string
    {
        return $this->telUtilisateur;
    }

    public function setTelUtilisateur(string $telUtilisateur): self
    {
        $this->telUtilisateur = $telUtilisateur;

        return $this;
    }

    public function getDateNaissance(): ?string
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(string $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(?string $motDePasse): self
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    public function getCodeVerification(): ?string
    {
        return $this->codeVerification;
    }

    public function setCodeVerification(?string $codeVerification): self
    {
        $this->codeVerification = $codeVerification;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getImgProfil(): ?string
    {
        return $this->imgProfil;
    }

    public function setImgProfil(?string $imgProfil): self
    {
        $this->imgProfil = $imgProfil;

        return $this;
    }

    public function getEtat(): ?int
    {
        return $this->etat;
    }

    public function setEtat(int $etat): self
    {
        $this->etat = $etat;

        return $this;
    }


}
