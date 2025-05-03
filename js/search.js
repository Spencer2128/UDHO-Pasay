document.getElementById("searchInput").addEventListener("keyup", function() {
            let filter = this.value.toLowerCase();
            let tableRows = document.querySelectorAll("#recordsTable tbody tr");

            tableRows.forEach(row => {
                let text = row.innerText.toLowerCase();
                row.style.display = text.includes(filter) ? "" : "none";
            });

            highlightText(filter);
        });

        function highlightText(filter) {
            let table = document.getElementById("recordsTable");
            let rows = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

            for (let row of rows) {
                for (let cell of row.cells) {
                    cell.innerHTML = cell.innerHTML.replace(/<span class="highlight">|<\/span>/g, ''); // Remove old highlights

                    if (filter && cell.innerText.toLowerCase().includes(filter)) {
                        let regex = new RegExp(`(${filter})`, 'gi');
                        cell.innerHTML = cell.innerText.replace(regex, `<span class="highlight">$1</span>`);
                    }
                }
            }
        }

        // Handle form submission and add new row to the table
        document.getElementById("addInfoForm").addEventListener("submit", function(event) {
            event.preventDefault();

            let controlNumber = document.getElementById("controlNumber").value;
            let archiveNumber = document.getElementById("archiveNumber").value;
            let date = document.getElementById("date").value;
            let time = document.getElementById("time").value;
            let sender = document.getElementById("sender").value;
            let subject = document.getElementById("subject").value;

            let tableBody = document.querySelector("#recordsTable tbody");
            let newRow = `<tr>
                            <td>${controlNumber}</td>
                            <td>${archiveNumber}</td>
                            <td>${date}</td>
                            <td>${time}</td>
                            <td>${sender}</td>
                            <td>${subject}</td>
                            <td>
                                <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>`;

            tableBody.innerHTML += newRow;

            document.getElementById("addInfoForm").reset();
            let modal = bootstrap.Modal.getInstance(document.getElementById("addInfoModal"));
            modal.hide();
        });

        function showDetails(row) {
            let cells = row.getElementsByTagName("td");
            document.getElementById("infoControlNumber").innerText = cells[0].innerText;
            document.getElementById("infoArchiveNumber").innerText = cells[1].innerText;
            document.getElementById("infoDate").innerText = cells[2].innerText;
            document.getElementById("infoTime").innerText = cells[3].innerText;
            document.getElementById("infoSender").innerText = cells[4].innerText;
            document.getElementById("infoSubject").innerText = cells[5].innerText;
        }

// Profile Picture Preview
document.getElementById('profilePicture').addEventListener('change', function(event) {
    const reader = new FileReader();
    reader.onload = function() {
        document.getElementById('previewImage').src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
});

// Handle Form Submission
document.getElementById('settingsForm').addEventListener('submit', function(event) {
    event.preventDefault();
    alert('Settings updated successfully!');
});
// Change icon preview dynamically
document.getElementById("deptIcon").addEventListener("change", function () {
    document.getElementById("iconPreview").className = this.value + " dept-icon";
});

// Handle form submission (dummy action)
document.getElementById("addDepartmentForm").addEventListener("submit", function (e) {
    e.preventDefault();
    alert("New department added!");
    document.getElementById("addDepartmentModal").classList.remove("show");
    document.body.classList.remove("modal-open");
    document.querySelector(".modal-backdrop").remove();
});
function toggleCustomDepartment() {
    var departmentSelect = document.getElementById("sender");
    var customInput = document.getElementById("customSender");
    if (departmentSelect.value === "others") {
        customInput.style.display = "block";
        customInput.required = true; // Make it required when visible
    } else {
        customInput.style.display = "none";
        customInput.required = false;
        customInput.value = ""; // Clear input if not needed
    }
}

function toggleCustomDepartment() {
    var departmentSelect = document.getElementById("sender");
    var customInput = document.getElementById("customSender");
    if (departmentSelect.value === "others") {
        customInput.style.display = "block";
    } else {
        customInput.style.display = "none";
        customInput.value = ""; // Clear input if not needed
    }
}
