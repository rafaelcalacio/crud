<?php

namespace App\Entity;

use App\Repository\ClienteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClienteRepository::class)
 */
class Cliente
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $nome;

    /**
     * @ORM\Column(type="integer")
     */
    private $cpf;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $endereco;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $telefone;

    /**
     * @ORM\OneToMany(targetEntity=Conteiner::class, mappedBy="cliente_conteiner")
     */
    private $cliente_container;

    public function __construct()
    {
        $this->cliente_container = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getCpf(): ?int
    {
        return $this->cpf;
    }

    public function setCpf(int $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getEndereco(): ?string
    {
        return $this->endereco;
    }

    public function setEndereco(?string $endereco): self
    {
        $this->endereco = $endereco;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelefone(): ?int
    {
        return $this->telefone;
    }

    public function setTelefone(int $telefone): self
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * @return Collection|Conteiner[]
     */
    public function getClienteContainer(): Collection
    {
        return $this->cliente_container;
    }

    public function addClienteContainer(Conteiner $clienteContainer): self
    {
        if (!$this->cliente_container->contains($clienteContainer)) {
            $this->cliente_container[] = $clienteContainer;
            $clienteContainer->setClienteConteiner($this);
        }

        return $this;
    }

    public function removeClienteContainer(Conteiner $clienteContainer): self
    {
        if ($this->cliente_container->removeElement($clienteContainer)) {
            // set the owning side to null (unless already changed)
            if ($clienteContainer->getClienteConteiner() === $this) {
                $clienteContainer->setClienteConteiner(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        // to show the name of the Category in the select
        return $this->nome;
        // to show the id of the Category in the select
        // return $this->id;
    }
}
