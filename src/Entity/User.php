<?php

namespace App\Entity;

use App\Entity\Blog;
use App\Entity\Testimony;
use Doctrine\ORM\Mapping as ORM;
// use Scheb\TwoFactorBundle\Model\Email\TwoFactorInterface;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    final public const ROLE_USER = "ROLE_USER";
    final public const ROLE_ADMIN = "ROLE_ADMIN";

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column]
    private bool $isVerified = false;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $username = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fullName = null;

    #[ORM\OneToMany(targetEntity: Blog::class, mappedBy: 'user')]
    private ?Collection $blog;

    #[ORM\OneToMany(targetEntity: Testimony::class, mappedBy: 'user')]
    private ?Collection $testimony;

    public function __construct()
    {
        $this->blog = new ArrayCollection();
        $this->testimony = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): static
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(?string $fullName): static
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getBlog(): Collection
    {
        return $this->blog;
    }

    public function addBlog(Blog $blog): Collection
    {
        if (!$this->blog->contains($blog)) {
            $this->blog->add($blog);
        }
        return $this->blog;
    }

    public function removeBlog(self $blog): Collection
    {
        $this->blog->removeElement($blog);

        return $this->blog;
    }

    public function getTestimony(): Collection
    {
        return $this->testimony;
    }

    public function addTestimony(Testimony $testimony): Collection
    {
        if (!$this->testimony->contains($testimony)) {
            $this->testimony->add($testimony);
        }
        return $this->testimony;
    }

    public function removeTestimony(self $testimony): Collection
    {
        $this->testimony->removeElement($testimony);

        return $this->testimony;
    }
}
