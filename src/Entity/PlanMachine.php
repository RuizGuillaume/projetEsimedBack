<?php

namespace App\Entity;

use App\Repository\PlanMachineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlanMachineRepository::class)
 */
class PlanMachine
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=machine::class)
     */
    private $id_machine;

    /**
     * @ORM\ManyToMany(targetEntity=planDeTravail::class)
     */
    private $id_plan_de_travail;

    public function __construct()
    {
        $this->id_machine = new ArrayCollection();
        $this->id_plan_de_travail = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|machine[]
     */
    public function getIdMachine(): Collection
    {
        return $this->id_machine;
    }

    public function addIdMachine(machine $idMachine): self
    {
        if (!$this->id_machine->contains($idMachine)) {
            $this->id_machine[] = $idMachine;
        }

        return $this;
    }

    public function removeIdMachine(machine $idMachine): self
    {
        $this->id_machine->removeElement($idMachine);

        return $this;
    }

    /**
     * @return Collection|planDeTravail[]
     */
    public function getIdPlanDeTravail(): Collection
    {
        return $this->id_plan_de_travail;
    }

    public function addIdPlanDeTravail(planDeTravail $idPlanDeTravail): self
    {
        if (!$this->id_plan_de_travail->contains($idPlanDeTravail)) {
            $this->id_plan_de_travail[] = $idPlanDeTravail;
        }

        return $this;
    }

    public function removeIdPlanDeTravail(planDeTravail $idPlanDeTravail): self
    {
        $this->id_plan_de_travail->removeElement($idPlanDeTravail);

        return $this;
    }
}
