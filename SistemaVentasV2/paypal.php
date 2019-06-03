<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
<div style="border-left:30%;">
		<script src="https://www.paypal.com/sdk/js?client-id=sb"></script>



		<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    paypal.Button.render({
        env: 'sandbox', // sandbox | production
        style: {
            label: 'pay',  // checkout | credit | pay | buynow | generic
            size:  'responsive', // small | medium | large | responsive
            shape: 'pill',   // pill | rect
            color: 'blue'   // gold | blue | silver | black
        },
 
        //INGRESAR CREDENCIALES DE USUARIO DE PAYPAL
        client: {
            sandbox:    'Ac2zr8-eXNzOrNdttpnzkGNmYJgeOZssvfxYILQsFJXeveW8m483p8G_4ssUV5ff3oe0vfz5v-DoFHWY',
            production: 'ARWpsKnd-Fn4Uag2jvxoGyTSkd-5rXUeD6EVWQJbgIvkPZXAo4FM0ZKjoUau8oNE5qWpGLpHhBwt14u0'
        },
 
        //DATOS PARA REALIZAR EL PAGO
        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '<?php echo $_SESSION["totalfinal"]; ?>', currency: 'USD' },
                            description:"Compra de <?php echo $_SESSION["totalproduct"]; ?> productos. Total: $<?php echo $_SESSION["totalfinal"]; ?>",
                            custom:"<?php $_SESSION["iduser"]; ?>"
                        }
                    ]
                }
            });
        },
 
        //RESULTADO DE LOS DETALLES DE PAGO
        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                console.log(data);
                window.location="Model/proceso_ventafinal.php?paymentToken="+data.paymentToken+" & id="+data.paymentID
            });
        }
   
    }, '#paypal-button-container');


</script>
<div id="paypal-button-container"></div>
        <script>
            paypal.Buttons().render('#paypal-button-container');
        </script>
</div>
</center>
	

</body>
</html>