<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style_dashboard.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="search.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="sidebar">
        <div class="profile">
            <img src="assets\UDHOLOGO.png" alt="Profile Picture">
            <h4 id="userName">Spencer</h4>
        </div>
        <a href="dashboard.php">Dashboard</a>
        <a href="records.php">Records</a>
        <a href="settings.php">Settings</a>
        <a href="index.php">Logout</a>
    </div>

    <div class="content">
    <div class="d-flex justify-content-end align-items-center mb-4 p-3 shadow-sm rounded header-pink">
    <img src="assets/UDHOLOGO.jpg" alt="System Logo" width="30" height="30" class="me-2">
    <h6 class="mb-0">Urban Development and Housing Office</h6>
    </div>


            <div class="card p-4">
                <form id="settingsForm">
                    
                    <!-- Profile Picture Upload -->
                    <div class="mb-3 text-center">
                        <label for="profilePicture" class="form-label">Profile Picture</label>
                        <div class="d-flex justify-content-center">
                            <img id="previewImage" src="assets/profile.jpg" class="rounded-circle border" width="100" height="100">
                        </div>
                        <input type="file" class="form-control mt-2" id="profilePicture" accept="image/*">
                    </div>

                    <!-- Name and Email -->
                    <div class="mb-3">
                        <label for="userNameInput" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="userNameInput" required>
                    </div>
                    <div class="mb-3">
                        <label for="emailInput" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="emailInput" required>
                    </div>

                    <!-- Change Password -->
                    <div class="mb-3">
                        <label for="currentPassword" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="currentPassword">
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="newPassword">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="confirmPassword">
                    </div>

                    <!-- Save Button -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
