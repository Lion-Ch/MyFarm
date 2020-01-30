<?
	/*** Класс Фермера.  ***/
	/* Осуществляет сбор продуктов с животных */
     class Farmer
	{
		protected $farm; //Ферма к которой привязан Фермер
		function __construct($farm)
		{
			$this->farm = $farm;
		}
		/*Возвращает количество урожая, которое дает один тип животных на ферме */
		public function getCropProduct():array 
		{
			$products = array();	//Массив с собранной продукцией
			$groupAnimal = $this->farm->getAnimals();	//Получаем массив Животных с Фермы
			foreach ($groupAnimal as $group) //Проходимся по типам животных
			{
				foreach ($group as $animal) 
				{
					$packProductAnimal = $animal->getCrop(); //Получаем продукцию с животного
					$product = $packProductAnimal->getProduct();	//Получаем продукт
					$nameProduct = $packProductAnimal->getProduct()->getName(); //Его наименование
					$countProduct = $packProductAnimal->getCount();	//Его количество
					
					if(array_search($nameProduct, array_keys($products))===FALSE)//Если в собранной продукции нет такого продукта, то создаем упаковку
						$products[$nameProduct] = new PackProduct($product,$countProduct);
					else //Если есть, просто добавляем необходимое количество
						$products[$nameProduct]->addCount($countProduct);
				}
			}
			return $products; 
		}
	}
?>