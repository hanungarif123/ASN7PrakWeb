<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Karyawan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-center text-xl font-bold mb-4">Tambah Data Karyawan</h2>
        <form method="post" class="space-y-4">
            <input type="text" name="nip" placeholder="NIP" class="w-full px-4 py-2 border rounded" required>
            <input type="text" name="nama" placeholder="Nama" class="w-full px-4 py-2 border rounded" required>
            <input type="text" name="jabatan" placeholder="Jabatan" class="w-full px-4 py-2 border rounded" required>
            <input type="text" name="departemen" placeholder="Departemen" class="w-full px-4 py-2 border rounded" required>
            <input type="email" name="email" placeholder="Email" class="w-full px-4 py-2 border rounded" required>
            <input type="text" name="telepon" placeholder="No. Telepon" class="w-full px-4 py-2 border rounded" required>
            <div class="flex justify-between">
                <a href="index.php" class="text-blue-600 hover:underline">Kembali</a>
                <button type="submit" name="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            </div>
        </form>
        <?php
        if(isset($_POST['submit'])){
            $nip = $_POST['nip'];
            $nama = $_POST['nama'];
            $jabatan = $_POST['jabatan'];
            $departemen = $_POST['departemen'];
            $email = $_POST['email'];
            $telepon = $_POST['telepon'];

            $query = "INSERT INTO karyawan VALUES('$nip','$nama','$jabatan','$departemen','$email','$telepon')";
            if(mysqli_query($koneksi, $query)){
                echo "<div class='mt-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded'>
                        Data berhasil ditambahkan! Anda akan dialihkan ke halaman utama...
                    </div>";
                echo "<script>
                        setTimeout(function(){
                            window.location.href = 'index.php';
                        }, 2000); // redirect setelah 3 detik
                    </script>";
            } else {
                echo "<div class='mt-4 p-4 bg-red-100 border border-red-300 text-red-800 rounded'>
                        Gagal menambahkan data.
                    </div>";
            }
        }
        ?>
    </div>
</body>
</html>