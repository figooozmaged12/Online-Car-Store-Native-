<?php

abstract class Champion{
    //Class Attributes
    public $name;
    public $role;
    public $gender;
    public $type;
  

    // Class Methods

    final public function getChampGender(){ // final method cannot be override subclasses
        echo "Champ gender is $this->gender";

    }
    public function setChampProperties($name,$role,$gender,$type){
        $this->name = $name;
        $this->role = $role;
        $this->gender = $gender;
        $this->type = $type;
    }

    public function getChampInfo(){
        echo "Champion Name is $this->name"."<br>";
        echo "Champion Role is $this->role"."<br>";
        echo "Champion Gender is $this->gender"."<br>";
        echo "Chhampion Type is $this->type";
    }

    public function getChampDescription(){
        echo "your champions description is .....";
    }
}

class Fighter extends Champion{  //inheritance
    //Class Attributes
    public $type2;

    //Class Methods
    public function setFighterProperties($name, $role, $gender, $type){
        $this->name = $name;
        $this->role = $role;
        $this->gender = $gender;
        $this->type = $type;
        
    }
    public function getChampInfo(){
        echo "Champion Name is $this->name"."<br>";
        echo "Champion Role is $this->role"."<br>";
        echo "Champion Gender is $this->gender"."<br>";
        echo "Champion Type is $this->type"."<br>";
       
    }
    public function getChampDescription(){ //Method Override
        echo "your mage description is .....";
    } 

    // public function getinfo($name){
    //     echo "name is $this->name";

    // }
    // public function getinfo($name,$role){
    //     echo "name is $this->name";
    //     echo "role is $this->role";

    // }
}

class Mage extends Champion{  //inheritance
    //Class Attributes
    public $type2;

    //Class Methods
    public function setMageProperties($name, $role, $gender, $type,$type2){
        $this->name = $name;
        $this->role = $role;
        $this->gender = $gender;
        $this->type = $type;
        $this->type2= $type2;
    }
    public function getChampInfo(){
        echo "Champion Name is $this->name"."<br>";
        echo "Champion Role is $this->role"."<br>";
        echo "Champion Gender is $this->gender"."<br>";
        echo "Champion Type is $this->type"."<br>";
        echo "Champions Type2 is $this->type2";
    }
    public function getChampDescription(){ //Method Override
        echo "your mage description is .....";
    } 
}
final class updates{ // Class cannot be extended (for ex: frequent update of class )

}


$Darius = new Fighter();
$Darius->setFighterProperties("darius","top","male","Fighter");
$Darius->getChampInfo();
echo "<br>";
$Darius->getChampDescription();
echo "<br><br>";


$Morgana = new Mage();
$Morgana->setMageProperties("Morgana","support","female","Mage","enchanter");
$Morgana->getChampInfo();
echo "<br>";
$Morgana->getChampDescription();
echo"<br>";




