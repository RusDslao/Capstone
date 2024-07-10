<?php
// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in and has the 'admin' role
if (!isset($_SESSION['id']) || $_SESSION['role'] != 'student') {
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
    <div class="container mt-5">
        <h2>Welcome, <?php echo htmlspecialchars($username); ?></h2>
        <p>You are logged in as an <?php echo htmlspecialchars($role); ?></p>
        <?php if ($role == 'admin') { ?>
            <a href="../admin.php" class="btn btn-primary">Admin Panel</a>
        <?php } ?>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
    
    <div class="content">
    <?php
    $pages = [
        'dashboard' => "{$role}/dashboard.php",
        'grades' => "{$role}/grades.php",
        'balance' => "{$role}/balance.php",
        'schedule' => "{$role}/schedule.php",
        'news' => "{$role}/news.php",
        'settings' => "{$role}/settings.php",

        
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
