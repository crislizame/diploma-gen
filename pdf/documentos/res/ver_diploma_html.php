<style type="text/css">

.primer{
    width: 50%;
    height: 50%;
    display: block;
    float: left;
}
    .tituos{
width: 75.5%;
        text-align: center;

    }    .tituos1{
width: 10%;

    }    .tituos2{
width: 10%;

    }
         .tituos0{
width: 50%;
         }
.tituosult{
width: 30%;
         }

    .bajart{
margin-top: 20px;
    }


</style>
<?php

for ($i=0 ; $i<$conadorall;) {
$fontnormal=30;
$fontnormal2=30;
$nombrazo=$arrayexcel['nombre'][$i];
$notaza=$arrayexcel['nota'][$i];
$fecha=$arrayexcel['date'];
$motivo=$arrayexcel['motivo'];
$doc1=$arrayexcel['doc1'];
$doc2=$arrayexcel['doc2'];
$tipo=$arrayexcel['tipo'];
$nombrazo2=$arrayexcel['nombre'][$i+1];
$notaza2=$arrayexcel['nota'][$i+1];
$fletmax=strlen($arrayexcel['nombre'][$i]);
$fletmax2=strlen($arrayexcel['nombre'][$i+1]);
$fontactual=($fletmax-$fontnormal)-$fontnormal;
$fontactual2=($fletmax2-$fontnormal2)-$fontnormal2;

switch (ucwords($tipo)) {
    case 'O':
    $imgurl = "../../img/DD.png";
    $valorrr = "ORO";
        break;
    
    case 'P':
    $imgurl = "../../img/DD2.png";
        $valorrr = "PLATA";

        break;
    default:    
    $imgurl = "../../img/DD.png";
    $valorrr = "";
    break;
}

?>
<page backimg="<?php echo $imgurl; ?>" backimgw="100%" backtop="2mm" backbottom="2mm" backleft="15mm" backright="30mm" style="font-size: 12pt; font-family: arial" >

    <table style="text-align: left; margin-left: 0px; margin-right: 0px;" width="100%" cellpadding="0" cellspacing="0">
        <tbody>
        <tr>
            <td>
                <table style="text-align: left; margin-top: 40px ; margin-right: auto ;margin-left: auto;" width="100%"
                       cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td class="tituos1">
                            <img src="../../img/logomi.png" style="" alt="asd" width="100" height="100">
                        </td>
                        <td class="tituos" style="">
                            <h1 style="margin-bottom: 0;margin-top: -10px ">UNIDAD EDICATIVA FISCAL</h1>
                            <H2 style="color: #84beff;margin-bottom: 0;margin-top: 5px ">"AUGUSTO MENDOZA MOREIRA"</H2>
                            <p style="margin-top: 0;font-weight: bold;font-size: 14px">Zona 6 - Distrito 09H1268</p>
                        </td>
                        <td class="tituos2">
                            <img src="../../img/logoaugo.png" alt="asd" width="80" height="80">


                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>

                <p style="margin-left: 80px;margin-bottom:0;font-size: 12px;font-weight: bold">Confiere a la
                    Presente</p>
                <p style="margin-top: 0px;margin-bottom:10px;margin-left: 120px;text-align: center;font-size: 35px;letter-spacing: 30px;">
                    DIPLOMA <?php echo $valorrr; ?></p>
                <p style="margin-top: 0px;margin-left: 80px;margin-bottom:15PX;font-size: 15px;font-weight: bold">Al
                    Alumno:</p>
                <p style="margin-top: 0px;margin-bottom:10px;margin-left: 10px;text-align: center;font-size:<?php echo abs($fontactual); ?>px;font-weight: bold"><?php echo $nombrazo; ?></p>
                <p style="margin-left: 10px;text-align:justify;text-justify: distribute-all-lines;font-style: italic;font-size: 18px">
                    Por sus excelentes calificaciones <?php echo $notaza; ?> y su buen desempeño en este <?php echo $motivo; ?> del
                    presente periodo lectivo.
                </p>
                <p style="text-align: right;font-style: italic;"><?php echo $fecha; ?></p>
            </td>

        </tr>
        <tr>
            <td>

                <table style="text-align: center; margin-top: 35px ; margin-right: auto ;margin-left: auto;"
                       width="100%" cellpadding="0" cellspacing="0">

                    <tbody>
                    <tr>
                        <td class="tituos0">
                            <p style="margin-bottom: 0"><?php echo $doc1; ?></p>
                            <p style="margin-top: 0;font-weight: bold">VICERRECTOR ACADEMICO</p>
                        </td>
                        <td class="tituos0" style="">
                            <p style="margin-bottom: 0"><?php echo $doc2; ?></p>
                            <p style="margin-top: 0;font-weight: bold">TUTORA DOCENTE</p>
                        </td>

                    </tr>
                    </tbody>
                </table>

            </td>
        </tr>
        </tbody>
    </table>
    <table style="text-align: left; margin-top: 78px ;margin-left: 0px; margin-right: 0px;" width="100%" cellpadding="0"
           cellspacing="0">
        <tbody>
        <tr>
            <td>
                <table style="text-align: left; margin-top: 40px ; margin-right: auto ;margin-left: auto;" width="100%"
                       cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td class="tituos1">
                            <img src="../../img/logomi.png" style="" alt="asd" width="100" height="100">
                        </td>
                        <td class="tituos" style="">
                            <h1 style="margin-bottom: 0;margin-top: -10px ">UNIDAD EDICATIVA FISCAL</h1>
                            <H2 style="color: #84beff;margin-bottom: 0;margin-top: 5px ">"AUGUSTO MENDOZA MOREIRA"</H2>
                            <p style="margin-top: 0;font-weight: bold;font-size: 14px">Zona 6 - Distrito 09H1268</p>
                        </td>
                        <td class="tituos2">
                            <img src="../../img/logoaugo.png" alt="asd" width="80" height="80">


                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>

                <p style="margin-left: 80px;margin-bottom:0;font-size: 12px;font-weight: bold">Confiere a la
                    Presente</p>
                <p style="margin-top: 0px;margin-bottom:10px;margin-left: 120px;text-align: center;font-size: 35px;letter-spacing: 30px;">
                    DIPLOMA <?php echo $valorrr; ?></p>
                <p style="margin-top: 0px;margin-left: 80px;margin-bottom:15PX;font-size: 15px;font-weight: bold">Al
                    Alumno:</p>
                <p style="margin-top: 0px;margin-bottom:10px;margin-left: 10px;text-align: center;font-size:<?php echo abs($fontactual2); ?>px;font-weight: bold"><?php echo $nombrazo2; ?></p>
                <p style="margin-left: 10px;text-align:justify;text-justify: distribute-all-lines;font-style: italic;font-size: 18px">
                    Por sus excelentes calificaciones <?php echo $notaza2; ?> y su buen desempeño en este <?php echo $motivo; ?> del
                    presente periodo lectivo.
                </p>
                <p style="text-align: right;font-style: italic;"><?php echo $fecha; ?></p>
            </td>

        </tr>
        <tr>
            <td>

                <table style="text-align: center; margin-top: 35px ; margin-right: auto ;margin-left: auto;"
                       width="100%" cellpadding="0" cellspacing="0">

                    <tbody>
                    <tr>
                        <td class="tituos0">
                            <p style="margin-bottom: 0"><?php echo $doc1; ?></p>
                            <p style="margin-top: 0;font-weight: bold">VICERRECTOR ACADEMICO</p>
                        </td>
                        <td class="tituos0" style="">
                            <p style="margin-bottom: 0"><?php echo $doc2; ?></p>
                            <p style="margin-top: 0;font-weight: bold">TUTORA DOCENTE</p>
                        </td>

                    </tr>
                    </tbody>
                </table>

            </td>
        </tr>
        </tbody>
    </table>

</page>
    <?php
    $i = $i+2;
}
?>