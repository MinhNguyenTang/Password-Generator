<?php

namespace App\Entity;

use App\Repository\PasswordLengthRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PasswordLengthRepository::class)]
class PasswordLength
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\Positive(
        message: 'The field should be positive.'
    )]
    private ?int $Length = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLength(): ?int
    {
        return $this->Length;
    }

    public function setLength(int $Length): static
    {
        $this->Length = $Length;

        return $this;
    }
}
