<?php
require('formLogic.php');
?>

<!DOCTYPE html >
<html>

  <head lang="en">
    <meta charset="utf-8">
    <title>Dado Tea Lunch Special</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="form.css">



  </head>

  <body>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
    <h1 style="color:#781010">Dado Tea Lunch Special</h1>
    <?php if($serve): ?>
    <p>Monday through Friday
      <br> 11am- 3am


    <p> Includes sandwich,snack,and drink.</p>
    <form action="index.php" method="POST">

      <fieldset>
        <legend>Order Information</legend>


            <label for="form-name">Name:</label>
            <input type="text" name="userName" id="form-name" value="<?php $userName ?>" required><br>




            <label>
              <input type="radio" name="hereOpt" value="3" <?php if($hCost=="3") echo 'CHECKED'?>> here<small> 3&#36;</small></label><br>


            <label>
              <input type="radio" name="hereOpt" value="5" <?php if($hCost=="5") echo 'CHECKED'?>> to go<small> 5&#36;</small></label><br>



      </fieldset>
    <hr>
      <fieldset>
        <legend>Sandwiches</legend>
            <?php echo date('l')."<br>"?>

            <?php echo get_radio_buttons($selected_food);?>



        <hr>


            <input type="checkbox" name="features[]" value="0.75" <?php if($setFeatures) echo 'CHECKED'?>>
            <label>Gluten Free Bread(75 &cent; extra)</label> <br>

      </fieldset>
        <hr>
      <fieldset>
        <legend>Snack</legend>



            <input type="radio" name="snak" value="4" <?php if($sCost=="4") echo 'CHECKED'?>> Apple<small> 4&#36;</small><br>

            <input type="radio" name="snak" value="3" <?php if($sCost=="3") echo 'CHECKED'?>> Banana<small> 3&#36;</small><br>

            <input type="radio" name="snak" value="5" <?php if($sCost=="5") echo 'CHECKED'?>> Potato Chips<small> 5&#36;</small><br>



      </fieldset>
      <hr>

      <fieldset>
        <legend>Drinks</legend>



            <label for='drink'>Select which drink do you prefer</label>
            <select name='drink' id="drink">
              <option value='0'>Choose one...</option>
              <optgroup label="Black Tea">
                <option value="5" <?php if($dCost=="5") echo 'SELECTED'?>>Hot Black Tea-Keemun 5&#36;</option>
                <option value="5" <?php if($dCost=="5") echo 'SELECTED'?>>Hot Black Tea-Decaf Keemun 5&#36;</option>
                <option value="4" <?php if($dCost=="4") echo 'SELECTED'?>>Iced Black Tea-Keemun 4&#36;</option>
                <option value="4" <?php if($dCost=="4") echo 'SELECTED'?>>Iced Black Tea-DecafKeemun 4&#36;</option>
              </optgroup>
              <optgroup label="Green Tea">
                <option value="6"<?php if($dCost=="6") echo 'SELECTED'?>>Hot Green Tea-Sancha 6&#36;</option>
                <option value="6"<?php if($dCost=="6") echo 'SELECTED'?>>Hot Green Tea-Decaf 6&#36;</option>
                <option value="3"<?php if($dCost=="3") echo 'SELECTED'?>>Iced Green Tea-Sancha 3&#36;</option>
                <option value="3"<?php if($dCost=="3") echo 'SELECTED'?>>Iced Green Tea-Decaf 3&#36;</option>
              </optgroup>
              <optgroup label="Coffee">
                <option value="7"<?php if($dCost=="7") echo 'SELECTED'?>>Hot Coffee 7&#36;</option>
                <option value="7"<?php if($dCost=="7") echo 'SELECTED'?>>Hot Decaf Coffee 7&#36;</option>
                <option value="5"<?php if($dCost=="5") echo 'SELECTED'?>>Iced Coffee 5&#36;</option>
                <option value="5"<?php if($dCost=="5") echo 'SELECTED'?>>Iced Decaf Coffee 5&#36;</option>
              </optgroup>
            </select>

        <hr>



            <input type="checkbox" name="extras[]" value="0.75"<?php if($setExtras) echo 'CHECKED'?>>
            <label>Large drink(75 &cent; extra)</label> <br>


      </fieldset>

      <?php if (!empty($userName)&&($form->hasErrors==false)):?>
        <p class="alert alert-info"><br>Thank you <?=$userName?> your total payment is <?=$sTotal?> plus tax</p></p><br>
     <?php endif ?>
      <?php if($form->hasErrors):?>
         <div class='alert alert-danger'>
             <ul>
                 <?php foreach($errors as $error): ?>
                     <li><?=$error?></li>
                 <?php endforeach; ?>
             </ul>
         </div>
      <?php endif ?>
      <br><button class="btn btn-primary" name="placeOrder">Place Order</button>

    <?php else:?>
      <div> "We are happy to serve you Monday to Friday!"</div>
    <?php endif ?>

    </form>


    <div class="row">
    </div>
      <div class="col-md-4"></div>
    
  </body>

</html>
