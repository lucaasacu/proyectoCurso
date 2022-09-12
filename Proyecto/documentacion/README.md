# proyectoCurso
Primer proyecto desarrollado para un curso de programación web.

## Contenido del proyecto
1. [Informacion](#info)
2. [Tecnologias](#tecnologias)
3. [Instalacion](#instalacion)
4. [Autor](#autor)
5. [Fechas](#fechas)

### Info
***
Es un proyecto de desarrollo web en el que se realizó una pagina de la institucion deportiva "Club Nacional de Football" utilizando el lenguaje PHP y MySQL como base de datos.

Posee una vista frontend de facil acceso con un diseño amigable con el usuario y con una buena facilidad a la hora de ser usado.
Existen 4 apartados diferentes en la pagina, primero está la pagina principal que muestra un poco de información, los ultimos resultados del club, links a redes sociales y ciertas imagenes.

Luego está la seccion de Noticias, la cual necesitaremos estar logeados para poder acceder, ahi podremos ver noticias relevantes del club, de los jugadores, del mercado de pases asi como tambien de las actividades extra del equipo y los resultados.

Despues tendras la seccion deportistas en la que se encuentran todos los jugadores del club listados por posicion dentro del campo de juego, con informacion como su numero, genero y fecha de nacimiento (estos ultimos dos los veremos haciendo click en cada jugador).

Por ultimo una seccion de contacto para dejar un mensaje y acceso a todas las redes sociales.

Podremos iniciar sesion con el boton "Login" de la parte superior asi como tambien registrarnos si somos nuevos usuarios, tambien salirnos si queremos cerrar la sesion una vez iniciada.

En el backend nos vamos a encontrar un panel de administracion al que solo podremos acceder siendo administradores, ahi vamos a poder controlar todo lo que se ve en el frontend, todas las noticias y los deportistas.
Podemos ingresar, editar y eliminar a nuestro gusto y una vez se hayan realizado los cambios los podremos ver en el frontend de la pagina.


## Tecnologias
***
* [PHP]: Version 7.4.19 
* [MySQL]: Version 5.7.33
* [Materialize CSS]: Version 1.0.0
* [DBeaver]: Version 22.0.5
* [Visual Studio Code]: Version 1.71


## Instalacion
***
Para mejor informacion sobre la instalacion leer "manualdeuso.pdf".

i)Crear la base de datos de nombre baselucas
ii)Abrir la terminal y ubicarnos en el backend "C:\laragon\www\LucasAcuna\proyecto\backend" utilizando el comando cd.
iii)Ejecutar la sentencia de instalacion "php .\cron.php instalar"
iv)Esperar que se instale la base de datos
v)Si se quiere comprobar que se instalo, se puede mirar las tablas de mysql con "show tables;" o algun insert con "select * from deportistas;"
vi)Ya quedo listo para usar. De no funcionar esto instalar la base manualmente con el basedump.sql que queda dentro del proyecto.


## Autor
***
Lucas Acuña
El taller de informatica
Curso Programador Web PHP y MySQL
2022

## Fechas
***
Comienzo de clases => 23/05/2022
Comienzo del proyecto => 20/07/2022
Ultima fecha de actualizacion => 12/09/2022
Fecha de entrega => 12/09/2022
