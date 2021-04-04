<h2>Introduccion</h2>

Este programa lee el archivo que se le indique en la variable ```inputFilename``` y escribe el resultado en un archivo al que ```outputFilename``` que, en caso de no existir, creara el fichero.

Busca en una ```CADENA<M>``` por coincidencias indicadas en las ```CADENAS<N>```

La cadena ```CADENA<M>``` es sanitizada para eliminar letras repetidas al rededor de cada una.

El archivo de entrada se espera tenga el siguiente formato:

```
N1 N2 M
CADENA<N1>
CADENA<N2>
CADENA<M>
```

Donde:
<br>La primera linea es usada exclusivamente para indicar tamaños de los textos de las lineas posteriores

<br>```N1, N2, ...Nn``` son numeros del 2 al 50 inclusive; 
<br>```N``` es un numero del 3 al 5000 inclusive;
<br>```CADENA<N>``` y ```CADENA<M>``` es una cadena de texto

<br>Tiene que existir el mismo numero de cadenas como numeros se hayan indicado.

<br>Todas las cadenas aceptan las cadenas ```[a-zA-Z0-9]```

Segun la cantidad de ```CADENA<N>``` haya en el fichero de entrada sera la cantidad de resultados que se mostraran en el fichero ```outputFilename``` siendo la palabra ```SI``` en caso de haber coincidencia de esa cadena en la ```CADENA<M>```

<h2>Ejemplo</h2>
11 15 38
<br>CeseAlFuego
<br>CorranACubierto 
<br>XXcaaamakkCCessseAAllFueeegooDLLKmmNNN


<h2>Ejecuccion</h2>
Se debe tener instalado Node >= 10.18.0
<br><br>

```
npm run start
```