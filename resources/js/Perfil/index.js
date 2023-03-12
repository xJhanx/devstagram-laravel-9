//muestreo del formulacio de reseteo de contraseña
const formChecked = document.querySelector("#change_password");
const SeccionChangePassword = document.querySelector("#form_change_password");
if(formChecked != null){

if(formChecked.checked){
    SeccionChangePassword.classList.replace("hidden","block");
}
formChecked.addEventListener("change", function(){

    if(this.checked){
        SeccionChangePassword.classList.replace("hidden","block");
    }else{
        SeccionChangePassword.classList.replace("block","hidden");

    }

});
}


