<?php
$title = "page d'accueil";
?>

<div id="homePage">
    <div class="home">
        <h3 class='titleHome'>Mes 5 dernières questions :</h3>
        <ul class="homeContent">
            <?php foreach ($latestQuestions as $question) : ?>
                <li class="content">
                    <p class="textContent"><?php echo $question['question_question']; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href='index.php?controller=question&action=addQuestion'>
            <h3>Ajouter une question?</h3>
        </a>
    </div>

    <div class="home">
        <h3 class='titleHome'>Mes 5 dernières catégories :</h3>
        <ul class="homeContent">
            <?php foreach ($latestCategories as $category) : ?>
                <li class="content">
                    <p><?php echo $category['titre_category']; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="index.php?controller=category&action=addCategory">
            <h3> Ajouter une catégorie?</h3>
        </a>
    </div>

    <div class="home">
        <h3 class='titleHome'>Je lance un quiz:</h3>
    </div>
</div>