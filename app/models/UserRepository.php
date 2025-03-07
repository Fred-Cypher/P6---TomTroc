<?php

namespace App\Models;

use DateTime;

class UserRepository extends AbstractEntityManager
{
    /**
     * Création d'un nouvel utilisateur
     *
     * @param User $user
     * @return void
     */
    public function createUser(User $user): void
    {
        $sql = "INSERT INTO users (pseudo, email, password, avatar, role, created_at, updated_at)
        VALUES (:pseudo, :email, :password, :avatar, :role, :created_at, :updated_at)";
        $this->db->query($sql,[
            'pseudo' => $user->getPseudo(),
            'email' => $user->getEmail(),
            'password' => password_hash($user->getPassword(), PASSWORD_BCRYPT),
            'avatar' => null,
            'role' => $user->getRole(),
            'created_at' => $user->getCreatedAt()->format('Y-m-d H:i:s'),
            'updated_at' => $user->getUpdatedAt()->format('Y-m-d H:i:s')
        ]);
    }

    /**
     *Récupération d'un utilisateur 
     *
     * @param string $pseudo
     * @return User|null
     */
    public function getUserByPseudo(string $pseudo): ?User
    {
        $sql = "SELECT * FROM users WHERE pseudo = :pseudo";
        $result = $this->db->query($sql, ['pseudo' => $pseudo]);
        $user = $result->fetch();
        if ($user) {
            $user['avatar'] = $user['avatar'] ?? 'defaultAvatar.png';
            $user['created_at'] = new DateTime($user['created_at']);
            $user['updated_at'] = new DateTime($user['updated_at']);
            return new User($user);
        }
        return null; 
    }

    public function getUserByEmail(string $email): ?User
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $result = $this->db->query($sql, ['email' => $email]);
        $user = $result->fetch();
        if($user) {
            $user['avatar'] = $user['avatar'] ?? 'defaultAvatar.png';
            $user['created_at'] = new \DateTime($user['created_at']);
            $user['updated_at'] = new \DateTime($user['updated_at']);
            return new User($user);
        }
        return null;
    }
    
    public function getUserById(int $id): ?User
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $user = $result->fetch();
        if($user){
            $user['avatar'] = $user['avatar'] ?? 'defaultAvatar.png';
            $user['created_at'] = new \DateTime($user['created_at']);
            $user['updated_at'] = new \DateTime($user['updated_at']);
            return new User($user);
        }
        return null;
    }

    public function updateUser(User $user)
    {
        $sql = "UPDATE users SET pseudo = :pseudo, email = :email, password = :password, avatar = :avatar, updated_at = :updated_at
        WHERE id = :id";
        $this->db->query(
            $sql,
            [
                'id' => $user->getId(),
                'pseudo' => $user->getPseudo(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'avatar' => $user->getAvatar(),
                'updated_at' => $user->getUpdatedAt()->format('Y-m-d H:i:s')
            ]);
    }
}