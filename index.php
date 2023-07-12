<form method="POST">
    <label>Create</label>
    <input type="text" name="nom" placeholder='Nom'>
    <input type="number" name="age" placeholder='Age'>
    <input type="text" name="email" placeholder='E-mail'>
    <input type="submit" name="submit" value="create"><br></br>
    <label>Update</label>
    <input type="text" name='id' placeholder='ID'>
    <input type="text" name="nom" placeholder='Nom'>
    <input type="number" name="age" placeholder='Age'>
    <input type="text" name="email" placeholder='E-mail'>
    <input type="submit" name="update" value="update">
   
</form>

<?php

$dbConnect = new PDO("mysql:host=localhost;dbname=demoBdd", "root", "");

if (isset($_POST['submit'])){
    $nom = $_POST['nom'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    echo "read<br>";
    echo $nom . '<br>' . $age . '<br>' . $email;

    $sql = "INSERT INTO `utilisateurs`(`nom`, `age`, `email`) 
        VALUES ('$nom','$age','$email')";
    $stmt = $dbConnect->prepare($sql);
    $stmt->execute();

    echo "Les données ont été ajouté";
    
}

if (isset($_POST['update'])){

    $nom = $_POST['nom'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    echo 'update<br>Vos données ont bien été mise à jour.';

    $sql = "UPDATE `utilisateurs` SET `Nom`='$nom',`Age`='$age',`Email`='$email' WHERE `id`='$id'";
    $stmt = $dbConnect->prepare($sql);
    $stmt->execute();


}