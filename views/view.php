<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
require_once('header.php');
?>
    <data class="col-sm-12">
		<table class="table table-hover table-condensed table-bordered">
            <thead>
                <tr>
                	<th>Id</th>
                	<th>ФИО</th>
                  <th>Email</th>
                  <th>Телефон</th>
                  <th>Регион</th>
                  <th>Город</th>
                  <th>Комментарий</th>
                  <th>Действия</th>
                </tr>
            </thead>
            <tbody>
              <?php while ($row = $comments->fetch_assoc()){?>
                <tr>
              		<td><?=$row['comment_id']?></td>
              		<td><?=$row['second_name'].' '.$row['first_name'].' '.$row['third_name']?></td>
                  <td><?=$row['email']?></td>
                  <td><?=$row['phone']?></td> 
                  <td><?=$row['region_name']?></td> 
                  <td><?=$row['city_name']?></td> 
                  <td><?=$row['comment']?></td>
                  <td><a href="/del/<?=$row['comment_id']?>" class="btn btn-danger btn-sm">Удалить</a></td>  
                </tr>
              <?php }?>
            </tbody>
        </table>
		<?=$this->pagination($num_page)?>
    </data>
<?php
require_once('footer.php');
?>
