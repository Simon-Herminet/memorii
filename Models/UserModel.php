<?php

namespace App\Models;

use App\Core\DbConnect;
use App\Entities\User;
use Exception;

class UserModel extends DbConnect
{
    //********************************************* */ CONNEXION D'UN USER.***************************************************

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
            $user->setStatus_user($result->status_user);
            return $user;
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }

    //********************************************* */ AJOUT NEW USER.***************************************************

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
    //********************************************* */ UPDATE USER (SAUF MDP).***************************************************

    public function updateInfo(User $majUser)
    {
        try {
            $this->request = $this->connection->prepare(
                "UPDATE user_memorii SET nom_user=:nom_user, prenom_user=:prenom_user, email_user=:email_user 
                WHERE id_user=:id_user"
            );
            $this->request->bindValue(':id_user', $majUser->getId_user());
            $this->request->bindValue(':nom_user', $majUser->getNom_user());
            $this->request->bindValue(':prenom_user', $majUser->getPrenom_user());
            $this->request->bindValue(':email_user', $majUser->getEmail_user());

            $this->request->execute();
            // echo $this->request->rowCount();
        } catch (Exception $e) {
            echo "erreur :" . $e->getMessage();
        }
    }
    //********************************************* */ TROUVER USER PAR ID   ***************************************************
    public function findById($idUser)
    {
        try {
            $this->request = $this->connection->prepare(
                "SELECT * FROM user_memorii WHERE id_user = :idUser"
            );
            $this->request->bindParam(':idUser', $idUser);
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

    //********************************************* */ UPDATE PASSWORD USER ***************************************************
    public function updateMdp(User $user)
    {
        try {
            $this->request = $this->connection->prepare(
                "UPDATE user_memorii SET mdp_user=:mdp_user
            WHERE id_user=:id_user"
            );
            $this->request->bindValue(':id_user', $user->getId_user());
            $this->request->bindValue(':mdp_user', $user->getMdp_user());
            $this->request->execute();
        } catch (Exception $e) {
            echo "Erreur :" . $e->getMessage();
        }
    }
    public function updateAnonymeAccount(User $user)
    {
        try {
            // Préparer la requête SQL
            $this->request = $this->connection->prepare(
                "UPDATE user_memorii SET nom_user=:nom_user, prenom_user=:prenom_user, email_user=:email_user, mdp_user=:mdp_user, status_user=:status_user
                WHERE id_user=:id_user"
            );

            // Lier les valeurs aux marqueurs de position
            $this->request->bindValue(':id_user', $user->getId_user());
            $this->request->bindValue(':nom_user', $user->getNom_user());
            $this->request->bindValue(':prenom_user', $user->getPrenom_user());
            $this->request->bindValue(':email_user', $user->getEmail_user());
            $this->request->bindValue(':mdp_user', $user->getMdp_user());
            $this->request->bindValue(':status_user', $user->getStatus_user());

            // Exécuter la requête
            $this->request->execute();
        } catch (Exception $e) {
            echo "Erreur:" . $e->getMessage();
        }
    }
}
