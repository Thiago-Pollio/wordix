<?php
include_once("wordix.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Carrasco, Nadia. 4236. TUDW. nadiacarrasco83.nc@gmail.com . Nadia-Carrasco */
/* Salgado, Sol. 4266. TUDW. sol.g.salgado@gmail.com. solsalgado */
/* Pollio, Thiago. 4267. TUDW. thiagopollio@yahoo.com.ar. Thiago-Pollio */



/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "PERRO", "LIBRO", "LIMON", "ARBOL", "CINCO"
    ];

    return ($coleccionPalabras);
}
/**
 * Obtiene una coleccion de partidas
 * @return array 
 */
function cargarPartidas (){
    
    $coleccionPartidas[0] = ["palabraWordix" => "MUJER", "jugador" => "pedro", "intentos" => 0, "puntaje" => 0];
    $coleccionPartidas[1] = ["palabraWordix" => "QUESO", "jugador" => "roberto", "intentos" => 3, "puntaje" => 13];
    $coleccionPartidas[2] = ["palabraWordix" => "FUEGO", "jugador" => "mariana", "intentos" => 2, "puntaje" => 12];
    $coleccionPartidas[3] = ["palabraWordix" => "CASAS", "jugador" => "lucas", "intentos" => 6, "puntaje" => 0];
    $coleccionPartidas[4] = ["palabraWordix" => "RASGO", "jugador" => "paola", "intentos" => 1, "puntaje" => 16];
    $coleccionPartidas[5] = ["palabraWordix" => "GATOS", "jugador" => "mariana", "intentos" => 3, "puntaje" => 15];
    $coleccionPartidas[6] = ["palabraWordix" => "MUJER", "jugador" => "lucas", "intentos" => 4, "puntaje" => 12];
    $coleccionPartidas[7] = ["palabraWordix" => "TINTO", "jugador" => "pedro", "intentos" => 5, "puntaje" => 13];
    $coleccionPartidas[8] = ["palabraWordix" => "CINCO", "jugador" => "paola", "intentos" => 2, "puntaje" => 14];
    $coleccionPartidas[9] = ["palabraWordix" => "LIMON", "jugador" => "carlos", "intentos" => 5, "puntaje" => 11];
    return ($coleccionPartidas);
}
/** 
 * Obtiene la opcion elegida del Menú    
 * @return int $numOpcion 
 */
function seleccionarOpcion(){
    $menu= "Menú de opciones: \n" .
    "1) Jugar al Wordix con una palabra elegida \n".
    "2) Jugar al Wordix con una palabra aleatoria \n" .
    "3) Mostrar una partida \n".
    "4) Mostrar la primer partida ganadora \n" . 
    "5) Mostrar resumen de Jugador \n" . 
    "6) Mostrar listado de partidas ordenadas por jugador y por palabra \n" . 
    "7) Agregar una palabra de 5 letras a Wordix \n" . 
    "8) Salir \n"; 
    echo $menu;
    echo "Ingrese una opcion: ";
    $numOpcion=trim(fgets(STDIN));
    while ($numOpcion<1 || $numOpcion>8){
        echo $menu;
        echo "Ingrese una opcion: ";
        $numOpcion=trim(fgets(STDIN));
    }
    return $numOpcion;
}

//Invoca a la funcion que solicita un numero entre un rango de valores

//$numeroValido = solicitarNumeroEntre();


/**
 * Muestra los datos de partida
 * @param array $coleccionDePartidas
 */
function datosPartida($coleccionDePartidas){
    //int $numero
     $coleccionDePartidas = cargarPartidas();
     $n = count($coleccionDePartidas);
     $i = 0;
     $num = false;
     echo "Ingrese un número: ";
     $numero = trim(fgets(STDIN));
     while ($i < $n && $num == false) {
         if ($numero < $n) {
             $num = true;
         } else {
             $num = false;
         }
         $i = $i + 1;
     
     if ($num == true) {
         echo "Partida WORDIX ". $numero.": palabra ". $coleccionDePartidas[$numero]["palabraWordix"]. "\n";
         echo "Jugador: ". $coleccionDePartidas[$numero]["jugador"]. "\n";
         echo "Puntaje: ". $coleccionDePartidas[$numero]["puntaje"]. "\n";
         if ($coleccionDePartidas[$numero]["puntaje"] == 0) {
             echo "Intento: No adivinó la palabra.";
         } elseif ($coleccionDePartidas[$numero]["puntaje"] > 0) {
             echo "Intento: Adivinó la palabra en ". $coleccionDePartidas[$numero]["intentos"]." intentos";
         }
     } else {
         echo "Ingrese un numero válido: ";
         $numero = trim(fgets(STDIN));
     } 
  }
 }



//Invoca a la funcion que verifica si una palabra es de 5 letras
//$validarPalabra = leerPalabra5Letras();

/**
 *  Agrega una palabra a la coleccion de palabras
 *  @param array $coleccionPalabras
 *  @param string $palabra
 *  @return array 
 */

