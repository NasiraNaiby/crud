<?php
session_start();
include 'connection.php';
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) { 
    header("Location: login.php"); 
    exit(); 
}
//$user_name = $_SESSION['username']; 
?>
<?php include 'sidebar.php'?>
<div class="main">
    <div class="container">
    <div id="client-section">
        <h1 class="text-center">Clients details</h1>
        <table class="table  table-hover table-light text-center">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
               
            </tr>
            </thead>
            <?php
                $stmt = $pdo->query('SELECT * FROM user'); 
                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] ."</td>";
                    echo "<td>" . $row["Name"] ."</td>";
                    echo "<td>" . $row["Email"] ."</td>";
                    echo "<td>" . $row["Password"] . "</td>";
                    echo "<td>";
                    echo "<a href='edit.php?id=" . $row["id"] . "' class='btn btn-primary text-white text-decoration-none'><i class='bi bi-pencil'></i></a>";
                    echo "<button type='button' class='btn btn-danger ms-2' onclick='deleteClient(" . $row["id"] . ")'><i class='bi bi-trash'></i></button>";
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
        </table>
        <button class="btn btn-success" id="addClientBtn">Ajouter un Client</button>
        <form id="clientForm" method="POST" action="action.php">
        <input type="hidden" name="action" value="insert">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="Name">Name:</label>
                <input type="text" class="form-control" id="Name" name="Name">
            </div>
            <div class="form-group col-md-6">
                <label for="prenom">Email:</label>
                <input type="email" class="form-control" id="email" name="Email">
            </div>
        </div>
       
     
        <div class="row">
            <div class="form-group col-md-6">
                <label for="Password">Password:</label>
                <input type="Password" class="form-control" id="Password" name="Password">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>


<!-- clients update form -->
<form id="clientUpdate" method="POST" action="action.php">
    <input type="hidden" name="action" value="insert">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="userType">User Type:</label>
            <select class="form-control" id="userType" name="userType">
                <option value="admin">Administrateur</option>
                <option value="gestionaire">Gestionaire</option>
                <option value="approvisionneur">Approvisionneur</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?php echo htmlspecialchars($client['Nom']); ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="prenom">Prenom:</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo htmlspecialchars($client['prenom']); ?>">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="addresse">Addresse:</label>
            <input type="text" class="form-control" id="addresse" name="addresse" value="<?php echo htmlspecialchars($client['addresse']); ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="codePostal">Code Postal:</label>
            <input type="text" class="form-control" id="codePostal" name="codePostal" value="<?php echo htmlspecialchars($client['cp']); ?>">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="ville">Ville:</label>
            <input type="text" class="form-control" id="ville" name="ville" value="<?php echo htmlspecialchars($client['ville']); ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="tel">Tel:</label>
            <input type="text" class="form-control" id="tel" name="tel" value="<?php echo htmlspecialchars($client['tel']); ?>">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="mail">Email:</label>
            <input type="email" class="form-control" id="mail" name="mail" value="<?php echo htmlspecialchars($client['mail']); ?>">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>


</div>
</div>
</div>


<?php include 'footer.php'?>