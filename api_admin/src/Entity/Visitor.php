<?php
namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\VisitorRepository;

#[ORM\Entity(repositoryClass: VisitorRepository::class)]
#[ApiResource]
class Visitor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName; // Prénom

    #[ORM\Column(length: 255)]
    private ?string $lastName; // Nom

    #[ORM\Column]
    private ?bool $isPresent = false; // Présent (Oui/Non)

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comment; // commentaires
}
