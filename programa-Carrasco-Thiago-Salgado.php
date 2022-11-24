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
    
$coleccion = [];
$pa1 = ["palabraWordix" => "SUECO", "jugador" => "kleiton", "intentos" => 0, "puntaje" => 0];
$pa2 = ["palabraWordix" => "YUYOS", "jugador" => "briba", "intentos" => 0, "puntaje" => 0];
$pa3 = ["palabraWordix" => "HUEVO", "jugador" => "zrack", "intentos" => 3, "puntaje" => 9];
$pa4 = ["palabraWordix" => "TINTO", "jugador" => "cabrito", "intentos" => 4, "puntaje" => 8];
$pa5 = ["palabraWordix" => "RASGO", "jugador" => "briba", "intentos" => 0, "puntaje" => 0];
$pa6 = ["palabraWordix" => "VERDE", "jugador" => "cabrito", "intentos" => 5, "puntaje" => 7];
$pa7 = ["palabraWordix" => "CASAS", "jugador" => "kleiton", "intentos" => 5, "puntaje" => 7];
$pa8 = ["palabraWordix" => "GOTAS", "jugador" => "kleiton", "intentos" => 0, "puntaje" => 0];
$pa9 = ["palabraWordix" => "ZORRO", "jugador" => "zrack", "intentos" => 4, "puntaje" => 8];
$pa10 = ["palabraWordix" => "GOTAS", "jugador" => "cabrito", "intentos" => 0, "puntaje" => 0];
$pa11 = ["palabraWordix" => "FUEGO", "jugador" => "cabrito", "intentos" => 2, "puntaje" => 10];
$pa12 = ["palabraWordix" => "TINTO", "jugador" => "briba", "intentos" => 0, "puntaje" => 0];

array_push($coleccion, $pa1, $pa2, $pa3, $pa4, $pa5, $pa6, $pa7, $pa8, $pa9, $pa10, $pa11, $pa12);
return $coleccion;
}
/** 
 * Obtiene la opcion elegida del Menú    
 * @return int $numOpcion 
 */
function seleccionarOpcion(){
    //int $numOpcion, string $menu
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
    $numOpcion=solicitarNumeroEntre(1, 8);
    return $numOpcion;
}

/**
 * Muestra los datos de partida
 * @param array $coleccionDePartidas
 * @param int $numero
 */
function datosPartida($coleccionDePartidas, $numero){
     $n = count($coleccionDePartidas);
     $i = 0;
     $num = false;
     while ($i < $n && $num == false) {
         if ($numero < $n) {
             $num = true;
         } else {
             $num = false;
         }
         $i = $i + 1;
     
     if ($num) {
         echo "Partida WORDIX ". $numero.": palabra ". $coleccionDePartidas[$numero]["palabraWordix"]. "\n";
         echo "Jugador: ". $coleccionDePartidas[$numero]["jugador"]. "\n";
         echo "Puntaje: ". $coleccionDePartidas[$numero]["puntaje"]. "\n";
         if ($coleccionDePartidas[$numero]["puntaje"] <= 0) {
             echo "Intento: No adivinó la palabra." . " \n";
         } elseif ($coleccionDePartidas[$numero]["puntaje"] > 0) {
             echo "Intento: Adivinó la palabra en ". $coleccionDePartidas[$numero]["intentos"]." intentos" . " \n";
         }
     } else {
         echo "Ingrese un numero válido: ";
         $numero = trim(fgets(STDIN));
     } 
  }
 }


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

            echo "Palabra ya ingresada. ";
            $palabra=leerPalabra5Letras($palabra);
            $palabraRepetida=false;
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

/**
 * Muestra la primera partida ganada de un jugador
 * @param array $partidas
 * @param string $nombre
 * @return int
 */
function primeraPartidaGanada($partidas, $nombre){
    //int $indice
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
        $i = $i +1;
    }
    if ($encontrado == true) {
        $indice = $i - 1;
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
    echo "Ingrese Nombre de Jugador: ";
    $nombreJugador = trim(fgets(STDIN));
    $minusculas = strtolower($nombreJugador);
    $expresion= "(^([a-z]))";
    while ($nombreEnMinusculas==false){
        if ( preg_match($expresion, $minusculas)){
            $nombreEnMinusculas=true;
        }else{
            echo "El nombre debe empezar con una letra. Ingrese uno nuevo: ";
            $nombreJugador = trim(fgets(STDIN));
            $minusculas = strtolower($nombreJugador);
            $nombreEnMinusculas=false;
        }
    }
    return ($minusculas);
}





/**
 * Define de que manera se ordenara el Array (coleccionPartidas)
 * @param string $keyPartidasUno
 * @param string $keyPartidasDos
 * @return int
 */

function cmp ($keyPartidasUno, $keyPartidasDos){
    if ($keyPartidasUno["jugador"]== $keyPartidasDos["jugador"]){

        if ($keyPartidasUno["palabraWordix"] == $keyPartidasDos["palabraWordix"]) {
        
            $orden = 0;

        } elseif ($keyPartidasUno["palabraWordix"] < $keyPartidasDos["palabraWordix"]) {

            $orden = -1;
        
        } else {

            $orden = 1;
        } 

    } elseif ($keyPartidasUno["jugador"] < $keyPartidasDos["jugador"]) {

        $orden = -1;

    } else {

        $orden = 1;

    }

    return $orden;

}

