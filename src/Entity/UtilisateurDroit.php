<?php

namespace App\Entity;

use App\Repository\UtilisateurDroitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateurDroitRepository::class)
 */
class UtilisateurDroit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=utilisateur::class)
     */
    private $id_utilisateur;

    /**
     * @ORM\ManyToMany(targetEntity=droit::class)
     */
    private $id_droit;

    public function __construct()
    {
        $this->id_utilisateur = new ArrayCollection();
        $this->id_droit = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|utilisateur[]
     */
    public function getIdUtilisateur(): Collection
    {
        return $this->id_utilisateur;
    }

    public function addIdUtilisateur(utilisateur $idUtilisateur): self
    {
        if (!$this->id_utilisateur->contains($idUtilisateur)) {
            $this->id_utilisateur[] = $idUtilisateur;
        }

        return $this;
    }

    public function removeIdUtilisateur(utilisateur $idUtilisateur): self
    {
        $this->id_utilisateur->removeElement($idUtilisateur);

        return $this;
    }

    /**
     * @return Collection|droit[]
     */
    public function getIdDroit(): Collection
    {
        return $this->id_droit;
    }

    public function addIdDroit(droit $idDroit): self
    {
        if (!$this->id_droit->contains($idDroit)) {
            $this->id_droit[] = $idDroit;
        }

        return $this;
    }

    public function removeIdDroit(droit $idDroit): self
    {
        $this->id_droit->removeElement($idDroit);

        return $this;
    }
}
