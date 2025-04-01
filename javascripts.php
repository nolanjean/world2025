<?php
/**
 * Déclaration d'inclusion de code js
 *
 * PHP version 7
 *
 * @category  Include_JS
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */
?>
<script src="assets/library/jquery-3.4.1.js"> </script>
<script src="assets/bootstrap-4.4.1-dist/js/bootstrap.js"> </script>
<script src="https://code.jquery.com/jquery-3.7.1.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitterbootstrap/4.5.2/js/bootstrap.min.js"> </script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"> </script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap4.js"> </script>
<script>new DataTable('#example');</script>

<script src="https://cdn.jsdelivr.net/npm/maphilight@1.4.2/jquery.maphilight.min.js"
></script>
<script type="text/javascript">
  $(function() {
  $('.map').maphilight({fade: false});
});
  $("#projmap area").click( function () {
  var pays = $(this).attr('title');
  var lien = "index3.php?name="+pays;
  alert(lien)
  $(this).attr("href",lien);
  });
</script>