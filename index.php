<?php include 'inc/nav.php' ?>

<?php 
  $name = $emial = $body = "";
  $nameErr = $emailErr = $bodyErr = "";

  // Form submit
  if(isset($_POST['submit'])){

    // validate the name
    if(empty($_POST['name'])){
      $nameErr = "Name is required";
    }else {
      $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    };

    // valideate email
    if(empty($_POST['email'])){
      $emailErr = "Email is required";
    }else {
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    };

    // valideate body
    if(empty($_POST['body'])){
      $bodyErr = "Body is required";
    }else {
      $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    };

    if(empty($nameErr) && empty($emialErr) && empty($bodyErr)){
      // Add to database
      $sql = "INSERT INTO usersfeedback (name, email, body) VALUES ('$name',
      '$emial', '$body')";

      if(mysqli_query($conn, $sql)){
        // Success
        header('Location: feedback.php');
      }else{
        // Error
        echo "Error: ".mysqli_error($conn);
      }
    }
  };
?>

      <section id="getInTouch">
        <div class="container mt-5">
            <div class="text-center">
                <img src="imgs/frankDev.png" class="img-fluid w-25 mb-5" alt="">
                <h2 class="display-4">Feedback</h2>
                <p class="lead">Leave Feedback for Franklin</p>
            </div>

            <div class="row justify-content-center px-5 my-3">
                <form action="<?php echo htmlspecialchars(
                  $_SERVER['PHP_SELF']) ?>" method="POST" class="col-lg-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">name</span>
                            <input name="name" type="text" class="form-control <?php
                            echo $nameErr ? 'is-invalid':null ?>" id="exampleFormControlInput1" placeholder="name">
                            <div class="invalid-feedback">
                              <?php echo $nameErr; ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input name="email" type="email" class="form-control <?php
                            echo $emailErr ? 'is-invalid': null ?>" id="exampleFormControlInput1" placeholder="name@example.com">
                            <div class="invalid-feedback">
                              <?php echo $emailErr; ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">Feedback</label>
                      <textarea name="body" class="form-control <?php
                            echo $bodyErr ? 'is-invalid': null ?>" id="exampleFormControlTextarea1" rows="3"></textarea>
                      <div class="invalid-feedback">
                        <?php echo $bodyErr; ?>
                      </div>
                    </div>

                    <div class="text-center mb-3">
                        <input type="submit" class="d-block w-100 btn btn-success" name="submit" value="send" >
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php include 'inc/footer.php' ?>