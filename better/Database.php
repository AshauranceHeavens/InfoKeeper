<?php
     require_once __DIR__."/models/login.php";
     require_once __DIR__."/models/Person.php";

     class Database{
       public string $host = "127.0.0.1";
       public string $databaseName = "infokeeper";
       public string $username = "root";
       public ?string $password = "";
       public \PDO $pdo;

       public function __construct(){
         $dsn = 'mysql:host='.$this->host.'; dbname='.$this->databaseName;

         $this->pdo = new PDO($dsn, $this->username, $this->password);
         $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       }

       public function login(login $credentials){
         $sql = "SELECT * FROM names WHERE email = :email";
         $stmt = $this->pdo->prepare($sql);
         $stmt->bindValue(':email', $credentials->email);
         $stmt->execute();
         return $stmt->fetch(PDO::FETCH_ASSOC);

       }

       public function addPerson(Person $person){
         if(isset($person->imageFile)){
           $sql = "INSERT INTO people(name, second_name, surname, DOB, img) VALUES(:name, :second_name, :surname, :DOB, :img)";
         }else{

           $sql = "INSERT INTO people(name, second_name, surname, DOB) VALUES(:name, :second_name, :surname, :DOB)";

         }

         $stmt = $this->pdo->prepare($sql);

         if(isset($person->imageFile)){

           $stmt->bindValue(':img', $person->imagePath);

         }
         $stmt->bindValue(':name',$person->name);
         $stmt->bindValue(':second_name', $person->second_name);
         $stmt->bindValue(':surname', $person->surname);
         $stmt->bindValue(':DOB', $person->DOB);

         $stmt->execute();
       }

       public function getPeople($search = ''){
         if($search){

           $sql = "SELECT * FROM people WHERE name LIKE :name OR second_name LIKE :sec_name";
           $stmt = $this->pdo->prepare($sql);
           $stmt->bindValue(':name', "%$search%");
           $stmt->bindValue(':sec_name', "%$search%");

         }else{

           $sql = "SELECT * FROM people";
           $stmt = $this->pdo->prepare($sql);
         }

         $stmt->execute();
         return $stmt->fetchAll(PDO::FETCH_ASSOC);

       }

       public function viewPerson($id){
         $sql = "SELECT * FROM people WHERE id = :id";
         $stmt = $this->pdo->prepare($sql);
         $stmt->bindValue(':id', $id);
         $stmt->execute();
         return $stmt->fetch(PDO::FETCH_ASSOC);
       }

       public function updatePerson(Person $person){
         if(isset($person->imageFile)){
           $sql = "UPDATE people SET name = :name , second_name = :second_name, surname = :surname, DOB = :dob ,img = :img   WHERE id = :id";
           // $stmt->bindValue(':img', $person->imageFile);
         }else{
           $sql = "UPDATE people SET name = :name , second_name = :second_name, surname = :surname, DOB = :dob  WHERE id = :id";

         }
         $stmt = $this->pdo->prepare($sql);

         if(isset($person->imageFile)){
           $stmt->bindValue(':img', $person->imagePath);
         }

         $stmt->bindValue(':name', $person->name);
         $stmt->bindValue(':second_name', $person->second_name);
         $stmt->bindValue(':surname', $person->surname);
         $stmt->bindValue(':dob', $person->DOB);
         $stmt->bindValue(':id', $person->id);

         $stmt->execute();

       }

       public function delete($id){
         $sql = "DELETE FROM people WHERE id = :id";
         $stmt = $this->pdo->prepare($sql);
         $stmt->bindValue(':id', $id);
         $stmt->execute();
       }
     }
 ?>
