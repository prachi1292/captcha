<?php 
if (!defined('BASEPATH')) { exit('No direct script access allowed');}

class Test extends CI_Controller
{
 public function index(){
	$my_img = imagecreate( 100, 50 );
	$background = imagecolorallocate( $my_img, 0, 0, 0 );
	$text_colour = imagecolorallocate( $my_img, 255, 255, 255 );

	$seed = str_split('abcdefghijklmnopqrstuvwxyz'
	                 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'); // and any other characters
	shuffle($seed); // probably optional since array_is randomized; this may be redundant
	$rand = '';
	foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];

	imagestring( $my_img, 8, 20, 25, $rand, $text_colour );
	imagesetthickness ( $my_img, 10 );
	imageline( $my_img, 30, 45, 165, 45, $line_colour );

	header( "Content-type: image/png" );
	imagepng( $my_img );
	imagecolordeallocate( $text_color );
	imagecolordeallocate( $background );
	imagedestroy( $my_img );
 }
    
}
?>	