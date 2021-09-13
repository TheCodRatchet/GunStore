<?php

require "Guns.php";

class Store
{
    private array $gunList = [];

    public function newGuns(Guns $guns): void
    {
        $this->gunList[] = $guns;
    }

    public function getGunList(): array
    {
        return $this->gunList;
    }

    public function listGuns()
    {
        foreach ($this->gunList as $id => $gun) {
            echo "[$id] - {$gun->getName()}, requires {$gun->getLicense()} license. ";
            echo "Bullet travel distance: " . $gun->calculateRecoil() . "m." . PHP_EOL;
        }
    }
}

$gunShop = new Store();

$gunShop->newGuns(new Rifles("AK-47", 36));
$gunShop->newGuns(new Rifles("M4A4", 33, "RF-Tactical"));
$gunShop->newGuns(new Pistols("Glock 18", 28));
$gunShop->newGuns(new Pistols("Usp-s", 35, "P-Tactical"));
$gunShop->newGuns(new Shotguns("Nova", 68));
$gunShop->newGuns(new Shotguns("Mag-7", 71, "SH-Tactical"));
$gunShop->newGuns(new SubMachines("P90", 26, "Vodka-rushB"));
$gunShop->newGuns(new SubMachines("Mac-10", 29));
$gunShop->newGuns(new Snipers("AWP", 115));
$gunShop->newGuns(new Snipers("SSG 08", 88, "Scout-Wingman"));

$licenses = explode(",", readline("Input Your licenses: "));
$gunShop->listGuns();
$shopping = true;

while ($shopping) {
    $input = (int) readline("Choose gun to buy [id]: ");
    if (!isset($gunShop->getGunList()[$input])) {
        echo "Invalid selection" . PHP_EOL;
        continue;
    }

    if (!in_array($gunShop->getGunList()[$input]->getLicense(), $licenses)) {
        echo "You don't have required license for this gun." . PHP_EOL;
        continue;
    }

    echo "You have bought Yourself an " . $gunShop->getGunList()[$input]->getName() . PHP_EOL;


    $continueShopping = strtolower(readline("Do you want to continue shopping? [y,n]"));
    while ($continueShopping !== "y" && $continueShopping !== "n") {
        echo "Invalid input!!!" . PHP_EOL;
        $continueShopping = strtolower(readline("Do you want to continue shopping? [y,n]"));
    }

    if ($continueShopping == "n") {
        $shopping = false;
    }
}