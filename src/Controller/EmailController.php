<?php
namespace App\Controller;

use Cake\Mailer\Email ;
use App\Controller\EmailController;
	
class EmailController extends AppController
{  	
  	public function index()
    {
        
    }

  	public function correo($asunto=null,$err =null){
	    /*Para este ejemplo no necesito de renderizar
	      una vista por lo que autorender lo pongo a false
	     */
	    $this->autoRender = false;
	    
	    /*configuramos las opciones para conectarnos al servidor
	      smtp de Gmail
	     */
	    Email::configTransport('mail', [
	      'host' => 'ssl://smtp.gmail.com', //servidor smtp con encriptacion ssl
	      'port' => 465, //puerto de conexion
	      //'tls' => true, //true en caso de usar encriptacion tls
	      
	      //cuenta de correo gmail completa desde donde enviaran el correo
	      'username' => 'jessicadaniela824@gmail.com', 
	      'password' => 'queteimporta1!', //contrasena
	      
	      //Establecemos que vamos a utilizar el envio de correo por smtp
	      'className' => 'Smtp', 
	      
	      //evitar verificacion de certificado ssl ---IMPORTANTE---
	      /*'context' => [
	        'ssl' => [
	          'verify_peer' => false,
	          'verify_peer_name' => false,
	          'allow_self_signed' => true
	        ]
	      ]*/
	    ]); 
	    /*fin configuracion de smtp*/
	    
	    
	    /*enviando el correo*/
	    $correo = new Email(); //instancia de correo
	    $correo
	      ->transport('mail') //nombre del configTrasnport que acabamos de configurar
	      ->template('correo_plantilla') //plantilla a utilizar
	      ->emailFormat('html') //formato de correo
	      ->to('jessicadaniela824@gmail.com') //correo para
	      ->from('jessicadaniela824@gmail.com') //correo de
	      ->subject($asunto) //asunto
	      ->viewVars([ //enviar variables a la plantilla
	        'var1' => '-----------------------',
	        'var2' => $err,
	        'var3' => '-----------------------'
	      ]);
	    
	        if($correo->send()){
	          echo "Correo enviado";
	        }else{
	          echo "Ups error man";
	        }    
	    }
}