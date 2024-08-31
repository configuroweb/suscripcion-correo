<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suscripción por Email con Notificación</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <link rel="shortcut icon" href="./php-icon.png" type="image/x-icon">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.15) 0%, rgba(0, 0, 0, 0.15) 100%), radial-gradient(at top center, rgba(255, 255, 255, 0.40) 0%, rgba(0, 0, 0, 0.40) 120%) #989898;
            background-blend-mode: multiply, multiply;
        }

        .subscriber-container {
            width: 400px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 5px;
            padding: 25px;
            text-align: center;
            background-color: #ffff;
        }

        img {
            width: 60px;
        }

        h1 {
            font-size: 25px;
            font-weight: bold;
            margin: 10px;
        }

        .thankyou-page {
            display: none;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="subscriber-container">
            <img src="https://cdn-icons-png.flaticon.com/512/481/481659.png" alt="">
            <form id="subscribeForm">
                <h1>¡Conviértete en nuestro suscriptor!</h1>
                <label for="email">Suscríbete a nuestro boletín para mantenerte actualizado con nuestras últimas noticias y eventos.</label>
                <div class="form-group">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        </div>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Tu Email" required>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark form-control">Suscribirse -></button>
                </div>
            </form>
            <div class="thankyou-page">
                <h1>¡Gracias por suscribirte!</h1>
                <p>Estamos emocionados de compartir nuestras últimas noticias y eventos contigo. ¡Mantente atento!</p>
                <button class="btn btn-dark form-control" onclick="location.reload();"><- Volver</button>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#subscribeForm').on('submit', function(event) {
                event.preventDefault();

                $.ajax({
                    url: './send-message.php',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('.thankyou-page').show();
                        $('#subscribeForm').hide();
                    },
                    error: function() {
                        alert('Hubo un error al procesar tu solicitud. Por favor, inténtalo de nuevo.');
                    }
                });
            });
        });
    </script>
</body>

</html>