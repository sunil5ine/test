<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class m_questionnaire extends CI_Model {

    public function verble()
    {
        $data[] = $this->v_of();
        $data[] = $this->v_ft();
        $data[] = $this->v_eto();
        $data[] = $this->v_totf();
        $data[] = $this->v_tstf();
        $data[] = $this->v_teotf();
        foreach ($data as $key => $value) {
            foreach ($value as $key1 => $value1) {
                $result[$key] = $value1;
            }
        }
        return $result;    
    }

    // 1- 5
    public function v_ft()
    {
        $this->db->select('tq_id, tq_uid, tq_qsets, tq_type, tq_quetion,tq_qimg');
        $this->db->order_by('tq_id', 'RANDOM');
        $this->db->where('tq_id >=', 1);
        $this->db->where('tq_id <=', 5);
        return $this->db->get('ch_test_quetion', 1)->result();
    }
    // 6- 10
    public function v_of()
    {
        $this->db->select('tq_id, tq_uid, tq_qsets, tq_type, tq_quetion,tq_qimg');
        $this->db->order_by('tq_id', 'RANDOM');
        $this->db->where('tq_id >=', 1);
        $this->db->where('tq_id <=', 5);
        return $this->db->get('ch_test_quetion', 1)->result();
    }
    // 11- 20
    public function v_eto()
    {
        $this->db->select('tq_id, tq_uid, tq_qsets, tq_type, tq_quetion,tq_qimg');
        $this->db->order_by('tq_id', 'RANDOM');
        $this->db->where('tq_id >=', 11);
        $this->db->where('tq_id <=', 20);
        return $this->db->get('ch_test_quetion', 1)->result();
    }
    // 21- 25
    public function v_totf()
    {
        $this->db->select('tq_id, tq_uid, tq_qsets, tq_type, tq_quetion,tq_qimg');
        $this->db->order_by('tq_id', 'RANDOM');
        $this->db->where('tq_id >=', 21);
        $this->db->where('tq_id <=', 25);
        return $this->db->get('ch_test_quetion', 1)->result();
    }
    // 26- 30
    public function v_tstf()
    {
        $this->db->select('tq_id, tq_uid, tq_qsets, tq_type, tq_quetion,tq_qimg');
        $this->db->order_by('tq_id', 'RANDOM');
        $this->db->where('tq_id >=', 26);
        $this->db->where('tq_id <=', 30);
        return $this->db->get('ch_test_quetion', 1)->result();
    }
     // 31- 35
     public function v_teotf()
    {
        $this->db->select('tq_id, tq_uid, tq_qsets, tq_type, tq_quetion,tq_qimg');
        $this->db->order_by('tq_id', 'RANDOM');
        $this->db->where('tq_id >=', 31);
        $this->db->where('tq_id <=', 35);
        return $this->db->get('ch_test_quetion', 1)->result();
    }

    /** get qition answer */
    public function getansw($id)
    {
        $this->db->where('tq_uid', $id);
        $this->db->order_by('to_id', 'asc');
        return $this->db->get('ch_test_options')->result();
    }


    // logical quetions
    public function logical()
    {
        $data[] = $this->lottw();
        $data[] = $this->totts();
        $data[] = $this->lsttr();
        $data[] = $this->trotf();
        $data[] = $this->fots();
        $data[] = $this->sotse();
        $data[] = $this->seotsef();
        foreach ($data as $key => $value) {
            foreach ($value as $key1 => $value1) {
                $result[$key] = $value1;
            }
        }
        return $result; 
    }
    // 1-20
    public function lottw()
    {
        $this->db->select('tq_id, tq_uid, tq_qsets, tq_type, tq_quetion,tq_qimg');
        $this->db->order_by('tq_id', 'RANDOM');
        $this->db->where('tq_id >=', 36);
        $this->db->where('tq_id <=', 55);
        return $this->db->get('ch_test_quetion', 1)->result();
    }
    // 21-26
    public function totts()
    {
        $this->db->select('tq_id, tq_uid, tq_qsets, tq_type, tq_quetion,tq_qimg');
        $this->db->order_by('tq_id', 'RANDOM');
        $this->db->where('tq_id >=', 56);
        $this->db->where('tq_id <=', 61);
        return $this->db->get('ch_test_quetion', 1)->result();
    }
    // 27-30
    public function lsttr()
    {
        $this->db->select('tq_id, tq_uid, tq_qsets, tq_type, tq_quetion,tq_qimg');
        $this->db->order_by('tq_id', 'RANDOM');
        $this->db->where('tq_id >=', 62);
        $this->db->where('tq_id <=', 65);
        return $this->db->get('ch_test_quetion', 1)->result();
    }
    // 31-50
    public function trotf()
    {
        $this->db->select('tq_id, tq_uid, tq_qsets, tq_type, tq_quetion,tq_qimg');
        $this->db->order_by('tq_id', 'RANDOM');
        $this->db->where('tq_id >=', 66);
        $this->db->where('tq_id <=', 85);
        return $this->db->get('ch_test_quetion', 1)->result();
    }
    // 51-60
    public function fots()
    {
        $this->db->select('tq_id, tq_uid, tq_qsets, tq_type, tq_quetion,tq_qimg');
        $this->db->order_by('tq_id', 'RANDOM');
        $this->db->where('tq_id >=', 86);
        $this->db->where('tq_id <=', 95);
        return $this->db->get('ch_test_quetion', 1)->result();
    }
    // 61-70
    public function sotse()
    {
        $this->db->select('tq_id, tq_uid, tq_qsets, tq_type, tq_quetion,tq_qimg');
        $this->db->order_by('tq_id', 'RANDOM');
        $this->db->where('tq_id >=', 96);
        $this->db->where('tq_id <=', 105);
        return $this->db->get('ch_test_quetion', 1)->result();
    }
    // 71-74
    public function seotsef()
    {
        $this->db->select('tq_id, tq_uid, tq_qsets, tq_type, tq_quetion,tq_qimg');
        $this->db->order_by('tq_id', 'RANDOM');
        $this->db->where('tq_id >=', 106);
        $this->db->where('tq_id <=', 109);
        return $this->db->get('ch_test_quetion', 1)->result();
    }


    // numericat test 
    public function numerical()
    {
        $count = 0;
        $data[] = $this->nuconetote();
        $data[] = $this->nuctntostoe();

        foreach ($data as $key => $value) {
            foreach ($value as $key1 => $value1) {
                $result[$count] = $value1;
                $count += 1;
            }
        }
        return $result;
    }

    // 1 - 28
    public function nuconetote()
    {
        $this->db->select('tq_id, tq_uid, tq_qsets, tq_type, tq_quetion,tq_qimg');
        $this->db->order_by('tq_id', 'RANDOM');
        $this->db->where('tq_id >=', 110);
        $this->db->where('tq_id <=', 137);
        $this->db->limit(3);
        return $this->db->get('ch_test_quetion')->result();
    }

    // 29-63
    public function nuctntostoe()
    {
        $this->db->select('tq_id, tq_uid, tq_qsets, tq_type, tq_quetion,tq_qimg');
        $this->db->order_by('tq_id', 'RANDOM');
        $this->db->where('tq_id >=', 138);
        $this->db->where('tq_id <=', 172);
        $this->db->limit(4);
        return $this->db->get('ch_test_quetion')->result();
    }

    // resability
    public function resability()
    {
        $this->db->select('tq_id, tq_uid, tq_qsets, tq_type, tq_quetion,tq_qimg');
        $this->db->order_by('tq_id', 'RANDOM');
        $this->db->where('tq_id >=', 173);
        $this->db->where('tq_id <=', 187);
        $this->db->limit(5);
        return $this->db->get('ch_test_quetion')->result();
    }

    //Answer check
    public function countanw($input)
    {
        $mark = 0;
        $wrng = 0;
        foreach ($input as $key => $value) {
            if(!empty($value))
            {
                $this->db->where('tq_uid', $key);
                $this->db->where('tq_answer', $value);
                $query = $this->db->get('ch_test_quetion');
                if($query->num_rows() > 0) {
                        $mark += 1;
                }else{
                        $wrng += 1;
                }
            }    
        }
        return $mark;
    }

    // insert 
    public function resultinsert($mark)
    {
        $id = $this->session->userdata('cand_chid');
        $this->db->insert('test_result', array('can_id' => $id, 'tr_marks' => $mark));
    }

    // get candidate
    public function getcan()
    {
        $id = $this->session->userdata('cand_chid');
        $this->db->where('can_id', $id);
        $query = $this->db->get('test_result');
        if($query->num_rows() > 0){
            return true;
        }else{
            return False;
        }   
    }

    // get user detail

}

/* End of file M_questionnaire.php */
