<?php
header('Content-Type: application/json');

require('../../aaconfig.php');
require('../../data.php');
require('../../functions.php');
require('../../functions2.php');

// include('../../mailer.php');
include('../../sms.php');
include('../../engine.php');

require_once('../../tcpdf/tcpdf.php');



$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_creator);
$obj_pdf->setTitle("Export HTML Table data to PDF using TCPDF in PHP");
$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->setDefaultMonospacedFont('helvetica');
$obj_pdf->setFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, 5, PDF_MARGIN_RIGHT);
$obj_pdf->setPrintHeader(false);
$obj_pdf->setPrintFooter(false);
$obj_pdf->SetAutoPageBreak(TRUE, 10);
$obj_pdf->SetFont('helvetica', '', 12);
$obj_pdf->SetFont('helvetica', '', 12);
$obj_pdf->SetFont('helvetica', '', 12);
$obj_pdf->SetFont('helvetica', '', 12);
$obj_pdf->SetFont('helvetica', '', 12);
$obj_pdf->SetFont('helvetica', '', 12);




//============================================================+
// File name   : example_011.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 011 for TCPDF class
//               Colored Table (very simple table)
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Colored Table
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).

// extend TCPF with custom functions
class MYPDF extends TCPDF {

    // Load table data from file
    public function LoadData() {
        // Read file lines

        // $sql = "SELECT * FROM wallet WHERE usertoken='T9I1OJTKV1' ORDER BY timestamp DESC ";
        $sql = "SELECT * FROM wallet WHERE usertoken='T9I1OJTKV1' ORDER BY timestamp DESC ";

        // if ($res = $mysqli->query($sql)) { 
        //     // if ($res->num_rows > 0) {  
        //     //     if ($row = $res->fetch_array()){
        //             return $res;
        //     //     }
        //     // }
        // }

        $query = mysqli_query($mysqli, $sql);
        return $query;
        
    }

    // Colored table
    public function ColoredTable($header,$data) {
        // Colors, line width and bold font
        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(0);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(30, 30, 20, 35, 30, 30, 30, 35);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
        
        foreach($data as $row) {
            $this->Cell($w[0], 6, $row["id"], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row["usertoken"], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $row["type"], 'LR', 0, 'L', $fill);
            $this->Cell($w[3], 6, $row["amount"], 'LR', 0, 'L', $fill);
            $this->Cell($w[4], 6, $row["log"], 'LR', 0, 'L', $fill);
            $this->Cell($w[5], 6, $row["email"], 'LR', 0, 'L', $fill);
            $this->Cell($w[6], 6, $row["fullName"], 'LR', 0, 'L', $fill);
            $this->Cell($w[7], 6, $row["timestamp"], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row[1], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, number_format($row[2]), 'LR', 0, 'R', $fill);
            $this->Cell($w[3], 6, number_format($row[3]), 'LR', 0, 'R', $fill);
            $this->Ln();
            $fill=!$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('HOTELSOFFLINE WALLET HISTORY');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 011', PDF_HEADER_STRING);

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

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->AddPage();

// column titles
$header = array('id', 'usertoken', 'type', 'amount', 'log', 'email', 'fullName', 'timestamp');


// data loading
$data = $pdf->LoadData();

// print colored table
$pdf->ColoredTable($header, $data);

// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('wallet-history.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+







$timestamp = time();

if (isset($_REQUEST['apptoken'])) {

	$apptoken = input_check($_REQUEST['apptoken']);

	if (CheckToken($mysqli, $apptoken)==true) {

		$usertoken = input_check($_REQUEST['usertoken']);

        if (($usertoken=='')) {
            // code...
            $array = [
                'success' => false,
                'message' => "Empty fields"
            ];
            $return = json_encode($array);
            echo "$return";
            exit();
        }else{

            $sql = "SELECT * FROM wallet WHERE usertoken='$usertoken' ORDER BY timestamp DESC ";
            
            if ($res = $mysqli->query($sql)) {
                if ($res->num_rows > 0) {
                    echo "[";
                   
                    $count=0;
                    while ($col = $res->fetch_array()) {
                        $count= ++$count;
                        $rownum= $res->num_rows;
                        $email = GetUserMail($mysqli, $col['usertoken']);
                        $fullName = GetUserName($mysqli, $col['usertoken']);
                        $array=[
                            'id' => "".$col['id']."",
                            'usertoken' => "".$col['usertoken']."",
                            'type' => "".$col['type']."",
                            'amount' => "".$col['amount']."",
                            'log' => "".$col['log']."",
                            'email' => "$email",
                            'fullName' => "$fullName",
                            'timestamp' => "".$col['timestamp']."",
                            'rownum' => "$rownum",
                            'count' => "$count"
                        ];
                        $array=json_encode($array);
                        if ($rownum > $count) {
                            echo "$array,";
                        }else {
                            echo "$array";
                        }
                    }
                    echo "]";
                }else {
                    $array =[
                        'success'=> false,
                        'message'=>"No results"
                    ];
                    $array=json_encode($array);
                    echo "$array";
                    exit;
                }
            } else{
                $array =[
                    'success'=> false,
                    'message'=>"Failed request"
                ];
                $array=json_encode($array);
                echo "$array";
                exit;
            } 
        }

	}else{
		$array = [
			'success' => false,
			'message' => "Unauthorized access..contact support"
		];
		$return = json_encode($array);
		echo "$return";
		exit();
	}
}else{
	$array = [
		'success' => false,
		'message' => "Token not set.."
	];
	$return = json_encode($array);
	echo "$return";
	exit();
}

?>