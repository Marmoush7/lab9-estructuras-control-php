<?php
const SEMILLA = 242;
const NOMBRE = "Omar";
const APELLIDO = "Mojica";

$nombreCompleto = NOMBRE . " " . APELLIDO;
$edad = 8 + (SEMILLA % 70);       // 40
$dia = (SEMILLA % 7) + 1;         // 5 (Viernes)
$mes = (SEMILLA % 12) + 1;        // 3 (Marzo)
$nota1 = 40 + (SEMILLA % 61);     // 72
$nota2 = 40 + ((SEMILLA * 3) % 61); // 94
$nota3 = 40 + ((SEMILLA * 7) % 61); // 87
$monto = 20 + (SEMILLA % 181);    // 81
$esMiembro = (SEMILLA % 2) == 0;  // true
$hora = SEMILLA % 24;             // 22
$huella = (SEMILLA * 13 + 91) % 1000; // 237
$descuento = SEMILLA * 0.001;     // 0.242
$vacio = null;

// Ejercicio 1: Boleto de cine
const PRECIO_NINO = 3.00;
const PRECIO_JOVEN = 4.50;
const PRECIO_ADULTO = 7.00;
const PRECIO_JUBILADO = 3.50;

if ($edad < 12) {
    $catCine = "Niño";
    $precioCine = PRECIO_NINO;
} elseif ($edad >= 12 && $edad <= 17) {
    $catCine = "Joven";
    $precioCine = PRECIO_JOVEN;
} elseif ($edad >= 18 && $edad <= 59) {
    $catCine = "Adulto";
    $precioCine = PRECIO_ADULTO;
} else {
    $catCine = "Jubilado";
    $precioCine = PRECIO_JUBILADO;
}

$miercoles50 = ($dia == 3);
if ($miercoles50) {
    $precioCine = $precioCine * 0.5;
}
$textoMiercoles = $miercoles50 ? "Sí" : "No";

// Ejercicio 2: Notas
$promedio = ($nota1 + $nota2 + $nota3) / 3;
if ($promedio >= 90) {
    $letra = "A";
} elseif ($promedio >= 80) {
    $letra = "B";
} elseif ($promedio >= 70) {
    $letra = "C";
} elseif ($promedio >= 60) {
    $letra = "D";
} else {
    $letra = "F";
}

$estado = ($promedio >= 70) ? "Aprobado" : "Reprobado";
$cuadroHonor = ($promedio >= 90 && $nota1 >= 80 && $nota2 >= 80 && $nota3 >= 80) ? "Sí" : "No";
$claseResultado = ($promedio >= 70) ? "ok" : "error";

// Ejercicio 3: Día de la semana
switch ($dia) {
    case 1: $nombreDia = "Lunes"; break;
    case 2: $nombreDia = "Martes"; break;
    case 3: $nombreDia = "Miércoles"; break;
    case 4: $nombreDia = "Jueves"; break;
    case 5: $nombreDia = "Viernes"; break;
    case 6: $nombreDia = "Sábado"; break;
    case 7: $nombreDia = "Domingo"; break;
    default: $nombreDia = "Desconocido"; break;
}

switch ($dia) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        $tipoDia = "Laboral";
        break;
    case 6:
    case 7:
        $tipoDia = "Fin de semana";
        break;
    default:
        $tipoDia = "Desconocido";
        break;
}

// Ejercicio 4: Mes y estación
$nombreMes = match($mes) {
    1 => "Enero",
    2 => "Febrero",
    3 => "Marzo",
    4 => "Abril",
    5 => "Mayo",
    6 => "Junio",
    7 => "Julio",
    8 => "Agosto",
    9 => "Septiembre",
    10 => "Octubre",
    11 => "Noviembre",
    12 => "Diciembre",
    default => "Desconocido"
};

$estacion = match($mes) {
    12, 1, 2, 3, 4 => "Seca",
    5, 6, 7, 8, 9, 10, 11 => "Lluviosa",
    default => "Desconocida"
};

