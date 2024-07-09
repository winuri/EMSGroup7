<?php
// Include the database connection
include 'db_connection.php';

// Retrieve the payroll id from the URL parameter
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    // Query to get from_date and to_date from payrollsheet
    $query = "SELECT `from_date`, `to_date`, `title`, `create_at`, `update_at` FROM `payrollsheet` WHERE `id`=?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($from_date, $to_date, $title, $create_at, $update_at);
        $stmt->fetch();
        $stmt->close();

        // If from_date and to_date are retrieved
        if ($from_date && $to_date) {
            // Query to get the sum of net_salary
            $query2 = "SELECT SUM(`net_salary`) AS net_salary FROM `payroll` WHERE `created_at` BETWEEN ? AND ?";
            if ($stmt2 = $conn->prepare($query2)) {
                $stmt2->bind_param("ss", $from_date, $to_date); 
                $stmt2->execute();
                $stmt2->bind_result($net_salary);
                $stmt2->fetch();
                $stmt2->close();
            } else {
                die("Error preparing second statement: " . $conn->error);
            }
        } else {
            die("No payrollsheet found with the given ID.");
        }
    } else {
        die("Error preparing statement: " . $conn->error);
    }
} else {
    die("Invalid payroll ID.");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll Sheet Details</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            /* display: flex; */
            /* justify-content: center; */
            /* align-items: center; */
            height: 100vh;
            margin: 0;
        }
        .payslip {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 400px;
            margin-top: 20px;
        }
        .payslip h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            vertical-align: top;
        }
        td:first-child {
            font-weight: bold;
            color: #555;
            width: 30%;
        }
        td:last-child {
            width: 70%;
            color: #333;
        }
        tr:last-child td {
            border-bottom: none;
        }
        .container-menu {
    text-align: center;
    margin-top: 20px;
}

.container-menu table {
    margin: 0 auto;
}

.container-menu button {
    background-color: #007BFF;
    color: white;
    padding: 6px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
    width: 100px;
}

.container-menu button:hover {
    background-color: #0056b3;
}

    </style>
    <script >
        function goBack(){
            window.history.back();
        }

        function downloadPDF() {
            const doc = new jsPDF();
            const element = document.querySelector('.payslip');

            // Get HTML content of the payslip div
            const payslipContent = element.innerHTML;

            // Convert payslip content to PDF
            doc.fromHTML(payslipContent, 15, 15, {
                width: 170
            });

            // Download the PDF
            doc.save('payslip.pdf');
        }
    </script>
</head>
<body>
<div class="container">
        <div>
            <!-- Sidebar iframe -->
            <iframe id="sidebar-iframe" src="sidebar.html" width="100%" height="100%" style="border: none;" title="Sidebar"></iframe>
        </div>
        <div class="content">
            <div class="payslip">
                <h1>Payslip</h1>
                <table>
                    <tr>
                        <td>ID</td>
                        <td><?php echo htmlspecialchars($id); ?></td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td><?php echo htmlspecialchars($title); ?></td>
                    </tr>
                    <tr>
                        <td>From Date</td>
                        <td><?php echo htmlspecialchars($from_date); ?></td>
                    </tr>
                    <tr>
                        <td>To Date</td>
                        <td><?php echo htmlspecialchars($to_date); ?></td>
                    </tr>
                    <tr>
                        <td>Net Salary</td>
                        <td><?php echo htmlspecialchars($net_salary); ?></td>
                    </tr>
                    <tr>
                        <td>Created At</td>
                        <td><?php echo htmlspecialchars($create_at); ?></td>
                    </tr>
                    <tr>
                        <td>Updated At</td>
                        <td><?php echo htmlspecialchars($update_at); ?></td>
                    </tr>
                </table>
            </div>
            <div class="container-menu">
                <table">
                    <tr>
                    <td><button type="button" onclick="goBack()">Back</button></td>
                    <button type="button" onclick="downloadPDF()">Download</button>
                    </tr>
                </table>
    </div>
        </div>
        
    </div>
    
</body>
</html>
