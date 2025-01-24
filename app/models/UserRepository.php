<?php

namespace App\Models;

class UserRepository extends AbstractEntityManager
{
    /**
     * Création d'un nouvel utilisateur
     *
     * @param User $user
     * @return void
     */
    function createUser(User $user): void
    {
        $sql = "INSERT INTO users (pseudo, email, password, avatar, role, created_at, updated_at)
        VALUES (:pseudo, :email, :password, :avatar, :role, :created_at, updated_at)";
        $this->db->query($sql,[
            'pseudo' => $user->getPseudo(),
            'email' => $user->getEmail(),
            'password' => password_hash($user->getPassword(), PASSWORD_BCRYPT),
            'avatar' => $user->getAvatar(),
            'role' => $user->getRole(),
            'created_at' => $user->getCreatedAt(),
            'updated_at' => $user->getUpdatedAt()
        ]);
    }

    /**
     *Récupération d'un utilisateur 
     *
     * @param string $pseudo
     * @return User|null
     */
    function getUserByPseudo(string $pseudo): ?User
    {
        $sql = "SELECT * FROM users WHERE pseudo = :pseudo";
        $result = $this->db->query($sql, ['pseudo', $pseudo]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }
        return null; 
    }

    public function userExists(string $pseudo, string $email): bool
    {
        $sql = "SELECT COUNT(*) FROM users WHERE pseudo = :pseudo OR email = :email";
        $result = $this->db->query($sql);
        $result->execute(['pseudo' => $pseudo, 'email' => $email]);
        $count = $result->fetchColumn();

        return $count > 0;
    } 
}