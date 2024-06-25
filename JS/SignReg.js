// Define admin, student, and teacher usernames and passwords
const accounts = {
    admin: { username: "admin", password: "admin123", type: "admin" },
    student: { username: "student", password: "student123", type: "student" },
    teacher: { username: "teacher", password: "teacher123", type: "teacher" }
};

function authenticate(username, password) {
    const account = accounts[username];
    if (account && account.password === password) {
        return account.type; // Return the type of user (admin, student, or teacher)
    }
    return false;
}

// Form submission event handler
document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    // Get input values
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    // Authenticate user
    const userType = authenticate(username, password);
    if (userType) {
        // Redirect to different HTML pages based on user type
        if (userType === "admin") {
            window.location.href = "Admin_Dashboard.html"; // Redirect admin to admin.html
        } else if (userType === "student") {
            window.location.href = "Student_Dashboard.html"; // Redirect student to student.html
        } else if (userType === "teacher") {
            window.location.href = "Teacher_Dashboard.html"; // Redirect teacher to teacher.html
        }
    } else {
        document.getElementById("message").innerText = "Invalid username or password.";
    }
});