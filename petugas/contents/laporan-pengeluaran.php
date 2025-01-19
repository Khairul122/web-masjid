<?php
if (isset($_POST['cetak'])) {
    require_once("../../library/tcpdf/tcpdf.php");
    $db = mysqli_connect("localhost", "root", "", "db_masjid");

    $tglawal = $_POST['tglawal'];
    $tglakhir = $_POST['tglakhir'];
    $pimpinan = $_POST['pimpinan']; // Nama pimpinan dari input form

    // Fungsi untuk nama bulan dalam bahasa Indonesia
    function namaBulan($tanggal) {
        $bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];
        $tanggalObj = strtotime($tanggal);
        $bulanIndex = date('n', $tanggalObj); // Ambil nomor bulan
        return date('d', $tanggalObj) . ' ' . $bulan[$bulanIndex] . ' ' . date('Y', $tanggalObj);
    }

    // Query untuk mendapatkan data pengeluaran
    $query = "
        SELECT id_pengeluaran, tbl_kategori.nama_kategori, nominal, keterangan, tgl_pengeluaran
        FROM tbl_pengeluaran
        JOIN tbl_kategori USING(id_kategori)
        WHERE tgl_pengeluaran BETWEEN '$tglawal' AND '$tglakhir'
        ORDER BY id_pengeluaran ASC
    ";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
        // Inisialisasi TCPDF untuk kertas A4 landscape
        $pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle('Laporan Data Pengeluaran');
        $pdf->SetMargins(15, 20, 15);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(10);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();

        // Kop Laporan
        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->Cell(0, 10, 'MASJID AL-IKHLAS', 0, 1, 'C');
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 7, 'Alamat: Lrg Karya Bhakti, Kec. Pasar Muara Bungo, Kab. Bungo, Jambi', 0, 1, 'C');
        $pdf->Ln(5);
        $pdf->SetLineWidth(0.5);
        $pdf->Line(15, $pdf->GetY(), 285, $pdf->GetY()); // Garis pembatas (285 untuk A4 landscape)
        $pdf->Ln(8);

        // Judul Laporan
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->Cell(0, 10, 'LAPORAN DATA PENGELUARAN', 0, 1, 'C');
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 7, 'Periode: ' . namaBulan($tglawal) . ' s/d ' . namaBulan($tglakhir), 0, 1, 'C');
        $pdf->Ln(5);

        // Header Tabel
        $pdf->SetFont('helvetica', 'B', 10);
        $pdf->SetFillColor(200, 220, 255);
        $pdf->Cell(10, 8, 'No', 1, 0, 'C', 1);
        $pdf->Cell(40, 8, 'ID Pengeluaran', 1, 0, 'C', 1);
        $pdf->Cell(60, 8, 'Kategori', 1, 0, 'C', 1);
        $pdf->Cell(50, 8, 'Nominal (Rp)', 1, 0, 'C', 1);
        $pdf->Cell(80, 8, 'Keterangan', 1, 0, 'C', 1);
        $pdf->Cell(30, 8, 'Tanggal', 1, 1, 'C', 1);

        // Isi Tabel
        $pdf->SetFont('helvetica', '', 10);
        $no = 1;
        $total = 0;

        while ($row = mysqli_fetch_assoc($result)) {
            $pdf->Cell(10, 8, $no++, 1, 0, 'C');
            $pdf->Cell(40, 8, $row['id_pengeluaran'], 1, 0, 'C');
            $pdf->Cell(60, 8, $row['nama_kategori'], 1, 0, 'C');
            $pdf->Cell(50, 8, number_format($row['nominal'], 0, ',', '.'), 1, 0, 'R');
            $pdf->Cell(80, 8, $row['keterangan'], 1, 0, 'C');
            $pdf->Cell(30, 8, namaBulan($row['tgl_pengeluaran']), 1, 1, 'C');
            $total += $row['nominal'];
        }

        // Total Pengeluaran
        $pdf->SetFont('helvetica', 'B', 10);
        $pdf->Cell(240, 8, 'Total', 1, 0, 'C', 1);
        $pdf->Cell(30, 8, number_format($total, 0, ',', '.'), 1, 1, 'R', 1);

        // Tanda Tangan
        $pdf->Ln(10);
        $pdf->SetX(200); // Posisi tanda tangan di sebelah kanan
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 6, 'Bungo, ' . namaBulan(date('Y-m-d')), 0, 1, 'L');
        $pdf->SetX(200);
        $pdf->Cell(0, 6, 'Mengetahui,', 0, 1, 'L');
        $pdf->Ln(20);
        $pdf->SetX(200);
        $pdf->Cell(0, 6, $pimpinan, 0, 1, 'L');

        // Output PDF
        $pdf->Output('laporan_data_pengeluaran.pdf', 'I');
    } else {
        echo "<script>
            alert('Tidak ada data pada periode yang dipilih.');
            window.location.href = '../index.php?m=contents&p=laporan';
        </script>";
    }
} else {
    echo "Cetak data GAGAL";
}
?>
