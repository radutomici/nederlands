<?php

namespace App\Entity;

use App\Repository\IrregularVerbRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IrregularVerbRepository::class)]
class IrregularVerb
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text', nullable: true)]
    private $nl_infinitive;

    #[ORM\Column(type: 'text', nullable: true)]
    private $nl_simple_past_singular;

    #[ORM\Column(type: 'text', nullable: true)]
    private $nl_simple_past_plural;

    #[ORM\Column(type: 'text', nullable: true)]
    private $nl_past_participle;

    #[ORM\Column(type: 'text', nullable: true)]
    private $en_infinitive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNlInfinitive(): ?string
    {
        return $this->nl_infinitive;
    }

    public function setNlInfinitive(?string $nl_infinitive): self
    {
        $this->nl_infinitive = $nl_infinitive;

        return $this;
    }

    public function getNlSimplePastSingular(): ?string
    {
        return $this->nl_simple_past_singular;
    }

    public function setNlSimplePastSingular(?string $nl_simple_past_singular): self
    {
        $this->nl_simple_past_singular = $nl_simple_past_singular;

        return $this;
    }

    public function getNlSimplePastPlural(): ?string
    {
        return $this->nl_simple_past_plural;
    }

    public function setNlSimplePastPlural(?string $nl_simple_past_plural): self
    {
        $this->nl_simple_past_plural = $nl_simple_past_plural;

        return $this;
    }

    public function getNlPastParticiple(): ?string
    {
        return $this->nl_past_participle;
    }

    public function setNlPastParticiple(?string $nl_past_participle): self
    {
        $this->nl_past_participle = $nl_past_participle;

        return $this;
    }

    public function getEnInfinitive(): ?string
    {
        return $this->en_infinitive;
    }

    public function setEnInfinitive(?string $en_infinitive): self
    {
        $this->en_infinitive = $en_infinitive;

        return $this;
    }
}
