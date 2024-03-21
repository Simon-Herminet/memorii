<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Entities\User;
use App\Models\UserModel;

class UserController extends Controller
{


    //********************************************* */ INSCRIPTION ET CONNEXION USER***************************************************


    public function inscription()
    {
        // Je recupere et conditionne par rapport au name de mon bouton
        if (isset($_POST['form_inscription'])) {
            // je stocke mes $_POST
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
                // je stocke en session mon message de succès
                $_SESSION['message'] = "Vous êtes inscrit avec succès. Vous pouvez vous connecter maintenant.";
                header('location:' . $this->baseUrlSite . 'index.php?controller=User&action=inscription');

                exit();
            }
        }
        // Je recupere et conditionne par rapport au name de mon bouton de connexion  
        elseif (isset($_POST['form_connexion'])) {
            // Traitement du formulaire de connexion.
            $emailUser = $_POST['email_user'] ?? '';
            $mdpUser = $_POST['mdp_user'] ?? '';

            $userModel = new UserModel();

            //********************************************* */ RECHERCHE USER EMAIL***************************************************
            $user = $userModel->find($emailUser);

            if ($user && password_verify($mdpUser, $user->getMdp_user())) {
                // Je stocke mes infos dans $_SESSION
                $_SESSION['id_user'] = $user->getId_user();
                $_SESSION['nom_user'] = $user->getNom_user();
                $_SESSION['prenom_user'] = $user->getPrenom_user();
                $_SESSION['email_user'] = $user->getEmail_user();
                $_SESSION['acces'] = TRUE;
                // Je genere et stock en session un message de succes
                $_SESSION['message'] = "Vous êtes connecté avec succès.";
                header('location:' . $this->baseUrlSite . 'index.php?controller=User&action=index');
            } else {
                // Je genere et stock un message d'erreur
                $_SESSION['error'] = "Les informations de connexion sont incorrectes.";
                header('location:' . $this->baseUrlSite . 'index.php?controller=User&action=inscription');
                exit();
            }
        } else {
            // Afficher les formulaires d'inscription et de connexion
            $this->render('user/inscription');
        }
    }


    //********************************************* */ DECONNEXION USER       ********************************************************


    public function logout()
    {
        session_destroy();

        header('location:' . $this->baseUrlSite . '');
    }


    //********************************************* */ PAGE ACCUEIL USER CONNECTé  ***************************************************

    public function index()
    {
        $this->render('user/index');
    }
    // Page a alimenter avec les differente liste de question et category.


    //********************************************* */ UPDATE INFO USER (SAUF MDP) ***************************************************

    public function updateForm()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_user = $_POST['id_user'] ?? '';
            $emailUser = $_POST['email_user'] ?? '';
            $nomUser = $_POST['nom_user'] ?? '';
            $prenomUser = $_POST['prenom_user'] ?? '';

            if (!empty($id_user) && !empty($emailUser) && !empty($nomUser) && !empty($prenomUser)) {
                $majUser = new User();

                $majUser->setId_user($this->protected_values($id_user));
                $majUser->setNom_user($this->protected_values($nomUser));
                $majUser->setPrenom_user($this->protected_values($prenomUser));
                $majUser->setEmail_user($this->protected_values($emailUser));

                $userModel = new UserModel();
                $userModel->updateInfo($majUser);


                $_SESSION['nom_user'] = $majUser->getNom_user();
                $_SESSION['prenom_user'] = $majUser->getPrenom_user();
                $_SESSION['email_user'] = $majUser->getEmail_user();

                // Rediriger l'utilisateur vers la page de profil
                $_SESSION['message'] = "Les données ont été mis a jour avec succès.";
                $this->render('user/index');
                exit();
            }
        }
        $this->render('user/updateForm');
    }

    //********************************************* */ UPDATE PASSWORD USER        ***************************************************


    public function updateMdp()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_user = $_SESSION['id_user'] ?? '';
            $old_mdp = $_POST['old_mdp_user'] ?? '';
            $new_mdp = $_POST['new_mdp_user'] ?? '';
            $confirm_new_mdp = $_POST['confirm_new_mdp_user'] ?? '';
            // Je verifie que les deux nouveaux mot de passe correspondent.
            if ($new_mdp !== $confirm_new_mdp) {
                echo "Les nouveaux mots de passe ne correspondent pas.";
                return;
            }

            // Je retrouve mon USER par rapport a son ID
            $userModel = new UserModel();
            $user = $userModel->findById($id_user);
            // Je verifie que l'ancien mot de passe est celui entré en base de donnée.
            if (!password_verify($old_mdp, $user->getMdp_user())) {
                echo "Mot de passe actuel incorrect.";
                return;
            }

            // Si tout est ok, je hash le nouveau mot de passe.
            $hashed_new_mdp = password_hash($new_mdp, PASSWORD_DEFAULT);

            $user->setMdp_user($hashed_new_mdp);

            $userModel->updateMdp($user);

            $_SESSION['user'] = $user;
            // Message de deconnexion apres changement du mot de passe 
?>
            <script>
                // Message au user : 
                alert("Votre mot de passe a bien été mis à jour. Vous allez maintenant être déconnecté.");

                // Déconnexion de l'utilisateur en supprimant la session
                fetch("<?php echo $this->baseUrlSite . 'index.php?controller=User&action=logout'; ?>", {
                    method: 'POST',
                    credentials: 'same-origin',
                }).then(response => {
                    // Redirige l'utilisateur vers la page de connexion et inscription. 
                    window.location.href = "<?php echo $this->baseUrlSite . 'index.php?controller=User&action=inscription'; ?>";
                }).catch(error => {
                    console.error('Erreur lors de la déconnexion:', error);
                });
            </script>
<?php
        } else {
            // Rediriger vers la page de formulaire si la méthode de requête n'est pas POST
            $this->render('user/updateMdp');
        }
    }
}
