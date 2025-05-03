<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <py-script src="python\file_view.py"></py-script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style_index.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3cadc7cde1.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 25rem;">
            <h3 class="text-center mb-4">Login</h3>
            <form action="login_process.php" method="POST">
            <div class="mb-3">
                    <label for="accountType" class="form-label">Account Type</label>
                    <select class="form-select" id="accountType" name="accountType" required>
                        <option value="Admin Executive">Admin Executive</option>
                        <option value="Admin">Admin</option>
                        <option value="Hoa">H.O.A.</option>
                        <option value="Operations">Operations</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
