<?php

include_once('../config.php');

echo $title;

// Echo php version
echo '<br>PHP version: ' . phpversion() . '<br>';

// Cek apakah table mahasiswa exists
$sql_check_table = "SHOW TABLES LIKE 'mahasiswa'";
$result_check = $db->query($sql_check_table);
if ($result_check->num_rows < 1) {
    // Bila table mahasiswa belum ada, buat tablenya
    $sql_create_table = "CREATE TABLE IF NOT EXISTS mahasiswa (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nama VARCHAR(50) NOT NULL,
        nim VARCHAR(20) NOT NULL
    )";
    if ($db->query($sql_create_table) === TRUE) {
        echo "Table mahasiswa created successfully<br>";
        // Insert sample data
        $sql_insert = "INSERT INTO mahasiswa (nama, nim) VALUES 
            ('Andi', 'A001'),
            ('Budi', 'A002'),
            ('Citra', 'A003')";
        if ($db->query($sql_insert) === TRUE) {
            echo "Sample data inserted successfully<br>";
        } else {
            echo "Error inserting sample data: " . $db->error . "<br>";
        }
    } else {
        echo "Error creating table: " . $db->error . "<br>";
    }
}

// Get data from mahasiswa
$sql = "SELECT * FROM mahasiswa";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Name: " . $row["nama"] . " - NIM: " . $row["nim"] . "<br>";
    }
} else {
    echo "0 results";
}
