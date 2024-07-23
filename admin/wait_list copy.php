<?php
include '../db_connection.php';

// Fetch all adoption requests from the database
$sql = "SELECT * FROM adoption_requests WHERE status = 'accepted'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Wait List</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
        }
        table tr:hover {
            background-color: #f5f5f5;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1>Wait List</h1>
        <?php include '../components/admin_navbar.php'; ?>
    </header>

    <section>
        <h2>Wait List</h2>
        <a href="view_adoption_request.php">Back to Adoption Requests</a>
        <table id="waitlist-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pet ID</th>
                    <th>Name</th>
                    <th>Contact Info</th>
                    <th>Address</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr data-id='" . $row['id'] . "' class='table-row'>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['pet_id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['contact_info'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No adoption requests found</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <div id="details-container" style="display: none;">
            <!-- Details will be displayed here -->
        </div>
    </section>

    <footer>
        <?php include '../components/footer.php'; ?>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all table rows
            const rows = document.querySelectorAll('.table-row');

            // Add click event listener to each row
            rows.forEach(row => {
                row.addEventListener('click', function() {
                    // Clear previous details
                    document.getElementById('details-container').innerHTML = '';

                    // Get data attributes from clicked row
                    const id = this.getAttribute('data-id');

                    // Retrieve detailed information via AJAX or directly embed here
                    const details = `
                        <h3>Details for Adoption Request ID: ${id}</h3>
                        <p><strong>Name:</strong> ${this.cells[2].textContent}</p>
                        <p><strong>Contact Info:</strong> ${this.cells[3].textContent}</p>
                        <p><strong>Address:</strong> ${this.cells[4].textContent}</p>
                        <p><strong>Email:</strong> ${this.cells[5].textContent}</p>
                    `;

                    // Display details in details-container
                    document.getElementById('details-container').innerHTML = details;
                    document.getElementById('details-container').style.display = 'block';
                });
            });
        });
    </script>
</body>
</html>
