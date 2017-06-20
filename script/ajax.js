// 4 étapes :
  //on crée l'objet
  //on initialise
  //on envoit
  //on reçoit le résultat

    //La variable contient l'objet qui nous permet de faire une requête http
    var xhr = new XMLHttpRequest();


// ************************************************************************** //
// 1ere REQUETE : AFFICHAGE DES QUESTIONS

    //Ecouteur d'event sur le changement d'état de l'objet
    xhr.onreadystatechange = function() {
      //On vérifier si on est à l'étape 4 et si tout s'est bien passé
      if (xhr.readyState == 4 && (xhr.status == 200)) {

        //Sans JSON.parse, on ne recevrait que du texte et non pas une chaîne json 
        myResponses = JSON.parse(xhr.responseText);

        //Affichage de la liste des questions
        mySection = document.getElementById("liste_Q");
        texte = '<ul>';

        for (theQuestion of myResponses) {
          texte += '<li class="question" data-idq="'+ theQuestion.id_questions +'">'+ theQuestion.titre +'</li>';
        };//-> for-01

        texte += '</ul>'
        mySection.innerHTML = texte;


// ************************************************************************** //
// 2eme REQUETE : AFFICHAGE DES REPONSES

        //Click sur les questions pour afficher les réponses associées
        myQuestions = document.querySelectorAll(".question");

        for (question of myQuestions) {
          question.addEventListener('click', function() {
            myIdq = this.getAttribute("data-idq");

            //On lance une nouvelle requête
            //Nouvelle variable qui contient l'objet qui permet de faire la requête
            var xhrRep = new XMLHttpRequest();

            xhrRep.onreadystatechange = function() {
              if (xhrRep.readyState == 4 && (xhrRep.status == 200)) {

                myLiQ = document.querySelector("[data-idq='" + myIdq + "']");

                if (xhrRep.responseText !== "none") {

                  myResponses = JSON.parse(xhrRep.responseText);

                  //Suppression des réponses si elles étaient déjà affichées
                  replist = document.querySelector(".reponses");
                  if (replist) {
                    replist.parentNode.removeChild(replist);
                  }

                  //Affichage des réponses
                  texte = '<ul class="reponses">';
                  for (theReponse of myResponses) {
                    texte += '<li class="reponse">'+ theReponse.texte +'</li>';
                  };//-> for-03
                  texte += '</ul>';

                  myLiQ.innerHTML += texte;

                }//-> if-03

                else {
                  texte = "<p>Il n'y a pas de réponse.</p>"
                  myLiQ.innerHTML += texte;
                }//-> else-03

              }//-> if-02
            }//-> onreadystatechange-02

            xhrRep.open("GET", "feed.php?id_questions="+myIdq, true);
            xhrRep.send(null);

          })//-> eventClick-01
        }//-> for-02
      };//-> if-01
    }//-> onreadystatechange-01


    //On utilise open() pour initier une requête, de la configurer
    //On précise la method, l'url de destination, et si c'est on est asynchrone ou non.
    //On utilise send pour envoyer la requête
    xhr.open("GET", "feed.php", false);
    xhr.send(null);