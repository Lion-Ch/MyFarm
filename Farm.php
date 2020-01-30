<?
	/*** Класс Фермы ***/
	interface Farm // Интерфейс для фермы
	{
		public function addAnimal($animal,$count = 1); //Добавление животного
		public function getAnimals(); //Получение всех животных
		public function harvesting(); //Сбор продукции
	}
	class StandartFarm implements Farm//Ферма с Коровами и Курами
	{
		protected $farmer;	//Фермер, обслуживающий ферму
		protected $animalFabrik; //Фабрика, поставляющая животных
		protected $animals = array(); //Животные на ферме
		protected $products = array(); //Продукция на складе в виде массива с PackProduct
		function __construct()
		{
			$this->farmer = new Farmer($this);	//Создаем Фермера, обслуживающего данный тип фермы
			$this->animalFabrik = new StandartAnimalFabrik(); // Создаем Фабрику, для производства новых животных
		}
		public function addAnimal($animal,$count = 1) //Добавление животных
		{
			$this->animalFabrik->setAnimal($animal); //Указываем фабрике, какое животное поставлять
			$nameAnimal = $animal->getName();	//Получаем имя животного
			$newAnimals = $this->animalFabrik->makeAnimal($count);	//Получаем с фабрики животных
			if(array_search($nameAnimal,array_keys($this->animals))===FALSE)//Если у нас нет таких животных на ферме, добавляем вложенный массив для них
				$this->animals[$nameAnimal] = array();
			$this->animals[$nameAnimal] = array_merge($this->animals[$nameAnimal],$newAnimals);//Добавляем новых животных
		}
		public function harvesting() //Сбор урожая
		{
			$harvestedProductions = $this->farmer->getCropProduct(); //Получаем от фермера всю продукцию
			$nameHarvestedProduct = array_keys($harvestedProductions); //Получаем наименования собранной продукции
			foreach ($nameHarvestedProduct as $nameProduct) //Проходимся по массиву с собранной продукцией 
			{
				if(empty($this->products[$nameProduct])) //Если на складе нет такой продукции, добавляем вложенный массив
					$this->products[$nameProduct] = $harvestedProductions[$nameProduct];
				else //Иначе, просто добавляем необходимое количество
					$this->products[$nameProduct]->addCount($harvestedProductions[$nameProduct]->getCount());
			}
		}
		public function getAnimals():array
		{
			return $this->animals;
		}
		public function toString()
		{
			echo "--------------------\n";
			echo "-Животные\n";
			foreach ($this->animals as $group) 
			{
				echo " ∟ ".$group[0]->getName().": ".count($group)."\n";
			}
			echo "--------------------\n";
			echo "-Продукция на складе\n";
			foreach ($this->products as $pack) 
			{
				$product = $pack->getProduct();
				echo " ∟ ".$product->getName().": ".$pack->getCount()." ".$product->getUnit()."\n";
			}
		}
	}

?>