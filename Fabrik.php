<?
	/*** Фабрики для создания животных ***/
	interface AnimalFabrik //Интерфейс фабрики
	{
		public function setAnimal($animal);
		public function makeAnimal($count);
	}
	class StandartAnimalFabrik implements AnimalFabrik
	{
		protected $animal; //Животное, которое создает фабрика
		function __construct($animal = null)
		{
			$this->animal = $animal;
		}
		public function setAnimal($animal)
		{
			$this->animal = $animal;
		}
		public function makeAnimal($count)
		{
			$animals = array();
			for($i = 0; $i < $count;$i++)
			{
				$animals[] = clone $this->animal;
			}
			return $animals;
		}
	}
?>