/**
 * Ordena el Array alfabeticamente por jugador y palabra usada en el Array (coleccionPartidas)
 * La funcion uasort () ordena el array segun una funcion de comparación definida por el usuario
 * La funcion print_r () imprime la información de una funcion de manera legible.
 * @param array $coleccionPartidas
 */

function mostrarArrayOrdenado ($coleccionPartidas) {

    uasort($coleccionPartidas, 'cmp');
    
    print_r($coleccionPartidas);

}





/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:

/**
 * STRING: $nombreUsuario, $palabraElegida, $palabraAleatoria, $palabraNueva
 * INT: $cantPalabras, $numPalabra, $n, $i, $num, $numeroPartida
 * BOOLEAN: $palabraValida, $existe
 * FLOAT $porcentje
 */

//Inicialización de variables:

$nombreUsuario="";
$palabraElegida="";
$palabraNueva="";
$numPalabra=0;
$cantPalabras=0; 
$n=0; 
$palabraAleatoria="";
$numeroPartida=0;
$porcentaje=0;
$partidas=cargarPartidas();
$palabras=cargarColeccionPalabras();
$num= seleccionarOpcion();

//Proceso:

do {
    
    $opcion = $num;

    
    switch ($opcion) {
        /*Dependiendo de la opción del menú que escoga el usuario, el programa ejecutará diferentes
        tareas. Se utiliza switch, que corresponde a la estructura de control alternativa (if)*/
        case 1: 
            $nombreUsuario=solicitarJugador();
            echo "Ingrese un Número de Palabra: ";
            $cantPalabras=count($palabras);
            $numPalabra= ((solicitarNumeroEntre(1, $cantPalabras)) -1);
            $palabraElegida= $palabras[$numPalabra];
            $palabraValida=false;
            $n=count($partidas);
            $i=0;
            while($i<$n && $palabraValida==false){
                if($nombreUsuario==$partidas[$i]["jugador"]&& $palabraElegida==$partidas[$i]["palabraWordix"]){
                    echo "Palabra ya jugada. Debe ingresar otro Número de Palabra: ";
                    $numPalabra= ((solicitarNumeroEntre(1, $cantPalabras)) -1);
                    $palabraElegida= $palabras[$numPalabra];
                    $palabraValida=false;    
                    $i=0;
                }else{
                    $i=$i+1;
                }
            }
            
                $partida = jugarWordix($palabraElegida, strtolower($nombreUsuario));
                array_push($partidas, $partida);
                $num=seleccionarOpcion();
            break;
            
        case 2:
            $nombreUsuario=solicitarJugador();
            $palabraAleatoria = $palabras[array_rand($palabras)];
            $partida = jugarWordix($palabraAleatoria, strtolower($nombreUsuario));
            array_push($partidas, $partida);
            $num=seleccionarOpcion();


            break;
        case 3: 
            echo "Ingrese un Número de Partida: ";
            $numeroPartida = trim(fgets(STDIN));
            datosPartida($partidas, $numeroPartida);
            $num= seleccionarOpcion();
            break;
        case 4:
            $nombreUsuario=solicitarJugador();
            $primerPartida = primeraPartidaGanada($partidas, $nombreUsuario);
            $cantPalabras = count($palabras);
            $existe = false;
            for ($i=0; $i < $cantPalabras; $i++) { 
                if ($primerPartida > -1){
                    $existe = true;
                } else {
                    $existe = false;
                }
            }
         if ($existe == true){  
            if ($primerPartida > 0){
                $datos = datosPartida($partidas, $primerPartida). "\n";
            echo $datos;
            } elseif ($primerPartida <= 0) {
                echo "El jugador ". $nombreUsuario. " no ganó ninguna partida";
                $datos = datosPartida($partidas, $primerPartida). "\n";
                echo  $datos;
            } 
         } else {
            echo "El jugador no existe.". "\n";
         }
            $num = seleccionarOpcion();
            break;
        case 5:
            $nombreUsuario=solicitarJugador();
            echo "Jugador " . $nombreUsuario ."\n";
            $resumen = resumenJugador($partidas, $nombreUsuario);
            echo "Partidas: ". $resumen["partidas"]. "\n";
            echo "Puntaje Total: ". $resumen["puntaje"]. "\n";
            echo "Victorias: ". $resumen["victorias"]. "\n";
            $porcentaje=($resumen["victorias"]*100)/ $resumen["partidas"];
            echo "Porcentaje Victorias: " . $porcentaje . "%"."\n";
            echo "Intento 1: ". $resumen["intento1"]. "\n";
            echo "Intento 2: ". $resumen["intento2"]. "\n";
            echo "Intento 3: ". $resumen["intento3"]. "\n";
            echo "Intento 4: ". $resumen["intento4"]. "\n";
            echo "Intento 5: ". $resumen["intento5"]. "\n";
            echo "Intento 6: ". $resumen["intento6"]. "\n";
            $num = seleccionarOpcion();
            break;
        case 6:
            mostrarArrayOrdenado($partidas);
            $num = seleccionarOpcion();
            break;
        case 7:
            $palabraNueva=leerPalabra5Letras(); 
            agregarPalabra($palabras, $palabraNueva);
            array_push($palabras, $palabraNueva);
            $num= seleccionarOpcion();
            break;
    }
} while ($opcion != 8);

