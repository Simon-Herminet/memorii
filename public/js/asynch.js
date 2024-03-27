document.getElementById("searchInput").addEventListener("input", function () {
    const searchText = this.value;
    if (searchText.length >= 3) {
        searchQuestions(searchText);
    }
});

function searchQuestions(searchText) {
    const url = `index.php?controller=question&action=search&query=${searchText}`;
    console.log(url);
    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error("Erreur de réseau.");
            }
            return response.json();
        })
        .then(results => {
            displaySearchResults(results);
        })
        .catch(error => {
            console.error("Erreur lors de la recherche:", error);
            displaySearchResults([]);
        });
}
function displaySearchResults(results) {
    const searchResultsContainer = document.getElementById("searchResultsContainer");

    if (results.length === 0) {
        searchResultsContainer.innerHTML = "<p>Aucun résultat trouvé...</p>";
    } else {
        // Supprimer les anciens résultats
        searchResultsContainer.innerHTML = "";

        // Parcourir les résultats
        results.forEach(result => {

            const resultElement = document.createElement("div");
            resultElement.classList.add("searchResult");

            const paragraph = document.createElement("p");

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




