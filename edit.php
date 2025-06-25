<?php
include 'koneksi.php';
$nip = $_GET['nip'];
$data = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nip='$nip'");
$row = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Karyawan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Edit Data Karyawan</h2>
        <form method="post" class="space-y-4">
            <input type="text" value="<?= $row['nama'] ?>" name="nama" class="w-full px-4 py-2 border rounded" required>
            <input type="text" value="<?= $row['jabatan'] ?>" name="jabatan" class="w-full px-4 py-2 border rounded" required>
            <input type="text" value="<?= $row['departemen'] ?>" name="departemen" class="w-full px-4 py-2 border rounded" required>
            <input type="email" value="<?= $row['email'] ?>" name="email" class="w-full px-4 py-2 border rounded" required>
            <input type="text" value="<?= $row['telepon'] ?>" name="telepon" class="w-full px-4 py-2 border rounded" required>
            <div class="flex justify-between">
                <a href="index.php" class="text-blue-600 hover:underline">Kembali</a>
                <button type="submit" name="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
            </div>
        </form>
        <?php
        if(isset($_POST['submit'])){
            $nama = $_POST['nama'];
            $jabatan = $_POST['jabatan'];
            $departemen = $_POST['departemen'];
            $email = $_POST['email'];
            $telepon = $_POST['telepon'];
            
            $query = "UPDATE karyawan SET nama='$nama', jabatan='$jabatan', departemen='$departemen', email='$email', telepon='$telepon' WHERE nip='$nip'";
            if(mysqli_query($koneksi, $query)){
                echo "<div class='mt-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded'>
                        Data berhasil diupdate! Anda akan dialihkan ke halaman utama...
                    </div>";
                echo "<script>
                        setTimeout(function(){
                            window.location.href = 'index.php';
                        }, 2000); // redirect setelah 3 detik
                    </script>";
            } else {
                echo "<div class='mt-4 p-4 bg-red-100 border border-red-300 text-red-800 rounded'>
                        Gagal mengupdate data.
                    </div>";
            }
        }
        ?>
    </div>
</body>
</html>