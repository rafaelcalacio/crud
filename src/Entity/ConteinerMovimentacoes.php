<?php

namespace App\Entity;

use App\Repository\ConteinerMovimentacoesRepository;
use App\Repository\ConteinerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConteinerMovimentacoesRepository::class)
 */
class ConteinerMovimentacoes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $movement_type;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dt_inicio;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dt_fim;

    /**
     * @ORM\ManyToMany(targetEntity=Conteiner::class, inversedBy="cont_movimenta")
     */
    private $container_number;

    public function __construct()
    {
        $this->container_number = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMovementType(): ?string
    {
        return $this->movement_type;
    }

    public function setMovementType(string $movement_type): self
    {
        $this->movement_type = $movement_type;

        return $this;
    }

    public function getDtInicio(): ?\DateTimeInterface
    {
        return $this->dt_inicio;
    }

    public function setDtInicio(\DateTimeInterface $dt_inicio): self
    {
        $this->dt_inicio = $dt_inicio;

        return $this;
    }

    public function getDtFim(): ?\DateTimeInterface
    {
        return $this->dt_fim;
    }

    public function setDtFim(\DateTimeInterface $dt_fim): self
    {
        $this->dt_fim = $dt_fim;

        return $this;
    }

    /**
     * @return Collection|Conteiner[]
     */
    public function getContainerNumber(): Collection
    {
        return $this->container_number;
    }

    public function addContainerNumber(Conteiner $containerNumber): self
    {
        if (!$this->container_number->contains($containerNumber)) {
            $this->container_number[] = $containerNumber;
        }

        return $this;
    }

    public function removeContainerNumber(Conteiner $containerNumber): self
    {
        $this->container_number->removeElement($containerNumber);

        return $this;
    }

    public function __toString()
    {
        // to show the name of the Category in the select
        return $this->movement_type;
        // to show the id of the Category in the select
        // return $this->id;
    }
}
