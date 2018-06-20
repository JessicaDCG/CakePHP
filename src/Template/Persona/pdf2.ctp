<?php
//importamos la libreria tcpdf
require_once  ROOT. DS.  'vendor'. DS. 'tcpdf'. DS. 'tcpdf.php';
 
//creamos una clase para nuestro pdf en el cual declaramos el header y footer que utilizar
class mipdf extends TCPDF{ 
  
  //Header personalizado
  public function Header() {
    /*
    $escudo = 'HolaMundo/imag/tcpdf_logo.jpg';
    $this->Image($escudo, 25, 5, 15, '', 'JPG', '', '', false, 300, '', false, false, 0, false, false, false);   
    */
    $this->SetFont('helvetica', 'B', 20);
    $this->Cell(0, 0, 'Persona', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    
  } 
  
  //footer personalizado
  public function Footer() {
    // posicion
    $this->SetY(-15);
    // fuente
    $this->SetFont('helvetica', 'I', 8);
    // numero de pagina
    $this->Cell(0, 10, 'Página '.$this->getAliasNumPage().' de '.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'T');   
    
  }
}//termina la clase mipdf
 
 
//creamos una instancia del pdf
$pdf  = new mipdf('P', 'mm', 'Letter', TRUE, 'UTF-8', FALSE);
 
 
$pdf->SetCreator('Jessica');
$pdf->SetAuthor('Jessica');
$pdf->SetTitle('Ejemplo de PDF');
$pdf->SetSubject('Ejemplo de PDF');
 
 
//establecer margenes
$pdf->SetMargins(15, 25, 15);
$pdf->SetHeaderMargin(5);
 
//Indicamos la creación de nuevas paginas automaticas al crecer el contenido
$pdf->SetAutoPageBreak(true, 15);
 
//agregamos la primera hoja al pdf
$pdf->AddPage();
 
$pdf->SetFont('helvetica', 'B', 10);
 
$html='<div class="persona view large-9 medium-8 columns content">
    <h3>'.h($persona->Nombre).' '.h($persona->Apellido_Paterno).'</h3>    
</div>';
$html.='<table class="vertical-table">
             <tr>
                <th scope="row">'.__('IdPersona').'</th>
                <td>'.$this->Number->format($persona->idPersona).'</td>
            </tr>
            <tr>
                <th scope="row">'.__('Nombre').'</th>
                <td>'.h($persona->Nombre).'</td>
            </tr>
            <tr>
                <th scope="row">'.__('Apellido Paterno').'</th>
                <td>'.h($persona->Apellido_Paterno).'</td>
            </tr>
            <tr>
                <th scope="row">'.__('Apellido Materno').'</th>
                <td>'.h($persona->Apellido_Materno).'</td>
            </tr>        
            <tr>
                <th scope="row">'.__('Sexo').'</th>
                <!--<td><?= $this->Number->format($persona->sexo) ?></td> -->
                <td>'.h($sexo).'</td>
            </tr>
            <tr>
                <th scope="row">'.__('FechaNacimiento').'</th>
                <td>'.h($persona->FechaNacimiento).'</td>
            </tr>
            <tr>
                <th scope="row">'.__('Correo').'</th>
                <td>'.h($persona->Correo).'</td>
            </tr>
           
        </table>
    </div>'; 

// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);
 
//Cerramos el pdf
$pdf->lastPage();
 
//indicamos el nombre del pdf y que queremos forzarlo a descargar en el navegador
$pdf->Output('reporte.pdf', 'I');
