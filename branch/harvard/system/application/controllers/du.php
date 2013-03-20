<?php
/**
 * Copyright 2011 University of Denver--Penrose Library--University Records Management Program
 * Author evan.blount@du.edu and fernando.reyes@du.edu
 * 
 * This file is part of Records Authority.
 * 
 * Records Authority is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * Records Authority is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Records Authority.  If not, see <http://www.gnu.org/licenses/>.
 **/

class Du extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->library('iputility');
		$this->load->model('LookUpTablesModel');
	} 
	
		
	/**
    * loads public search form(s)
    *
    * @access public
    * @return void
    */
	public function retentionSchedules() {
		// handles search forms
		if ($this->uri->segment(3) == "recordCategory") {
			$data['recordCategories'] = $this->LookUpTablesModel->getRecordCategories();
	    	$this->template->load('userTemplate', 'public/forms/retentionScheduleRCSearchForm', $data);
		} elseif ($this->uri->segment(3) == "browseByDepartment") {
			$data['divisions'] = $this->LookUpTablesModel->createDivisionDropDown();
	    	$this->template->load('userTemplate', 'public/forms/retentionScheduleDDSearchForm', $data);
	    } else {
	        $this->template->load('userTemplate', 'public/forms/retentionScheduleFTSearchForm');                                                              
	    }
	}

    /**
     * fetches the retentionSchedules favorited by the current user
     *
     * @access public
     * @param Integer user_id
     * @return void
     */
    public function mySchedules() {
        $schedules = array();
        $user_id = $this->ion_auth->user()->row()->id;
        $this->load->model('SearchModel');
        $this->db
            ->select(
               'retentionScheduleID,
                recordCode,
                recordName,
                recordCategory,
                recordDescription,
                keywords,
                retentionPeriod,
                disposition,
                officeOfPrimaryResponsibility,
                approvedByCounselDate'
            )
            ->from('rm_fullTextSearch')
            ->join(
                'rm_users_retentionSchedules',
                'rm_users_retentionSchedules.retentionSchedule_id = rm_fullTextSearch.retentionScheduleID')
            ->where('rm_users_retentionSchedules.user_id', $user_id)
        ;

        $query = $this->db->get();

		foreach ($query->result() as $results) {
            $schedules[] = array(
                'code' => $results->recordCode,
                'category' => $results->recordCategory,
                'name' => $results->recordName,
                'retention_schedule_id' => $results->retentionScheduleID,
                'description' => $this->SearchModel->getDescriptionLength($results->retentionScheduleID, $results->recordDescription),
                'search_terms' => $this->SearchModel->getDescriptionLength($results->retentionScheduleID, $results->keywords),
                'retention_period' => $this->SearchModel->getDescriptionLength($results->retentionScheduleID, $results->retentionPeriod),
                'disposition' => $this->SearchModel->getDescriptionLength($results->retentionScheduleID, $results->disposition),
                'officeOfPrimaryResponsibility' => $results->officeOfPrimaryResponsibility,
                'approvedByCounselDate' => $results->approvedByCounselDate
            );
		 }

		$this->load->view('public/recordTable', array('records' => $schedules));
    }

    /**
     * allows users to add retention schedules to their curated schedule list
     *
     * @access public
     * @return void
     */ 
    public function addToMySchedules() {
        $schedule_id = $_POST['schedule_id'];
        $data = array(
            'user_id' => $this->ion_auth->user()->row()->id,
            'retentionSchedule_id' => $schedule_id
        );
        $this->db->insert('rm_users_retentionSchedules', $data);
    }
	
    /**
     * allows users to remove retention schedules from their curated schedule list
     *
     * @access public
     * @return void
     */ 
    public function removeFromMySchedules() {
        $schedule_id = $_POST['schedule_id'];
        $data = array(
            'user_id' => $this->ion_auth->user()->row()->id,
            'retentionSchedule_id' => $schedule_id
        );

        $this->db->delete('rm_users_retentionSchedules', $data);
    }

	/**
    * allows user to perform a search for retention schedules by record category
    *
    * @access public
    * @return void
    */
	public function searchByRecordCategory() {
		$records = $this->SearchModel->doRecordCategorySearch($_POST); 
		$this->load->view('public/recordTable', array('records' => $records));
	}
			
	/**
    * allows user to perform a search for retention schedules by department
    *
    * @access public
    * @return void
    */
	public function searchByDepartment() {
		$records = $this->SearchModel->doDepartmentSearch($_POST); 
		$this->load->view('public/recordTable', array('records' => $records));
	}
	
	/**
    * allows user to perform a full text search on existing retention schedules
    *
    * @access public
    * @return void
    */
	public function fullTextSearch() {
		$results = $this->SearchModel->doFullTextSearch($_POST);
		$this->load->view('public/recordTable', array('suggestion' => $results['suggestion'], 'records' => $results['records'], 'keyword' => trim(strip_tags($_POST['keyword']))));
	}
	
	/**
    * gets requested retention schedule
    *
    * @access public
    * @param retentionScheduleID
    * @return void
    */
	public function getRetentionSchedule() {
		if ($this->uri->segment(3)) {
			$retentionScheduleID = $this->uri->segment(3);
			$recordResults = $this->RetentionScheduleModel->getRetentionScheduleRecord($retentionScheduleID);
			$this->load->view('retentionScheduleRecord', array('record' => $recordResults)); // displayed via thickBox
		}
	}
}

?>
