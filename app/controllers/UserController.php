<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\UserRepository;
use App\services\Utils;
use DateTime;

class UserController 
{
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
            $pseudo = Utils::request('pseudo');
            $email = Utils::request('email');
            $password = Utils::request('password');
            $avatar = '';
            $role = 'ROLE_USER';
            $createdAt = new DateTime();
            $updatedAt = new DateTime();

            if(empty($pseudo || $email || $password)){
                $message = "Tous les champs sont obligatoires";
            } else {
                $user = new User([
                'pseudo' => $pseudo,
                'email' => $email,
                'password' => $password,
                'avatar' => $avatar,
                'role' => $role,
                'created_at' => $createdAt,
                'updated_at' => $updatedAt
                ]);
                $this->userRepository->createUser($user);

                header('location: /login');
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
            $email = Utils::request("email");
            $password = Utils::request("password");

            // On vérifie que les données sont valides.
            if (empty($email) || empty($password)) {
                $message = "Tous les champs sont obligatoires.";
            } else {
                $user = $this->userRepository->getUserByEmail($email);
                if (!$user) {
                    $message = "Cet utilisateur n'existe pas. Veuillez vérifier vos identifiants";
                } elseif (!password_verify($password, $user->getPassword())){
                        $message = "Cet utilisateur n'existe pas.";
                } else {
                    $_SESSION['user'] = [
                        'id' => $user->getId(),
                        'pseudo' => $user->getPseudo(),
                        'role' => $user->getRole()                        
                    ] ;
                    
                    header('location: /');
                }
            }
        }

        $title = "Tom Troc - Connexion";
        ob_start();
        require __DIR__ . '../../views/templates/login.php';
        $content = ob_get_clean();
        require __DIR__ . '../../views/layout.php';
    }

    public function logout(): void
    {
        session_start();
        session_destroy();
        header('location: /');
    }
}