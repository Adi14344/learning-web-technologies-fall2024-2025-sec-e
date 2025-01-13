<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['author_id'])) 
{
    header('Location: login.html');
    exit;
}

echo "Welcome to the Dashboard, " . $_SESSION['author_name'] . "!";

// Database connection
$conn = new mysqli('localhost', 'root', '', 'blog_system');

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}


// Initialize variables
$author_name = isset($_GET['author_name']) ? $mysqli->real_escape_string($_GET['author_name']) : '';
$contact_no = isset($_GET['contact_no']) ? $mysqli->real_escape_string($_GET['contact_no']) : '';
$message = "";

// Handle search
if ($_SERVER['REQUEST_METHOD'] == 'GET' && (isset($_GET['author_name']) || isset($_GET['contact_no']))) 
{
    $sql = "SELECT * FROM authors WHERE author_name LIKE '%$author_name%'";

    // Add contact_no condition if the column exists
    $result = $mysqli->query("DESCRIBE authors");
    $columns = [];
    while ($row = $result->fetch_assoc()) 
    {
        $columns[] = $row['Field'];
    }

    if (in_array('contact_no', $columns)) 
    {
        $sql .= " OR contact_no LIKE '%$contact_no%'";
    }

    $search_result = $mysqli->query($sql);
}

// Handle delete
if (isset($_GET['delete_id'])) 
{
    $delete_id = intval($_GET['delete_id']);
    $mysqli->query("DELETE FROM authors WHERE id = $delete_id");
    $message = "Author deleted successfully!";
}

// Handle update
if (isset($_POST['update_id'])) 
{
    $update_id = intval($_POST['update_id']);
    $updated_name = $mysqli->real_escape_string($_POST['author_name']);
    $updated_contact = $mysqli->real_escape_string($_POST['contact_no']);
    $updated_username = $mysqli->real_escape_string($_POST['username']);
    $updated_password = $mysqli->real_escape_string($_POST['password']);

    $mysqli->query("
        UPDATE authors 
        SET author_name = '$updated_name', 
            contact_no = '$updated_contact', 
            username = '$updated_username', 
            password = '$updated_password'
        WHERE id = $update_id
    ");
    $message = "Author updated successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search, Update & Delete Authors</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h1>Search, Update & Delete Authors</h1>

    <?php if (!empty($message)) echo "<p style='color: green;'>$message</p>"; ?>

    <form method="GET">
        <label for="author_name">Author Name:</label>
        <input type="text" name="author_name" id="author_name" value="<?php echo htmlspecialchars($author_name); ?>">

        <label for="contact_no">Contact No:</label>
        <input type="text" name="contact_no" id="contact_no" value="<?php echo htmlspecialchars($contact_no); ?>">

        <button type="submit">Search</button>
    </form>

    <?php if (isset($search_result) && $search_result->num_rows > 0): ?>
        <table>
            <tr>
                <th>Author ID</th>
                <th>Author Name</th>
                <th>Contact No</th>
                <th>Username</th>
                <th>Password</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $search_result->fetch_assoc()): ?>
                <tr>
                    <form method="POST">
                        <td><?php echo $row['id']; ?></td>
                        <td><input type="text" name="author_name" value="<?php echo htmlspecialchars($row['author_name']); ?>"></td>
                        <td><input type="text" name="contact_no" value="<?php echo htmlspecialchars($row['contact_no']); ?>"></td>
                        <td><input type="text" name="username" value="<?php echo htmlspecialchars($row['username']); ?>"></td>
                        <td><input type="password" name="password" value="<?php echo htmlspecialchars($row['password']); ?>"></td>
                        <td>
                            <button type="submit" name="update_id" value="<?php echo $row['id']; ?>">Update</button>
                            <a href="?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </form>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php elseif (isset($search_result)): ?>
        <p>No authors found.</p>
    <?php endif; ?>

    <a href="logout.php">Logout</a>
</body>
</html>
