<?php
/**
 * Home Page
 *
 * PHP version 7
 *
 * @category  Page
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

?>
<?php  
require_once 'header.php'; 
require_once 'inc/manager-db.php';
if (isset($_GET['name']) && !empty($_GET['name']) ){
    $id = ($_GET['name']);
    $pays= getDetailsPays($id);
    $capital = getCapitale($pays["Capital"]);
    $percentage = percentageLanguage($id);
}
?>
<link rel="stylesheet" href="css/style.css">
<main role="main" class="flex-shrink-0">
<div class="container">
        <?php  $drapeau = strtolower($pays["Code2"]); 
            $source = "images/flag/$drapeau.png";
            if (!file_exists($source)) {
              $source = "images/flag/onu.png";
            }?> 
        <h1 class="nomPay"><?php echo $pays["Name"]; ?> <img src="<?php echo $source; ?>" alt="Drapeau de <?php echo $pays["Name"]; ?>"></h1>
        <table class="infoPay">
            <tr>
                <th>Code</th>
                <th>Continent</th>
                <th>Capitale</th>
                <th>Population</th>
                <th>Superficie</th>
            </tr>
            <tr>
                <td><?php echo $pays["Code"]?></td>
                <td><?php echo $pays["Continent"]?></td>
                <td><?php if ($capital==NULL){  echo "non capitale";} else echo $capital->name?></td>
                <td><?php echo $pays["Population"]?></td>
                <td><?php echo $pays["SurfaceArea"]?></td>
            </tr>
        </table>
        <section class="test">
        <button onclick="window.location.href='index4.php?id=<?php echo $id?>';">Voir les villes</button>	
        </section>
        <div class="details" class="table2Td">
            <div class="langues">
                <h2>Langues parlées</h2>
                <table>
                    <tr>
                        <th>Nom</th>
                        <th>Pourcentage</th>
                    </tr>
                    <tr>
                        <?php foreach($percentage as $test):
                            $nameLanguage= nameLanguage($test->idLanguage);
                            ?>
                            <tr><td><?php echo $nameLanguage;?></td>
                            <td><?php echo $test->Percentage?></td>
                        </tr>
                        <?php endforeach ?>
                    </tr>
                </table>
            </div>
            <div class="economiques">
                <h2>Données économiques et sociales</h2>
                <table>
                    <tr>
                        <td>Population</td>
                        <td><?php echo $pays["Population"]?></td>
                    </tr>
                    <tr>
                        <td>PNB</td>
                        <td><?php echo $pays["GNP"]?></td>
                    </tr>
                    <tr>
                        <td>Chef d'état</td>
                        <td><?php echo $pays["HeadOfState"] ?></td>
                    </tr>
                    <tr>
                        <td>Espérance de vie</td>
                        <td><?php echo $pays["LifeExpectancy"] ?></td>
                    </tr>
                </table>
            </div>
            <div class="actualisees">
                <h2>Données actualisées (source Wikipédia)</h2>
                <form>
                    <label for="population">Population:</label>
                    <input type="text" id="population" name="population"><br>
                    <label for="pnb">PNB:</label>
                    <input type="text" id="pnb" name="pnb"><br>
                    <label for="chef">Chef d'état:</label>
                    <input type="text" id="chef" name="chef"><br>
                    <label for="esperance">Espérance de vie:</label>
                    <input type="text" id="esperance" name="esperance"><br>
                    <button type="submit">Mettre à jour</button>
                </form>
                <section class="bouttonFoisons">
                    <button>Voir les données actualisées (wikipedia):</button>
                    <button>Espérance</button>
                    <button>Chef</button>
                    <button>PNB</button>
                    <button>Population</button>
                </section>
            </div>
        </div>
    </div>
</main>

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>