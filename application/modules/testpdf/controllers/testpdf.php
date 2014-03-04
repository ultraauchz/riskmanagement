<?php
class testpdf extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
		
	}
	public function pdf()
	{
		$this->load->library('Pdf');

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// Add a page
		$pdf->AddPage();
		$html = "<h1>Test Page</h1>";
		//$html = $this->load->view('index', $data, true);
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->Output('example_001.pdf', 'I');
	}
}
?>