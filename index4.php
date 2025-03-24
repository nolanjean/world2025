<?php  
require_once 'header.php'; 
require_once 'inc/manager-db.php';
if (isset($_GET['id']) && !empty($_GET['id']) ){
    $id = ($_GET['id']);
    $city = lookCity($id);
    $pays = getDetailsPays($id);
}
?>
<link rel="stylesheet" href="css/style.css">
<main>
    <h1>Les villes de <?php echo $pays["Name"]?></h1>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Population</th>
                <th>District</th>                
            </tr>
        </thead>
        <tbody>
            <?php foreach($city as $villes){
            ?>
            <tr>
                <td><?php echo $villes->Name ?></td>
                <td><?php echo $villes->Population ?></td>
                <td><?php echo $villes->District ?></td>
            </tr>
        <?php
        }?>
        </tbody>

        
    </table>
</main>



<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>