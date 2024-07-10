<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Define menu items for each role
$menus = [
    'Admin' => [
        ['id' => 'dashboard', 'icon' => 'bx bx-home-alt', 'text' => 'Dashboard'],
        ['id' => 'admission', 'icon' => 'bx bx-bar-chart-alt-2', 'text' => 'Admission'],
        ['id' => 'masterlist', 'icon' => 'bx bx-table', 'text' => 'Masterlist'],
        ['id' => 'announcement', 'icon' => 'bx bx-news', 'text' => 'Announcement'],
        ['id' => 'useraccounts', 'icon' => 'bx bxs-user-account', 'text' => 'User Accounts'],
        ['id' => 'settings', 'icon' => 'bx bx-cog', 'text' => 'Settings'],
    ],
    'Student' => [
        ['id' => 'dashboard', 'icon' => 'bx bx-home-alt', 'text' => 'Dashboard'],
        ['id' => 'grades', 'icon' => 'bx bx-bar-chart-alt-2', 'text' => 'Grades'],
        ['id' => 'balance', 'icon' => 'bx bx-wallet-alt', 'text' => 'Balance'],
        ['id' => 'schedule', 'icon' => 'bx bx-calendar-exclamation', 'text' => 'Schedule'],
        ['id' => 'news', 'icon' => 'bx bx-news', 'text' => 'News'],
        ['id' => 'settings', 'icon' => 'bx bx-cog', 'text' => 'Settings'],
    ],
];

// Assuming the session variables are set when the user logs in
$username = isset($_SESSION['username']) ? ucfirst($_SESSION['username']) : 'Guest';
$role = isset($_SESSION['role']) ? ucfirst($_SESSION['role']) : 'User';

// Retrieve menu items based on user's role
$userMenus = isset($menus[$role]) ? $menus[$role] : [];

?>

<nav class="sidebar close">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="../../assets/img/logo.png" alt="Logo">
            </span>
            <div class="text logo-text">
                <span class="name"><?php echo htmlspecialchars($username); ?></span>
                <span class="profession"><?php echo htmlspecialchars($role); ?></span>
            </div>
        </div>
        <i class='bx bx-chevron-right toggle'></i>
    </header>

    <div class="menu-bar">
        <div class="menu">
            <ul class="menu-links">
                <?php foreach ($userMenus as $menu): ?>
                    <li class="nav-link">
                        <a href="#<?php echo htmlspecialchars($menu['id']); ?>">
                            <i class='bx <?php echo htmlspecialchars($menu['icon']); ?> icon'></i>
                            <span class="text nav-text"><?php echo htmlspecialchars($menu['text']); ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="bottom-content">
            <li>
                <a href="../../logout.php">
                    <i class='bx bx-log-out icon'></i>
                    <span class="text nav-text">Logout</span>
                </a>
            </li>
            <li class="mode">
                <div class="sun-moon">
                    <i class='bx bx-moon icon moon'></i>
                    <i class='bx bx-sun icon sun'></i>
                </div>
                <span class="mode-text text">Dark mode</span>
                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li>
        </div>
    </div>
</nav>
