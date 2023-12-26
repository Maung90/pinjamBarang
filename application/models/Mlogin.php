<?php
    class Mlogin extends CI_Model{
        function cekLogin(){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $sql="select * from tbuser where username='".$username."' "; 
            $query=$this->db->query($sql);
                    
            $sql="select * from tbpeminjam where no_identitas='".$username."' ";  
            $querypeminjam=$this->db->query($sql);
            if($query->num_rows()>0){
                $data=$query->row();
                if(password_verify($password,$data->password)){ 
                    if($data->id_role=="1"){
                        $array=array(
                            'no_user'=>$data->no_user,
                            'id_role'=>$data->id_role,
                            'nama_user'=>$data->nama_user,
                        );	
                        $this->session->set_userdata($array);
                        redirect('Master/','refresh');	
                    }elseif($data->id_role=="2"){ 
                            $array=array(
                                'no_user'=>$data->no_user,
                                'id_role'=>$data->id_role,
                                'nama_user'=>$data->nama_user,
                            );	
                            $this->session->set_userdata($array);
                            redirect('Dashboard/','refresh');	    
                    }else{
                            $this->session->set_flashdata('loginfailed','Login gagal...');
                            redirect('Login/','refresh');	
                    }
                }else{
                    $this->session->set_flashdata('loginfailed','Login gagal...');
                    redirect('Login/','refresh');	
                }
            }else if($querypeminjam->num_rows()>0){
                $data=$querypeminjam->row();
                $array=array(
                    'no_identitas'=>$data->no_identitas,
                    'nama_peminjam'=>$data->nama_peminjam,    
                );	
                $this->session->set_userdata($array);	
                $this->session->set_flashdata('pesan','Login berhasil...');
                redirect('/','refresh'); 
            }else{
                echo "Error";
                $this->session->set_flashdata('loginfailed','Login gagal...');
                redirect('Login/','refresh');	
            }
        }  

        public function logout(){
            $this->session->sess_destroy();
            redirect('Login/','refresh');	
        }
    }
?>