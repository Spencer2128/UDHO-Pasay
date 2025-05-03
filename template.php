<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Router’s Slip Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Router's Slip Form</h2>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Control Number</label>
            <input type="text" class="form-control" name="control_no" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Document Type</label>
            <select class="form-control" name="document_type">
                <option>Memo</option>
                <option>Referral Report</option>
                <option>Invitation</option>
                <option>Letter</option>
                <option>Request</option>
                <option>Proposal</option>
                <option>Others</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Priority</label>
            <select class="form-control" name="priority">
                <option>3 days</option>
                <option>7 days</option>
                <option>15 days</option>
                <option>20 days</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Sender</label>
            <input type="text" class="form-control" name="sender" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Recipient</label>
            <input type="text" class="form-control" name="recipient" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Subject</label>
            <input type="text" class="form-control" name="subject" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Due Date</label>
            <input type="date" class="form-control" name="due_date" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Generate PDF</button>
    </form>
</div>
</body>
</html>
