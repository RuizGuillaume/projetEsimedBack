<?php

namespace App\Entity;

use App\Repository\GammeOperationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GammeOperationRepository::class)
 */
class GammeOperation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=gamme::class)
     */
    private $id_gamme;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Numero_operation;

    public function __construct()
    {
        $this->id_gamme = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|gamme[]
     */
    public function getIdGamme(): Collection
    {
        return $this->id_gamme;
    }

    public function addIdGamme(gamme $idGamme): self
    {
        if (!$this->id_gamme->contains($idGamme)) {
            $this->id_gamme[] = $idGamme;
        }

        return $this;
    }

    public function removeIdGamme(gamme $idGamme): self
    {
        $this->id_gamme->removeElement($idGamme);

        return $this;
    }

    public function getNumeroOperation(): ?int
    {
        return $this->Numero_operation;
    }

    public function setNumeroOperation(?int $Numero_operation): self
    {
        $this->Numero_operation = $Numero_operation;

        return $this;
    }
}
