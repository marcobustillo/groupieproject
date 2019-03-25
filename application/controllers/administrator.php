<?php
class administrator extends CI_Controller{
	function __construct() { 
		parent::__construct(); 
		$this->load->library('Pdf');
		$this->load->model('administratormodel');
	} 
		
    public function sendEmail(){
    	$config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'azurecomplexity21@gmail.com',
		    'smtp_pass' => 'marcopolo112',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1'
		);
		$email = $this->input->post('ajaxResult');
		$data = array(
			'email'=>$email
			);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->email->from('azurecomplexity21@gmail.com', 'Your Name');
		//$this->email->to('inosantobenedict@yahoo.com');
		//$this->email->cc('another@another-example.com');
		$this->email->bcc($data['email']);

		$this->email->subject('Tracer Study for Technological University of the Philippines');
		$this->email->message('HARU HARU FROM THE OTHER SIDE');

		$this->email->send();
		echo $this->email->print_debugger();
    }

    public function generatePDF(){
    	$this->load->library('Pdf');
		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor(PDF_AUTHOR);
			$pdf->SetTitle('Tracer Study');
			$pdf->SetSubject('TCPDF Tutorial');
			$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

			// set default header data
			$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

			// set header and footer fonts
			$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

			// set default monospaced font
			$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

			// set margins
			$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
			$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

			// set auto page breaks
			$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

			// set image scale factor
			$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

			// set some language-dependent strings (optional)
			if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
				require_once(dirname(__FILE__).'/lang/eng.php');
				$pdf->setLanguageArray($l);
			}

			// -------------------------------------------------------------------

			// add a page
			$pdf->AddPage();

			// set JPEG quality
			$pdf->setJPEGQuality(75);

			// Image method signature:
			// Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)

			// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

			// Example of Image from data stream ('PHP rules')
/*			$imgdata = base64_decode('iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABlBMVEUAAAD///+l2Z/dAAAASUlEQVR4XqWQUQoAIAxC2/0vXZDrEX4IJTRkb7lobNUStXsB0jIXIAMSsQnWlsV+wULF4Avk9fLq2r8a5HSE35Q3eO2XP1A1wQkZSgETvDtKdQAAAABJRU5ErkJggg==');
*/
			// The '@' character is used to indicate that follows an image data stream and not an image file nam
			//$pdf->Image('@'.$imgdata);

			// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
			$x = 15;
			$y = 35;
			$w = 30;
			$h = 30;
			// Image example with resizing
			$pdf->Image('assets/images/campus_mall.jpg', $x, $y, $w, $h, 'JPG', '', '', true, 150, '', false, false, 1, false, false, false);

			// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

			// test fitbox with all alignment combinations
			$pdf->Output('tracer.pdf', 'I');

    }

    private function initializeGraph(){
    }

    public function initializeGraduates(){
    	$id = $this->input->post('id');
    	$data = $this->administratormodel->getGraduates($id);
    	echo json_encode($data);
    }
}
?>