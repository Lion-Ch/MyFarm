<?
	require_once "Product.php";
	require_once "PackProduct.php";
	require_once "Animal.php";
	require_once "Fabrik.php";
	require_once "Farmer.php";
	require_once "Farm.php";

	$myFarm = new StandartFarm();	//Создаем ферму
	$myFarm->addAnimal(new Cow(),10);	//Добавляем 10 коров
	$myFarm->addAnimal(new Chicken(),20);	//Добовляем 20 кур
	$myFarm->harvesting();	//Собираем урожай
	$myFarm->toString();	//Выводим информацию о ферме

	$myFarm->addAnimal(new Pig(),3); //Добавим 3 экземпляра нового животного Свинья
	$myFarm->harvesting();	//Соберем урожай
	$myFarm->toString();	//Выведем 
	
?>