<?php

namespace pets\command;

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pets\main;
use pocketmine\utils\TextFormat as TF;

class PetCommand extends PluginCommand {

	public function __construct(main $main, $name) {
		parent::__construct(
				$name, $main
		);
		$this->main = $main;
		$this->setPermission("pets.command");
		$this->setAliases(array("pet"));
	}

	public function execute(CommandSender $sender, $currentAlias, array $args) {
	
		if (!isset($args[0])) {
			$this->main->togglePet($sender);
			return true;
		}
		switch (strtolower($args[0])){
			case "name":
				if (isset($args[1])){
					unset($args[0]);
					$name = implode(" ", $args);
					$this->main->getPet($sender->getName())->setNameTag($name);
					$sender->sendMessage("Set Name to ".$name);
				}
				return true;
			break;
			
			case "list":
				if($sender->hasPermission('pets.command.list')){
				$sender->sendMessage(TF::YELLOW."====== Pets List ======");
				$sender->sendMessage(TF::YELLOW. TF::BOLD."dog / wolf");
				$sender->sendMessage(TF::YELLOW. TF::BOLD."blaze");
				$sender->sendMessage(TF::YELLOW. TF::BOLD."pig");
				$sender->sendMessage(TF::YELLOW. TF::BOLD."chicken");
				$sender->sendMessage(TF::YELLOW. TF::BOLD."rabbit");
				$sender->sendMessage(TF::YELLOW. TF::BOLD."magma");
				$sender->sendMessage(TF::YELLOW. TF::BOLD."bat");
				$sender->sendMessage(TF::YELLOW. TF::BOLD."silverfish");
				$sender->sendMessage(TF::YELLOW. TF::BOLD."cat / ocelot");
				return true;
				}
				else{
				$sender->sendMessage(TF::DARK_RED."You do not have permission to use this command");
				 }
				return true;
			break;
			
			case "help":
				if($sender->hasPermission('pet.command.help')){
				$sender->sendMessage(TF::YELLOW."====== Pet Help ======");
				$sender->sendMessage(TF::AQUA."/pets to enable or disable your pet");
				$sender->sendMessage(TF::AQUA."/pets type [type] to change your pet");
				$sender->sendMessage(TF::AQUA."/pets name [new name] to change pet's name");
				$sender->sendMessage(TF::AQUA."/pets list : to show list pets");
				return true;
				}else{$sender->sendMessage(TextFormat::DARK_RED."You do not have permission to use this command");
					    }
				return true;
			break;
			
			case "type":
				if (isset($args[1])){
					switch ($args[1]){
						case "dog":
							if ($sender->hasPermission("pets.type.dog")){
								$this->main->changePet($sender, "WolfPet");
								$sender->sendMessage(TF::GREEN."Your pet has changed to a Wolf!");
								return true;
							}else{
								$sender->sendMessage(TF::DARK_RED."You do not have permission for a dog pet!");
								return true;
							}
						break;
						
						case "chicken":
							if ($sender->hasPermission("pets.type.chicken")){
								$this->main->changePet($sender, "ChickenPet");
								$sender->sendMessage(TF::GREEN."Your pet has changed to a Chicken!");
								return true;
							}else{
								$sender->sendMessage(TF::DARK_RED."You do not have permission for a chicken pet!");
								return true;
							}
						break;
						
						case "blaze":
							if ($sender->hasPermission("pets.type.blaze")){
								$this->main->changePet($sender, "BlazePet");
								$sender->sendMessage(TF::GREEN."Your pet has changed to a Blaze!");
								return true;
							}else{
								$sender->sendMessage(TF::DARK_RED."You do not have permission for a blaze pet!");
								return true;
							}
						break;
						case "magma":
							if ($sender->hasPermission("pets.type.magma")){
								$this->main->changePet($sender, "MagmaPet");
								$sender->sendMessage(TF::GREEN."Your pet has changed to a Magma!");
								return true;
							}else{
								$sender->sendMessage(TF::DARK_RED."You do not have permission for a blaze pet!");
								return true;
							}
						break;
						
						case "rabbit":
							if ($sender->hasPermission("pets.type.rabbit")){
								$this->main->changePet($sender, "RabbitPet");
								$sender->sendMessage(TF::GREEN."Your pet has changed to a Rabbit!");
								return true;
							}else{
								$sender->sendMessage(TF::DARK_RED."You do not have permission for a rabbit pet!");
								return true;
							}
						break;
						
						case "bat":
							if ($sender->hasPermission("pets.type.bat")){
								$this->main->changePet($sender, "BatPet");
								$sender->sendMessage(TF::GREEN."Your pet has changed to a Bat!");
								return true;
							}else{
								$sender->sendMessage(TF::DARK_RED."You do not have permission for a bat pet!");
								return true;
							}
						break;
						
						case "Pig":
							if ($sender->hasPermission("pets.type.pig")){
								$this->main->changePet($sender, "PigPet");
								$sender->sendMessage(TF::GREEN."Your pet has changed to a Pig!");
								return true;
							}else{
								$sender->sendMessage(TF::DARK_RED."You do not have permission for SiverFish pet!");
								return true;
							}
						break;
						
						case "Silverfish":
							if ($sender->hasPermission("pets.type.silerfish")){
								$this->main->changePet($sender, "SilverfishPet");
								$sender->sendMessage(TF::GREEN."Your pet has changed to a SiverFish!");
								return true;
							}else{
								$sender->sendMessage(TF::DARK_RED."You do not have permission for a SiverFish pet!");
								return true;
							}
						break;
					}
					
				}
				else{
					$sender->sendMessage(TF::YELLOW."/pet type [type]");
					$sender->sendMessage(TF::AQUA."Types: blaze, pig, chicken, dog, rabbit, magma, bat, & silerfish");
					return true;
					}
				return true;
			break;
		}
		
		return true;
	}

}
