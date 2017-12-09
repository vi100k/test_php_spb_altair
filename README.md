# test_php_spb_altair

Тестовое задание

Условия: файл index.php выводит список некоторых сущностей из базы данных. Задача: динамически добавлять к списку новые сущности по нажатию кнопки «загрузить ещё». 

Ниже приведены листинги файлов, вам нужно дополнить либо изменить их для решения поставленной задачи. 

 

Index.php (точка входа): 

<?php 

include('pdo.php'); 

include('item.php'); 

include('loadMore.php'); 

?> 

<div id="container"> 

<?php foreach ($items as $item): ?> 

<div class="single-item" data-id="<?= $item->id ?>"> 

<?= $item->show() ?> 

</div> 

<?php endforeach; ?> 

</div> 

<button id="loadMore">Загрузить ещё...</button> 

 

<script src="/jquery-1.11.3.min.js"></script> 

<script src="/script.js"></script> 

 


Loadmore.php: 

<?php 

 

$offset = 0; 

$limit = 10; 

 

$statement = $pdo->prepare('SELECT * FROM credit LIMIT ?, ?'); 

$statement->bindValue(1, $offset, PDO::PARAM_INT); 

$statement->bindValue(2, $limit, PDO::PARAM_INT); 

$statement->execute(); 

$data = $statement->fetchAll(); 

 

$items = []; 

foreach ($data as $item)  

{ 

$items[] = new Item($item['id'], $item['tel']); 

} 

 
 

Item.php: 

<?php 

 

class Item 

{ 

public $id; 

public $text; 

 

function __construct($id = null, $text = null) 

{ 

$this->id = $id; 

$this->text = $text; 

} 

 

public function show() 

{ 

return $this->text; 

} 

} 

 



Pdo.php: 

<?php 

    $host = '127.0.0.1'; 

    $db   = 'test'; 

    $user = 'root'; 

    $pass = ''; 

    $charset = 'utf8'; 

 

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset"; 

    $opt = [ 

        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 

        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 

        PDO::ATTR_EMULATE_PREPARES   => false, 

    ]; 

    $pdo = new PDO($dsn, $user, $pass, $opt); 

 

  

Script.js: 

function getMoreItems() { 

var url = "/loadMore.php"; 

var data = { 

// 

}; 

 

$.ajax({ 

url: url, 

data: data, 

type: 'get', 

success: function (res) { 

// 

}, 

error: function (XMLHttpRequest, textStatus, errorThrown) { 

// 

} 

}); 

} 

 

 
