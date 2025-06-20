<?php
namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\GuideRepository;

#[ORM\Entity(repositoryClass: GuideRepository::class)]
#[ApiResource]
class Guide
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName; // Nom

    #[ORM\Column(length: 255)]
    private ?string $firstName; // Prénom
    
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo; // Photo

    #[ORM\Column(length: 50)]
    private ?string $status; // Statut (Actif / Inactif)

    #[ORM\Column(length: 255)]
    private ?string $country; // Pays d'affectation
}
