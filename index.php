<?php
// Menentukan halaman yang akan ditampilkan berdasarkan parameter GET
$halaman = isset($_GET['halaman']) ? $_GET['halaman'] : 'todo';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Todo List</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">

    <!-- Font Awesome CSS untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <!-- Container utama -->
    <div class="container-fluid">
        <div class="row d-flex justify-content-center mt-3 vh-100">
            <div class="col-md-12 bg-info-subtle p-4">
                <?php
                // Menampilkan halaman berdasarkan nilai variabel $halaman
                if ($halaman == 'todo') {
                    include 'todo/todo.php'; // Memuat halaman daftar todo
                } elseif ($halaman == 'edit_todo') {
                    include 'todo/edit_todo.php'; // Memuat halaman edit todo
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS untuk komponen interaktif -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- jQuery untuk manipulasi elemen DOM -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        // Auto close alert setelah 1 detik
        $(".alert").delay(1000).slideUp(200, function () {
            $(this).alert('close');
        });
    </script>
</body>

</html>
