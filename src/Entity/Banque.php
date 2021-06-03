<?php

namespace App\Entity;

use App\Repository\BanqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BanqueRepository::class)
 */
class Banque
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
    private $bni;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bfv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $boa;

    /**
     * @ORM\OneToMany(targetEntity=Cheque::class, mappedBy="banque")
     */
    private $cheques;

    public function __construct()
    {
        $this->cheques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBni(): ?string
    {
        return $this->bni;
    }

    public function setBni(string $bni): self
    {
        $this->bni = $bni;

        return $this;
    }

    public function getBfv(): ?string
    {
        return $this->bfv;
    }

    public function setBfv(string $bfv): self
    {
        $this->bfv = $bfv;

        return $this;
    }
    public function __toString()
    {
        return $this->bfv . ' ' . $this->bni . ' ' . $this->boa;
    }
    public function getBoa(): ?string
    {
        return $this->boa;
    }

    public function setBoa(string $boa): self
    {
        $this->boa = $boa;

        return $this;
    }

    /**
     * @return Collection|Cheque[]
     */
    public function getCheques(): Collection
    {
        return $this->cheques;
    }

    public function addCheque(Cheque $cheque): self
    {
        if (!$this->cheques->contains($cheque)) {
            $this->cheques[] = $cheque;
            $cheque->setBanque($this);
        }

        return $this;
    }

    public function removeCheque(Cheque $cheque): self
    {
        if ($this->cheques->removeElement($cheque)) {
            // set the owning side to null (unless already changed)
            if ($cheque->getBanque() === $this) {
                $cheque->setBanque(null);
            }
        }

        return $this;
    }
}
