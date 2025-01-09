<html>
<head>
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/Css/Signup.css">
    <script src="../Assets/Js/signup.js"></script>
</head>
<body>
    <div class="signup-container">
        <img alt="Company Logo" src="../Assets/images/Dog Adoption logo.png">
        <h1>Sign up</h1>
        <p>Create a free account with your email.</p>
        <input type="text" placeholder="Full Name">
        <input type="email" placeholder="Email">
        <input type="password" id="password" placeholder="Password">
        <input type="password" id="confirm-password" placeholder="Re-enter Password">
        <div id="error-message" class="error-message"></div>
        <button onclick="return validatePasswords()">Sign up</button>
        <div class="login-link">
            Have an account? <a href="login.php">Log in</a>
        </div>
    </div>
</body>
</html>