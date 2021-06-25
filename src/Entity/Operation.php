<?php

namespace App\Entity;

use App\Repository\OperationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OperationRepository::class)
 */
class Operation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=planMachine::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_machine;

    /**
     * @ORM\ManyToOne(targetEntity=planMachine::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_plan_de_travail;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $duree;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdMachine(): ?planMachine
    {
        return $this->id_machine;
    }

    public function setIdMachine(?planMachine $id_machine): self
    {
        $this->id_machine = $id_machine;

        return $this;
    }

    public function getIdPlanDeTravail(): ?planMachine
    {
        return $this->id_plan_de_travail;
    }

    public function setIdPlanDeTravail(?planMachine $id_plan_de_travail): self
    {
        $this->id_plan_de_travail = $id_plan_de_travail;

        return $this;
    }

    public function getDuree(): ?\DateTimeInterface
    {
        return $this->duree;
    }

    public function setDuree(?\DateTimeInterface $duree): self
    {
        $this->duree = $duree;

        return $this;
    }
}