// Ejercicio 5: Caja de la tienda
const ITBMS = 0.07;
if ($monto >= 150) {
    $pctDesc = 15;
} elseif ($monto >= 100) {
    $pctDesc = 10;
} elseif ($monto >= 50) {
    $pctDesc = 5;
} else {
    $pctDesc = 0;
}

if ($esMiembro) {
    $pctDesc += 5;
}

$base = $monto - ($monto * $pctDesc / 100);

$recargoNocturno = ($hora >= 22 || $hora < 6);
if ($recargoNocturno) {
    $base = $base + ($base * 0.03);
}
$textoRecargo = $recargoNocturno ? "Sí" : "No";
$totalPagar = $base + ($base * ITBMS);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="lab9-huella" content="<?php echo $huella; ?>">
    <title>Lab 9 - Estructuras de control</title>
    <!-- CSS Externo -->
    <link rel="stylesheet" href="css/estilos.css">
    <!-- CSS Interno -->
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f9f9f9; }
        h2 { color: #333; }
    </style>
</head>
<body>
    <header>
        <h1 style="color: #0056b3;">Laboratorio 9 - Estructuras de Control en PHP</h1>
    </header>

    <main id="lab9-mojica">
        <p id="autor">Autor: <?php echo $nombreCompleto; ?></p>

        <section id="ej0">
            <h2>Ejercicio 0 – Tipos de datos</h2>
            <table id="ej0-tipos">
                <thead>
                    <tr><th>Variable</th><th>Tipo</th></tr>
                </thead>
                <tbody>
                    <tr><td>$nombreCompleto</td><td><?php echo gettype($nombreCompleto); ?></td></tr>
                    <tr><td>$edad</td><td><?php echo gettype($edad); ?></td></tr>
                    <tr><td>$esMiembro</td><td><?php echo gettype($esMiembro); ?></td></tr>
                    <tr><td>$descuento</td><td><?php echo gettype($descuento); ?></td></tr>
                    <tr><td>$vacio</td><td><?php echo gettype($vacio); ?></td></tr>
                </tbody>
            </table>
        </section>

        <section id="ej1">
            <h2>Ejercicio 1 – Boleto de cine</h2>
            <p id="ej1-res">Categoría: <?php echo $catCine; ?> | Precio final: B/. <?php echo number_format($precioCine, 2); ?> | Miércoles 50%: <?php echo $textoMiercoles; ?></p>
        </section>

        <section id="ej2">
            <h2>Ejercicio 2 – Notas</h2>
            <p id="ej2-res" class="resultado <?php echo $claseResultado; ?>">Promedio: <?php echo number_format($promedio, 2); ?> | Letra: <?php echo $letra; ?> | Estado: <?php echo $estado; ?> | Cuadro de honor: <?php echo $cuadroHonor; ?></p>
        </section>

        <section id="ej3">
            <h2>Ejercicio 3 – Día de la semana</h2>
            <p id="ej3-res">Día: <?php echo $nombreDia; ?> | Tipo: <?php echo $tipoDia; ?></p>
        </section>

        <section id="ej4">
            <h2>Ejercicio 4 – Mes y estación</h2>
            <p id="ej4-res">Mes: <?php echo $nombreMes; ?> | Estación: <?php echo $estacion; ?></p>
        </section>

        <section id="ej5">
            <h2>Ejercicio 5 – Caja de la tienda</h2>
            <p id="ej5-monto">Monto de compra: B/. <?php echo number_format($monto, 2); ?></p>
            <p id="ej5-descuento">Descuento aplicado: <?php echo $pctDesc; ?>%</p>
            <p id="ej5-recargo">Recargo nocturno: <?php echo $textoRecargo; ?></p>
            <p id="ej5-total">Total a pagar: B/. <?php echo number_format($totalPagar, 2); ?></p>
        </section>
    </main>

    <footer id="firma">
        Lab 9 · <?php echo $nombreCompleto; ?> · Semilla <?php echo SEMILLA; ?>
    </footer>
</body>
</html>