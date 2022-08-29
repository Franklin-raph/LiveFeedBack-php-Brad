<?php include 'inc/nav.php' ?>

<?php
    $sql = 'SELECT * FROM usersfeedback';
    $result = mysqli_query($conn, $sql);
    $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC)
?>

<section class="container">
    <?php if(empty($feedback)): ?>
        <p class="lead mt-3"> There is no feedback here </p>
    <?php endif; ?>

    <?php foreach($feedback as $item): ?>
        <div class="card my-3"> 
            <div class="card-body">
                <?php echo $item['body'] ?>
                <div class="text-secondary mt-2">
                   By <?php echo $item['name'] ?> on <?php echo $item['date'] ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</section>

<?php include 'inc/footer.php' ?>