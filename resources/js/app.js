import Dropzone from "dropzone";

//Para que deje de buscar por dejecto a los formularios con la clase Dropzone
Dropzone.autoDiscover = false;

const myDropzone = new Dropzone("#dropzone",{
    dictDefaultMessage : "Sube tu imagen aquí",
    acceptedFiles : ".png, .jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar Archivo",
    maxFiles: 1,
    uploadMultiple:false,

    init: function(){
        let InputHidden = document.querySelector("[name='imagen']").value;

        if(InputHidden.trim()){
            const ImagenPublicada = {};
            ImagenPublicada.size = 1234;
            ImagenPublicada.name = InputHidden;

            this.options.addedfile.call(this,ImagenPublicada);
            this.options.thumbnail.call(this,ImagenPublicada,`../uploads/${ImagenPublicada.name}`);

            ImagenPublicada.previewElement.classList.add("dz-success","dz-complete")
        }
    },
});

//eventos de dropzone
//mientras se sube el archivo
// myDropzone.on('sending', (file,xhr,FormData) => {
//     console.log(file);
// });
//al ya subirse el archivo y response retorna la respuesta DEL CONTROLADOR
myDropzone.on('success',(file,response) => {
    //asigna la imagen del drag and drop al input oculto del formulario
    document.querySelector("[name='imagen']").value = response.file;
   // console.log(file);
});
//al ocurrir un error
// myDropzone.on('error',(file,message) => {
//     console.log(file,message);
// });

//al remover un archivo
myDropzone.on('removedfile',() => {
    document.querySelector("[name='imagen']").value = "";
    console.log("archivo eliminado");
});
