<?php
    class Mlogin extends CI_Model{
        function cekLogin(){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
                $sql="select * from tbuser where username='".$username."' ";
                $sql.="and password='".$password."'";
                $query=$this->db->query($sql);
                        
                $sql="select * from tbpeminjam where no_identitas='".$username."' ";
                $sql.="and password='".$password."'";
                $querypeminjam=$this->db->query($sql);


                    if($query->num_rows()>0){

                        $data=$query->row();    
                        if($data->id_role=="1"){
                            echo "admin";

                            $array=array(
                                'no_user'=>$data->no_user,
                                'id_role'=>$data->id_role
                            );	
                            $this->session->set_userdata($array);	
                        }

                        elseif($data->id_role=="2"){
                            echo "master";

                                $array=array(
                                    'no_user'=>$data->no_user,
                                    'id_role'=>$data->id_role
                                );	
                                $this->session->set_userdata($array);	    
                        }

                        else{
                                $this->session->set_flashdata('loginfailed','Login gagal...');
                                redirect('Login/tampil','refresh');	
                        }

                    }	
                    else if($querypeminjam->num_rows()>0){
                        $data=$querypeminjam->row();
                        $array=array(
                            'no_identitas'=>$data->no_identitas,    
                        );	
                        $this->session->set_userdata($array);	
                        $this->session->set_flashdata('pesan','Login berhasil...');
                        redirect('peminjam/index','refresh');		
                        echo "peminjam";
                    }

                    else{
                        $this->session->set_flashdata('loginfailed','Login gagal...');
                        redirect('Login/tampil','refresh');	
                    }
        }  
    }
?>