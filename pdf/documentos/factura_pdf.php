<?php
	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../../login.php");
		exit;
    }
	
	
	/* Connect To Database*/
include '../../PHPMailer/class.phpmailer.php';
include '../../PHPMailer/class.smtp.php';
include("../../config/db.php");
	include("../../config/conexion.php");
	//Archivo de funciones PHP
	include("../../funciones.php");
	$session_id= session_id();
	$sql_count=mysqli_query($con,"select * from tmp where session_id='".$session_id."'");
	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
	echo "<script>alert('No hay productos agregados a la factura')</script>";
	echo "<script>window.close();</script>";
	exit;
	}

	require_once(dirname(__FILE__).'/../html2pdf.class.php');
		
	//Variables por GET
	$id_cliente=intval($_GET['id_cliente']);
	$id_vendedor=intval($_GET['id_vendedor']);
	$desc=trim($_GET['desc_factura']);
	$condiciones=mysqli_real_escape_string($con,(strip_tags($_REQUEST['condiciones'], ENT_QUOTES)));

	//Fin de variables por GET
	$sql=mysqli_query($con, "select LAST_INSERT_ID(numero_factura) as last from facturas order by id_factura desc limit 0,1 ");
	$rw=mysqli_fetch_array($sql);
	$numero_factura=$rw['last']+1;
	$simbolo_moneda=get_row('perfil','moneda', 'id_perfil', 1);
    // get the HTML
     ob_start();
     include(dirname('__FILE__').'/res/factura_html.php');
    $content = ob_get_clean();

    try
    {
        $dir='../../upload/Factura.pdf'; //puedes usar dobles comillas si quieres
        if(file_exists($dir))
        {
            if(unlink($dir)){
                //print "El archivo fue borrado";
            }

        }else{
            //print "Este archivo no existe";
        }

        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', array('70mm','3625mm'), 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output('../../upload/Factura.pdf','F');
        $html2pdf->Output('Factura.pdf');
        $sql_cliente=mysqli_query($con,"select * from clientes where id_cliente='$id_cliente'");
        $rw_cliente=mysqli_fetch_array($sql_cliente);

        if($rw_cliente['email_cliente'] != '' || $rw_cliente['email_cliente'] != null) {


            $mail = new PHPMailer();                              // Passing `true` enables exceptions

            //Server settings
            // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();
            $mail->SMTPAuth = true;                              // Set mailer to use SMTP
            $mail->Host = 'mail.grieta.net';  // Specify main and backup SMTP servers
            $mail->Username = 'facturas@almacenguayaquil.com';                 // SMTP username
            $mail->Password = 'factura@2018';                           // SMTP password                 // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->From= 'facturas@almacenguayaquil.com';
            $mail->FromName='Robot Facturero';

            $mail->addAddress($rw_cliente['email_cliente'],$rw_cliente['nombre_cliente']);
            $mail->addReplyTo('almacenesguayaquil@gmail.com','Almacen Guayaquil');
            $mail->addCC('facturas@almacenguayaquil.com','Facturas Almacen Guayaquil');

            //Attachments
            // Add attachments
            $mail->addAttachment('../../upload/Factura.pdf', 'factura.pdf');    // Optional name*/

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Factura Almacen Guayaquil '.date("d/m/Y");
            $mail->Body = 'Bienvenido al Almacen Guayaquil, Adjuntamos la factura del '.date("d/m/Y").'  <b> Gracias por su compra!</b>';
            $mail->AltBody = 'Bienvenido al Almacen Guayaquil, Adjuntamos la factura del '.date("d/m/Y").'   Gracias por su compra!';

            $exito = $mail->Send();
            if ($exito) {
                //echo 'El correo fue enviado correctamente.';
            } else {
                //echo '‘Hubo un inconveniente. Contacta a un administrador.’';
            }
            $dir='../../upload/Factura.pdf'; //puedes usar dobles comillas si quieres
            if(file_exists($dir))
            {
                if(unlink($dir)){
                    //print "El archivo fue borrado";
                }

            }else{
                //print "Este archivo no existe";
            }

        }
        $sql = mysqli_query($con, "SELECT * from detalle_factura where numero_factura ='" . $numero_factura . "'");
        while ($row3 = mysqli_fetch_array($sql)) {
            $id_producto = $row3['id_producto'];
            $cantidadr = $row3['cantidad'];

            $sql_stock2 = mysqli_query($con, "SELECT stock_producto from products where id_producto ='" . $id_producto . "'");
            while ($row4 = mysqli_fetch_array($sql_stock2)) {
                $cantidads = $row4['stock_producto'];
            }

            $resultadostock = $cantidads - $cantidadr;
            $sql_cant = mysqli_query($con, "UPDATE products set stock_producto = '" . $resultadostock . "' where id_producto='" . $id_producto . "';");

        }

    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
