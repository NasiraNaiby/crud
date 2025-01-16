<?php
session_start();
include 'connection.php';
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) { 
    header("Location: login.php"); 
    exit(); 
}
$user_name = $_SESSION['username']; 

?>

<?php include 'sidebar.php'?>

<div class="main">
    <div class="container">
    <div id="client-section ">
<!-- clients update form -->
<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM user WHERE id = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Make sure to check if $user is successfully fetched
    if ($user) {
        $Name = $user['Name'];
        $Email = $user['Email'];
        $Password = $user['Password'];
    } else {
        echo "User not found.";
        exit();
    }
}
?>
<form id="Update" method="POST" action="action.php">
    <input type="hidden" name="action" value="update">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    
    <div class="row">
        <div class="form-group col-md-6">
            <label for="Name">Name:</label>
            <input type="text" class="form-control" id="Name" name="Name" value="<?php echo $Name; ?>">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="Email">Email:</label>
            <input type="text" class="form-control" id="Email" name="Email" value="<?php echo $Email; ?>">
        </div>
       
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="Password">Password:</label>
            <input type="password" class="form-control" id="Password" name="Password" value="<?php echo $Password; ?>">
        </div>
     
    </div>
 
    <button type="submit" class="btn btn-primary mt-3">Update</button>
</form>

<!-- clinet update form ends here -->
</div>
</div>
</div>


<?php include 'footer.php'?>