<?php
    require('../includes/header.php');
    require('../includes/nav.php');

    require '../../../vendor/autoload.php';
    use models\Customer;

    if (isset($_GET['id'])) {
        try {
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            if (!$id) {
                throw new Exception('ID inválido');
            }

            //Si tu Customer acepta el id en el constructor:
            $customer = new Customer($id);

            //comprobar que el objeto existe antes de llamar a delete()
            if (!is_object($customer)) {
                throw new Exception('Customer no encontrado');
            }
            $customer->destroy();

            echo "<script>
                    alert('✅ Customer eliminado correctamente');
                    window.location.href = 'customer_list.php';
                </script>";
        } catch (Exception $e) {
            echo "<p>Error en eliminar el customer: " . $e->getMessage() . "</p>";
        }
    }
?>
<?php require('../includes/footer.php');?>