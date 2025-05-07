<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title'); ?> - Aplikasi Kasir Grosir</title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f1ea;
            color: #333;
        }
        .navbar {
            background-color: #8d6e63;
            padding: 1rem;
            color: #fff;
        }
        .container {
            padding: 2rem;
        }
        .btn {
            background-color: #a1887f;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #795548;
        }
        footer {
            text-align: center;
            padding: 1rem;
            margin-top: 3rem;
            background-color: #d7ccc8;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h2>Aplikasi Kasir Grosir</h2>
    </div>

    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <footer>
        <p>&copy; <?php echo e(date('Y')); ?> PT. Ryan Akbar Berjaya</p>
    </footer>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\kasir-laravel\resources\views/layouts/main.blade.php ENDPATH**/ ?>