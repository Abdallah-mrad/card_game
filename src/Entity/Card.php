<?php
/**
 * Created by PhpStorm.
 * User: Mrad
 */

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;

class Card
{
    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[Assert\Choice(callback: [Color::class, 'getValues'], message: 'The color must be one of the following: {{ choices }}.')]
    #[Assert\Type('string')]
    private $color;
    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[Assert\Choice(callback: [Value::class, 'getValues'], message: 'The value must be one of the following: {{ choices }}.')]

    private $value;


    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {


        $this->color = $color;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(?int $value): self
    {
        $this->value = $value;

        return $this;
    }

}