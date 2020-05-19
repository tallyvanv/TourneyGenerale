<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TeamRepository::class)
 */
class Team
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $teamName;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="team")
     */
    private $members;

    /**
     * @ORM\ManyToMany(targetEntity=Match::class, mappedBy="teams")
     */
    private $matches;

    /**
     * @ORM\ManyToMany(targetEntity=Match::class, mappedBy="winner")
     */
    private $matchesWon;

    public function __construct()
    {
        $this->members = new ArrayCollection();
        $this->matches = new ArrayCollection();
        $this->matchesWon = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeamName(): ?string
    {
        return $this->teamName;
    }

    public function setTeamName(string $teamName): self
    {
        $this->teamName = $teamName;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getMembers(): Collection
    {
        return $this->members;
    }

    public function addMember(User $member): self
    {
        if (!$this->members->contains($member)) {
            $this->members[] = $member;
            $member->setTeam($this);
        }

        return $this;
    }

    public function removeMember(User $member): self
    {
        if ($this->members->contains($member)) {
            $this->members->removeElement($member);
            // set the owning side to null (unless already changed)
            if ($member->getTeam() === $this) {
                $member->setTeam(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Match[]
     */
    public function getMatches(): Collection
    {
        return $this->matches;
    }

    public function addMatch(Match $match): self
    {
        if (!$this->matches->contains($match)) {
            $this->matches[] = $match;
            $match->addTeam($this);
        }

        return $this;
    }

    public function removeMatch(Match $match): self
    {
        if ($this->matches->contains($match)) {
            $this->matches->removeElement($match);
            $match->removeTeam($this);
        }

        return $this;
    }

    /**
     * @return Collection|Match[]
     */
    public function getMatchesWon(): Collection
    {
        return $this->matchesWon;
    }

    public function addMatchesWon(Match $matchesWon): self
    {
        if (!$this->matchesWon->contains($matchesWon)) {
            $this->matchesWon[] = $matchesWon;
            $matchesWon->addWinner($this);
        }

        return $this;
    }

    public function removeMatchesWon(Match $matchesWon): self
    {
        if ($this->matchesWon->contains($matchesWon)) {
            $this->matchesWon->removeElement($matchesWon);
            $matchesWon->removeWinner($this);
        }

        return $this;
    }
}
