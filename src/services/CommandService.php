<?php
namespace App\services;

use App\repository\CommandRepository;
use App\repository\CommanditemsRepository;

class CommandService{
    private CommandRepository $commandRepo;
    private CommanditemsRepository $itemsRepo;
    
    public function __construct()
    {
        $this->commandRepo = new CommandRepository();
        $this->itemsRepo = new CommanditemsRepository();
    }
     public function saveCommand(){
        if(!isset($_SESSION['panie'])){
            return "panie vide";
        }
        $id = $_SESSION['user']['id'];
        $items = $_SESSION['panie'];
        $total = array_reduce($items,fn($sum, $item) => $sum + $item->getPrice() ,0 );
        $commandID = $this->commandRepo->creatCommmand($id,$total);
        $this->itemsRepo->creatItem($items,$commandID);
        return "seccess";
     }
}