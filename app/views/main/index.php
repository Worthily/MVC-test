<p>Главная страница</p>

<?php  
    foreach($news as $val) {  
?>
    <br>
    <p><?php echo $val['title'] ?></p>
    <p><?php echo $val['descr'] ?></p>
    <br>
<?php  
    }
?>

<p>Имя: </p>
<p>Возраст: </p>