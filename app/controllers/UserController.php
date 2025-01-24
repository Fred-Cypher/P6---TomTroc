<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\UserRepository;
use App\services\Utils;

class UserController{
    private $userRepository;

    public function __construct(){
        $this->userRepository = new UserRepository;
    }

    public function index()
    {
    
    }

    public function register(): void
    {
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Vérifier que l'utilisateur n'existe pas et enregistrer le nouveau
            $pseudo = Utils::request('pseudo');
            $email = Utils::request('email');
            $password = Utils::request('password');
            $role = 'User';
            $createdAt = date('Y-m-d H:i:s');
            $updatedAt = date('Y-m-d H:i:s');

            if(empty($pseudo || $email || $password)){
                $message = "Tous les champs sont obligatoires";
            } elseif($this->userRepository->userExists($pseudo, $email)){
                $message = 'Cet utilisateur existe déjà, veuillez modifier les identifiants';
            } else {
                $user = new User([
                'pseudo' => $pseudo,
                'email' => $email,
                'password' => $password,
                'role' => $role,
                'created_at' => $createdAt,
                'updated_at' => $updatedAt
                ]);

                $this->userRepository->createUser($user);

                Utils::redirect('login');
            }
        }

        $title = "Tom Troc - Inscription";
        ob_start();
        require __DIR__ . '../../views/templates/register.php';
        $content = ob_get_clean();
        require __DIR__ . '../../views/layout.php';
    }

    public function login(): void
    {
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Vérifier que le pseudo correspond au mot de passe et que l'utilisateur existe
            // On récupère les données du formulaire.
            $pseudo = Utils::request("pseudo");
            $password = Utils::request("password");

            // On vérifie que les données sont valides.
            if (empty($pseudo) || empty($password)) {
                $message = "Tous les champs sont obligatoires.";
            } else {
                $user = $this->userRepository->getUserByPseudo($pseudo);
                if (!$user) {
                    $message = "Cet utilisateur n'existe pas. Veuillez vérifier vos identifiants";
                } elseif (!password_verify($password, $user->getPassword())){
                        $message = "Cet utilisateur n'existe pas.";
                } else {
                    $_SESSION['user'] = $user;
                    $_SESSION['idUser'] = $user->getId();
                    Utils::redirect("/");
                }
            }
        }

        $title = "Tom Troc - Connexion";
        ob_start();
        require __DIR__ . '../../views/templates/login.php';
        $content = ob_get_clean();
        require __DIR__ . '../../views/layout.php';
    }
}