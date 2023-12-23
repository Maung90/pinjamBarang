<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class MPeminjam extends CI_Model 
{

    function sendMail($email,$username,$password){
        $config ['useragent'] = "codeigniter";
        $config ['mailpath'] = "usr/bin/sendmail";
        $config ['protocol'] = "smtp";
        $config ['smtp_host'] = "smtp.gmail.com";
        $config ['smtp_port'] = "465";
        $config ['smtp_user'] = "gedebagussurya4@gmail.com";
        $config ['smtp_pass'] = "bcrv fdmw xznf iicx ";
        $config ['smtp_crypto'] = "ssl";
        $config ['charset'] = "utf-8";
        $config ['mailtype'] = "html";
        $config ['newline'] = "\r\n";
        $config ['smtp_timeout'] = 30;
        $config ['wordwrap'] = TRUE;

        $this->email->initialize($config);
        $this->email->from('no-replay@gedebagussurya4@gmail.com','Surya Wibawa');
        $this->email->to($email);
        $this->email->subject("verifikasi email");
        $this->email->attach('verifikasi');
        $this->email->message
        (
            '<!DOCTYPE html>
            <html lang="en" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
            
            <head>
                <meta charset="utf-8">
                <meta name="x-apple-disable-message-reformatting">
                <meta http-equiv="x-ua-compatible" content="ie=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
                <!--[if mso]>
                <xml><o:officedocumentsettings><o:pixelsperinch>96</o:pixelsperinch></o:officedocumentsettings></xml>
              <![endif]-->
                <title>
                    <!-- Pesan Notif -->
                    <!-- Contoh : Notifikasi Deposit -->
                </title>
                <link
                    href="https://fonts.googleapis.com/css?family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700"
                    rel="stylesheet" media="screen">
                <style>
                    .hover-underline:hover {
                        text-decoration: underline !important;
                    }
            
                    p {
                        font-size: 12px;
                    }
            
                    table {
                        caption-side: bottom;
                        border-collapse: collapse;
                    }
            
                    th {
                        text-align: inherit;
                        text-align: -webkit-match-parent;
                    }
            
                    thead,
                    tbody,
                    tfoot,
                    tr,
                    td,
                    th {
                        border-color: inherit;
                        border-style: solid;
                        border-width: 0;
                        font-size: 12px;
                        font-weight: 500;
                    }
            
                    .table {
                    --bs-table-bg: transparent;
                    --bs-table-accent-bg: transparent;
                    --bs-table-striped-color: #6e6b7b;
                    --bs-table-striped-bg: #fafafc;
                    --bs-table-active-color: #6e6b7b;
                    --bs-table-active-bg: rgba(34, 41, 47, 0.1);
                    --bs-table-hover-color: #6e6b7b;
                    --bs-table-hover-bg: #f6f6f9;
                    width: 100%;
                    margin-bottom: 1rem;
                    color: #6e6b7b;
                    vertical-align: middle;
                    border-color: #ebe9f1;
                    }
                    .table > :not(caption) > * > * {
                    padding: 0.72rem 2rem;
                    background-color: var(--bs-table-bg);
                    border-bottom-width: 1px;
                    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
                    }
                    .table > tbody {
                    vertical-align: inherit;
                    }
                    .table > thead {
                    vertical-align: bottom;
                    }
                    .table > :not(:first-child) {
                    border-top: 2px solid #ebe9f1;
                    }
            
                    .caption-top {
                    caption-side: top;
                    }
            
                    .table-sm > :not(caption) > * > * {
                    padding: 0.3rem 0.5rem;
                    }
            
                    @media (max-width: 600px) {
                        .sm-w-full {
                            width: 100% !important;
                        }
            
                        .sm-px-24 {
                            padding-left: 24px !important;
                            padding-right: 24px !important;
                        }
            
                        .sm-py-32 {
                            padding-top: 12px !important;
                            padding-bottom: 12px !important;
                        }
            
                        .sm-leading-32 {
                            line-height: 12px !important;
                        }
                    }
                </style>
            </head>
            
            <body
                style="margin: 0; width: 100%; padding: 0; word-break: break-word; -webkit-font-smoothing: antialiased; background-color: #eceff1;">
                <div style=" sans-serif; mso-line-height-rule: exactly; display: none;">
                <!-- Pesan Notif -->
                <!-- Contoh : Notifikasi Deposit -->
                </div>
                <div role="article" aria-roledescription="email" aria-label="Notifikasi Deposit" lang="en"
                    style=" sans-serif; mso-line-height-rule: exactly;">
                    <table style="width: 100%; font-family: Montserrat, -apple-system, sans-serif;" cellpadding="0"
                        cellspacing="0" role="presentation">
                        <tr>
                            <td align="center"
                                style="mso-line-height-rule: exactly; background-color: #eceff1; font-family: Montserrat, -apple-system, , sans-serif;">
                                <table class="sm-w-full" style="width: 600px;" cellpadding="0" cellspacing="0" role="presentation">
                                    <tr>
                                        <td class="sm-py-32 sm-px-24"
                                            style="mso-line-height-rule: exactly; padding: 24px; text-align: center; font-family: Montserrat, -apple-system, , sans-serif;">
                                            <a href="<?php echo base_url();?>"
                                                style="mso-line-height-rule: exactly;">
                                                <img src="https://elearning.pnb.ac.id/img/logo-pnb.3aae610b.png"
                                                style="max-width: 54px; vertical-align: middle; line-height:100%; border: 0;">   
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center"
                                            style=" sans-serif; mso-line-height-rule: exactly;">
                                            <table style="width: 100%;" cellpadding="0" cellspacing="0" role="presentation">
                                                <tr>
                                                    <td class="sm-px-24"
                                                        style="mso-line-height-rule: exactly; border-radius: 4px; background-color: #ffffff; padding: 24px; text-align: left; font-family: Montserrat, -apple-system, , sans-serif; font-size: 16px; line-height: 24px; color: #626262;">
                                                        <p
                                                            style=" sans-serif; mso-line-height-rule: exactly; margin-bottom: 0; font-size: 16px; font-weight: 600;">
                                                            Hai,</p>
                                                        <p
                                                            style=" sans-serif; mso-line-height-rule: exactly; margin-top: 0; font-size: 18px; font-weight: 700; color: #0099ff;">
                                                            Peminjam</p>
                                                        <p
                                                            style=" sans-serif; font-size: 12px; mso-line-height-rule: exactly; margin: 0; margin-bottom: 8px;">
                                                            Kami ingin memberitahu Anda bahwa pendaftaran telah berhasil. Akun anda telah didaftarkan sesuai data yang diberikan.
                                                        </p>
                                                        <hr style="border-top:dashed 1px">
                                                        Berikut username :'.$username.'
                                                        <br> 
                                                        Berikut password :'.$password.'
                                                        <hr style="border-top:dashed 1px">
                                                        <p
                                                            style=" sans-serif; font-size: 12px; mso-line-height-rule: exactly; margin: 0; margin-bottom: 8px;">
                                                            Terima kasih atas kepercayaan Anda kepada kami.
                                                        </p>
                                                        <p
                                                            style=" sans-serif; font-size: 12px; mso-line-height-rule: exactly; margin: 0; margin-bottom: 8px;">
                                                            Salam hangat, <br style="text-transform: uppercase;"><b>Admin</b></p>
                                                        <hr style="border-top:dashed 1px">
                                                        <p
                                                            style=" sans-serif; font-size: 12px; mso-line-height-rule: exactly; margin: 0; margin-bottom: 8px;">
                                                            Website : <?php echo base_url();?>
                                                            <br> 
                                                            Email : { Email CS }
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </body>
            
            </html>
            '
        );
        $this->email->send();
    }

    function buatpwd()
    {
        $kata="ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
        $password=substr(str_shuffle($kata),0,6);
        return $password;
    }

    public function get_peminjam($id)
    {
        $this->db->where('no_identitas', $id);
        $data = $this->db->get('tbpeminjam')->result();
        echo json_encode($data);
    }

    public function insert_peminjam()
    {
        $no_identitas = $this->input->post('no_identitas');
        $nama_peminjam = $this->input->post('nama_peminjam');
        $kelas = $this->input->post('kelas');
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('no_telp');
        $password = $this->buatpwd();
        $email = $this->input->post('email');
        
        $data = array(
            'no_identitas' =>$no_identitas,
            'nama_peminjam' =>$nama_peminjam,
            'kelas' =>$kelas,
            'alamat' =>$alamat,
            'no_telp' =>$no_telp,
            'password' =>password_hash($password, PASSWORD_BCRYPT),
            'email' =>$email,
    );
        $data = $this->db->insert('tbpeminjam',$data);
        if($data){
            $this->sendMail($email,$no_identitas,$password);
            $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">
                Data berhasil ditambahkan!
            </div>');
        } else {
            $this->session->set_flashdata('error','<div class="alert alert-danger" role="alert">
                Data gagal ditambahkan!
            </div>');
        }
        redirect('Peminjam');
        
    }

    public function update_peminjam($id)
    {
        $data = $_POST;
        $this->db->where('no_identitas',$id);
		$data = $this->db->update('tbpeminjam', $data);
        if($data){
            $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">
                Data berhasil diupdate!
            </div>');
        } else {
            $this->session->set_flashdata('error','<div class="alert alert-danger" role="alert">
                Data gagal diupdate!
            </div>');
        }
        redirect('Peminjam');
    }

    public function delete_peminjam($id)
    {
        $this->db->where('no_identitas', $id);
        $data = $this->db->delete('tbpeminjam');
        if($data){
            $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">
                Data berhasil didelete!
            </div>');
        } else {
            $this->session->set_flashdata('error','<div class="alert alert-danger" role="alert">
                Data gagal didelete!
            </div>');
        }
        redirect('Peminjam');
    }















    // start datatables
    var $column_order = array(null, 'Ide', 'p_item.name', 'category_name', 'unit_name', 'price', 'stock'); //set column field database for datatable orderable
    var $column_search = array('barcode', 'p_item.name', 'price'); //set column field database for datatable searchable
    var $order = array('item_id' => 'asc'); // default order 
 
    private function _get_datatables_query() {
        $this->db->select('p_item.*, p_category.name as category_name, p_unit.name as unit_name');
        $this->db->from('p_item');
        $this->db->join('p_category', 'p_item.category_id = p_category.category_id');
        $this->db->join('p_unit', 'p_item.unit_id = p_unit.unit_id');
        $i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables() {
        $this->_get_datatables_query();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all() {
        $this->db->from('p_item');
        return $this->db->count_all_results();
    }
    // end datatables



}


/* End of file Model_peminjam_model.php and path \application\models\Model_peminjam_model.php */
