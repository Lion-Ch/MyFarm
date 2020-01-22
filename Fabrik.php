<?
	/*** Фабрики для создания животных ***/
	interface AnimalFabrik //Интерфейс фабрики
	{
		public function makeAnimal($count = null);
	}
	class ChickenFabrik implements AnimalFabrik // Фабрика куриц
	{
		public function makeAnimal($count = null)
		{
			if(is_null($count)) //Если ничего не передали в функцию возвращаем 1 Курицу
			{
				return new Chicken(new Egg());
			}
			else //При передаче числа в функцию, возвращаем массив с указанным количеством Куриц
			{
				$animals = array();
				for($i = 0; $i < $count;$i++)
					$animals[] = new Chicken(new Egg());
				return $animals;
			}
		}
	}
	class CowFabrik implements AnimalFabrik // Аналогично
	{
		public function makeAnimal($count = null)
		{
			if(is_null($count))
			{
				return new Cow(new Milk());
			}
			else
			{
				$animals = array();
				for($i = 0; $i < $count;$i++)
					$animals[] = new Cow(new Milk());
				return $animals;
			}
		}
	}
?>