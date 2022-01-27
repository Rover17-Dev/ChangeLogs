<?php

declare(strict_types=1);

namespace Rover17\ChangeLogs;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\console\ConsoleCommandSender;
use pocketmine\utils\TextFormat;
use pocketmine\permission\Permission;
use pocketmine\permission\PermissionAttachment;
use pocketmine\permission\PermissionAttachmentInfo;
use pocketmine\permission\PermissionManager;

use EasyUI\element\Dropdown;
use EasyUI\element\Input;
use EasyUI\element\Label;
use EasyUI\element\Option;
use EasyUI\element\Toggle;
use EasyUI\element\Button;
use EasyUI\utils\FormResponse;
use EasyUI\variant\SimpleForm;
use EasyUI\icon\ButtonIcon;
use pocketmine\player\Player;

class Main extends PluginBase{

    function onEnable() : void{
     $this->saveResource("config.yml");
 		@mkdir($this->getDataFolder());
		$this->saveDefaultConfig();
		$this->config = $this->getConfig()->getAll();
		
		

		}
		
	
		
	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
    switch($command->getName()){
        case "changelogs":
             $form = new SimpleForm($this->config["UiTitle"], $this->config["Text"]);
             $form->addButton(new Button($this->config["CloseButton"], null, function(Player $player) {
              }));
       $sender->sendForm($form);

            return true;
        default:
            throw new \AssertionError("This line will never be executed");
    }
}
 }
