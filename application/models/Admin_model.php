<?php  
/**
 * 
 */
class Admin_model extends CI_Model
{
	
	public function ambil_data($table,$filed_order,$order)
	{
		return $this->db->order_by($filed_order, $order)->get($table)->result_array();
	}

	public function tambah_data($table,$data)
	{
		return $this->db->insert($table, $data);
	}

	public function ambil_data_by_id($table,$field,$id)
	{
		return $this->db->get_where($table, array($field => $id))->row_array();
	}

	public function ambil_data_by_id_result($table,$field,$id)
	{
		return $this->db->get_where($table, array($field => $id))->result_array();
	}

	public function update_data($table,$field,$params,$data)
	{
		$this->db->where($field, $params);
		return $this->db->update($table, $data);
	}

	public function hapus_data($table,$field,$id)
	{
		return $this->db->delete($table, array($field => $id));
	}

	public function join_dua_table($table1,$table2,$params1,$field)
    {
        return $this->db->order_by($field, 'DESC')->join($table2,$params1)->get($table1)->result_array();
    }
}
?>