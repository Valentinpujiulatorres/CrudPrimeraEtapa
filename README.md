# CrudPrimeraEtapa

## .env Necesario para el funcionamiento de la DB

` DB_CONNECTION=pgsql
DB_HOST=randion.es
DB_PORT=5432
DB_DATABASE=vpujiula_db
DB_USERNAME=vpujiula_usr
DB_PASSWORD=abc123.
`

### Integrantes :

- David Gonzalez
- Valentin Pujiula  
- Daniel Maestre 
- Alex Gonzalez
- Gaspar Novel

--- 

**Los requerimientos de la practica los podemos encontrar en el documento PDF `ProjectInfo.pdf`**

### Questiones :

1. Que es lo mas dificil de hacer en esta prueba ?

    1.1 Probablemente la implementacion de Select2, aunque lo he conseguido sin mayores complicaciones

1. Que es lo mas facil de hacer en esta prueba ?

    2.2 Inicializar el repositorio de Github

1. Que aspecto de la prueba es el que mas te ha gustado trabajar ?

    3.3 No tengo preferencias claras

1. Cual es tu asignatura preferida ?

    4.4 No tengo preferencias claras

1. Que esperas de este proceso de aprendizaje y desarrollo?

    5.5 Aprender , ganar fluideza y hacer de mis conocimientos una biblioteca incremental



---

## SweetAlert

Sweet Alert se trata de unas librerias de las classicas alertas de siempre pero estilizadas para causar una mejor y mas profesional impresion .

Para  ello deberemos Agregar al Layout.blade :

` @include('sweetalert::alert') `

ademas de los siguientes links (cdn referencees)

< link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />

< script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></ script> 

## Datatables 

Son compilaciones de estilos y scripts que mejoran las classicas tablas de datos, estas se incorporan a tu codugoi en forma de Estilos *(Bootstrap) y un script sencillo que hace que la parte interactiva sea util

>B5 Link : < link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">

El script de las tablas (Funcionamiento + modificacion de la paginacion)

>JS : 

  < script src="https://code.jquery.com/jquery-3.5.1.js"></ script>
  < script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></ script>
  < script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></ script>

    $(document).ready(function() {
        $('#productos').DataTable(
       {
           "lengthMenu": [[ 7, 14, 28 ,-1] , [ 7 , 14 , 28 , "All"]]
       } 
    );
        
    } ); 

## Select2 *(Livewire)

Select2 es una version actualizada con estilos y funcionalidades como hovers y buscador a los select comunes de HTML 

IMPORTANTE : 

Se debe agregar al HEAD : 

` <livewire:styles /> `

Ademas de al final de BODY :

`  <livewire:scripts /> `

Los links /CDN que emplearemos son los siguientes :

    < link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    < script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


Ademas de el script tag imprescindible para su correscto funcionamiento 

    $('#select2Valentin').select2({}); 

### Tecnologias Nuevas (Infografia):


1. #### Datatables 




1. #### Select2
     
     Para mas info ver ejemplos > https://www.zentica-global.com/es/zentica-blog/ver/como-crear-el-menu-desplegable-select2-en-laravel-8-livewire-6073a4f27a333 


     https://www.zentica-global.com/es/zentica-blog/ver/como-crear-el-menu-desplegable-select2-en-laravel-8-livewire-6073a4f27a333



1. #### SweetAlert
    Programador senior explicaccion magistral https://www.youtube.com/watch?v=ulmNmifyAQ4

    Explicacion https://www.youtube.com/watch?v=Jocj2U_MlH0&ab_channel=CodersFree
    Para mas info ver ejemplos *(codepen exports) > https://sweetalert2.github.io/ 

    https://laracasts.com/discuss/channels/laravel/sweet-alert-in-laravel-not-working

    - https://www.youtube.com/watch?v=D3Ww5FGa1mY&ab_channel=CodersFree

    Explicacion menos funcional : https://dev.to/snehalk/how-to-use-sweetalert2-in-laravel-8-48lc

1. #### Crud de Imagenes de Laravel 8 

    https://www.youtube.com/watch?v=gkgaLqCySzg&list=RDCMUCLa5WaffYWAaJY09_l863yw&start_radio=1&rv=gkgaLqCySzg&t=328&ab_channel=Inform%C3%A1ticaDP 

1. ### Borrado de Imagen desde carpeta 

Reminder de que he cambiado la ruta de los drivers del proyecto para ubicar mis imagenes en public 
https://es.stackoverflow.com/questions/272943/no-me-elimina-imagen-de-la-carpeta


- Para Tablas relacionales : https://www.youtube.com/watch?v=j7bml8EQpIk&ab_channel=Develoteca 