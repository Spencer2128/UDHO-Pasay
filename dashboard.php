<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style_dashboard.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3cadc7cde1.js" crossorigin="anonymous"></script>
    <script src="search.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="sidebar">
    <div class="profile">
        <img src="assets/SAMPLE.jpg" alt="Profile Picture">
        <h4>Spencer</h4>
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


    <div class="row g-3">
    <!-- HR Department -->
    <div class="col-md-4">
        <a href="table.php?dept=HR" class="dept-card">
            <div class="card shadow-sm p-4 text-center">
                <i class="fas fa-users dept-icon"></i>
                <h5 class="mt-2">HR Department</h5>
            </div>
        </a>
    </div>

    <!-- Finance Department -->
    <div class="col-md-4">
        <a href="table.php?dept=Finance" class="dept-card">
            <div class="card shadow-sm p-4 text-center">
                <i class="fas fa-coins dept-icon"></i>
                <h5 class="mt-2">Finance Department</h5>
            </div>
        </a>
    </div>

    <!-- IT Department -->
    <div class="col-md-4">
        <a href="table.php?dept=IT" class="dept-card">
            <div class="card shadow-sm p-4 text-center">
                <i class="fas fa-laptop-code dept-icon"></i>
                <h5 class="mt-2">IT Department</h5>
            </div>
        </a>
    </div>

    <!-- Engineering Department -->
    <div class="col-md-4">
        <a href="table.php?dept=Engineering" class="dept-card">
            <div class="card shadow-sm p-4 text-center">
                <i class="fas fa-hard-hat dept-icon"></i>
                <h5 class="mt-2">Engineering Department</h5>
            </div>
        </a>
    </div>

    <!-- Procurement Department -->
    <div class="col-md-4">
        <a href="summary.php?dept=Procurement" class="dept-card">
            <div class="card shadow-sm p-4 text-center">
                <i class="fas fa-shopping-cart dept-icon"></i>
                <h5 class="mt-2">Procurement Department</h5>
            </div>
        </a>
    </div>

    <!-- Legal Department -->
    <div class="col-md-4">
        <a href="summary.php?dept=Legal" class="dept-card">
            <div class="card shadow-sm p-4 text-center">
                <i class="fas fa-balance-scale dept-icon"></i>
                <h5 class="mt-2">Legal Department</h5>
            </div>
        </a>
    </div>

    <!-- Add Department Button (Now at the Bottom) -->
    <div class="col-md-4">
        <div class="dept-card" data-bs-toggle="modal" data-bs-target="#addDepartmentModal">
            <div class="card shadow-sm p-4 text-center add-dept">
                <i class="fas fa-plus dept-icon"></i>
                <h5 class="mt-2">Add Department</h5>
            </div>
        </div>
    </div>
</div>


<!-- Add Department Modal -->
<div class="modal fade" id="addDepartmentModal" tabindex="-1" aria-labelledby="addDepartmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDepartmentModalLabel">Add New Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addDepartmentForm">
                    <div class="mb-3">
                        <label for="deptName" class="form-label">Department Name</label>
                        <input type="text" class="form-control" id="deptName" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3">Add Department</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
