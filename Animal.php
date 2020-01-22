<?
	/*** Классы Животного ***/
	interface Production // Вспомогательный интерфейс для животных. 
	{
		public function getCrop(); // Описывает количество полученного продукта
		public function getProduct();	//Описывает продукт производства
	}
	abstract class Animal implements Production //Базовый класс животного
	{
		private static $lastUniqueNumber=0; //Счетчик животных. Используем как уникальный ключ.
		protected $name;	//Название животного
		protected $regNumber;	//Регистрационный номер
		protected $product;	//Продукт, производимый животным
		protected $lowerLimitProduct;	//Минимальное кол-во продукта, произведенное животным
		protected $upperLimitProduct;	//Максимальное кол-во продукта, произведенное животным
		public function __construct($name,$product,$lowerLimitProduct,$upperLimitProduct) 
		{
			$this->name = $name;
			$this->product = $product;
			$this->regNumber = ++self::$lastUniqueNumber;
			$this->lowerLimitProduct = $lowerLimitProduct;
			$this->upperLimitProduct = $upperLimitProduct;
		}
		/*  Животное выдает продукт в виде упаковки (Молоко, 10)
		*	с каким-либо его количеством. 
		*	Количество генерируется рандомно в заданном диапозоне. 
		*/
		public function getCrop():PackProduct 
		{
			return new PackProduct($this->product,rand($this->lowerLimitProduct,$this->upperLimitProduct));
		}
		public function getProduct()
		{
			return $this->product;
		}
		public function toString()
		{
			echo "\nЖивотное: ".$this->name;
			echo "\nНомер: ".$this->regNumber;
			echo "\nПродукт: ".$this->product->getName();
			echo "\n";
		}
	}
	class Cow extends Animal // Класс Корова
	{
		public function __construct($product) 
		{
			parent::__construct("Корова",//Название животного
				$product,
				8,	//Мин. количество производимого продукта
				12); //Макс. количество производимого продукта
		}
	}
	class Chicken extends Animal // Аналогично
	{
		public function __construct($product) 
		{
			parent::__construct("Курица",
				$product,
				0,
				1);
		}
	}
?>