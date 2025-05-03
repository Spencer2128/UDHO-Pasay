<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style_dashboard.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
            <img src="assets/UDHOLOGO.png" alt="System Logo" width="30" height="30" class="me-2">
            <h6 class="mb-0">Urban Development and Housing Office</h6>
        </div>

        <div class="card">
            <div class="card-body">
                <form id="addInfoForm">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="mb-2">
                                <label for="controlNumber" class="form-label small">Control Number</label>
                                <input type="text" class="form-control form-control-sm" id="controlNumber" value="UDHO 2025" onfocus="if(this.value=='UDHO 2025')this.value=''" onblur="if(this.value=='')this.value='UDHO 2025'" required>
                            </div>

                            <div class="mb-2">
                                <label for="sender" class="form-label small required">Sender / From Department</label>
                                <select class="form-control form-control-sm" id="sender" onchange="toggleCustomDepartment()">
                                    <option value="" selected disabled>Select Department</option>
                                    <option value="HR">HR Department</option>
                                    <option value="Finance">Finance Department</option>
                                    <option value="IT">IT Department</option>
                                    <option value="Engineering">Engineering Department</option>
                                    <option value="Procurement">Procurement Department</option>
                                    <option value="Legal">Legal Department</option>
                                    <option value="others">Others</option>
                                </select>
                                <!-- Custom Typable Input (Hidden by Default) -->
                                <input type="text" class="form-control form-control-sm mt-2" id="customSender" placeholder="Enter Department Name" style="display: none;">
                            </div>

                            <div class="mb-2">
                                <label for="date" class="form-label small required">Date</label>
                                <input type="date" class="form-control form-control-sm" id="date" required>
                            </div>
                            <div class="mb-2">
                                <label for="time" class="form-label small required">Time</label>
                                <input type="time" class="form-control form-control-sm" id="time" required>
                            </div>
                            <div class="mb-2">
                                <label for="subject" class="form-label small required">Subject</label>
                                <input type="text" class="form-control form-control-sm" id="subject" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="dateFrom" class="form-label small required">Date From</label>
                                <input type="date" class="form-control form-control-sm" id="dateFrom">
                            </div>
                            <div class="mb-2">
                                <label for="dateTo" class="form-label small required">Date To</label>
                                <input type="date" class="form-control form-control-sm" id="dateTo">
                            </div>
                            <div class="mb-2">
                                <label for="requiredActions" class="form-label small required">Required Actions / Instructions</label>
                                <textarea class="form-control form-control-sm" id="requiredActions" rows="2" required></textarea>
                            </div>
                            <div class="mb-2">
                                <label for="actionTaken" class="form-label small required">Action Taken</label>
                                <textarea class="form-control form-control-sm" id="actionTaken" rows="2" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btn-sm">Save Information</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
