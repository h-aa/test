<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
require_once('header.php');
?>
    <data class="col-sm-6 col-sm-offset-3">
		<table class="table table-hover table-condensed table-bordered">
            <thead>
                <tr>
                	<th>Наименование города</th>
                  <th>Количество заявок</th>
                </tr>
            </thead>
            <tbody>
              <?php while ($row = $city->fetch_assoc()){?>
                <tr>
              		<td><?=$row['city_name']?></td> 
                  <td><?=$this->num_comment_city($row['city'])?></td>
                </tr>
              <?php }?>
            </tbody>
        </table>
    </data>
<?php
require_once('footer.php');
?>
