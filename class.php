<?php


// Traccia 1:
// - Utilizza i principi di OOP ed Ereditarietà per creare una struttura a classi come la seguente:
//     +-|Continent
//     +-----------|Country
//     +--------------------|Region
//     +---------------------------|Province
//     +------------------------------------|City
//     +------------------------------------------|Street


// - Ogni classe avrà un attributo public del tipo:
//     $nameContinent: 
//     $nameCountry;
//     $nameRegion;
//     $nameProvince; 
//     $nameCity;
//     $nameStreet;


// - La prima classe genitore avrà la seguente struttura:
//     class Continent
//     {
//       public $nameContinent;
    
//       public function __construct($continent){
//         $this->nameContinent = $continent; 
//       }
//     }


// - Istanzia un nuovo oggetto $myLocation, per poi richiamare un metodo che stampi a schermo la seguente frase: “Mi trovo in Europa, Italia, Puglia, Ba, Bari, Strada San Giorgio Martire 2D“.

// Svolgimento:

class Continent
{
  public $nameContinent;

  public function __construct($continent){
    $this->nameContinent = $continent; 
  }
}

class Country extends Continent{
    public $nameCountry;
    public function __construct($continent, $country){
        parent::__construct($continent);
        $this->nameCountry=$country;
    }
}

class Region extends Country{
    public $nameRegion;
    public function __construct($continent, $country, $region){
        parent::__construct($continent, $country);
        $this->nameRegion=$region;
    }
}

class Province extends Region{
    public $nameProvince;
    public function __construct($continent, $country, $region, $province){
        parent::__construct($continent, $country, $region);
        $this->nameProvince=$province;
    }
}

class City extends Province{
    public $nameCity;
    public function __construct($continent, $country, $region, $province, $city){
        parent::__construct($continent, $country, $region, $province);
        $this->nameCity=$city;
    }
}

class Street extends City{
    public $nameStreet;
    public function __construct($continent, $country, $region, $province, $city, $street){
        parent::__construct($continent, $country, $region, $province, $city);
        $this->nameStreet=$street;
    }
}

$myLocation= function($place){
    echo "Mi trovo in $place->nameContinent, $place->nameCountry, $place->nameRegion, $place->nameProvince, $place->nameCity, $place->nameStreet \n";

};

$europe = new Continent("Europa");
var_dump ($europe->nameContinent . "\n");
$italy = new Country("Europa", "Italia");
var_dump ($italy->nameCountry . "\n");
$pidmont = new Region("Europa", "Italia", "Piemonte");
var_dump ($pidmont->nameRegion . "\n");
$cuneo = new Province("Europa", "Italia", "Piemonte", "Cuneo");
var_dump ($cuneo->nameProvince . "\n");
$fossano = new City("Europa", "Italia", "Piemonte", "Cuneo", "Fossano");
var_dump ($fossano->nameCity . "\n");
$viaRoma = new Street("Europa", "Italia", "Piemonte", "Cuneo", "Fossano", "via Roma");
var_dump ($viaRoma->nameStreet . "\n");

$myLocation($viaRoma);


// - crea una struttura a classi sfruttando l’ereditarietà e seguendo queste semplici regole:
//     - le classi non devono avere attributi;
//     - ogni classe avrà un metodo specifico protected per stampare la sua specializzazione; 
//     - non puoi realizzare metodi definiti public per stampare il risultato;
//     - l’unico metodo public ammesso è il costruttore.
    

// ATTENZIONE: utilizzate bene il costruttore per invocare i metodi.


// - Il risultato atteso sarà:
//     $magikarp = new Fish();
//     //Nel terminale visualizzerete:
//     Sono un animale Vertebrato
//     Sono un animale a Sangue Freddo
//     Sono un pesce



class Vertebrates {
    
    public function __construct(){
        echo $this->stampa();
    }

    protected function stampa(){
        return "sono un animale vertebrato \n";
    }

}

class WarmBlood extends Vertebrates {
    
    

    protected function stampa(){
        return "sono un animale vertebrato \n Sono un animale a Sangue Caldo \n";
    }

}

class Mammals extends WarmBlood {
    
    

    protected function stampa(){
        return "sono un animale vertebrato \nSono un animale a Sangue Caldo \nSono un mammifero \n";
    }

}
class Bird extends WarmBlood {
    
    

    protected function stampa(){
        return "sono un animale vertebrato \nSono un animale a Sangue Caldo \nSono un uccello \n";
    }

}
class ColdBlood extends Vertebrates {
    
    

    protected function stampa(){
        return "sono un animale vertebrato \n Sono un animale a Sangue Freddo \n";
    }

}

class Fish extends ColdBlood {
    
    

    protected function stampa(){
        return "sono un animale vertebrato \nSono un animale a Sangue Freddo \nSono un pesce \n";
    }

}

class Reptiles extends ColdBlood {
    
    

    protected function stampa(){
        return "sono un animale vertebrato \nSono un animale a Sangue Freddo \nSono un rettile \n";
    }

}

class Anphibans extends ColdBlood {
    
    

    protected function stampa(){
        return "sono un animale vertebrato \nSono un animale a Sangue Freddo \nSono un anfibio \n";
    }

}

$carp= new Fish();



class Car {
private $num_telaio;
public function __construct($telaio){
    $this->num_telaio=$telaio;
}
public function ritorno(){
    return $this->num_telaio;
}

}
  
class Fiat extends Car {

    protected $license;
    protected $color;

    public function __construct($telaio, $license, $color){
        parent::__construct($telaio);
        $this->license=$license;
        $this->color=$color;
    }
    public function id(){
        echo "La mia macchina è $this->license, con targa $this->color e numero di Telaio " . $this->ritorno();
    }
    
}


$car= new Fiat(1111, "ok", "red");
$car->id();












