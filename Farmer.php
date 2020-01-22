<?
	/*** Класс Фермера.  ***/
	/* Осуществляет сбор продуктов с животных */
	abstract class Farmer
	{
		protected $farm; //Ферма к которой привязан Фермер
		function __construct($farm)
		{
			$this->farm = $farm;
		}
		/*Возвращает количество урожая, которое дает один тип животных на ферме */
		public function getCropProduct($animals):PackProduct 
		{
			$count = 0;
			$productAnimal = $animals[0]->getProduct();
			foreach ($animals as $animal) 
			{
				$packProduct = $animal->getCrop();
				$count += $packProduct->getCount();
			}
			// Возвращаем упаковку продукта, 
			//которую собрали с указанных животных
			return new PackProduct($productAnimal,$count); 
		}
	}
	class StandartFarmer extends Farmer // Фермер для работы на ферме с коровами и курами
	{
		function __construct($farm)
		{
			parent::__construct($farm);
		}
		public function harvestMilk():PackProduct //Доим всех коров и возвращаем упаковку с Молоком
		{
			return $this->getCropProduct($this->farm->getCows());
		}
		public function harvestEgg():PackProduct //Собираем яйца у кур и возвращаем упаковку с Яйцами
		{
			return $this->getCropProduct($this->farm->getChickens());
		}
	}
?>