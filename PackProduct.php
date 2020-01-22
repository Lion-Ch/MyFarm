<?
	/*** Класс Упаковка с продуктами ***/
    class PackProduct // Упаковка с продуктом, содержит в себе количество и тип продукта
	{
		protected $product;	//Тип продукта Молоко/Яйцо
		protected $count;	//Количество продукта
		function __construct($product,$count)
		{
			$this->product = $product;
			$this->count = $count;
		}
		// Свойства класса
		public function getProduct():Product
		{
			return $this->product;
		}
		public function getCount():int
		{
			return $this->count;
		}
		public function setCount($count)
		{
			$this->count = $count;
		}
		public function toString()	//Вывод информации о упаковке (Продукт, количество)
		{
			echo "\nПродукт: ".$this->product->getName();
			echo "\nКоличество: ".$this->count." ".$this->product->getUnit();
			echo "\n";
		}
	}
	class MilkPack extends PackProduct //Упаковка с молоком
	{
		function __construct($count)
		{
			parent::__construct(new Milk(),$count);
		}
	}
	class EggPack extends PackProduct //Упаковка с яйцами
	{
		function __construct($count)
		{
			parent::__construct(new Egg(),$count);
		}
	}
?>