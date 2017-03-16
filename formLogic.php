
<?php
require('Tools.php');
require('Form.php');
require('Price.php');


$form = new DWA\Form($_POST);
$price = new DWA\Price();
$tools = new DWA\Tools();


$hCost=0;

$feCost=0;
$sCost=0;
$xCost=0;
$dCost=0;
$sTotal=0;

$cCfeCost=0;
$aCxCost=0;

$today = date("l");
$serve=false;
//for testing
//$today="Monday";
$selected_food='';


function get_radio_buttons($food_opt)
{
  $day_vs_food_list = array
  (
  array("Monday",1,2),
  array("Tuesday",3,6),
  array("Widnesday",4,5),
  array("Thursday",7,5),
  array("Friday",6,0)
  );
  $price_list= array
  (
  array(0,"Tuna Salad",5),
  array(1,"Tomato Mozarella",10),
  array(2,"Chicken Salad",5),
  array(3,"Greek Salad Wrap",5),
  array(4,"Red Papper Hummus",5),
  array(5,"Roasted Turkey",9),
  array(6,"Dado Wrap",11),
  array(7,"Currot Ginger Hummus",11),
  );
$test_today = date("l");
$temp_price =array();

$str='';
    for ($row = 0; $row < 4; $row++) {
       $temp=$day_vs_food_list[$row]['0'];

       if ($temp==$test_today){

        for ($col = 1; $col < 3; $col++) {
          $temp=$day_vs_food_list[$row][$col];
          if ($food_opt==$price_list[$temp][2]){

          $str.='&nbsp;<input type="radio" name="food" checked
          value="'.$price_list[$temp][2].'"/>'.$price_list[$temp][1]." "."$".
          $price_list[$temp][2]."<br>"."<br>";
        }else{
          $str.='&nbsp;<input type="radio" name="food"
          value="'.$price_list[$temp][2].'"/>'.$price_list[$temp][1]." "."$".
          $price_list[$temp][2]."<br>"."<br>";
        }
      }return $str;
   }
 }
}

//check if we can server you today
$daysWeek = array("Monday", "Tuesday", "Wednesday", "Thursday","Friday");
if (in_array($today, $daysWeek)) {
    $serve= true;
}

$userName=$form->get('userName');
$userName=$form->sanitize($userName);
//if the menu appreared
if ($serve){
          if(isset($_POST['hereOpt'])){

                      $hCost=$form->get('hereOpt');
                      $price->addValue($hCost);
                      $price->pushValue($price->items,$hCost);
               }

             if (isset($_POST['food'])){
                    $temp_price= $form->get('food');
                    $selected_food=$temp_price;
                    $price->addValue($temp_price);
                    $price->pushValue($price->items,$temp_price);
}




                  if(isset($_POST['features'])){

                    $feCost = $_POST['features'];
}
            $setFeatures =$form->isChosen('features');

            if(!empty($feCost)){

              $cCfeCost=0.75;
              $price->addValue($cCfeCost);
              $price->pushValue($price->items,$cCfeCost);
}

            if(isset($_POST['snak'])){
                    $sCost = $_POST['snak'];
                  }
                    $price->addValue($sCost);
                    $price->pushValue($price->items,$sCost);



            if(isset($_POST['extras'])){

                    $xCost = $_POST['extras'];
            }
             $setExtras =$form->isChosen('extras');

            if(!empty($xCost)){

              $aCxCost=0.75;
              $price->addValue($aCxCost);
              $price->pushValue($price->items,$aCxCost);}


//we checked before submiting again because of index warning
                  if(isset($_POST['drink'])){
                    $dCost = $_POST['drink'];
                  }
                    $price->addValue($dCost);
                    $price->pushValue($price->items,$dCost);

}


if($form->isSubmitted()) {

  $errors = $form->validate(
  [
      'userName' => 'required|alpha'
  ]
  );

  $sTotal=  array_sum($price->items);

  }
}#test what kind of error will I see
