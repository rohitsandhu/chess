<?php

namespace App\Entity;

use App\Repository\PartidaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartidaRepository::class)
 */
class Partida
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Jugador::class, cascade={"persist", "remove"})
     */
    private $jugadorBlanques;

    /**
     * @ORM\OneToOne(targetEntity=Jugador::class, cascade={"persist", "remove"})
     */
    private $JugadorNegres;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $puntsBlanques;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $puntsNegres;

    /**
     * @ORM\Column(type="boolean")
     */
    private $guanyador;

    /**
     * @ORM\ManyToOne(targetEntity=Ronda::class, inversedBy="partides")
     */
    private $ronda;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJugadorBlanques(): ?Jugador
    {
        return $this->jugadorBlanques;
    }

    public function setJugadorBlanques(?Jugador $jugadorBlanques): self
    {
        $this->jugadorBlanques = $jugadorBlanques;

        return $this;
    }

    public function getJugadorNegres(): ?Jugador
    {
        return $this->JugadorNegres;
    }

    public function setJugadorNegres(?Jugador $JugadorNegres): self
    {
        $this->JugadorNegres = $JugadorNegres;

        return $this;
    }

    public function getPuntsBlanques(): ?int
    {
        return $this->puntsBlanques;
    }

    public function setPuntsBlanques(?int $puntsBlanques): self
    {
        $this->puntsBlanques = $puntsBlanques;

        return $this;
    }

    public function getPuntsNegres(): ?int
    {
        return $this->puntsNegres;
    }

    public function setPuntsNegres(?int $puntsNegres): self
    {
        $this->puntsNegres = $puntsNegres;

        return $this;
    }

    public function getGuanyador(): ?bool
    {
        return $this->guanyador;
    }

    public function setGuanyador(bool $guanyador): self
    {
        $this->guanyador = $guanyador;

        return $this;
    }

    public function getRonda(): ?Ronda
    {
        return $this->ronda;
    }

    public function setRonda(?Ronda $ronda): self
    {
        $this->ronda = $ronda;

        return $this;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->jugadorBlanques." vs ".$this->JugadorNegres;
    }
}
