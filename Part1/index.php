<?php
//starting the session
session_start();
//path to include files from vending machine
require_once ('./vendingmachine.php');
//path giving for session
if(isset($_POST['continue'])) {
    session_destroy();
    header('Location: ./index.php');
}
//checking the function is serialize or unserilaize
$machine = null;
if(empty($_SESSION['vending'])) {
    $machine = new VendingMachine();
} else {
    $machine = unserialize($_SESSION['vending']);
}

if(isset($_POST['product'])) {
    $machine->select_product($_POST['product']);
    $_SESSION['vending'] = serialize($machine);
}

if(isset($_POST['coin'])) {
    $coin = $machine->getAmount() + $_POST['coin'];
    $machine->setAmount($coin);
    $_SESSION['vending'] = serialize($machine);
}

?>
<html>

<body>
    
    <form method="post">
        <?php if(empty($_SESSION['vending'])) { ?>
            <h2>Select a Product</h2>
            <input type="submit" name="product" value="Chocolate">
            <input type="submit" name="product" value="Pop">
            <input type="submit" name="product" value="Chips">
        <?php } else {
            if($machine->getAmount() >= $machine->getcost()) {
                echo '<h2>Thank you for shopping!</h2>';
                if ($machine->getAmount() > $machine->getcost()) {
                    $diff = $machine->getAmount() - $machine->getcost();
                    echo '<h3>Collect your ¢'. $diff . ' change.</h3>';
                }
                echo '<input type="submit" name="continue" value="Continue Vending">';
            } else {
            ?>
            <h2>Enter coin</h2>
            <button type="submit" name="coin" value="100">$1</button>
            <button type="submit" name="coin" value="5">5<sup>¢</sup></button>
            <button type="submit" name="coin" value="10">10<sup>¢</sup></button>
            <button type="submit" name="coin" value="25">25<sup>¢</sup></button>
            <h4><?php echo $machine->getProduct() . " cost:¢ " . $machine->getcost(); ?></h4>
            <h4><?php echo 'Total amount entered: ¢' . $machine->getAmount(); ?></h4>
        <?php } } ?>

    </form>

</body>

</html>
