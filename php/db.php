<?php
class Database{
	private $host= 'localhost';
	private $user= 'root';
	private $password= 'root';
	private $db= 'bookshop';
	private $port= 3307;
	protected $connection = null;
	
	//старт соединения
	protected function startConnection(){
		//инициализируем строку подключения
		$this->connection = new mysqli($this->host, $this->user, $this->password, $this->db, $this->port);
		//проверяем работоспособность соединения
        if($this->connection->connect_error){
            echo "Ошибка: Невозможно установить соединение с MySQL: " . $this->connection->connect_error;
		} else{
			echo "Соединение установлено!";
		}
	}

	//прерываем соединение
	protected function abortConnection(){
        if($this->connection != null){
            $this->connection->close();
            $this->connection = null;
        }
    }

	//работа с запросом
	public function getQuery($query){
		//открываем соединение
		$this->startConnection();
		$result = array();
		if($data = $this->connection->query($query)){
			//выбираем данные и помещаем в массив result
			while ($row = $data->fetch_row()) {
				$result[] = $row;
			};
			//очищаем результирующий набор
			$data->close();
		}
		//закрываем соединение
		$this->abortConnection();
		return $result;
    }
}