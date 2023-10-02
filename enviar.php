<?php

//todo correcto


include('conexion.php');
if((isset($_POST['name']) && !empty($_POST['name']))
&& (isset($_POST['email']) && !empty($_POST['email']))
&& (isset($_POST['phone']) && !empty($_POST['phone']))
&& (isset($_POST['message']) && !empty($_POST['message']))){
 
 $name = $_POST['name'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $message = $_POST['message'];
 $c_alta=date('Y-m-d');
 
 $to ="hugoceriani@gmail.com";
 $headers = "From : " . $email;
 if( mail($to, $phone, $message, $headers)){
 $query = "INSERT INTO `consulta` (name, email, phone, message,  c_alta) VALUES ('$name', '$email', '$phone', '$message', '$c_alta')";
 $result = mysqli_query($connection, $query);
 header( "refresh:0;ok.html" );
 //echo "<center>E-Mail Enviado con exito, nos pondremos en contacto con usted pronto.</center>";
 }
}




// Create the email and send the message
$to = 'hugoceriani@gmail.com,wye@wye-digital.com.ar'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Contacto de:  $name";
$email_body = "Mensaje de $name.\n\n"."Detalle:\n\nNombre: $name\n\nEmail: $email\n\nTelefono: $phone\n\nMensaje: $message";
$headers = "From: noreply@celinestajcer.com.ar\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email";	
mail($to,$email_subject,$email_body,$headers);
return true;	



?>