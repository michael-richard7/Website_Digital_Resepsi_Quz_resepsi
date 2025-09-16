<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
   public function __construct(){

      parent::__construct();
      $this->load->model('M_Laporan');
      $this->load->model('M_user');
      $this->load->library('form_validation');
      $this->load->library('tcpdf');

  }

  public function view(){
    $data['judul'] = 'Cetak Laporan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $value = $data['user'];
    $data['user_use'] = $this->M_user->get_user($value);
    $data['user_menu'] = $this->M_user->getAll_usermenu();
    $data['daftar_tamu'] = $this->M_Laporan->get_daftar_data();
    $data['keterangan'] = $this->M_Laporan->get_keterangan();

    $this->load->view('template/admin_header', $data);
    $this->load->view('template/admin_sidebar', $data);
    $this->load->view('template/desain',$data);
    $this->load->view('Laporan/view', $data);
  }

  public function exportToExcel() {

    require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
    require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

    // Ambil data dari model atau sumber data lainnya
    $data['daftar_tamu'] = $this->M_Laporan->get_daftar_data();
    $data['keterangan'] = $this->M_Laporan->get_keterangan();
    $data['acara'] = $this->M_Laporan->get_acara();

    // Inisialisasi objek PHPExcel
    $objPHPExcel = new PHPExcel();

    // Set properti dokumen Excel
    $objPHPExcel->getProperties()->setCreator('Quz Resepsi');
    $objPHPExcel->getProperties()->setLastModifiedBy('Quz Resepsi Modif');
    $objPHPExcel->getProperties()->setTitle('Data Kehadiran');
    $objPHPExcel->getProperties()->setSubject('');
    $objPHPExcel->getProperties()->setDescription('');

    // Buat lembar kerja baru
    $objPHPExcel->setActiveSheetIndex(0);
    
    //isi persheet type
    $sheet = $objPHPExcel->getActiveSheet();
    $sheet_judul = $objPHPExcel->getActiveSheet();
    $sheet_logo = $objPHPExcel->getActiveSheet();
    $sheet_date = $objPHPExcel->getActiveSheet();
    $sheet_acara = $objPHPExcel->getActiveSheet();
    $sheet_border = $objPHPExcel->getActiveSheet();

    $sheet_logo->mergeCells('A1:B3');
    $sheet_judul->mergeCells('C1:E1');
    $sheet_date->mergeCells('C2:E2');
    $sheet_acara->mergeCells('C3:E3');

    // Desain Untuk Judul
    $style1 = $sheet_judul->getStyle('C1');
    $alignment = $style1->getAlignment();
    $style1->getFont()->setSize(15);
    $alignment->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $alignment->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
   
    // Desain Untuk Tanggal
    $style2 = $sheet_date->getStyle('C2');
    $alignment = $style2->getAlignment();
    $style2->getFont()->setSize(15);
    $alignment->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $alignment->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    
    //Desain Untuk Acara
    $style3 = $sheet_date->getStyle('C3');
    $alignment = $style3->getAlignment();
    $style3->getFont()->setSize(15);
    $alignment->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $alignment->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);


    // Set judul kolom
    $sheet->getStyle('C1')->getFont()->setSize(14); // Ukuran teks judul kolom
    $sheet->getStyle('C2')->getFont()->setSize(14); // Ukuran teks judul kolom
    $sheet->getStyle('C3')->getFont()->setSize(14); // Ukuran teks judul kolom
    $sheet->getStyle('A4:E4')->getFont()->setSize(14)->setBold(true); // Teks judul kolom menjadi tebal

    //Atur Zona Waktu 
    $timeZone = new DateTimeZone('Asia/Jakarta');

    $dateTime = new DateTime('now', $timeZone);

    $tanggal = $dateTime->format('d-m-Y | H:i:s');

    // Set judul kolom
    $sheet->setCellValue('C1', 'Laporan Kehadiran Tamu');
    $sheet->setCellValue('C2', 'Tanggal : '.$tanggal);
    foreach ($data['acara'] as $a){
    $sheet->setCellValue('C3', 'Acara Resepsi : '.$a['nama_resepsi']);
    }
    $sheet->setCellValue('A4', '#');
    $sheet->setCellValue('B4', 'Nama Tamu');
    $sheet->setCellValue('C4', 'Nama Meja');
    $sheet->setCellValue('D4', 'Waktu Kehadiran');
    $sheet->setCellValue('E4', 'Keterangan');
    
    //Logo
    $imagePath = 'front-end/images/logo.png'; // Jalur absolut ke gambar
    $drawing = new PHPExcel_Worksheet_Drawing();
    $drawing->setName('Image');
    $drawing->setDescription('Image');
    $drawing->setPath($imagePath);
    $drawing->setCoordinates('B1'); // Koordinat sel tempat gambar akan ditempatkan
    $drawing->setWorksheet($sheet);

    //border
    
  

    // Mengatur ukuran gambar
    $drawing->setOffsetX(10);
    $drawing->setOffsetY(2);
    $drawing->setWidth(65); // Lebar gambar dalam piksel
    $drawing->setHeight(65); // Tinggi gambar dalam piksel

    // Isi data ke dalam tabel
    $nomer = 1;
        $row = 5;
        $ukuranTeks = 14;
        // Loop through the data and set cell values
        foreach ($data['daftar_tamu'] as $dt) {
            foreach ($data['keterangan'] as $k) {

              $waktu_fix = '';
              if ($k['waktu'] == '0000-00-00 00:00:00') {
                  $waktu_fix = '0000-00-00 00:00:00';
              } else {
                  $waktu_fix = date('d-m-Y H:i:s', strtotime($k['waktu']));
              }

                if ($dt['id_tamu'] == $k['id_tamu']) {
                    $sheet->setCellValue('A' . $row, $nomer);
                    $sheet->setCellValue('B' . $row, $dt['nama_tamu']);
                    $sheet->setCellValue('C' . $row, $dt['nama_meja']);
                    $sheet->setCellValue('D' . $row, $waktu_fix);
                    $sheet->setCellValue('E' . $row, $k['keterangan']);
                    
                    // Atur ukuran teks pada setiap sel
                    $sheet->getStyle('A' . $row)->getFont()->setSize($ukuranTeks);
                    $sheet->getStyle('B' . $row)->getFont()->setSize($ukuranTeks);
                    $sheet->getStyle('C' . $row)->getFont()->setSize($ukuranTeks);
                    $sheet->getStyle('D' . $row)->getFont()->setSize($ukuranTeks);
                    $sheet->getStyle('E' . $row)->getFont()->setSize($ukuranTeks);

                    $nomer++;
                    $row++;
                }
            }
        }

        // Set the border style for the range of cells
       
            $styleArray = array(
                'borders' => array(
                  'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                  )
                )
              );
              
              $objPHPExcel->getActiveSheet()->getStyle('A4:E'.($row - 1))->applyFromArray($styleArray);
              unset($styleArray);
            
              $styleArray1 = array(
                'borders' => array(
                  'outline' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                  )
                )
              );
              
              $objPHPExcel->getActiveSheet()->getStyle('A1:E3')->applyFromArray($styleArray1);
              unset($styleArray1);

    // Mengatur lebar kolom secara otomatis
    foreach(range('A', 'E') as $columnID) {
        $sheet->getColumnDimension($columnID)->setAutoSize(true);
    }

    $filename="Data Kehadiran ".date("d-m-Y-H-i-s").'.xlsx';

    // Menyiapkan header response untuk file Excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$filename.'"');
    header('Cache-Control: max-age=0');

    // Simpan file Excel ke output
    $Writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $Writer->save('php://output');
    exit;
    //Kembali Keawal
    $data['judul'] = 'Cetak Laporan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $value = $data['user'];
    $data['user_use'] = $this->M_user->get_user($value);
    $data['user_menu'] = $this->M_user->getAll_usermenu();
    $data['daftar_tamu'] = $this->M_Laporan->get_daftar_data();
    $data['keterangan'] = $this->M_Laporan->get_keterangan();

    $this->load->view('template/admin_header', $data);
    $this->load->view('template/admin_sidebar', $data);
    $this->load->view('template/desain',$data);
    $this->load->view('Laporan/view', $data);
}



    public function exportToPDF(){
    $data['daftar_tamu'] = $this->M_Laporan->get_daftar_data();
    $data['keterangan'] = $this->M_Laporan->get_keterangan();
    $data['acara'] = $this->M_Laporan->get_acara();
 

     // Load library TCPDF
    $this->load->library('tcpdf');

    // Inisialisasi objek TCPDF
    $pdf = new TCPDF();
    $pdf->SetAutoPageBreak(true, 10);
    // Set properti dokumen PDF
    $pdf->SetCreator('Your Name');
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Data Tamu');
    $pdf->SetSubject('Data Tamu');
    $pdf->SetKeywords('data tamu');
    $pdf->SetHeaderData('', 0, '', '', array(0,0,0), array(255,255,255));
    $pdf->setHeaderFont(Array('helvetica', 'B', 12));
    $pdf->setFooterFont(Array('helvetica', 'B', 12));
    $pdf->SetDefaultMonospacedFont('courier');
    $pdf->SetMargins(10, 10, 10);
    $pdf->SetAutoPageBreak(TRUE, 10);
    $pdf->setImageScale(1);
    $pdf->SetFont('helvetica', '', 12);

    // Mulai penulisan konten PDF


    $pdf->AddPage();

    $headerX = 10; // Koordinat X untuk posisi kiri area header
    $headerY = 15; // Koordinat Y untuk posisi atas area header
    $headerWidth = 190; // Lebar area header
    $headerHeight = 35; // Tinggi area header

    // Menggambar border (garis tepi) pada area header
    $pdf->SetLineWidth(0.5); // Ketebalan garis

    // Garis atas
    $pdf->Line($headerX, $headerY, $headerX + $headerWidth, $headerY);

    // Garis bawah
    $pdf->Line($headerX, $headerY + $headerHeight, $headerX + $headerWidth, $headerY + $headerHeight);

    $imageFile = 'front-end/images/logo.png'; // Ganti dengan path/lokasi file gambar Anda
    $x = 15; // Koordinat X untuk posisi gambar
    $y = 17; // Koordinat Y untuk posisi gambar
    $width = 30; // Lebar gambar
    $height = 30; // Tinggi gambar
    $pdf->Image($imageFile, $x, $y, $width, $height);
    $pdf->SetXY(175, 10);
    $pdf->writeHTML(date('d M Y'),true,false,true,false,'');
    $pdf->SetXY(100, 20);
    $pdf->SetFont('helvetica', '', 15);
    $pdf->writeHTML('Quz Resepsi',true,false,true,false,'');
    $pdf->SetFont('helvetica', '', 12);
    $pdf->SetXY(70, 30);
    $pdf->writeHTML('Email : quzresepsi.com, Website : www.quzresepsi.com',true,false,true,false,'');

    $pdf->SetXY(140, 55);
    foreach ($data['acara'] as $a){
    $pdf->writeHTML('Acara Resepsi : '.$a['nama_resepsi'], true, false, true, false, '');
    }
    $pdf->SetXY(10, 65);
    // Set judul kolom
    $pdf->Cell(20, 10, '#', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Nama Tamu', 1, 0, 'C');
    $pdf->Cell(50, 10, 'Nama Meja', 1, 0, 'C');
    $pdf->Cell(55, 10, 'Waktu Kehadiran', 1, 0, 'C');
    $pdf->Cell(34, 10, 'Keterangan', 1, 1, 'C');

    // Isi data ke dalam tabel
    $nomer = 1;

    foreach ($data['daftar_tamu'] as $dt) {
        foreach ($data['keterangan'] as $k) {

          $waktu_fix = '';
          if ($k['waktu'] == '0000-00-00 00:00:00') {
              $waktu_fix = '0000-00-00 00:00:00';
          } else {
              $waktu_fix = date('d-m-Y H:i:s', strtotime($k['waktu']));
          }


            if ($dt['id_tamu'] == $k['id_tamu']) {
                $pdf->Cell(20, 10, $nomer, 1, 0, 'C');
                $pdf->Cell(30, 10, $dt['nama_tamu'], 1, 0, 'C');
                $pdf->Cell(50, 10, $dt['nama_meja'], 1, 0, 'C');
                $pdf->Cell(55, 10, $waktu_fix, 1, 0, 'C');
                $pdf->Cell(34, 10, $k['keterangan'], 1, 1, 'C');
                $nomer++;
            }
        }
    }

    //penentuan zona waktu
    $timeZone = new DateTimeZone('Asia/Jakarta');

    $dateTime = new DateTime('now', $timeZone);

    $formattedDateTime = $dateTime->format('d-M-Y_H-i-s');

    $fileName = 'data_kehadiran_tamu_' . $formattedDateTime . '.pdf';

    // Output file PDF ke browser
    $pdf->Output($fileName, 'D');


    }

}
?>