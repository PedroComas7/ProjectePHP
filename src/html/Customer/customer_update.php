<?php
    require('../includes/header.php');
    require('../includes/nav.php');

    require '../../../vendor/autoload.php';
    use models\Customer;

    // Obtener el ID del cliente de la URL
    $customer_id = isset($_GET['id']) ? $_GET['id'] : null;

    $customer = new Customer($customer_id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try{
            $customer = new Customer(
                $_POST['customer_id'],
                $_POST['cust_first_name'],
                $_POST['cust_last_name'],
                $_POST['cust_street_address'],
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                isset($_POST['credit_limit']) ? floatval($_POST['credit_limit']) : null,
                null,
                null,
                null,
                null,
                null,
                null,
                null
            );
            $customer->save();
            echo "<script>
                    alert('✅ Cliente actualizado correctamente');
                    window.location.href = 'customer_list.php';
                </script>";
            
        } catch (Exception $e) {
            echo "<p>Error en afegir el customer: " . $e->getMessage() . "</p>";
        }
    }
?>
<div id="section">
    <h1>Modifica Customer</h1>
    <?php $message ?>
    <form method="POST" action="">
            <label>ID Customer:</label><br>
            <input type="number" name="customer_id" value="<?php echo htmlspecialchars($customer_id); ?>" readonly><br><br>

            <label>Llinatge:</label><br>
            <input type="text" name="cust_last_name" required><br><br>

            <label>Nom:</label><br>
            <input type="text" name="cust_first_name" required><br><br>

            <label>Street Address:</label><br>
            <input type="text" name="cust_street_address" required><br><br>

            <label>Salary:</label><br>
            <input type="number" step="0.01" name="credit_limit"><br><br>

            <input type="submit" value="Actualizar Customer">
    </form>
</div>
</div>  
<?php require('../includes/footer.php');?>