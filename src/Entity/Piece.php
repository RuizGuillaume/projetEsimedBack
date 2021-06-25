<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PieceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PieceRepository::class)
 * @ApiResource()
 */
class Piece
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=typePiece::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_type_piece;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prix_vente;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\ManyToOne(targetEntity=fournisseur::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $fournisseur;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite_stock;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prix_catalogue;

    /**
     * @ORM\ManyToOne(targetEntity=Composition::class, inversedBy="piece_composante")
     */
    private $composition;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTypePiece(): ?typePiece
    {
        return $this->id_type_piece;
    }

    public function setIdTypePiece(?typePiece $id_type_piece): self
    {
        $this->id_type_piece = $id_type_piece;

        return $this;
    }

    public function getPrixVente(): ?float
    {
        return $this->prix_vente;
    }

    public function setPrixVente(?float $prix_vente): self
    {
        $this->prix_vente = $prix_vente;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getFournisseur(): ?fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getQuantiteStock(): ?int
    {
        return $this->quantite_stock;
    }

    public function setQuantiteStock(int $quantite_stock): self
    {
        $this->quantite_stock = $quantite_stock;

        return $this;
    }

    public function getPrixCatalogue(): ?float
    {
        return $this->prix_catalogue;
    }

    public function setPrixCatalogue(?float $prix_catalogue): self
    {
        $this->prix_catalogue = $prix_catalogue;

        return $this;
    }

    public function getComposition(): ?Composition
    {
        return $this->composition;
    }

    public function setComposition(?Composition $composition): self
    {
        $this->composition = $composition;

        return $this;
    }
}
