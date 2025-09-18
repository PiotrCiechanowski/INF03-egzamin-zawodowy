let indexZdjecie = 1;
const zdjecia = 7;

function nastepny(){
    indexZdjecie++;
    if(indexZdjecie > zdjecia) {
        indexZdjecie = 1;
    }
    aktualizacja();
}
function poprzedni(){
    indexZdjecie--;
    if(indexZdjecie < 1){
        indexZdjecie = zdjecia;
    }
    aktualizacja();
}

function aktualizacja(){
    const zdjecieElemnt = document.querySelector("#srodkowy img");
    zdjecieElemnt.src = indexZdjecie + ".jpg";
}