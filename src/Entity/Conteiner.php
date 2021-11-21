<?php

namespace App\Entity;

use App\Repository\ConteinerRepository;
use App\Repository\ConteinerMovimentacoesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConteinerRepository::class)
 */
class Conteiner
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=11)
     */
    private $number;

    /**
     * @ORM\Column(type="string")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=11)
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity=Cliente::class, inversedBy="cliente_container")
     */
    private $cliente_conteiner;

    /**
     * @ORM\ManyToMany(targetEntity=ConteinerMovimentacoes::class, mappedBy="container_number")
     */
    private $cont_movimenta;

    public function __construct()
    {
        $this->cont_movimenta = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getClienteConteiner(): ?Cliente
    {
        return $this->cliente_conteiner;
    }

    public function setClienteConteiner(?Cliente $cliente_conteiner): self
    {
        $this->cliente_conteiner = $cliente_conteiner;

        return $this;
    }

    /**
     * @return Collection|ConteinerMovimentacoes[]
     */
    public function getContMovimenta(): Collection
    {
        return $this->cont_movimenta;
    }

    public function addContMovimentum(ConteinerMovimentacoes $contMovimentum): self
    {
        if (!$this->cont_movimenta->contains($contMovimentum)) {
            $this->cont_movimenta[] = $contMovimentum;
            $contMovimentum->addContainerNumber($this);
        }

        return $this;
    }

    public function removeContMovimentum(ConteinerMovimentacoes $contMovimentum): self
    {
        if ($this->cont_movimenta->removeElement($contMovimentum)) {
            $contMovimentum->removeContainerNumber($this);
        }

        return $this;
    }

    public function __toString()
    {
        // to show the name of the Category in the select
        return $this->number;
        // to show the id of the Category in the select
        // return $this->id;
    }
}

