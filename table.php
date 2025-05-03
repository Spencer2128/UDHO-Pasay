<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style_dashboard.css" rel="stylesheet">
    <py-script src="python\file_view.py"></py-script>
    <script src="https://kit.fontawesome.com/3cadc7cde1.js" crossorigin="anonymous"></script>
    <script src="search.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="background-image">
   
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

<div class="container mt-4">
    <h4 class="mb-3">Records Table</h4>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Control Number</th>
                    <th scope="col">Archive Number</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Sender / From Department</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>CN001</td>
                    <td>AR12345</td>
                    <td>2025-03-21</td>
                    <td>10:30 AM</td>
                    <td>HR Department</td>
                    <td>Employee Benefits Update</td>
                    <td>
                        <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> View</button>
                        <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>CN002</td>
                    <td>AR12346</td>
                    <td>2025-03-20</td>
                    <td>09:15 AM</td>
                    <td>Finance Department</td>
                    <td>Budget Allocation 2025</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-btn"><i class="fas fa-eye"></i> View</button>
                        <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Record</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editForm">
          <div class="mb-3">
            <label for="editControlNumber" class="form-label">Control Number</label>
            <input type="text" class="form-control" id="editControlNumber">
          </div>
          <div class="mb-3">
            <label for="editArchiveNumber" class="form-label">Archive Number</label>
            <input type="text" class="form-control" id="editArchiveNumber">
          </div>
          <div class="mb-3">
            <label for="editDate" class="form-label">Date</label>
            <input type="date" class="form-control" id="editDate">
          </div>
          <div class="mb-3">
            <label for="editTime" class="form-label">Time</label>
            <input type="time" class="form-control" id="editTime">
          </div>
          <div class="mb-3">
            <label for="editSender" class="form-label">Sender / Department</label>
            <input type="text" class="form-control" id="editSender">
          </div>
          <div class="mb-3">
            <label for="editSubject" class="form-label">Subject</label>
            <input type="text" class="form-control" id="editSubject">
          </div>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this record?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>
<script>

document.addEventListener("DOMContentLoaded", function () {
    let deleteRow; // Global variable for deletion tracking

    // Edit Button Functionality
    document.querySelectorAll(".btn-warning").forEach(button => {
        button.addEventListener("click", function () {
            const row = this.closest("tr");
            document.getElementById("editControlNumber").value = row.cells[0].innerText;
            document.getElementById("editArchiveNumber").value = row.cells[1].innerText;
            document.getElementById("editDate").value = row.cells[2].innerText;
            document.getElementById("editTime").value = row.cells[3].innerText;
            document.getElementById("editSender").value = row.cells[4].innerText;
            document.getElementById("editSubject").value = row.cells[5].innerText;

            var editModal = new bootstrap.Modal(document.getElementById("editModal"));
            editModal.show();
        });
    });

    document.getElementById("editForm").addEventListener("submit", function (event) {
        event.preventDefault();
        alert("Changes saved successfully!");
        var editModal = bootstrap.Modal.getInstance(document.getElementById("editModal"));
        editModal.hide();
    });

    // Delete Button Functionality
    document.querySelectorAll(".btn-danger").forEach(button => {
        button.addEventListener("click", function () {
            deleteRow = this.closest("tr"); // Assign the row to be deleted
            new bootstrap.Modal(document.getElementById("deleteModal")).show();
        });
    });

    document.getElementById("confirmDelete").addEventListener("click", function () {
        if (deleteRow) {
            deleteRow.remove(); // Remove the row from the table
            deleteRow = null; // Reset variable
        }
        bootstrap.Modal.getInstance(document.getElementById("deleteModal")).hide();
    });
});

document.querySelectorAll(".view-btn").forEach(button => {
    button.addEventListener("click", function () {
        const row = this.closest("tr");
        const controlNumber = row.cells[0].innerText; 

        window.location.href = `/view_record?control_number=${controlNumber}`;
    });
});




</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
