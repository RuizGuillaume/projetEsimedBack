<?php

namespace App\Entity;

use App\Repository\UtilisateurQualificationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateurQualificationRepository::class)
 */
class UtilisateurQualification
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
     * @ORM\ManyToMany(targetEntity=PlanDeTravail::class)
     */
    private $id_plan_de_travail;

    public function __construct()
    {
        $this->id_utilisateur = new ArrayCollection();
        $this->id_plan_de_travail = new ArrayCollection();
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
     * @return Collection|PlanDeTravail[]
     */
    public function getIdPlanDeTravail(): Collection
    {
        return $this->id_plan_de_travail;
    }

    public function addIdPlanDeTravail(PlanDeTravail $idPlanDeTravail): self
    {
        if (!$this->id_plan_de_travail->contains($idPlanDeTravail)) {
            $this->id_plan_de_travail[] = $idPlanDeTravail;
        }

        return $this;
    }

    public function removeIdPlanDeTravail(PlanDeTravail $idPlanDeTravail): self
    {
        $this->id_plan_de_travail->removeElement($idPlanDeTravail);

        return $this;
    }
}
