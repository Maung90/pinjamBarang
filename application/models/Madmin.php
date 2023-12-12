<?php
    class Madmin extends CI_Model{

        function buatpwd(){
            $kata="ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
            $password=substr(str_shuffle($kata),0,6);
            return $password;
        }

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
            ("Berikut username :".$username.
            "<br> 
            Berikut password :".$password
            );
            $this->email->send();
        }

        function simpanData(){
            $no_user = $this->input->post('no_user');
            $username = $this->input->post('username');
            $password = $this->buatpwd();
            $email = $this->input->post('email');
            $nama_user = $this->input->post('nama_user');
            $no_telp = $this->input->post('no_telp');
            $alamat = $this->input->post('alamat');
            $unit_kerja = $this->input->post('unit_kerja');
            $id_role = 2;

            $data = array(
                'no_user' =>$no_user,
                'username' =>$username,
                'password' =>password_hash($password, PASSWORD_BCRYPT),
                'nama_user' =>$nama_user,
                'email' =>$email,
                'no_telp' =>$no_telp,
                'alamat' =>$alamat,
                'unit_kerja' =>$unit_kerja,
                'id_role' =>$id_role
        );
        $response = $this->db->insert('tbuser',$data);
        if ($response) {
            $this->sendMail($email,$username,$password);
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert"> Data Disimpan </div>');
            redirect('Master/index', 'refresh');
        }else{
            $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert"> Data gagal </div>');
            redirect('Master/index', 'refresh');
        }
    }
        
        public function get_admin($id)
        {
            $this->db->where('no_user', $id);
            $data = $this->db->get('tbuser')->result();
            echo json_encode($data);
        }

        public function update_admin($id)
        {
            $data = $_POST;
            $this->db->where('no_user',$id);
            $data = $this->db->update('tbuser', $data);
            if($data){
                $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">
                    Data berhasil diupdate!
                </div>');
            } else {
                $this->session->set_flashdata('error','<div class="alert alert-danger" role="alert">
                    Data gagal diupdate!
                </div>');
            }
            redirect('Master/index', 'refresh');
        }

        public function delete_admin($id)
        {
            $this->db->where('no_user',$id);
            $data = $this->db->delete('tbuser');
            if($data){
                $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">
                    Data berhasil diupdate!
                </div>');
            } else {
                $this->session->set_flashdata('error','<div class="alert alert-danger" role="alert">
                    Data gagal diupdate!
                </div>');
            }
            redirect('Master/index', 'refresh');
        }
    }

?>