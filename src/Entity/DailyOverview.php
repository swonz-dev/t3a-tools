<?php

namespace App\Entity;

use App\Repository\DailyOverviewRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DailyOverviewRepository::class)]
class DailyOverview
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(nullable: true)]
    private ?int $overallImpression = null;

    #[ORM\Column(nullable: true)]
    private ?float $nightSleepHours = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nightSleepQuality = null;

    #[ORM\Column(nullable: true)]
    private ?bool $pem = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $specialEvents = null;

    #[ORM\OneToMany(mappedBy: 'dailyOverview', targetEntity: ActivityBlock::class, cascade: ['persist', 'remove'])]
    private Collection $activityBlocks;

    #[ORM\OneToMany(mappedBy: 'dailyOverview', targetEntity: SymptomEntry::class, cascade: ['persist', 'remove'])]
    private Collection $symptomEntries;

    #[ORM\OneToMany(mappedBy: 'dailyOverview', targetEntity: BreakEntry::class, cascade: ['persist', 'remove'])]
    private Collection $breakEntries;

    public function __construct()
    {
        $this->activityBlocks = new ArrayCollection();
        $this->symptomEntries = new ArrayCollection();
        $this->breakEntries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getOverallImpression(): ?int
    {
        return $this->overallImpression;
    }

    public function setOverallImpression(?int $overallImpression): static
    {
        $this->overallImpression = $overallImpression;

        return $this;
    }

    public function getNightSleepHours(): ?float
    {
        return $this->nightSleepHours;
    }

    public function setNightSleepHours(?float $nightSleepHours): static
    {
        $this->nightSleepHours = $nightSleepHours;

        return $this;
    }

    public function getNightSleepQuality(): ?string
    {
        return $this->nightSleepQuality;
    }

    public function setNightSleepQuality(?string $nightSleepQuality): static
    {
        $this->nightSleepQuality = $nightSleepQuality;

        return $this;
    }

    public function isPem(): ?bool
    {
        return $this->pem;
    }

    public function setPem(?bool $pem): static
    {
        $this->pem = $pem;

        return $this;
    }

    public function getSpecialEvents(): ?string
    {
        return $this->specialEvents;
    }

    public function setSpecialEvents(?string $specialEvents): static
    {
        $this->specialEvents = $specialEvents;

        return $this;
    }

    /**
     * @return Collection<int, ActivityBlock>
     */
    public function getActivityBlocks(): Collection
    {
        return $this->activityBlocks;
    }

    public function addActivityBlock(ActivityBlock $activityBlock): static
    {
        if (!$this->activityBlocks->contains($activityBlock)) {
            $this->activityBlocks->add($activityBlock);
            $activityBlock->setDailyOverview($this);
        }

        return $this;
    }

    public function removeActivityBlock(ActivityBlock $activityBlock): static
    {
        if ($this->activityBlocks->removeElement($activityBlock)) {
            // set the owning side to null (unless already changed)
            if ($activityBlock->getDailyOverview() === $this) {
                $activityBlock->setDailyOverview(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SymptomEntry>
     */
    public function getSymptomEntries(): Collection
    {
        return $this->symptomEntries;
    }

    public function addSymptomEntry(SymptomEntry $symptomEntry): static
    {
        if (!$this->symptomEntries->contains($symptomEntry)) {
            $this->symptomEntries->add($symptomEntry);
            $symptomEntry->setDailyOverview($this);
        }

        return $this;
    }

    public function removeSymptomEntry(SymptomEntry $symptomEntry): static
    {
        if ($this->symptomEntries->removeElement($symptomEntry)) {
            // set the owning side to null (unless already changed)
            if ($symptomEntry->getDailyOverview() === $this) {
                $symptomEntry->setDailyOverview(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, BreakEntry>
     */
    public function getBreakEntries(): Collection
    {
        return $this->breakEntries;
    }

    public function addBreakEntry(BreakEntry $breakEntry): static
    {
        if (!$this->breakEntries->contains($breakEntry)) {
            $this->breakEntries->add($breakEntry);
            $breakEntry->setDailyOverview($this);
        }

        return $this;
    }

    public function removeBreakEntry(BreakEntry $breakEntry): static
    {
        if ($this->breakEntries->removeElement($breakEntry)) {
            // set the owning side to null (unless already changed)
            if ($breakEntry->getDailyOverview() === $this) {
                $breakEntry->setDailyOverview(null);
            }
        }

        return $this;
    }
}