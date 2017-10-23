<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
require_once('header.php');
?>
    <data class="col-sm-6 col-sm-offset-3">
		<table class="table table-hover table-condensed table-bordered" id="region_stat">
            <thead>
                <tr>
                	<th>Наименование региона</th>
                  <th>Количество заявок</th>
                </tr>
            </thead>
            <tbody>
              <?php while ($row = $region->fetch_assoc()){?>
                <tr onclick="window.document.location='/stat_city/<?=$row['region_id']?>';">
              		<td><?=$row['region_name']?></td> 
                  <td><?=$this->num_comment_region($row['region_id'])?></td>
                </tr>
              <?php }?>
            </tbody>
        </table>
    </data>
<?php
require_once('footer.php');
?>
