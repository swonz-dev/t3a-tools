<?php

namespace App\Entity;

use App\Repository\ActivityBlockRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActivityBlockRepository::class)]
class ActivityBlock
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $time = null;

    #[ORM\Column(length: 255)]
    private ?string $activity = null;

    #[ORM\Column(length: 255)]
    private ?string $typeOfStrain = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $duration = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $effort = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $symptomsAfter = null;

    #[ORM\ManyToOne(inversedBy: 'activityBlocks')]
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

    public function getActivity(): ?string
    {
        return $this->activity;
    }

    public function setActivity(string $activity): static
    {
        $this->activity = $activity;

        return $this;
    }

    public function getTypeOfStrain(): ?string
    {
        return $this->typeOfStrain;
    }

    public function setTypeOfStrain(string $typeOfStrain): static
    {
        $this->typeOfStrain = $typeOfStrain;

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

    public function getEffort(): ?int
    {
        return $this->effort;
    }

    public function setEffort(int $effort): static
    {
        $this->effort = $effort;

        return $this;
    }

    public function getSymptomsAfter(): ?string
    {
        return $this->symptomsAfter;
    }

    public function setSymptomsAfter(?string $symptomsAfter): static
    {
        $this->symptomsAfter = $symptomsAfter;

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