function agregarPalabra ($coleccionPalabras, $palabra) {

    $n = count($coleccionPalabras);
    $i = 0;
    $palabraRepetida = false;

    while ($i < $n && $palabraRepetida == false) {
        if ($palabra == $coleccionPalabras[$i]){

            echo "Palabra ya ingresada. Ingrese una nueva palabra: ";
            $palabra = trim(fgets(STDIN));
            $palabra=leerPalabra5Letras($palabra);
            $i=0;
        }else{
            $i=$i+1;
        }

        if ($i >= $n || $palabraRepetida == true){
        $coleccionPalabras []= $palabra;
    }
    }
    
    return print_r($coleccionPalabras);
 }

 $palabras=cargarColeccionPalabras();
 $palabraNueva=leerPalabra5Letras();
 agregarPalabra($palabras, $palabraNueva);



/**
 * Muestra la primera partida ganada de un jugador
 * @param array $partidas
 * @param string $nombre
 * @return int
 */
function primeraPartidaGanada($partidas, $nombre){
    //int $indice
    $partidas = cargarPartidas();
    $n = count($partidas); 
    $i = 0;
    $encontrado = false; 
    while ($i < $n && $encontrado == false) {
        if ($nombre == $partidas[$i]["jugador"]) {
          if ($partidas[$i]["puntaje"] > 0 ) {
            $encontrado = true;
            }else {
            $encontrado = false;
            }
        }
        $i = $i + 1;
    }
    if ($encontrado == true) {
        $indice = $partidas[$i];
    } else {
        $indice = -1;
    }
    return ($indice);
}


/**
 * Retorna el resumen de un jugador
 * @param array $partida
 * @param string $nombre
 * @return array
 */
function resumenJugador($partida, $nombre){
    //array $resumenDeJugador
    //int $partidasT, $puntajeT, $victorias, $intento1, $intento2, $intento3, $intento4, $intento5; $intento6
    $partida = cargarPartidas();
    $n = count($partida);
    $partidasT = 0;
    $puntajeT = 0;
    $victorias = 0;
    $intento1 = 0;
    $intento2 = 0;
    $intento3 = 0;
    $intento4 = 0;
    $intento5 = 0;
    $intento6 = 0;
    $resumenDeJugador = [];
    for ($i=0; $i < $n; $i++) { 
        if($nombre == $partida[$i]["jugador"]){
            $partidasT = $partidasT + 1;
            $puntajeT = $puntajeT + $partida[$i]["puntaje"];
            if ($partida[$i]["puntaje"] > 0) {
                $victorias = $victorias + 1;
            }
            switch ($partida[$i]["intentos"]) {
                case 1:
                    $intento1 = $intento1 +1;
                    break;
                case 2:
                    $intento2 = $intento2 + 1;
                    break;
                case 3:
                    $intento3 = $intento3 + 1;
                    break;    
                case 4:
                    $intento4 = $intento4 + 1;
                    break;
                case 5:
                    $intento5 = $intento5 + 1;
                    break;
                case 6:
                    $intento6 = $intento6 + 1;
                    break;         
            }
        }
    }


    $resumenDeJugador["jugador"] = $nombre;
    $resumenDeJugador["partidas"] = $partidasT;
    $resumenDeJugador["puntaje"] = $puntajeT;
    $resumenDeJugador["victorias"] = $victorias;
    $resumenDeJugador["intento1"] = $intento1;
    $resumenDeJugador["intento2"] = $intento2;
    $resumenDeJugador["intento3"] = $intento3;
    $resumenDeJugador["intento4"] = $intento4;
    $resumenDeJugador["intento5"] = $intento5;
    $resumenDeJugador["intento6"] = $intento6;
    return $resumenDeJugador;
}  


/**
 * Solicita el nombre de un jugador y lo convierte a minusculas
 * @return string $minusculas
 */
function solicitarJugador (){
    $minusculas = "";
    $nombreEnMinusculas = false;
    echo "Ingrese el nombre del jugador: ";
    $nombreJugador = trim(fgets(STDIN));
    do { 
        if (ctype_alpha($nombreJugador)) {
            $minusculas = strtolower($nombreJugador);
            echo "$minusculas" ;
            $nombreEnMinusculas = true;
        } else {
            echo "El nombre debe empezar con una letra. Ingrese uno nuevo: ";
            $nombreJugador = trim(fgets(STDIN));
        }
    } while ($nombreEnMinusculas == false  );
    return ($minusculas);
}





/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:

/*
$partidas=cargarPartidas();
$palabras=cargarColeccionPalabras();
$num= seleccionarOpcion();
*/
//Proceso:


//$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);
/*

do {
    
    $opcion = $num;

    
    switch ($opcion) {
        case 1: 
            echo "Ingrese Nombre de Usuario: ";
            $nombreJugador=trim(fgets(STDIN));
            echo "Ingrese un Número de Palabra: ";
            $numPalabra=trim(fgets(STDIN));
            $palabraElegida=cargarColeccionPalabras($numPalabra);
            //seguir completando 
            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            datosPartida($partidas);
            break;
        case 4:

            break;
        case 5:

            break;
        case 6:

            break;
        case 7:
            $palabraNueva=leerPalabra5Letras();
            agregarPalabra($palabras, $palabraNueva);

            break;
    }
} while ($opcion != 8);

*/
