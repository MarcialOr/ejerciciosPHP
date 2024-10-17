<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios PHP - Fibonacci, Primos y Palíndromos</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <!-- Tarjeta para Serie Fibonacci -->
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Serie Fibonacci</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="n" class="form-label">Número de términos:</label>
                                <input type="number" name="n" id="n" class="form-control" required min="1" value="<?php echo isset($_POST['n']) ? $_POST['n'] : ''; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary w-100" name="fibonacci_submit">Generar Serie Fibonacci</button>
                        </form>

                        <hr>

                        <?php
                        // Función para generar la serie Fibonacci
                        function generarFibonacci($n) {
                            if ($n <= 0) {
                                return "El número debe ser mayor a 0";
                            }

                            $fibonacci = [];
                            if ($n >= 1) {
                                $fibonacci[] = 0;
                            }
                            if ($n >= 2) {
                                $fibonacci[] = 1;
                            }

                            for ($i = 2; $i < $n; $i++) {
                                $fibonacci[] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
                            }

                            return $fibonacci;
                        }

                        // Si se ha enviado el formulario para Fibonacci
                        if (isset($_POST['fibonacci_submit'])) {
                            $n = intval($_POST['n']);
                            $fibonacciSerie = generarFibonacci($n);

                            echo "<h5 class='text-center'>Los primeros $n términos de la serie Fibonacci son:</h5>";
                            echo "<ul class='list-group'>";
                            foreach ($fibonacciSerie as $valor) {
                                echo "<li class='list-group-item'>$valor</li>";
                            }
                            echo "</ul>";
                        }
                        ?>
                    </div>
                </div>

                <!-- Tarjeta para Verificar Números Primos -->
                <div class="card mt-4">
                    <div class="card-header bg-success text-white text-center">
                        <h3>Verificar Número Primo</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="numero_primo" class="form-label">Ingresa un número:</label>
                                <input type="number" name="numero_primo" id="numero_primo" class="form-control" required min="1" value="<?php echo isset($_POST['numero_primo']) ? $_POST['numero_primo'] : ''; ?>">
                            </div>
                            <button type="submit" class="btn btn-success w-100" name="primo_submit">Verificar si es Primo</button>
                        </form>

                        <hr>

                        <?php
                        // Función para verificar si un número es primo
                        function esPrimo($numero) {
                            if ($numero < 2) {
                                return false;
                            }
                            for ($i = 2; $i <= sqrt($numero); $i++) {
                                if ($numero % $i == 0) {
                                    return false;
                                }
                            }
                            return true;
                        }

                        // Si se ha enviado el formulario para verificar número primo
                        if (isset($_POST['primo_submit'])) {
                            $numero = intval($_POST['numero_primo']);
                            $resultado = esPrimo($numero) ? "es un número primo." : "no es un número primo.";

                            echo "<h5 class='text-center'>El número $numero $resultado</h5>";
                        }
                        ?>
                    </div>
                </div>

                <!-- Tarjeta para Verificar Palíndromos -->
                <div class="card mt-4">
                    <div class="card-header bg-warning text-white text-center">
                        <h3>Verificar Palíndromo</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="cadena_palindromo" class="form-label">Ingresa una cadena de texto:</label>
                                <input type="text" name="cadena_palindromo" id="cadena_palindromo" class="form-control" required value="<?php echo isset($_POST['cadena_palindromo']) ? $_POST['cadena_palindromo'] : ''; ?>">
                            </div>
                            <button type="submit" class="btn btn-warning w-100" name="palindromo_submit">Verificar si es Palíndromo</button>
                        </form>

                        <hr>

                        <?php
                        // Función para verificar si una cadena es un palíndromo
                        function esPalindromo($cadena) {
                            // Convertimos la cadena a minúsculas y eliminamos los espacios y caracteres no alfabéticos
                            $cadena = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $cadena));
                            // Comparamos la cadena original con su reverso
                            return $cadena === strrev($cadena);
                        }

                        // Si se ha enviado el formulario para verificar palíndromo
                        if (isset($_POST['palindromo_submit'])) {
                            $cadena = $_POST['cadena_palindromo'];
                            $resultado = esPalindromo($cadena) ? "es un palíndromo." : "no es un palíndromo.";

                            echo "<h5 class='text-center'>La cadena '$cadena' $resultado</h5>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Incluir Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
