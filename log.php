<?php
require 'conn.php'; // Pastikan file conn.php berisi kode untuk membuat koneksi ke database

// Proses penghapusan data
if (isset($_POST['clear'])) {
    $delete_sql = 'DELETE FROM visitor_info';
    if (mysqli_query($conn, $delete_sql)) {
        $message = "Logs cleared successfully.";
    } else {
        $message = "Error clearing logs: " . mysqli_error($conn);
    }
}

// Ambil data dari database
$sql = 'SELECT * FROM visitor_info';
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs</title>
</head>
<body>
    <h1>Visitor Logs</h1>
    <?php if (isset($message)) : ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
    
    <!-- Form untuk menghapus data -->
    <form method="post">
        <button type="submit" name="clear" onclick="return confirm('Are you sure you want to clear all logs?');">Clear Logs</button>
    </form>
    
    <table border="1">
        <tr>
            <th>User Agent</th>
            <th>Visit Time</th>
            <th>IP Address</th>
        </tr>
        <?php if (mysqli_num_rows($result) > 0) : ?>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($row["user_agent"]); ?></td>
                    <td><?php echo htmlspecialchars($row["visit_time"]); ?></td>
                    <td><?php echo htmlspecialchars($row["ip_address"]); ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else : ?>
            <tr>
                <td colspan="3">No records found.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>

<?php
// Tutup koneksi setelah selesai
mysqli_close($conn);
?>
