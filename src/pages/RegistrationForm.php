
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Form</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>

<?php include '../../includes/formHeader.php'; ?>

    <div class="form-container">
        <form id="initial-form" onsubmit="handleFormSubmit(event)">
            <h3>What Type of Enrollee are You?</h3>
            <label for="enrollment-type">Select Enrollment Type:</label>
            <select id="enrollment-type" name="enrollment-type" required>
                <option value="" disabled selected>Select your option</option>
                <option value="new">New Enrollee</option>
                <option value="existing">Existing Enrollee</option>
            </select>
            <button type="submit" class="btn">Submit</button>
        </form>

        <form id="new-enrollee-form" class="hidden">
            <h3>New Enrollee Form</h3>
            <label for="new-name">Name:</label>
            <input type="text" id="new-name" name="new-name" required>
            <label for="new-email">Email:</label>
            <input type="email" id="new-email" name="new-email" required>
            <button type="submit" class="btn">Submit</button>
        </form>

        <form id="existing-enrollee-form" class="hidden">
            <h3>Existing Enrollee Form</h3>
            <label for="existing-id">Enrollee ID:</label>
            <input type="text" id="existing-id" name="existing-id" required>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>

    <script src="../../assets/js/script.js"></script>

    <?php include '../../includes/formFooter.php'; ?>

</body>
</html>

