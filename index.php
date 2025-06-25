<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Karyawan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Data Karyawan</h2>
            <a href="tambah.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Data</a>
        </div>
        <table class="table-auto w-full border-collapse">
            <thead class="bg-blue-100">
                <tr>
                    <th class="border px-4 py-2">NIP</th>
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">Jabatan</th>
                    <th class="border px-4 py-2">Departemen</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Telepon</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                session_start();
                if (isset($_SESSION['pesan'])) {
                    echo "<div class='p-4 mb-4 bg-red-100 border border-red-300 text-red-800 rounded'>
                            " . $_SESSION['pesan'] . "
                          </div>";
                    unset($_SESSION['pesan']);
                }
                $query = mysqli_query($koneksi, "SELECT * FROM karyawan");
                while($row = mysqli_fetch_assoc($query)) {
                ?>
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2"><?= $row['nip'] ?></td>
                    <td class="border px-4 py-2"><?= $row['nama'] ?></td>
                    <td class="border px-4 py-2"><?= $row['jabatan'] ?></td>
                    <td class="border px-4 py-2"><?= $row['departemen'] ?></td>
                    <td class="border px-4 py-2"><?= $row['email'] ?></td>
                    <td class="border px-4 py-2"><?= $row['telepon'] ?></td>
                    <td class="border px-4 py-2">
                        <a href="edit.php?nip=<?= $row['nip'] ?>" class="text-green-600 hover:underline">Edit</a> |
                        <a href="hapus.php?nip=<?= $row['nip'] ?>" onclick="return confirm('Yakin hapus?')" class="text-red-600 hover:underline">Hapus</a>
                    </td>
                </tr>
                
                <?php }?>
            </tbody>
        </table>
    </div>
</body>
</html>