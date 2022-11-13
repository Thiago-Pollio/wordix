<?php
include_once("wordix.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Carrasco, Nadia. 4236. TUDW. nadiacarrasco83.nc@gmail.com . Nadia-Carrasco */
/* Salgado, Sol. 4266. TUDW. sol.g.salgado@gmail.com. solsalgado */
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


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:
$partidas=cargarPartidas();
$palabras=cargarColeccionPalabras();
$num= seleccionarOpcion();

//Proceso:


//$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);


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

            break;
    }
} while ($opcion != 8);

