// ***************************************Recherche en asynchrone pour les questions : *****************************************

// On relie le input et on lui définit une longueur mini de 3
document.getElementById("searchInputQuest").addEventListener("input", function () {
    const searchText = this.value;
    if (searchText.length >= 3) {
        searchQuestions(searchText);
    }
});

// On recherche en asynchrone
async function searchQuestions(searchText) {
    const url = 'index.php?controller=question&action=search';
    const data = { query: searchText };

    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

        if (!response.ok) {
            throw new Error("Erreur de réseau.");
        }

        const results = await response.json();
        displaySearchResultsQuestions(results); // Appeler la fonction displaySearchResultsQuestions
    } catch (error) {
        console.error("Erreur lors de la recherche:", error);
        displaySearchResultsQuestions([]); // Appeler la fonction displaySearchResultsQuestions
    }
}

// Si resultat : on conditionne
function displaySearchResultsQuestions(results) { // Renommer la fonction en displaySearchResultsQuestions
    const searchResultsContainer = document.getElementById("searchResultsContainerQuestion");
    // si pas de resultat -> aucun resultat
    if (results.length === 0) {
        searchResultsContainer.innerHTML = "<p>Aucun résultat trouvé...</p>";
    } else {
        // Supprimer les anciens résultats
        searchResultsContainer.innerHTML = "";

        // Parcourir les résultats
        results.forEach(result => {
            // On crée une div à chaque résultat
            const resultElement = document.createElement("div");
            resultElement.classList.add("searchResult");
            // On crée un élément <p>
            const paragraph = document.createElement("p");
            // contenu dans un <a> qui renvoie vers la modification de la question
            const link = document.createElement("a");
            link.href = "index.php?controller=question&action=formUpdate&id=" + result.id_question;
            link.textContent = result.question_question;

            paragraph.appendChild(link);

            if (result.response !== undefined) {
                const responseText = document.createTextNode(result.response);
                paragraph.appendChild(responseText);
            }

            resultElement.appendChild(paragraph);

            searchResultsContainer.appendChild(resultElement);
        });
    }
}
