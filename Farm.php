<?
	/*** Класс Фермы ***/
	interface CowFarm // Интерфейс для фермы с Коровами
	{
		public function addCow($count = null); //Добавить новую Корову
		public function getCows(); //Получить стадо Коров
	}
	interface ChickenFarm	//Анологично для Кур
	{
		public function addChicken($count = null);
		public function getChickens();
	}
	class StandartFarm implements CowFarm,ChickenFarm //Ферма с Коровами и Курами
	{
		/* Переменные, относящиеся к курам, коровам (Их общее количество, Массив с их объектами)
		* Мог вынести в отдельные классы (например, Курятник, Стадо и т.д) для удобства в последующем использовании,
		* Но времени не было, поэтому оставил так */
		protected $farmer;	//Фермер, обслуживающий ферму
		protected $countCow;	//Количество Коров
		protected $countChicken;	//Количество Кур 
		protected $cowFabrik;		//Фабрика для поставки новых Коров
		protected $chickenFabrik;	//Фабрика для поставки новых Кур
		protected $cows;	//Массив с Коровами (Коровник)
		protected $chickens;	//Массив с Курами (Курятник)
		protected $milkPack;	//Все запасы Молока на Ферме. Помещаем их в одну упаковку
		protected $eggPack;		//Все запасы Яиц на Ферме.
		function __construct($countCow,$countChicken)
		{
			$this->countCow = $countCow;	//Указываем начальное количество Коров
			$this->countChicken = $countChicken;	//Указываем начальное количество Кур
			$this->milkPack = new MilkPack(0);	//Упаковка с Молоком на складе пуста
			$this->eggPack = new EggPack(0);	//Упаковка с Яйцами на складе пуста
			$this->cowFabrik = new CowFabrik();	
			$this->chickenFabrik = new ChickenFabrik();
			$this->farmer = new StandartFarmer($this);	//Создаем Фермера, обслуживающего данный тип фермы
			$this->cows = $this->cowFabrik->makeAnimal($countCow);	//Поставляем Коров с Фабрики
			$this->chickens = $this->chickenFabrik->makeAnimal($countChicken);	//Поставляем Кур с Фабрики
		}
		public function addChicken($count = null) //Добавление дополнительных Кур
		{
			if(is_null($count))//Не передав количество, создаем 1 Курицу
			{
				$this->chickens[] = $this->chickenFabrik->makeAnimal(); //Добавляем Курицу в курятник(массив)
				$this->countChicken++;	//Увеличиваем количество Кур на 1
			}
			else
			{
				//Добавляем несколько Кур в курятник
				$this->chickens = array_merge($this->chickens,$this->chickenFabrik->makeAnimal($count));
				//Увеличиваем количество Кур на Ферме
				$this->countChicken += $count;
			}
		}
		public function addCow($count = null)// Аналогично
		{
			if(is_null($count))
			{
				$this->cows[] = $this->cowFabrik->makeAnimal();
				$this->countCow++;
			}
			else
			{
				$this->cows = array_merge($this->cows,$this->cowFabrik->makeAnimal($count));
				$this->countCow += $count;
			}
		}
		public function harvesting() // Функция сбора урожая
		{
			$this->milkPack->setCount(	//Задаем кол-во Молока на складе
				$this->milkPack->getCount() + //Поулчаем текущее кол-во Молока на складе 
				$this->farmer->harvestMilk()->getCount()); //Прибавляем собранное Молоко Фермером
			//Аналогично
			$this->eggPack->setCount(
				$this->eggPack->getCount() + 
				$this->farmer->harvestEgg()->getCount());
		}
		public function getCows():array //Передача стада (Фермеру)
		{
			return $this->cows;
		}
		public function getChickens():array //Передача курятника (Фермеру)
		{
			return $this->chickens;
		}
		public function toString()
		{
			echo "------------------------------------------------------\n";
			echo "-Животные\n\n";
			echo "Коров: ".$this->countCow."\n";
			echo "Кур: ".$this->countChicken."\n\n";
			echo "-Продукция на складе\n";
			$this->milkPack->toString();
			$this->eggPack->toString();
		}
	}

?>