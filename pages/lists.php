<?php 
include_once('classes.php');
Tools::SetParam('localhost','root','123456','shop');

$cat=$_GET['cat'];
$pdo=Tools::connect();
$ps=$pdo->prepare('select * from subcategories where catid=?');
$ps->execute(array($cat));
echo "<label for='subcat'>Выберите подкатегорию</label><br>";
echo "<select name='subid' id='subid' onchange='getsubid(this.value)'>";
while ($row=$ps->fetch()) {
	echo "<option value='".$row['id']."'>".$row['sucategory']."</option>";
}
echo "</select>";