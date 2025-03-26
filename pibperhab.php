<?php  
require_once 'header.php'; 
require_once 'inc/manager-db.php';
    $statRich= statRichPerHab();
?>
<link rel="stylesheet" href="css/style.css">
<main role="main" class="flex-shrink-0">

  <div class="container">
    <div>
     <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>Nom</th>
            <th>PIB</th>
            <th>Population</th>
            <th>Pib par Habitant</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($statRich as $pays): ?>
            <tr>         
              <td> <?php echo $pays->Name ?></td>
              <td> <?php echo $pays->GNP?></td>
              <td> <?php echo $pays->Population?></td>
              <td> <?php echo $pays->pibperhab?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
     </table>
    </div>
  </div>
</main>

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>