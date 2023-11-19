<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FireRepository::class)]
#[ORM\Table(name: 'Fires')]
#[ORM\Index(columns: ['NWCG_REPORTING_UNIT_NAME'], name: 'i_forest_name')]
class Fire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'OBJECTID')]
    private ?int $id = null;

    #[ORM\Column(name: 'FPA_ID', length: 100, nullable: true)]
    private ?string $fpaId = null;

    #[ORM\Column(name: 'FIRE_NAME', length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(name: 'NWCG_REPORTING_UNIT_NAME', length: 255, nullable: true)]
    private ?string $forestName = null;

    #[ORM\Column(name: 'DISCOVERY_DATE', type: Types::FLOAT, nullable: true)]
    private ?float $discoveryDate = null;

    #[ORM\Column(name: 'STAT_CAUSE_DESCR', length: 100, nullable: true)]
    private ?string $causeDescription = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getfpaId(): ?string
    {
        return $this->fpaId;
    }

    public function setfpaId(?string $fpaId): static
    {
        $this->fpaId = $fpaId;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getForestName(): ?string
    {
        return $this->forestName;
    }

    public function setForestName(?string $forestName): static
    {
        $this->forestName = $forestName;

        return $this;
    }

    public function getDiscoveryDate(): ?string
    {
        if ($this->discoveryDate === null) {
            return null;
        }

        return jdtogregorian((int) $this->discoveryDate);
    }

    public function setDiscoveryDate(?float $discoveryDate): static
    {
        $this->discoveryDate = $discoveryDate;

        return $this;
    }

    public function getCauseDescription(): ?string
    {
        return $this->causeDescription;
    }

    public function setCauseDescription(?string $causeDescription): static
    {
        $this->causeDescription = $causeDescription;

        return $this;
    }
}
