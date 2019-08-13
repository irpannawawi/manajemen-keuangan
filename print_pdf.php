<?php 
require 'fpdf/fpdf.php';
session_start();

class printPdf extends FPDF
{
	
	function header()
	{
		// Select Arial bold 15
	    $this->SetFont('Arial','B',15);
	    // Move to the right
	    $this->Cell(80);
	    // Framed title
	    $this->Cell(30,10,'Laporan Keuangan',0,0,'C');
	    // Line break
	    $this->Ln(20);
	}

	function headerTable()
	{
		$this->SetFont('Arial','B',15);
		$this->SetFillColor(140,140,140);
		$this->Cell(20,10,"No",1,0,'C',true);
		$this->Cell(60,10,"Keterangan",1,0,'C',true);
		$this->Cell(40,10,"Uang Masuk",1,0,'C',true);
		$this->Cell(40,10,"Uang Keluar",1,0,'C',true);
		$this->Cell(30,10,"Tanggal",1,0,'C',true);
		$this->Ln();
	}

	function contentTable()
	{
		$this->SetFont('Arial','',12);
		$this->SetFillColor(255,255,255);

		require 'config.php';
		$sql= "SELECT * FROM laporan";
		$res = $conn->query($sql);
		$no =0;
		while($data = $res->fetch_assoc()){
			$no++;
			$this->Cell(20,10,$no,1,0,'C',true);
			$this->Cell(60,10,$data['keterangan'],1,0,'L',true);
			$this->Cell(40,10,"Rp.".number_format($data['masuk'],2,',','.').",-",1,0,'L',true);
			$this->Cell(40,10,"Rp.".number_format($data['keluar'],2,',','.').",-",1,0,'L',true);
			$this->Cell(30,10,$data['tanggal'],1,0,'C',true);
			$this->Ln();
		}

	}

	function rowTotal()
	{
		require 'config.php';
		//uang masuk
		$sql= "SELECT SUM(masuk) As value_sum FROM laporan";
		$res = $conn->query($sql)->fetch_assoc();
		$totalMasuk = $res['value_sum'];
		$this->Cell(80,10,"Total Uang masuk",1,0,"L");
		$this->Cell(110,10,"Rp.".number_format($totalMasuk,2,',','.').",-",1,0,"L");
		$this->Ln();
		//uang keluar
		$sql= "SELECT SUM(keluar) As value_sum FROM laporan";
		$res = $conn->query($sql)->fetch_assoc();
		$totalKeluar = $res['value_sum'];
		$this->Cell(80,10,"Total Uang keluar",1,0,"L");
		$this->Cell(110,10,"Rp.".number_format($totalKeluar,2,',','.').",-",1,0,"L");

		//slado sekarang
		$saldo = $totalMasuk-$totalKeluar;
		$this->Ln();
		$this->Cell(80,10,"Saldo",1,0,"L");
		$this->Cell(110,10,"Rp.".number_format($saldo,2,',','.').",-",1,0,"L");
	}

	function ttd($tempat, $penanggungjawab){
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date("d F Y");
		$tempatTanggal  = $tempat.", ".$tanggal;
		$this->Ln();
		$this->Cell(190,20,$tempatTanggal,0,1,"R");
		$this->Cell(190,20,$penanggungjawab,0,1,"R");
	}
	function footer()
	{
		// Position at 1.5 cm from bottom
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Page number
	    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
	}
}

$pdf = new printPdf();
$pdf->AddPage();
$pdf->headerTable();
$pdf->contentTable();
$pdf->rowTotal();
$pdf->ttd('Jakarta',ucwords($_SESSION['name']));
$pdf->Output();