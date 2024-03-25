// document.getElementById("envoyer").addEventListener("submit", verif);

// function verif(e) {

//     e.preventDefault();

//     var verification = true;
//     var input = document.getElementById("envoyer").querySelectorAll("input");
//     console.log(input);

//     input.forEach(element => {
//         if (element.value == '') {
//             verification = false
//         }
//     });


//     if (verification) {
//         document.getElementById("envoyer").submit();
//     }
//     else {
//         alert("Merci de renseigner tous les champs du formulaire.")
//     }
// }
// FORMDATA

// ******************************************Permet de generer un message si mot de passe invalide. ******************************

document.addEventListener('DOMContentLoaded', function () {
    var passwordInput = document.getElementById('mdp');
    var passwordMessage = document.getElementById('password-message');

    passwordInput.addEventListener('input', function () {
        var password = passwordInput.value;
        var passwordPattern = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/;

        if (passwordPattern.test(password)) {
            passwordMessage.textContent = 'Mot de passe conforme';
            passwordMessage.style.color = 'green';
        } else {
            passwordMessage.textContent = 'Le mot de passe doit contenir au moins 8 caractères avec au moins une majuscule, un chiffre et un caractère spécial.';
            passwordMessage.style.color = 'red';
        }
    });
});

// **********************************  Permet de generer un message si adresse mail invalide. *****************************************

document.addEventListener('DOMContentLoaded', function () {
    var emailInput = document.getElementById('email');
    var emailMessage = document.getElementById('email-message');

    emailInput.addEventListener('input', function () {
        var email = emailInput.value;
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (emailPattern.test(email)) {
            emailMessage.textContent = 'Adresse e-mail valide';
            emailMessage.style.color = 'green';
        } else {
            emailMessage.textContent = 'Adresse e-mail invalide';
            emailMessage.style.color = 'red';
        }
    });

});

//****************************** */ Gestion redirection avec boite confirm pour suppression question *********************************

document.querySelectorAll('.delete-question-link').forEach(function (link) {
    link.addEventListener('click', function (event) {

        if (!confirm('Êtes-vous sûr de vouloir supprimer cette question ?')) {
            event.preventDefault();
        }
    });
});

// ************************************ Redirection avec message alert pour update donnée USER *****************************************






