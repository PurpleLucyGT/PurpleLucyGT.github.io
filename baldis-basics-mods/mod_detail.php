<!-- mod_detail.php -->
<?php
// Fetch mod details based on the 'id' parameter
$modList = 'modlist.json';
$mods = file_exists($modList) ? json_decode(file_get_contents($modList), true) : array();
$modId = $_GET['id'] ?? null;
$mod = null;

foreach ($mods as $item) {
    if ($item['id'] == $modId) {
        $mod = $item;
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($mod['name'] ?? 'Mod Not Found') ?> - Baldi's Basics Mods</title>
    <!-- Bootstrap CSS and other links -->
</head>
<body>
    <!-- Navigation Bar -->

    <div class="container my-5">
        <?php if ($mod): ?>
            <div class="row">
                <div class="col-md-8">
                    <!-- Mod Details -->
                    <h2 class="text-light"><?= htmlspecialchars($mod['name']) ?></h2>
                    <p class="text-muted">Uploaded on <?= date('F j, Y', strtotime($mod['upload_date'])) ?></p>
                    <p class="text-light"><?= nl2br(htmlspecialchars($mod['description'])) ?></p>
                    <a href="uploads/<?= urlencode($mod['file']) ?>" class="btn btn-success" download><i class="fas fa-download"></i> Download Mod</a>
                </div>
                <div class="col-md-4">
                    <!-- Mod Thumbnail or Additional Info -->
                    <img src="assets/images/placeholder.png" class="img-fluid" alt="Mod Thumbnail">
                </div>
            </div>
        <?php else: ?>
            <p class="text-light">Mod not found.</p>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <!-- Bootstrap JS and Custom Scripts -->
</body>
</html>
