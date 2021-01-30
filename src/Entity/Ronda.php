<?php

namespace App\Entity;

use App\Repository\RondaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RondaRepository::class)
 */
class Ronda
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Partida::class, mappedBy="ronda")
     */
    private $partides;

    /**
     * @ORM\Column(type="integer")
     */
    private $numeroRonda;

    /**
     * @ORM\OneToOne(targetEntity=Jugador::class, cascade={"persist", "remove"})
     */
    private $jugadorImparell;

    /**
     * @ORM\ManyToOne(targetEntity=Torneig::class, inversedBy="rondes")
     */
    private $torneig;

    public function __construct()
    {
        $this->partides = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Partida[]
     */
    public function getPartides(): Collection
    {
        return $this->partides;
    }

    public function addPartide(Partida $partide): self
    {
        if (!$this->partides->contains($partide)) {
            $this->partides[] = $partide;
            $partide->setRonda($this);
        }

        return $this;
    }

    public function removePartide(Partida $partide): self
    {
        if ($this->partides->removeElement($partide)) {
            // set the owning side to null (unless already changed)
            if ($partide->getRonda() === $this) {
                $partide->setRonda(null);
            }
        }

        return $this;
    }

    public function getNumeroRonda(): ?int
    {
        return $this->numeroRonda;
    }

    public function setNumeroRonda(int $numeroRonda): self
    {
        $this->numeroRonda = $numeroRonda;

        return $this;
    }

    public function getJugadorImparell(): ?Jugador
    {
        return $this->jugadorImparell;
    }

    public function setJugadorImparell(?Jugador $jugadorImparell): self
    {
        $this->jugadorImparell = $jugadorImparell;

        return $this;
    }

    public function getTorneig(): ?Torneig
    {
        return $this->torneig;
    }

    public function setTorneig(?Torneig $torneig): self
    {
        $this->torneig = $torneig;

        return $this;
    }
    public function __toString()
    {
        return $this->numeroRonda;
    }
}
