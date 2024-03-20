<?php

namespace App\Models;

use App\Core\DbConnect;
use App\Entities\User;
use Exception;

class UserModel extends DbConnect
{
    // Connexion d'un utilisateur.



    public function find($emailUser)
    {
        try {
            $this->request = $this->connection->prepare(
                "SELECT * FROM user_memorii WHERE email_user = :emailUser"
            );
            $this->request->bindParam(':emailUser', $emailUser);
            $this->request->execute();
            $result = $this->request->fetch();
            $user = new User();
            $user->setId_user($result->id_user);
            $user->setNom_user($result->nom_user);
            $user->setPrenom_user($result->prenom_user);
            $user->setEmail_user($result->email_user);
            $user->setMdp_user($result->mdp_user);
            return $user;
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }

    // Ajout d'un utilisateur.

    public function add(User $user)
    {
        try {
            $this->request = $this->connection->prepare(
                "INSERT INTO user_memorii(nom_user,prenom_user,email_user,mdp_user)
                VALUES(:nom_user,:prenom_user,:email_user, :mdp_user)"
            );

            $this->request->bindValue(':nom_user', $user->getNom_user());
            $this->request->bindValue(':prenom_user', $user->getPrenom_user());
            $this->request->bindValue(':email_user', $user->getEmail_user());
            $this->request->bindValue(':mdp_user', $user->getMdp_user());

            $this->request->execute();
        } catch (Exception $e) {
            echo 'erreur : ' . $e->getMessage();
        }
    }
}
