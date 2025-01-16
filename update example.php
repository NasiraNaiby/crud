update works here
 if (isset($_POST['action']) && $_POST['action'] == 'update') {
        $clid = $_POST['clid'];
        $userType = $_POST['usertype'];
        $nom = $_POST['Nom'];
        $prenom = $_POST['prenom'];
        $addresse = $_POST['addresse'];
        $codePostal = $_POST['codePostal'];
        $ville = $_POST['ville'];
        $tel = $_POST['tel'];
        $mail = $_POST['mail'];
    
        $stmt = $pdo->prepare("UPDATE client SET usertype = ?, Nom = ?, prenom = ?, addresse = ?, cp = ?, ville = ?, tel = ?, mail = ? WHERE clid = ?");
       // $stmt->execute([$userType, $nom, $prenom, $addresse, $codePostal, $ville, $tel, $mail, $clid]);
       if ($stmt->execute([$userType, $nom, $prenom, $addresse, $codePostal, $ville, $tel, $mail, $clid])) {
        echo "Update successful!";
    } else {
        echo "Update failed.";
    }
    
       // echo 'Updated successfully!!!';
    //      header("Location: adminpage.php");
    //     exit();
    // } else {
    //     echo "Invalid request.";
    // }
}
}