<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        </style>
    <table style="border:1px solid black;">
    <tr >
        <th>nombien</th>
        <th>adresse</th>
        <th>montantlocation</th>
        <th>commission</th>
        <th>idtypebien</th>
        <th>idproprietaire</th>
    </tr>
    <?php
        include 'ajout.php';
        $prop = new BIen();
        $data = $prop->listeBien();
        while($row = $data->fetch()){
    ?>
            <tr>
                <th><?php echo $row['nomBien']?></th>
                <th><?php echo $row['adresse']?></th>
                <th><?php echo $row['montantLocation']?></th>
                <th><?php echo $row['commission']?></th>
                <th><?php echo $row['idTypebien']?></th>
                <th><?php echo $row['idProprietaire']?></th>
            </tr>
    <?php
        }
    ?>
    </table>
</body>
</html>