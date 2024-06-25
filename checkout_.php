<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayPal Integration</title>
</head>

<body>
    <div id="paypal-button-container"></div>
    <script src="https://www.paypal.com/sdk/js?client-id=ATa7ZZz55mq9u4Ow1LAv-PFucpb5OXWm_T7HV5Q7uVwZ0q_kJkOmJZwDI9iNPbR71Xj5krLDlVUNsiJq&currency=USD" data-sdk-integration-source="button-factory"></script>

    <script>
        function initPayPalButton() {
            paypal.Buttons({
                style: {
                    shape: 'pill',
                    color: 'gold',
                    layout: 'vertical',
                    label: 'pay',
                },

                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            "description": "ARENA PARA GATOS",
                            "amount": {
                                "currency_code": "USD",
                                "value": 13
                            }
                        }]
                    });
                },

                onApprove: function(data, actions) {
                    return actions.order.capture().then(function (details) {
                        console.log(details);
                        alert('Pago completado con éxito. Gracias ' + details.payer.name.given_name + '!');
                    });
                },

                onCancel: function(data) {
                    alert("Pago Cancelado");
                    console.log(data);
                },

                onError: function(err) {
                    console.error('Ocurrió un error durante el proceso de pago: ', err);
                }

            }).render('#paypal-button-container');
        }
        initPayPalButton();
    </script>
</body>

</html>