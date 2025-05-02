<?php

namespace App\Entity;

use App\Repository\SymptomEntryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SymptomEntryRepository::class)]
class SymptomEntry
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $time = null;

    #[ORM\Column]
    private ?int $severity = null;

    #[ORM\Column]
    private ?bool $newOrWorsened = null;

    #[ORM\ManyToOne(inversedBy: 'symptomEntries')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DailyOverview $dailyOverview = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Symptom $symptom = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTime(): ?\DateTimeImmutable
    {
        return $this->time;
    }

    public function setTime(\DateTimeImmutable $time): static
    {
        $this->time = $time;

        return $this;
    }

    public function getSeverity(): ?int
    {
        return $this->severity;
    }

    public function setSeverity(int $severity): static
    {
        $this->severity = $severity;

        return $this;
    }

    public function isNewOrWorsened(): ?bool
    {
        return $this->newOrWorsened;
    }

    public function setNewOrWorsened(bool $newOrWorsened): static
    {
        $this->newOrWorsened = $newOrWorsened;

        return $this;
    }

    public function getDailyOverview(): ?DailyOverview
    {
        return $this->dailyOverview;
    }

    public function setDailyOverview(?DailyOverview $dailyOverview): static
    {
        $this->dailyOverview = $dailyOverview;

        return $this;
    }

    public function getSymptom(): ?Symptom
    {
        return $this->symptom;
    }

    public function setSymptom(?Symptom $symptom): static
    {
        $this->symptom = $symptom;

        return $this;
    }
}