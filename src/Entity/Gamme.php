<?php

namespace App\Entity;

use App\Repository\GammeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GammeRepository::class)
 */
class Gamme
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
     * @ORM\ManyToMany(targetEntity=piece::class)
     */
    private $id_piece;

    public function __construct()
    {
        $this->id_utilisateur = new ArrayCollection();
        $this->id_piece = new ArrayCollection();
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
     * @return Collection|piece[]
     */
    public function getIdPiece(): Collection
    {
        return $this->id_piece;
    }

    public function addIdPiece(piece $idPiece): self
    {
        if (!$this->id_piece->contains($idPiece)) {
            $this->id_piece[] = $idPiece;
        }

        return $this;
    }

    public function removeIdPiece(piece $idPiece): self
    {
        $this->id_piece->removeElement($idPiece);

        return $this;
    }
}
