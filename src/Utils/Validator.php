<?php

namespace App\Utils;

use Symfony\Component\Console\Exception\InvalidArgumentException;
use function Symfony\Component\String\u;

final class Validator 
{
    public function validateUsername(?string $username): string
    {
        if (empty($username)) {
            throw new InvalidArgumentException("Le nom d'utilisateur ne doit pas être vide");
        }

        if (1 !== preg_match("/^[a-z_]+$/", $username)) {
            throw new InvalidArgumentException("Le nom d'utilisateur doit être écrit en minuscule ou en lettre latine");
        }

        return $username;
    }

    public function validatePassword(?string $plainPassword): string
    {
        if (empty($plainPassword)) {
            throw new InvalidArgumentException("Le mot de passe ne doit pas être vide");
        }

        if (u($plainPassword)->trim()->length() < 6) {
            throw new InvalidArgumentException("Le mot de passe doit contenir au moins 6 caractères");
        }

        return $plainPassword;
    }

    public function validateEmail(?string $email): string
    {
        if (empty($email)) {
            throw new InvalidArgumentException("L'email ne doit pas être vide");
        }

        if (null === u($email)->indexOf("@")) {
            throw new InvalidArgumentException("L'email doit être valide");
        }

        return $email;
    }

    public function validateFullName(?string $fullName): string
    {
        if (empty($fullName)) {
            throw new InvalidArgumentException("Le nom ne doit pas être vide");
        }
        
        return $fullName;
    }
}