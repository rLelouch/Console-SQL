body = document.querySelector('body');
bdd = document.getElementById('bdd');

//changer de page pour chaque option du select bdd et avoir dans l'url la valeur du select pour pouvoir la reutiliser dans le php
bdd.addEventListener('change', () => {
    let index = bdd.selectedIndex;
    let valeur = bdd.options[index].value;
    console.log(valeur);
    window.location = `http://wf3/eprojet/eval/requete?table=${valeur}`;
});

// apres redirection le select sera placer sur la bonne valeur au lieu de revenir sur la premier option du select par default
if (window.location != 'http://wf3/eprojet/eval/requete'){
    for(let i = 0; i < bdd.options.length; i++){
        // on serche les query strings de l'url
        //'http://wf3/eprojet/eval/requete/base.php?table=xxx'
        let searchParams = new URLSearchParams(window.location.search);

        // ?table=xxx
        let table = searchParams.get('table');
        
        if (bdd.options[i].value == table){
            bdd.options[i].setAttribute('selected', 'selected');
        }
    }
}

let text_txt = document.getElementsByClassName('text_txt');

Array.from(text_txt).forEach((i) => {
    i.addEventListener('click', (e) =>{
        let  txtCountVal = e.target.innerText;
        console.log(txtCountVal);

        const request = document.querySelector('#request');
        
        request.value = txtCountVal;
        let bdd_txt = $(e.target).siblings().text();
        console.log(bdd_txt);

        if (history.pushState) {
            let newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + `?table=${bdd_txt}`;
            window.history.pushState({path:newurl},'',newurl);
        }

        const url = new URL(window.location);
        url.searchParams.set('table', bdd_txt);
        window.history.pushState(null, '', url.toString());

        /*const url = new URL(`http://wf3/eprojet/eval/requete`);
        url.searchParams.set('table', bdd_txt);*/
        
        window.location.reload();
    });
});