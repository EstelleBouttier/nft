<?php

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

trait OnlineTrait
{
    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    protected $isOnline = false;

    public function isOnline(): ?bool
    {
        return $this->isOnline;
    }

    
    public function setIsOnline(bool $isOnline): self
    {
        $this->isOnline = $isOnline;
        return $this;
    }
}