<?php

namespace App\Controllers;

use App\Models\BooksRepository;
use App\Models\User;
use App\Models\UserRepository;
use App\services\PictureService;
use App\services\Utils;
use DateTime;
use Exception;

class UserController 
{
    private $userRepository;
    private $booksRepository;

    public function __construct(){
        $this->userRepository = new UserRepository;
        $this->booksRepository = new BooksRepository;
    }

    public function index()
    {
        //Affiche le profil de l'utilisateur
        if ($_SESSION['user']['pseudo']){
            $pseudo = $_SESSION['user']['pseudo'];

            $userRepository = new UserRepository();
            $user = $userRepository->getUserByPseudo($pseudo);

            if ($user){
                $userId = $user->getId();
                $books = $this->booksRepository->getBooksByUser($userId);
                $count = $this->booksRepository->countBooksByUserId($userId);
                $inscriptionDate = $user->getCreatedAt();
                $registeredSince = $this->userRepository->getRegisteredSince($inscriptionDate);
                
                $title = "Tom Troc - Profil";
                ob_start();
                require __DIR__ . '../../views/templates/privateProfile.php';
                $content = ob_get_clean();
                require __DIR__ . '../../views/layout.php';
            } else {
                $title = "Profil non trouvé";
                ob_start();
                require __DIR__ . '/../views/templates/error.php';
                $content = ob_get_clean();
                require __DIR__ . '/../views/layout.php';
            }
        } else {
            Utils::redirect('login');
        }
    }

    public function register(): void
    {
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            try{
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

                    Utils::redirect('login');
                }
            } catch (Exception $e) {
                $message = "Erreur : " . $e->getMessage();
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
                if (!$user || !password_verify($password, $user->getPassword())) {
                    $message = "Cet utilisateur n'existe pas. Veuillez vérifier vos identifiants";
                } else {
                    $_SESSION['user'] = [
                        'id' => $user->getId(),
                        'pseudo' => $user->getPseudo(),
                        'role' => $user->getRole()                        
                    ] ;

                    Utils::redirect('home');
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
        session_destroy();
        Utils::redirect('home');
    }

    public function updateUser()
    {
        $id = Utils::request("id", -1);

        try{
            $userRepository = new UserRepository();
            $user = $userRepository->getUserById($id);

            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                $pseudo = Utils::request("pseudo");
                $email = Utils::request("email");
                $updatedAt = new DateTime();

                $params = ['images_directory' => 'uploads/avatars/'];

                $pictureService = new PictureService($params);

                if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == UPLOAD_ERR_OK) {
                    if ($user->getAvatar() && $user->getAvatar() !='defaultAvatar.png') {
                        $pictureService->deletePicture($user->getAvatar());
                    }
                    $avatarFilename = $pictureService->addPicture($_FILES['avatar']);
                } elseif ($_FILES['avatar']['error'] == UPLOAD_ERR_CANT_WRITE){
                    echo ("Erreur lors du chargement de l'image");
                } else {
                    $avatarFilename = $user->getAvatar();
                }


                $user->setPseudo($pseudo);
                $user->setEmail($email);
                $user->setAvatar($avatarFilename);
                $user->setUpdatedAt($updatedAt);

                $newPassword = Utils::request("password");
                if (!empty($newPassword)) {
                    $user->setPassword(password_hash($newPassword, PASSWORD_BCRYPT));
                }

                $this->userRepository->updateUser($user);

                Utils::redirect('home');
            }
        } catch (Exception $e) {
            $message = "Erreur : " . $e->getMessage();
            var_dump($message);
            die;
        }

        $title = "Tom Troc - Profil";
        ob_start();
        require __DIR__ . '../../views/templates/privateProfile.php';
        $content = ob_get_clean();
        require __DIR__ . '../../views/layout.php';
    }

    public function showUser()
    {
        try {
            $id = Utils::request('id', -1);

            $userRepository = new UserRepository();
            $user = $userRepository->getUserById($id);

            if ($user) {
                $userId = $user->getId();
                $books = $this->booksRepository->getBooksByUser($userId);
                $count = $this->booksRepository->countBooksByUserId($userId);
                $inscriptionDate = $user->getCreatedAt();
                $registeredSince = $this->userRepository->getRegisteredSince($inscriptionDate);

                $title = "Tom Troc - Profil utilisateur"  ;
                ob_start();
                require __DIR__ . '../../views/templates/publicProfile.php';
                $content = ob_get_clean();
                require __DIR__ . '../../views/layout.php';
            } else {
                $title = "L'utilisateur demandé n'existe pas";
                ob_start();
                require __DIR__ . '/../views/templates/error.php';
                $content = ob_get_clean();
                require __DIR__ . '/../views/layout.php';
            }
        } catch (Exception $e) {
            $message = "Erreur : " . $e->getMessage();
            var_dump($message);
            die;
        }
    }
}