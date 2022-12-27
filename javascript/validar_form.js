let textEmail = document.getElementById("textEmail");
let email = document.getElementById("email");
let contador_email=0;

function validatorEmail(email) {
    let emailPattern =
      /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
    return emailPattern.test(email);
  }

email.addEventListener("keyup", () => {
    if (validatorEmail(email.value) !== true) {
      textEmail.innerHTML = "Modo certo email:teste@email.com";
      email.style.background = "#F08080";
    } else {
        if(email.background = "#F08080"){
            setTimeout(() => {
                email.style.background = "#Ffffff";
                contador_email=1;
            }, 1000);  
        }
      textEmail.innerHTML = "";
    }
  });


  function validar_form(){
    let contador=0;
    let dadosv = [];
    let nome = document.getElementById("nome");
    let email = document.getElementById("email");
    let user = document.getElementById("user");
    let senha = document.getElementById("senha");
    let dados = [nome,email,user,senha];
    for(i=0;i<4;i++){
        dadosv[i]=dados[i].value.length;
    }
   //arrumar em casa para deixar o programa mais compacto e responsivo
   // tem algo a ver com onkeypress ver qnd for terminar o trablaho.
   for(i=0;i<4;i++){
    if(dadosv[i]>7){
        contador++;
       }else{
        dados[i].style.background = "#F08080";
       }
   }
   for(i=0;i<4;i++){
        if(dados[i].background = "#F08080"){
        let txt = document.getElementById("texto");
        txt.style.display = "";
        txt.innerHTML = `[ERRO] Verifique os campos em vermelho!`;
            setTimeout(() => {
                nome.style.background = "#Ffffff";
                email.style.background = "#Ffffff";
                user.style.background = "#Ffffff";
                senha.style.background = "#Ffffff";
                txt.style.display = "none";
            }, 3000);
     }
   }

   contador+=contador_email;
   console.log(contador)
if(contador==5){
    let txt = document.getElementById("texto");
    txt.style.display = "";
    txt.innerHTML = `Validação feita com sucesso`;

        setTimeout(() => {
            txt.style.display = "none";
        }, 3000);

    document.getElementById("cadastrar").type = "submit";
}

}



    const email_r = (evt) =>{
        const evento = evt || window.event;
        const charCode = event.keyCode || event.which;//qual tecla foi pressionada
        const ehEspaco = charCode ==32;//32 = espa~p
        const ehBack = charCode ==8;//8 = backspace
        const ehNumero = charCode>47 && charCode <58;//48 57 = numeros
        const ehArroba = charCode==64 ;//64 = @
        const ehPonto = charCode==46 ;//46 = @
        const ehMinis = charCode >96 && charCode<123;//minuscula
        return(ehMinis||ehEspaco||ehBack||ehArroba||ehPonto||ehNumero);//somente as coisas acima
    };

    const nome_r = (evt) =>{
        const evento = evt || window.event;
        const charCode = event.keyCode || event.which;//qual tecla foi pressionada
        const ehEspaco = charCode ==32;//32 = espa~p
        const ehBack = charCode ==8;//8 = backspace
        const ehMaisc = charCode >64 && charCode<91;//letra maiuscula
        const ehMinis = charCode >96 && charCode<123;//minuscula
        return(ehMinis||ehMaisc||ehEspaco||ehBack);//somente as coisas acima
    };

    const senha_user= (evt) =>{
        const evento = evt || window.event;
        const charCode = event.keyCode || event.which;//qual tecla foi pressionada
        const ehEspaco = charCode ==32;//32 = espa~p
        const ehBack = charCode ==8;//8 = backspace
        const ehNumero = charCode>47 && charCode <58;//48 57 = numeros
        const ehMaisc = charCode >64 && charCode<91;//letra maiuscula
        const ehMinis = charCode >96 && charCode<123;//minuscula
        return(ehMinis||ehMaisc||ehEspaco||ehBack||ehNumero);//somente as coisas acima
    };


