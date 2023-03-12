Para desplegay. 

1-> eliminar el archivo .get de la carpeta resurces/lang
2-> quitar de .gitignore del proyecto la rutas public/build 
3-> correr el comnado npm run build para evitar que los scripts yu estiulos secarrguen en el servidor 

4-> en el boot de appSerrviceProvider en la funcion boot poner para poner el https en todo el proyecto : 
        if($this->app->environment('production')){
            URL::forceScheme('https');
        }
