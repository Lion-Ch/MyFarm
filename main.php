<?
	require_once "Product.php";
	require_once "PackProduct.php";
	require_once "Animal.php";
	require_once "Fabrik.php";
	require_once "Farmer.php";
	require_once "Farm.php";
	
	$farm = new StandartFarm(10,20); // Создаем ферму с 10 Коровами и 20 Курами
	$farm->harvesting(); //Собираем Яйца и Молоко 1-й раз
	$farm->toString();	 //Выводим информацию о Ферме

	$farm->addChicken(); //Добавляем 1 Курицу
	$farm->addCow();	 //Добавляем 1 Корову
	$farm->harvesting(); //Собираем продукты 2-й раз
	$farm->toString();

	$farm->addChicken(9);//Добавляем 9 Кур
	$farm->addCow(4);	 //Добавляем 4 Коровы
	$farm->toString();   //Выводим информацию, но не собираем продукты

	$farm->harvesting(); //Собираем продукты
	$farm->toString();	 //И выводим
?>