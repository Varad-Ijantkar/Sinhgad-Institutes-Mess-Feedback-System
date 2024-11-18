<!DOCTYPE html>
<html>

<head>
    <title>Complaint Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .report-container {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .section-title {
            margin-top: 20px;
            font-size: 16px;
            font-weight: bold;
            color: #555;
        }

        .section-content {
            margin-left: 10px;
            font-size: 14px;
            color: #333;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="report-container">
        <h2>Food Complaint Report</h2>

        <div class="section">
            <div class="section-title">Student Information</div>
            <div class="section-content">
                <p><strong>Email:</strong> <?= $complaint['email']; ?></p>
                <p><strong>Name:</strong> <?= $complaint['name']; ?></p>
                <p><strong>Phone:</strong> <?= $complaint['phone']; ?></p>
                <p><strong>College and Class:</strong> <?= $complaint['college']; ?></p>
                <p><strong>Campus:</strong> <?= $complaint['campus']; ?></p>
                <p><strong>Mess:</strong> <?= $complaint['mess']; ?></p>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Complaint Details</div>
            <div class="section-content">
                <p><strong>Date:</strong> <?= $complaint['date']; ?></p>
                <p><strong>Meal Time:</strong> <?= $complaint['meal_time']; ?></p>
                <p><strong>Category:</strong> <?= $complaint['category']; ?></p>
                <p><strong>Hygiene Environment in Dining Hall:</strong> <?= $complaint['hygiene']; ?></p>
                <p><strong>Pest Control in Dining Hall:</strong> <?= $complaint['pest_control']; ?></p>
                <p><strong>Necessary Protocols Followed:</strong> <?= $complaint['protocols']; ?></p>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Complaint Description</div>
            <div class="section-content">
                <p><strong>Food Related Complaints:</strong> <?= $complaint['food_complaints']; ?></p>
                <p><strong>Suggestions for Improvement:</strong> <?= $complaint['suggestions']; ?></p>
            </div>
        </div>
    </div>
</body>

</html>