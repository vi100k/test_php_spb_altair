<?php
require_once('pdo.php');
require_once('item.php');
if(isset($_GET['num'])){
   $offset = $_GET['num'];
   } else {
   $offset = 0;
   }
function get($offset, $limit = 10, $pdo){
         $statement = $pdo->prepare('SELECT * FROM credit LIMIT ?, ?');
         $statement->bindValue(1, $offset, PDO::PARAM_INT);
         $statement->bindValue(2, $limit, PDO::PARAM_INT);
         $statement->execute();
         $data = $statement->fetchAll();
         return $data;
}
$data = get($offset, 10, $pdo);
$items = [];
foreach ($data as $item)
{
	$items[] = new Item($item['id'], $item['tel']);
}
if(isset($_GET['num'])){
    foreach ($items as $item): ?>
		<div class="single-item" data-id="<?= $item->id ?>">
			<?= $item->show() ?>
		</div>
   <?php endforeach;
}
?>
