<?php header('Content-Type: text/html; charset=utf-8');
include('pdo.php');
include('item.php');
include('loadmore.php');?>

<div id="container">
    <?foreach ($items as $item): ?>
		<div class="single-item" data-id="<?= $item->id ?>">
			<?= $item->show() ?>
		</div>
   <?php endforeach;?>
</div>
<button id="getmore">Загрузить ещё...</button>
<div id="message"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/script.js"></script>