/*var var1, var2, var3, var4, var5, var6;
var1 = prompt('entrer le premier chiffre :');
var2 = prompt('entrer la deuxieme chiffre :');
//var3 = var1 + var2;
//alert(var3);

var4 = parseInt(var1);
var5 = parseInt(var2);
var6 = var4 + var5;
alert(var6);*/
/*if(confirm('voullez-vous excuter ce code javascripte dans ce cour ?')){
    var tri = prompt('entrer d\'abord votre nom');
    alert('Attendez d\'abord');
    
}
else{
    alert('Tu doit ecrire ton nom d\'abord');
}*/

var fonction = function(){
    var chiffre = parseInt(prompt('Choisissez un entier de [ 1 - 10 ] pour tirer votre chance !!!'));
    switch(chiffre){
        case 1 : 
            alert('mahay');
            break;
        case 2 :
            alert('maditra');
            break;
        case 3 :
            alert('mendrika');
            break;
        case 4 :
            alert('bado');
            break;
        case 5 :
            alert('tia vola');
            break;
        case 6 :
            alert('tia toaka');
            break;
        case 7 :
            alert('tsotra');
            break;
        case 8 :
            alert('kizitina');
            break;
        case 8 :
            alert('betoromaso');
            break;
        case 9 :
            alert('tia ady');
            break;
        case 10 :
            alert('mitsaitsaingoka');
            break;
        default:
        alert('tsisy ato aih !');
    }

};

fonction();