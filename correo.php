<?php
if(isset($_POST['enviar'])){
    if(!empty($_POST['name']) && !empty($_POST['asunto']) && !empty($_POST['email']) && !empty($_POST['msg'])){
        $nombre = $_POST['name']; // Nombre de la persona
        $email = $_POST['email']; // Correo del destinatario
        $asunto = $_POST['asunto']; // Asunto del mensaje
        $msg = $_POST['msg'];

        // Construir el mensaje con los datos
        $mensaje = "Nombre: $nombre\n";
        $mensaje .= "Correo: $email\n";
        $mensaje .= "Contenido del mensaje: $msg\n";

        // El mensaje es enviado desde un correo de prueba
        $header = "From: noreply@example.com"."\r\n";
        $header .= "Reply-To: noreply@example.com"."\r\n";
        $header .= "X-Mailer: PHP/". phpversion();

        $destinatario = "danymich807@gmail.com";
        
        $mail = @mail($destinatario, $asunto, $mensaje, $header);

        if ($mail){
            echo "<h4> ¡Mail enviado exitosamente! </h4>";
            include("contacto.html");
        } else {
            echo "<h4> Hubo un error al enviar el correo. Por favor, inténtalo de nuevo más tarde. </h4>";
            include("contacto.html");
        }
    }
}
?>
