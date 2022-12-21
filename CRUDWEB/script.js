window.onload = (function (){

});

function excluir(url){
    if (confirm('Confirma a Exclusão:')){
        
        window.location.href = url;
    }
}
function preencher() {


    let userInput = document.getElementById("dtnasc").value;
    let data = new Date(userInput);
    let dataatual = new Date();
    var currentY = dataatual.getFullYear();

    var prevY = data.getFullYear();

    var ageY = currentY - prevY;

    console.log(ageY);

    document.getElementById("idade").value = ageY;
}