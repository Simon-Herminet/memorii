<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Entities\User;
use App\Models\UserModel;

class UserController extends Controller
{

    public function inscription()
    {

        // var_dump($_POST['form_inscription']);
        // var_dump($_POST);
        // var_dump($_POST['form_connexion']);

        if (isset($_POST['form_inscription'])) {
            // Traitement du formulaire d'inscription
            $nomUser = $_POST['nom_user'] ?? '';
            $prenomUser = $_POST['prenom_user'] ?? '';
            $emailUser = $_POST['email_user'] ?? '';
            $mdpUser = $_POST['mdp_user'] ?? '';

            if (preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/', $mdpUser)) {
                // Mot de passe valide
                $user = new User();
                $user->setNom_user($this->protected_values($nomUser));
                $user->setPrenom_user($this->protected_values($prenomUser));
                $user->setEmail_user($this->protected_values($emailUser));
                $user->setMdp_user($this->protected_values(password_hash($mdpUser, PASSWORD_DEFAULT)));

                $userModel = new UserModel();
                $userModel->add($user);

                $_SESSION['message'] = "Vous êtes inscrit avec succès. Vous pouvez vous connecter maintenant.";
                header('location:' . $this->baseUrlSite . 'index.php?controller=User&action=inscription');
                exit();
            }
        } elseif (isset($_POST['form_connexion'])) {
            // Traitement du formulaire de connexion.
            $emailUser = $_POST['email_user'] ?? '';
            $mdpUser = $_POST['mdp_user'] ?? '';

            $userModel = new UserModel();

            // Rechercher l'utilisateur par email
            $user = $userModel->find($emailUser);

            if ($user && password_verify($mdpUser, $user->getMdp_user())) {
                // Stocker les informations de l'utilisateur dans la session
                $_SESSION['id_user'] = $user->getId_user();
                $_SESSION['nom_user'] = $user->getNom_user();
                $_SESSION['prenom_user'] = $user->getPrenom_user();
                $_SESSION['email_user'] = $user->getEmail_user();
                $_SESSION['acces'] = TRUE;

                $_SESSION['message'] = "Vous êtes connecté avec succès.";
                header('location:' . $this->baseUrlSite . 'index.php?controller=User&action=index');
            } else {
                $_SESSION['error'] = "Les informations de connexion sont incorrectes.";
                header('location:' . $this->baseUrlSite . 'index.php?controller=User&action=inscription');
                exit();
            }
        } else {
            // Afficher les formulaires d'inscription et de connexion
            $this->render('user/inscription');
        }
    }


    // Deconnexion du user
    public function logout()
    {
        session_destroy();

        header('location:' . $this->baseUrlSite . '');
    }

    public function index()
    {
        $this->render('user/index');
    }
}
