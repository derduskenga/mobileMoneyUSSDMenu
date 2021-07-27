<?php  
    include_once 'menu.php';  
    
    $isUserRegistered = false;

    // Read the data sent via POST from our AT API
    $sessionId   = $_POST["sessionId"];
    $serviceCode = $_POST["serviceCode"];
    $phoneNumber = $_POST["phoneNumber"];
    $text        = $_POST["text"];


    
    $menu = new Menu();
    $text = $menu->middleware($text);
    //$text = $menu->goBack($text);
    
    if($text == "" && $isUserRegistered == true){
         //user is registered and string is is empty
        echo "CON " . $menu->mainMenuRegistered("<>Put a person's name here");
    }else if($text == "" && $isUserRegistered== false){
         //user is unregistered and string is is empty
         $menu->mainMenuUnRegistered();

    }else if($isUserRegistered== false){
        //user is unregistered and string is not empty
        $textArray = explode("*", $text);
        switch($textArray[0]){
            case 1: 
                $menu->registerMenu($textArray, $phoneNumber);
            break;
            default:
                echo "END Invalid choice. Please try again";
        }
    }else{
        //user is registered and string is not empty
        $textArray = explode("*", $text);
        switch($textArray[0]){
            case 1: 
                $menu->sendMoneyMenu($textArray,$sessionId);
            break;
            case 2: 
                $menu->withdrawMoneyMenu($textArray);
            break;
            case 3:
                $menu->checkBalanceMenu($textArray);
                break;
            default:
                echo "END Inavalid menu\n";
        }
    }

    

?>