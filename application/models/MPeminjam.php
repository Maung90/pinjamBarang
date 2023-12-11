<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class MPeminjam extends CI_Model 
{
    public function get_peminjam($id)
    {
        $this->db->where('no_identitas', $id);
        $data = $this->db->get('tbpeminjam')->result();
        echo json_encode($data);
    }

    public function insert_peminjam()
    {
        $data = $_POST;
        $data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        $data = $this->db->insert('tbpeminjam',$data);
        if($data){
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
