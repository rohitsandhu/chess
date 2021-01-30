<?php

namespace App\Entity;

use App\Repository\TorneigRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TorneigRepository::class)
 */
class Torneig
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pais;

    /**
     * @ORM\Column(type="integer")
     */
    private $numRondes;

    /**
     * @ORM\Column(type="integer")
     */
    private $numByes;

    /**
     * @ORM\OneToMany(targetEntity=Ronda::class, mappedBy="torneig")
     */
    private $rondes;

    /**
     * @ORM\ManyToMany(targetEntity=Jugador::class)
     */
    private $llistaJugadors;

    /**
     * @ORM\ManyToOne(targetEntity=Arbitre::class)
     */
    private $arbitre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $estat;

    public function __construct()
    {
        $this->rondes = new ArrayCollection();
        $this->llistaJugadors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPais(): ?string
    {
        return $this->pais;
    }

    public function setPais(string $pais): self
    {
        $this->pais = $pais;

        return $this;
    }

    public function getNumRondes(): ?int
    {
        return $this->numRondes;
    }

    public function setNumRondes(int $numRondes): self
    {
        $this->numRondes = $numRondes;

        return $this;
    }

    public function getNumByes(): ?int
    {
        return $this->numByes;
    }

    public function setNumByes(int $numByes): self
    {
        $this->numByes = $numByes;

        return $this;
    }

    /**
     * @return Collection|Ronda[]
     */
    public function getRondes(): Collection
    {
        return $this->rondes;
    }

    public function addRonde(Ronda $ronde): self
    {
        if (!$this->rondes->contains($ronde)) {
            $this->rondes[] = $ronde;
            $ronde->setTorneig($this);
        }

        return $this;
    }

    public function removeRonde(Ronda $ronde): self
    {
        if ($this->rondes->removeElement($ronde)) {
            // set the owning side to null (unless already changed)
            if ($ronde->getTorneig() === $this) {
                $ronde->setTorneig(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Jugador[]
     */
    public function getLlistaJugadors(): Collection
    {
        return $this->llistaJugadors;
    }

    public function addLlistaJugador(Jugador $llistaJugador): self
    {
        if (!$this->llistaJugadors->contains($llistaJugador)) {
            $this->llistaJugadors[] = $llistaJugador;
        }

        return $this;
    }

    public function removeLlistaJugador(Jugador $llistaJugador): self
    {
        $this->llistaJugadors->removeElement($llistaJugador);

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }

    public function getArbitre(): ?Arbitre
    {
        return $this->arbitre;
    }

    public function setArbitre(?Arbitre $arbitre): self
    {
        $this->arbitre = $arbitre;

        return $this;
    }

    public function getEstat(): ?int
    {
        return $this->estat;
    }

    public function setEstat(?int $estat): self
    {
        $this->estat = $estat;

        return $this;
    }
}
