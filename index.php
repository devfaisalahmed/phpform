<?php

function sanitizeInput( $data ) {
    return htmlspecialchars( stripslashes( trim( $data ) ) );
}
$options = array();
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $name     = isset( $_POST['name'] ) ? sanitizeInput( $_POST['name'] ) : '';
    $textarea = isset( $_POST['textarea'] ) ? sanitizeInput( $_POST['textarea'] ) : '';
    $checkbox = isset( $_POST['exampleCheck1'] ) && $_POST['exampleCheck1'] == 'on' ? 'Subscribed' : 'not checked';
    $radio    = isset( $_POST['inlineRadioOptions'] ) ? $_POST['inlineRadioOptions'] : 'not selected';
    $date     = isset( $_POST['datepicker'] ) ? sanitizeInput( $_POST['datepicker'] ) : '';
    $timeout  = isset( $_POST['timepicker'] ) ? sanitizeInput( $_POST['timepicker'] ) : '';
    $options  = isset( $_POST['options'] ) ? $_POST['options'] : array();

    ?>

<div class="list">
  <ul class="list-group">
    <li class="list-group-item">Name: <?php echo $name; ?></li>
    <li class="list-group-item">Address: <?php echo $textarea; ?></li>
    <li class="list-group-item">Checkbox: <?php echo $checkbox; ?></li>
    <li class="list-group-item">Gender: <?php echo $radio; ?></li>
    <li class="list-group-item">Time: <?php echo $timeout; ?></li>
    <li class="list-group-item">Date: <?php echo $date; ?></li>
    <li class="list-group-item">Select: <?php echo implode( ', ', $options ); ?></li>
  </ul>
</div>
<?php
}

?>
<!DOCTYPE html>

<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
      integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


  </head>

  <body>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-7">
          <h1 class="my-2 text-center">PHP Form Manipulation</h1>
          <form action="" method="POST">
            <!-- ========== name =============== -->
            <div class="mb-3">
              <label for="exampleFormControlInput" class="form-label">Name</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
            </div>

            <!-- =========== textarea ============ -->
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Textarea</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="textarea"></textarea>
            </div>

            <!-- =========== checkbox ============ -->
            <div class="form-check mb-4">
              <input class="form-check-input" type="checkbox" value="on" id="defaultCheck1" name="exampleCheck1"
                <?php echo isset( $_POST['exampleCheck1'] ) && $_POST['exampleCheck1'] == 'on' ? 'checked' : ''; ?>>
              <label class="form-check-label" for="defaultCheck1">Subscribed</label>
            </div>

            <!-- ========== radio ======== -->
            <div class="radio mb-4">
              <label class="form-label d-block">Gender</label>
              <div class="form-check form-check-inline">
                l <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="male"
                  <?php echo isset( $_POST['inlineRadioOptions'] ) && $_POST['inlineRadioOptions'] == 'male' ? 'checked' : ''; ?>>
                <label class="form-check-label" for="inlineRadio1">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="female"
                  <?php echo isset( $_POST['inlineRadioOptions'] ) && $_POST['inlineRadioOptions'] == 'female' ? 'checked' : ''; ?>>
                <label class="form-check-label" for="inlineRadio2">Female</label>
              </div>
            </div>

            <!-- ========== date time =============== -->
            <div class="mb-3">
              <label for="datepicker" class="form-label">Date</label>
              <input type="text" class="form-control" id="datepicker" name="datepicker">
            </div>

            <!-- ==========  time =============== -->
            <div class="mb-3">
              <label for="timepicker" class="form-label">Date</label>
              <input type="text" class="form-control" id="timepicker" name="timepicker">
            </div>

            <!-- =========== multiselect ==============  -->
            <div class="mb-3">
              <label for="multiselect" class="form-label">Select</label>
              <select class="form-control " name="options[]" multiple id="multiple">
                <option value="one" <?php in_array( 'one', $options ) ? 'selected' : '';?>>One</option>
                <option value="two" <?php in_array( 'two', $options ) ? 'selected' : '';?>>Two</option>
                <option value="three" <?php in_array( 'three', $options ) ? 'selected' : '';?>>Three</option>
                <option value="four" <?php in_array( 'four', $options ) ? 'selected' : '';?>>four</option>
                <option value="five" <?php in_array( 'five', $options ) ? 'selected' : '';?>>five</option>
                <option value="six"> <?php in_array( 'six', $options ) ? 'selected' : '';?>six</option>
                <option value="seven" <?php in_array( 'seven', $options ) ? 'selected' : '';?>>seven</option>
              </select>
            </div>




            <!-- =========== submit button ============ -->
            <button class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>






    <script>
    $(document).ready(function() {
      $('#multiple').select2();
    });
    flatpickr("#datepicker", {
      dateFormat: "d-m-y",
    });
    flatpickr("#timepicker", {
      enableTime: true,
      noCalendar: true,
      dateFormat: "H:i",
    });
    </script>
  </body>

</html>