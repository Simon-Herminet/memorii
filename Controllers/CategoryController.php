<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Models\CategoryModel;
use App\Entities\Category;

class CategoryController extends Controller
{


    //  ************************************ FINDByID ********************************************************
    public function index()
    {


        $userId = $_SESSION['id_user'];
        $categoryModel = new CategoryModel();
        // Appeler la méthode pour récupérer les catégories de l'utilisateur
        $categories = $categoryModel->findCatAndCount($userId);
        // Créer un tableau pour stocker les catégories avec le nombre de questions
        $uniqueCategories = [];
        // On boucle et on stocke une seul entrée par catégory
        foreach ($categories as $category) {
            $categoryId = $category['id_category'];
            // Je verifie si la catégorie a déjà été stockée
            if (!isset($uniqueCategories[$categoryId])) {
                // Si ce n'est pas le cas, Je stocke
                $uniqueCategories[$categoryId] = [
                    'id_category' => $categoryId,
                    'titre_category' => $category['titre_category'],
                    'description_category' => $category['description_category'],
                    'number_of_questions' => $category['number_of_questions']
                ];
            }
        }

        // Afficher les catégories dans la vue
        $this->render('category/index', ['categories' => $uniqueCategories]);
    }


    // ****************************************** ADD category **************************************************
    public function addCategory()
    {
        if (isset($_POST['form_add_category'])) {
            // Je recupere les données du formulaire
            $titre = $_POST['titre_category'] ?? '';
            $description = $_POST['description_category'] ?? '';
            $id_user = $_POST['id_user'] ?? '';

            // Créer un objet Category avec les données du formulaire
            $nouvelleCategory = new Category();
            $nouvelleCategory->setTitre_category($this->protected_values($titre));
            $nouvelleCategory->setDescription_category($this->protected_values($description));
            $nouvelleCategory->setId_user($this->protected_values($id_user));


            // J'ajoute la question à la base de données
            $categoryModel = new CategoryModel();
            $categoryModel->add($nouvelleCategory);

            $_SESSION['message'] = "La catégorie a été ajouté avec succès.";
            header('Location:index.php?controller=category&action=index');
        } else {
            $this->render('category/addCategory');
        }
    }
}
