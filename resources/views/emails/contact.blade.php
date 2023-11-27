<!-- resources/views/emails/tu_correo.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correo de Contacto</title>
</head>
<body>
    <h2>Correo de Contacto</h2>

    <p><strong>Correo Electrónico del Remitente:</strong> {{ $datos['email'] }}</p>

    <p><strong>Mensaje:</strong></p>
    <p>{{ $datos['mensaje'] }}</p>

    <p>¡Gracias!</p>
</body>
</html>
