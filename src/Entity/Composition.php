<?php

namespace App\Entity;

use App\Repository\CompositionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompositionRepository::class)
 */
class Composition
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=piece::class)
     */
    private $piece;

    /**
     * @ORM\OneToMany(targetEntity=piece::class, mappedBy="composition")
     */
    private $piece_composante;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    public function __construct()
    {
        $this->piece_composante = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPiece(): ?piece
    {
        return $this->piece;
    }

    public function setPiece(?piece $piece): self
    {
        $this->piece = $piece;

        return $this;
    }

    /**
     * @return Collection|piece[]
     */
    public function getPieceComposante(): Collection
    {
        return $this->piece_composante;
    }

    public function addPieceComposante(piece $pieceComposante): self
    {
        if (!$this->piece_composante->contains($pieceComposante)) {
            $this->piece_composante[] = $pieceComposante;
            $pieceComposante->setComposition($this);
        }

        return $this;
    }

    public function removePieceComposante(piece $pieceComposante): self
    {
        if ($this->piece_composante->removeElement($pieceComposante)) {
            // set the owning side to null (unless already changed)
            if ($pieceComposante->getComposition() === $this) {
                $pieceComposante->setComposition(null);
            }
        }

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }
}
