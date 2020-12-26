<?php
$title = 'View Cars';
require_once 'templates/header.tpl.php';
?>
  <div class="container">
    <?php if(isset($_GET['add']) && $_GET['add'] == 'success'): ?>
    <div class="success"><span class="fa fa-check"></span> Car successfully added!</div>
    <?php endif; ?>
    
    <h2>There are <?php echo count($car_array); ?> cars!</h2>

    <div class="grid">
      <?php
      // 11. Displaying Object Data

      // Loop through each $car_index and $car_value in $car_array
      foreach ($car_array as $car_index => $car_value):
        // Because we used the serialize() function to convert our object data to a string we must use the unserialize() function to convert the data back to its inital format as an object
        $unserialized_car = unserialize($car_value);

        // We'll use our car's index number to create a unique ID
      ?>
      <div class="car" id="car_<?php echo $car_index; ?>">
        <h3><span class="fa fa-car"></span> <?php echo Car::escape_html($unserialized_car->get_name()); ?></h3>
        <h4><span class="fa fa-id-card"></span> Licensed to: <?php echo Car::escape_html($unserialized_car->get_driver()); ?></h4>
        <?php
        // Check if a $_GET key with our car's ID is set
        if (isset($_GET['car_' . $car_index])):
          // if the $_GET value matches this action, perform this method
          if ($_GET['car_' . $car_index] == 'start'):
            $unserialized_car->start(80);
          elseif ($_GET['car_' . $car_index] == 'honk'):
            $unserialized_car->honk();
          elseif ($_GET['car_' . $car_index] == 'doughnuts'):
            $unserialized_car->doughnuts();
          elseif ($_GET['car_' . $car_index] == 'fill_up'):
            $unserialized_car->fill_up();
          endif;
        endif;

        // Using anchor tags, add $_GET data to trigger each method
        ?>
        <h5>Methods</h5>
        <a href="<?php echo $this_file . '?car_' . $car_index . '=start#car_' . $car_index ?>">Star Car</a>
        <a href="<?php echo $this_file . '?car_' . $car_index . '=honk#car_' . $car_index ?>">Honk Horn</a>
        <a href="<?php echo $this_file . '?car_' . $car_index . '=doughnuts#car_' . $car_index ?>">Do Doughnuts</a>
        <a href="<?php echo $this_file . '?car_' . $car_index . '=fill_up#car_' . $car_index ?>">Fill Up Gas</a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php require_once 'templates/footer.tpl.php'; ?>
