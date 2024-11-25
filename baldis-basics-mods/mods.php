<!-- mods.php -->
<?php
// Fetch mods data
$modList = 'modlist.json';
$mods = file_exists($modList) ? json_decode(file_get_contents($modList), true) : array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Browse Mods - Baldi's Basics Mods</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navigation Bar -->
    <!-- Same as in index.html -->

    <!-- Main Content -->
    <div class="container my-5">
        <h2 class="text-light mb-4">Available Mods</h2>
        <?php if (!empty($mods)): ?>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($mods as $mod): ?>
                    <div class="col">
                        <div class="card h-100 bg-dark text-light">
                            <!-- Mod Thumbnail -->
                            <img src="assets/images/placeholder.png" class="card-img-top" alt="Mod Thumbnail">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($mod['name']) ?></h5>
                                <p class="card-text"><?= nl2br(htmlspecialchars(substr($mod['description'], 0, 100))) ?>...</p>
                                <a href="mod_detail.php?id=<?= urlencode($mod['id']) ?>" class="btn btn-primary"><i class="fas fa-info-circle"></i> View Details</a>
                            </div>
                            <div class="card-footer text-muted">
                                Uploaded on <?= date('F j, Y', strtotime($mod['upload_date'])) ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-light">No mods have been uploaded yet.</p>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <!-- Same as in index.html -->

    <!-- Bootstrap JS and Custom Scripts -->
</body>
</html>
