<?php
namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\VisitRepository;

#[ORM\Entity(repositoryClass: VisitRepository::class)]
#[ApiResource]
class Visit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo; // Photo

    #[ORM\Column(length: 255)]
    private ?string $country; // Pays

    #[ORM\Column(length: 255)]
    private ?string $location; // Lieu de visite

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $startDate; // Date de la visite & Heure de début

    #[ORM\Column]
    private ?int $durationHours; // Durée (en heure)

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comment; // Commentaire sur la visite
    
    // Heure de fin (calculée automatiquement)
    public function getEndDate(): ?\DateTimeInterface
    {
        if ($this->startDate && $this->durationHours) {
            $endDate = clone $this->startDate;
            return $endDate->modify('+' . $this->durationHours . ' hours');
        }
        return null;
    }
}
