<?php
// Periksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari form
    $jobtitle = $_POST["jobtitle"];
    $location = $_POST["location"];
    $workplace = $_POST["workplace"];
    $employment = $_POST["employment"];
    $salary = $_POST["salary"];
    $description = $_POST["description"];
    $skill_required = $_POST["skill_required"];
    
    // Validasi data (bisa tambahkan validasi sesuai kebutuhan)
    
    // Simpan data ke dalam database (anda perlu mengganti koneksi dan query sesuai dengan kebutuhan dan database yang Anda gunakan)
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "data_user";

    // Buat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Buat dan jalankan query untuk menyimpan data ke dalam tabel database
    $sql = "INSERT INTO job_listings (jobtitle, location, workplace, employment, salary, description, skill_required)
    VALUES ('$jobtitle', '$location', '$workplace', '$employment', '$salary', '$description', '$skill_required')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi
    $conn->close();
}
?>
