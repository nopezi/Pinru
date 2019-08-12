<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

    function index(){
        $this->load->view('admin/testing/tes_email');
    }

    public function kirim()
    {
      // Konfigurasi email
        $config = [
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'protocol'  => 'smtp',
               'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'snopezi@gmail.com',    // Ganti dengan email gmail kamu
               'smtp_pass' => 'nopezisaputrapratama',      // Password gmail kamu
               'smtp_port' => 465,
               'crlf'      => "\r\n",
               'newline'   => "\r\n"
           ];

        $email_tujuan = $this->input->post('email_kirim');
        $judul_email  = $this->input->post('judul_email');
        $pesan        = $this->input->post('pesan');
        // Load library email dan konfigurasinya
        $this->load->library('email', $config);
        
        // Email dan nama pengirim
        $this->email->from('no-reply@masrud.com', 'testing');

        // Email penerima
        $this->email->to($email_tujuan); // Ganti dengan email tujuan kamu

        // Lampiran email, isi dengan url/path file
        $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // Subject email
        $this->email->subject($judul_email);

        // Isi email
        $this->email->message($pesan);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            $data['pesan_sukses'] = 'Sukses! email berhasil dikirim.';
            $data['email_tujuan'] = $email_tujuan;
            $data['pesan'] = $pesan;
            $this->load->view('admin/testing/tes_email', $data);
            
        } else {
            echo 'Error! email tidak dapat dikirim. datanya : ' .$email_tujuan.' '.$pesan;
        }
    }

     public function send()
     {
          $config['mailtype'] = 'text';
          $config['protocol'] = 'smtp';
          $config['smtp_host'] = 'smtp.mailtrap.io';
          $config['smtp_user'] = 'b434ada0d0e000';
          $config['smtp_pass'] = '658ad19ee570c9';
          $config['smtp_port'] = 2525;
          $config['newline'] = "\r\n";

          $this->load->library('email', $config);

          $this->email->from('fab1215df7-d2ea9c@inbox.mailtrap.io', 'Sistem Bahasaweb.com');
          $this->email->to('snopezi@gmail.com');
          $this->email->subject('Contoh Kirim Email Dengan Codeigniter');
          $this->email->message('Contoh pesan yang dikirim dengan codeigniter');

          if($this->email->send()) {
               echo 'Email berhasil dikirim';
          }
          else {
               echo 'Email tidak berhasil dikirim';
               echo '<br />';
               echo $this->email->print_debugger();
          }

     }

}