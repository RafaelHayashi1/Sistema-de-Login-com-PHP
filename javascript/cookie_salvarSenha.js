let user = document.getElementById("user");
let senha = document.getElementById("senha");
let dadosCookie = document.cookie;
dadosCookie=dadosCookie.split("=");

if(dadosCookie!=""){
    console.log(dadosCookie);
    user.value= dadosCookie[1];
    senha.value= dadosCookie[2];
}
function Lembrarsenha(checkbox) {
    if (checkbox.checked == true) {
        var now = new Date();
        var minutes = 30;
        now.setTime(now.getTime() + (minutes * 60 * 1000));
        let dados = [user.value, senha.value];
        document.cookie = `Salvar Senha=${dados[0]}=${dados[1]};expires=${now.toUTCString()}`
    }
}
