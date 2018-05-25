<?php


$nom = $property['Articles']['id'];
$ape = $property['Articles']['title'];
$rut = $property['Articles']['body'];
$nac =$property['Articles']['created'];
$sex =$property['Articles']['modified'];
$fecn ='----s';
$edad='----';
$edoc='----';

                    $tele=$property['Articles']['TELEMERGENCIA'];

$html = '<style>
div.student {
         color: #777;
         background-color: #F9F9F9;
         font-family: helvetica;
         font-size: 9pt;
      text-align: left;
   border:1px solid #DDD;
     }
h2{
     color: #F09A2E;
     font-weight: bold;
     padding: 10px 0;
}
.field_data{
       background-color: #F4F4F4;
     border: 1px solid #AAAAAA;
    padding-top: 10px;
padding-bottom: 5px;
padding-left: 5px;
height: 5px;
margin-left: 10px;
     }
</style>';

$html .='Fecha: '. date('d-m-Y',time());

$html .= '<h1>Datos del Trabajador</h1>';
//-------------------------------------------
$html .= '<h2 align="center ">Datos Personales</h2>';
$html .= '<div class="course">';
$html .= '<div><strong>Nombre Completo</strong></div>';
$html .= ''.$nom .' '.$ape;
$html .= '<div><strong>Rut</strong></div>';
$html .= $rut ;
$html .= '<div><strong>Nacionalidad</strong></div>';
$html .= $nac ;
$html .= '<div><strong>Fecha de Nacimiento</strong></div>';
$html .= $fecn ;
$html .= '<div><strong>Edad</strong></div>';
$html .= $edad ;
$html .= '<div><strong>Estado Civil</strong></div>';
$html .= $edoc ;

$html .= '</div>';


App::import('Vendor','xtcpdf');

ob_clean();
$tcpdf = new XTCPDF();
$textfont = 'freesans';


$tcpdf->SetAuthor("");
$tcpdf->SetAutoPageBreak( false );
$tcpdf->xheadertext = ( false );
$tcpdf->setHeaderFont(array($textfont,'',10));
$tcpdf->xheadercolor = array(255,255,255);

$tcpdf->xfootertext = 'Constructora BAPER S.A';
$tcpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


$tcpdf->AddPage();

$tcpdf->SetMargins(15, 5, 5);

$tcpdf->SetTitle($property['Articles']['id']);
$tcpdf->SetTextColor(0, 0, 0);
$tcpdf->SetFont($textfont,'B',10);
// configuramos la calidad de JPEG
$tcpdf->setJPEGQuality(100);



$tcpdf->writeHTML($html, true, false, true, false, '');

// se pueden asignar mas datos, ver la documentación de TCPDF

echo $tcpdf->Output('mi_archivo.pdf', 'I'); //el pdf se muestra en el
navegador
//echo $tcpdf->Output('mi_archivo.pdf', 'I'); //el pdf se descarga

?>