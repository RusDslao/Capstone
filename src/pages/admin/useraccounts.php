<?php include '../../database/config.php'; ?>

<div class="content">
        <h2>Create User</h2>
        <?php if (!empty($message)) echo '<p>' . $message . '</p>'; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required><br><br>

            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="admin" <?php if ($role == 'admin') echo 'selected'; ?>>Admin</option>
                <option value="student" <?php if ($role == 'student') echo 'selected'; ?>>Student</option>
                <option value="teacher" <?php if ($role == 'teacher') echo 'selected'; ?>>Teacher</option>
                <!-- Add more roles if necessary -->
            </select><br><br>

            <input type="submit" value="Create User">
        </form>
    </div>