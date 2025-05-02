<?php

namespace App\Entity;

use App\Repository\BreakEntryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BreakEntryRepository::class)]
class BreakEntry
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $time = null;

    #[ORM\Column(length: 255)]
    private ?string $typeOfBreak = null;

    #[ORM\Column]
    private ?int $duration = null;

    #[ORM\Column(length: 255)]
    private ?string $effect = null;

    #[ORM\ManyToOne(inversedBy: 'breakEntries')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DailyOverview $dailyOverview = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): static
    {
        $this->time = $time;

        return $this;
    }

    public function getTypeOfBreak(): ?string
    {
        return $this->typeOfBreak;
    }

    public function setTypeOfBreak(string $typeOfBreak): static
    {
        $this->typeOfBreak = $typeOfBreak;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getEffect(): ?string
    {
        return $this->effect;
    }

    public function setEffect(string $effect): static
    {
        $this->effect = $effect;

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
}