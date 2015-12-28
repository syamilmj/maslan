<?php
/**
 * @package Hello_Maslan
 * @version 1.6
 */
/*
Plugin Name: Hello Maslan
Plugin URI: http://aquagraphite.com
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up by the most celebrated figure in Malaysian history - Ahmad Maslan.
Author: Syamil MJ
Version: 1.0
Author URI: http://aquagraphite.com
*/

function shit_maslan_says() {
	$shits = <<<EOT
		Dr Asri and Dr Agus don’t understand the GST, just like Dr Mahathir. That is all I can say.
		They say my face is like a pig's shit
		GST only affects the rich
		Tomorrow is not election day
		Jangan kutuk mak saya
		Minyak naik 10 sen, tapi KFC ramai juga orang
		Nak elak GST, siswa masak sendiri
		Saya tak lah bodoh sangat, CGPA 3.85
		Sebenarnya kerajaan tidak naik harga minyak, cuma kurangkan subsidi
		1kg gula boleh buat 100 cawan teh tarik
		Dia kata muka saya macam taik babi
		Saya ada 3 kerja: Ahli Parlimen, Timb Menteri, Ketua Penerangan UMNO.
EOT;

	// Here we split it into lines
	$shits = explode( "\n", $shits );

	// And then randomly choose a line
	return wptexturize( $shits[ mt_rand( 0, count( $shits ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_maslan() {
	$chosen = shit_maslan_says();
	echo "<p id='maslan'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_maslan' );

// We need some CSS to position the paragraph
function maslan_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#maslan {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'maslan_css' );
