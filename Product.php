<?
	/*** Класс Продукт производимый животным ***/
	abstract class Product // Класс продукта, который производит животное
	{
		protected $name;	//Наименование продукта
		protected $unit;	//Единицы в которых измеряется продукт
		public function __construct($name,$unit)
		{
			$this->name = $name;
			$this->unit = $unit;
		}
		public function getName():string //Получение наименования
		{
			return $this->name;
		}
		public function getUnit():string //Получение единицы измерения
		{
			return $this->unit;
		}
	}
	class Milk extends Product    //Продукт Молоко для Коровы
	{
		public function __construct() 
		{
			parent::__construct("Молоко","л");	//Имя продукта
		}
	}
	class Egg extends Product     //Продукт Яйцо для Курицы
	{
		public function __construct() 
		{
			parent::__construct("Яйцо","шт."); //Имя продукта
		}
	}
	class Meat extends Product // Продукт Мясо для Свиньи
	{
		function __construct()
		{
			parent::__construct("Мясо","кг."); //Имя продукта
		}
	}
?>