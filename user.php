<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
class User {
	public $id;
	public $name;
	public $conn;

	public function __construct($db)
	{
		$this->conn = $db;
	}

	public function read()
	{
		$query='SELECT * FROM users WHERE name = :name';
		// Prepare statement
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':name',$this->name);
		$stmt->execute();

		return $stmt;

	}

	public function delete()
	{

	}
}
$db = new PDO('mysql:host=localhost;dbname=lara;','root','');
$user = new user($db);
$user->name = (isset($_GET['name']))?$_GET['name']:'jean';
$resultats = $user->read();
$res = [];
$res['data'] = [];
while($row = $resultats->fetch(PDO::FETCH_ASSOC)){
	extract($row);
	$val = array(
		'id' =>$id,
		'name'=>$name,
		'email'=>$email
		);
	array_push($res["data"], $val);
}
//var_dump($user->name);
echo json_encode($res);