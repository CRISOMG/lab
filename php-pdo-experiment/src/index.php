<?php
echo "<h1>Experimento: Impedancia de Datos con PHP, PDO (MySQL & PostgreSQL)</h1>";

// ==========================================
// 1. Conexión a MySQL
// ==========================================
echo "<h2>MySQL</h2>";
try {
    $mysql = new PDO(
        'mysql:host=mysql;dbname=testdb;charset=utf8',
        'dbuser',
        'dbpassword'
    );
    // Configurar PDO para que lance excepciones en caso de error
    $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Configurar la forma por defecto de traer los datos (como array asociativo)
    $mysql->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    echo "<p style='color:green;'>✅ Conexión a MySQL exitosa.</p>";

    // Crear una tabla de prueba
    $mysql->exec("CREATE TABLE IF NOT EXISTS users_mysql (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100),
        metadata JSON,
        is_active BOOLEAN,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    // Insertar algunos datos (Cuidado: en PDO, a veces los bools hay que pasarlos como INT en MySQL)
    $stmt_mysql = $mysql->prepare(
        "INSERT INTO users_mysql (name, metadata, is_active) VALUES (:name, :metadata, :is_active)"
    );

    $user_metadata = [
        'role' => 'admin',
        'skills' => [
            'php',
            'db'
        ]
    ];

    $user = [
        'name' => 'Alice MySQL',
        'metadata' => json_encode($user_metadata),
        'is_active' => true
    ];

    // Aquí mandamos el booleano nativo de PHP como true
    $stmt_mysql->execute($user);

    // Leer último dato crudo
    $res_mysql = $mysql->query("SELECT * FROM users_mysql ORDER BY id DESC LIMIT 1");
    $row_mysql = $res_mysql->fetch();

    echo "<h3>Resultados Raw desde MySQL</h3>";
    echo "<pre style='background:#f4f4f4; padding:10px; border:1px solid #ddd;'>";
    var_dump($row_mysql);
    echo "</pre>";

    echo "<p>Tipo de dato es row_mysql: " . gettype($row_mysql) . "</p>";
} catch (PDOException $e) {
    echo "<p style='color:red;'>❌ Error en MySQL: " . $e->getMessage() . "</p>";
}

// ==========================================
// 2. Conexión a PostgreSQL
// ==========================================
echo "<h2>PostgreSQL</h2>";
try {
    $pg = new PDO('pgsql:host=postgres;dbname=testdb', 'dbuser', 'dbpassword');
    $pg->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pg->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    echo "<p style='color:green;'>✅ Conexión a PostgreSQL exitosa.</p>";

    // Crear una tabla de prueba (notá las diferencias en tipos como SERIAL y JSONB)
    $pg->exec("CREATE TABLE IF NOT EXISTS users_pg (
        id SERIAL PRIMARY KEY,
        name VARCHAR(100),
        metadata JSONB,
        is_active BOOLEAN,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    // Insertar algunos datos en PostgreSQL
    $stmt_pg = $pg->prepare("INSERT INTO users_pg (name, metadata, is_active) VALUES (?, ?, ?)");
    // Mandamos igual el json encodeado (para el JSONB) y un bool true de PHP
    // Ojo que Postgres acepta strings de bools: 't' o 'true', pero PDO en pgsql procesa esto de forma curiosa.
    // Vamos a pasarle el boolean true de PHP (que PDO pasa como bool/string '1') o simplemente el string 'true' o 1.
    // En Postgres "1" para booleano funciona pero el cast estricto te puede forzar si es prepare(). Pasándole 'true' o 1 string:
    $stmt_pg->execute(['Bob Postgres', json_encode(['role' => 'user', 'skills' => ['pg', 'data']]), 'true']);

    // Leer último dato crudo
    $res_pg = $pg->query("SELECT * FROM users_pg ORDER BY id DESC LIMIT 1");
    $row_pg = $res_pg->fetch();

    echo "<h3>Resultados Raw desde PostgreSQL</h3>";
    echo "<pre style='background:#f4f4f4; padding:10px; border:1px solid #ddd;'>";
    var_dump($row_pg);
    echo "</pre>";
} catch (PDOException $e) {
    echo "<p style='color:red;'>❌ Error en PostgreSQL: " . $e->getMessage() . "</p>";
}

echo "<hr>";
echo "<h3>Espacio para experimentar</h3>";
echo "<p>Puedes modificar este archivo <code>src/index.php</code> para insertar datos, probar consultas y observar cómo diferentes motores de bases de datos devuelven los tipos de datos en PHP (por ejemplo, los booleanos devueltos como enteros 0/1 vs booleanos verdaderos, o el manejo de JSON/JSONB).</p>";
