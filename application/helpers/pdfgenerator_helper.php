<?php 
function generate_pdf($object, $namafile='', $uk, $layout, $direct_download=TRUE)
{
	require_once(FCPATH . "assets/dompdf/autoload.inc.php");

	$dompdf = new Dompdf\Dompdf();
	$dompdf->set_option("isPhpEnabled", true);
	$dompdf->setPaper('letter', $layout);
	$object = preg_replace('/>\s+</', "><", $object);
	$dompdf->load_html($object);
	$dompdf->render();
	
	if($direct_download==TRUE)
		$dompdf->stream($namafile,array("Attachment"=>0));
	else
		return $dompdf->output();
}