<?php
include_once("wordix.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ... COMPLETAR ... */



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
function cargarPartidas ($palabraWordix, $nombreUsuario, $nroIntento, $puntaje){
    
    $coleccionPartidas = [
        "palabraWordix" => $palabraWordix, 
        "jugador" => $nombreUsuario,
        "intentos" => $nroIntento,
        "puntaje" => $puntaje
    ];
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
    $numOpcion=trim(fgets(STDIN));
    while ($numOpcion<1 || $numOpcion>8){
        echo $menu;
        $numOpcion=trim(fgets(STDIN));
    }
    return $numOpcion;
}

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);



/*
do {
    $opcion = ...;

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion != X);
*/
