<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Kasir - Toko Grosir</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --sand: #D8C3A5;
            --forest: #2F4F4F;
            --cream: #F9F5F0;
            --gold: #BFA76F;
        }

        body {
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            background-color: var(--cream);
            color: var(--forest);
        }

        header {
            background-color: var(--sand);
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        header h1 {
            margin: 0;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 15px;
            margin: 0;
            padding: 0;
        }

        nav {
            padding: 10px 20px;
            border-radius: 8px;
        }

        nav a {
            color: var(--forest);
            text-decoration: none;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: var(--forest);
            color: var(--sand);
        }

        main {
            padding: 40px;
        }

        h2 {
            margin-bottom: 20px;
        }

        form h4 {
            margin-top: 20px;
            color: var(--forest);
        }

        form label {
            display: block;
            margin-top: 10px;
            font-weight: 600;
        }

        form select {
            width: 100%;
            padding: 8px 12px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-family: 'Montserrat', sans-serif;
        }
        form input[type="number"],[type="text"] {
            width: 98%;
            padding: 8px 12px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-family: 'Montserrat', sans-serif;
        }

        .barang-item {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            background-color: var(--cream);
        }

        .btn {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            margin-right: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-edit {
            background-color: var(--forest);
            color: white;
        }

        .btn-edit:hover {
            background-color: var(--gold);
            color: var(--forest);
        }

        .btn-delete {
            background-color: var(--forest);
            color: white;
        }

        .btn-delete:hover {
            background-color: var(--gold);
            color: var(--forest);
        }

        .btn-add {
            background-color: var(--forest);
            color: white;
            padding: 8px 16px;
            display: inline-block;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .btn-add:hover {
            background-color: var(--gold);
            color: var(--forest);
        }

        a {
            color: var(--forest);
            text-decoration: none;
        }

        a:hover {
            color: var(--gold);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: var(--sand);
            border-radius: 8px;
            overflow: hidden;
            margin-top: 20px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.05);
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid var(--cream);
        }

        th {
            background-color: var(--forest);
            color: white;
        }

        tr:hover {
            background-color: #f0e8dc;
        }

        button {
            background-color: var(--forest);
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: var(--gold);
            color: var(--forest);
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: var(--forest);
            color: white;
            margin-top: 40px;
        }

        form {
            display: inline;
        }

        p {
            margin-top: 10px;
            font-style: italic;
            color: var(--gold);
        }
    </style>
</head>

<body>
    <header>
        <h1>Toko Grosir</h1>
        <nav>
            <ul>
                <li><a href="<?php echo e(route('barang.index')); ?>">Barang</a></li>
                <li><a href="<?php echo e(route('pelanggan.index')); ?>">Pelanggan</a></li>
                <li><a href="<?php echo e(route('transaksi.index')); ?>">Transaksi</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer>
        <p>&copy; 2025 Kelompok 12</p>
    </footer>
</body>

</html><?php /**PATH C:\xampp\htdocs\kasir-laravel\resources\views/layouts/app.blade.php ENDPATH**/ ?>