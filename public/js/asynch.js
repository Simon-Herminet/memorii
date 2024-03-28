
// On relie le input et on lui defini une longueur mini de 3
document.getElementById("searchInput").addEventListener("input", function () {
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
        displaySearchResults(results);
    } catch (error) {
        console.error("Erreur lors de la recherche:", error);
        displaySearchResults([]);
    }
}

// Si resultat : on conditionne 
function displaySearchResults(results) {
    const searchResultsContainer = document.getElementById("searchResultsContainer");
    // si pas de resultat -> aucun resultat
    if (results.length === 0) {
        searchResultsContainer.innerHTML = "<p>Aucun résultat trouvé...</p>";
    } else {

        // Supprimer les anciens résultats
        searchResultsContainer.innerHTML = "";

        // Parcourir les résultats
        results.forEach(result => {
            // On creer une div a chaque recultat
            const resultElement = document.createElement("div");
            resultElement.classList.add("searchResult");
            // On creer un element <p>
            const paragraph = document.createElement("p");
            // contenu dans un <a> qui renvoi vers la modification de la question 
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




