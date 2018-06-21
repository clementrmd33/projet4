var reglage;
reglage = {
    blocPost: document.getElementById('blocAdministration'),
    blocComment: document.getElementById('blocAdministration2'),
    button1: document.getElementById('buttonJs1'),
    button2: document.getElementById('buttonJs2'),

    initClickButton1: function () {
        reglage.button1.addEventListener('click', function () {
            reglage.blocPost.style.display = 'block';
            reglage.blocComment.style.display = 'none';
        });
    },
    initClickButton2: function () {
        reglage.button2.addEventListener('click', function () {
            reglage.blocComment.style.display = 'block';
            reglage.blocPost.style.display = 'none';
        });
    }
};
reglage.initClickButton1();
reglage.initClickButton2();

function afficherMessage(){
    alert('Le message a bien été validé');
}

function afficherMessageSupprimer(){
    return confirm('Voulez-vous vraiment supprimer le commentaire ?');
}

function articleSupprimer(){
    return confirm('Voulez-vous vraiment supprimer le chapitre ?');
}
function confirmationModificationTexte()
{
    alert('Félicitation! L\'article a bien été modifié')
}
function signalCom(){
    alert('Le commentaire a bien été signalé ')
}