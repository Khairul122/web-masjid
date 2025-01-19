<?php
require_once('../../library/tcpdf/tcpdf.php');
include "../functions.php";

if (isset($_POST['cetak'])) {
    $db = dbConnect();
    $data = array();
    $sql = mysqli_query($db, "SELECT id_petugas, nama, no_ktp, alamat, no_hp FROM tbl_petugas"); 
    while ($row = mysqli_fetch_assoc($sql)) {
        array_push($data, $row);
    }

    if (empty($data)) {
        echo "<script>window.alert('Tidak Ada Data!');
              window.location.href=('../index.php?m=contents&p=laporan');
              </script>";
        exit;
    }

    // Nama pimpinan dari form input
    $pimpinan = $_POST['pimpinan'];

    function bulanIndonesia($tanggal) {
        $bulan = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        $pecah = explode('-', $tanggal);
        return $pecah[2] . ' ' . $bulan[(int)$pecah[1]] . ' ' . $pecah[0];
    }

    $judul = "LAPORAN DATA PEGAWAI";
    $masjid = "MASJID BAITURRAHMAN BUNGO";
    $alamat = "Lrg Karya Bhakti, Kec. Pasar Muara Bungo, Kab. Bungo, Jambi";
    $tanggal = bulanIndonesia(date('Y-m-d'));

    $header = array(
        array("label" => "ID", "width" => 15, "align" => "L"),
        array("label" => "Nama", "width" => 50, "align" => "L"),
        array("label" => "No KTP", "width" => 35, "align" => "L"),
        array("label" => "Alamat", "width" => 65, "align" => "L"),
        array("label" => "No HP", "width" => 28, "align" => "L")
    );

    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetTitle('Laporan Data Pegawai');
    $pdf->SetMargins(15, 20, 15);
    $pdf->SetHeaderMargin(10);
    $pdf->SetFooterMargin(10);
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->AddPage();

    // Kop laporan
    $pdf->SetFont('helvetica', 'B', 16);
    $pdf->Cell(0, 10, $masjid, 0, 1, 'C');
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 5, $alamat, 0, 1, 'C');
    $pdf->Ln(5);

    // Garis pembatas
    $pdf->SetLineWidth(0.5);
    $pdf->Line(15, $pdf->GetY(), 195, $pdf->GetY());
    $pdf->Ln(8);

    // Judul laporan
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->Cell(0, 10, $judul, 0, 1, 'C');
    $pdf->Ln(5);

    // Header tabel
    $pdf->SetFont('times', 'B', 10);
    $pdf->SetFillColor(255, 0, 0);
    $pdf->SetTextColor(255);
    foreach ($header as $kolom) {
        $pdf->Cell($kolom['width'], 7, $kolom['label'], 1, 0, $kolom['align'], 1);
    }
    $pdf->Ln();

    // Data tabel
    $pdf->SetFont('times', '', 10);
    $pdf->SetFillColor(224, 235, 255);
    $pdf->SetTextColor(0);
    $fill = 0;
    foreach ($data as $baris) {
        $i = 0;
        foreach ($baris as $cell) {
            $pdf->Cell($header[$i]['width'], 6, $cell, 1, 0, $header[$i]['align'], $fill);
            $i++;
        }
        $fill = !$fill;
        $pdf->Ln();
    }

    // Tanda tangan
    $pdf->Ln(10);
    $pdf->SetX(140); // Posisi di sebelah kanan
    $pdf->SetFont('times', '', 12);
    $pdf->Cell(0, 6, "Bungo, $tanggal", 0, 1, 'L');
    $pdf->SetX(140);
    $pdf->Cell(0, 6, 'Mengetahui,', 0, 1, 'L');
    $pdf->Ln(20);
    $pdf->SetX(140);
    $pdf->Cell(0, 10, $pimpinan, 0, 1, 'L');

    $pdf->Output('laporan_data_pegawai.pdf', 'I');
} else {
    echo "<script>window.alert('Tidak Ada Data!');
          window.location.href=('../index.php?m=contents&p=laporan');
          </script>";
}
?>
