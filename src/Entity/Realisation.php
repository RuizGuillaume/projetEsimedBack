<?php

namespace App\Entity;

use App\Repository\RealisationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RealisationRepository::class)
 */
class Realisation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToMany(targetEntity=gamme::class)
     */
    private $id_gamme;

    public function __construct()
    {
        $this->id_gamme = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
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
}
