<?php
include 'db.php';

$sql = "
SELECT
s.request_id,
t.technician_name,
s.customer_name,
s.service_type
FROM service_requests s
JOIN technicians t
ON s.technician_id = t.technician_id
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Service Requests</title>
</head>
<body>

<h2>Service Requests</h2>

<table border="1">
    <tr>
        <th>Request ID</th>
        <th>Technician</th>
        <th>Customer</th>
        <th>Service</th>
        <th>Actions</th>
    </tr>

    <?php
    while($row = $result->fetch_assoc())
    {
    ?>
        <tr>
            <td><?php echo $row['request_id']; ?></td>
            <td><?php echo $row['technician_name']; ?></td>
            <td><?php echo $row['customer_name']; ?></td>
            <td><?php echo $row['service_type']; ?></td>

            <td>
                <a href="edit_request.php?id=<?php echo $row['request_id']; ?>">
                    Edit
                </a>

                |

                <a href="delete_request.php?id=<?php echo $row['request_id']; ?>"
                   onclick="return confirm('Are you sure you want to delete this request?');">
                    Delete
                </a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>

<br><br>

<a href="index.php">Back</a>

</body>
</html>