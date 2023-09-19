<?php
class M_asn extends CI_model
{



    protected $table_view = 'asn';
    protected $table = '';
    protected $primary_key = 'id_asn';
    protected $column_order = array('id_asn'); //set column field database for datatable orderable
    protected $column_search = array('nip', 'nama'); //set column field database for datatable searchable 
    // var $order = array('id_kecamatan' => 'asc','id_desa' => 'asc','created' => 'desc'); // default order 
    protected $order = array('id_asn' => 'desc');
    protected $allowedFilter  = [];

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    private function _get_datatables_query()
    {

        $this->db->from($this->table_view);

        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value'], 'both');
                } else {
                    $this->db->or_like($item, $_POST['search']['value'], 'both');
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_data()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);



        if ($this->filter()) {
            $this->db->where($this->filter());
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();

        if ($this->filter()) {
            $this->db->where($this->filter());
        }

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {

        if ($this->filter()) {
            $this->db->where($this->filter());
        }

        $this->db->from($this->table_view);
        return $this->db->count_all_results();
    }


    private function filter()
    {
        $data = array();
        foreach ($this->allowedFilter as $key) {

            if ($this->input->post($key)) {

                $data[$key] = $this->input->post($key);
            }
        }
        return $data;
    }
}