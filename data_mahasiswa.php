<?php
$conn = new mysqli("localhost", "root", "", "web_programming_1");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

$sql = "SELECT id, nim, nama, program_studi, email
        FROM mahasiswa
        ORDER BY id ASC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div>
        <h1>Data Mahasiswa</h1>
        <p>Web Programming 1</p>
    </div>
</header>

<div class="container">

    <aside class="sidebar">
        <a href="index.html">Biodata</a>
        <a href="layout.html">Layout Lab</a>
        <a href="data_mahasiswa.php">Data Mahasiswa</a>
    </aside>

    <main class="content">
        <section class="card">
            <h2>Daftar Mahasiswa</h2>
            <table class="data-table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Program Studi</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . htmlspecialchars($row["nim"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["nama"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["program_studi"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                    echo "</tr>";
                    $no++;
                }
                $conn->close();
                ?>
                </tbody>
            </table>
        </section>
    </main>

</div>

<footer>
    <p>Web Programming 1</p>
</footer>

</body>
</html>
