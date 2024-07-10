<?php
// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in and has the 'admin' role
if (!isset($_SESSION['id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../../login.php");
    exit();
}

$role = $_SESSION['role'];
$username = $_SESSION['username'];

// Default page
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <?php include '../../includes/sidebar.php'; ?> 
    <center>

    
    <div class="content">
    <?php
    $pages = [
        'dashboard' => "{$role}/dashboard.php",
        'admission' => "{$role}/admission.php",
        'masterlist' => "{$role}/masterlist.php",
        'useraccounts' => "{$role}/useraccounts.php",
        'announcement' => "{$role}/announcement.php",
        'settings' => "{$role}/settings.php"
    ];

    foreach ($pages as $pageId => $filePath) {
        $displayStyle = $page === $pageId ? 'block' : 'none';
        ?>
        <section id="<?php echo $pageId; ?>" style="display: <?php echo $displayStyle; ?>">
            <?php include $filePath; ?>
        </section>
    <?php } ?>
</div>


    </center>
    <script src="../../assets/js/sideBar.js"></script>
</body> 
</html>
