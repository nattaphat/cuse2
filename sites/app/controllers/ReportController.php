<?php
use Maatwebsite\Excel\Facades\Excel as Excel;

class ReportController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public $result_log_report;

	public function getReport()
	{
		// $purp = new Purpose();
		// $per_page = Config::get('nhc/site.perpage') ;
		// $purpose = $purp->getAllPurpose($per_page);
        $allDataName = Data::all(array('id','data_name'))->toArray();
        foreach ($allDataName as $key => $value) {
        	$arr_data[$key]['id']= 'data_'.$value['id'];
        	$arr_data[$key]['name']= $value['data_name'];
		}
        $allRoleName = Roles::all(array('id','role_name'))->toArray();
        foreach ($allRoleName as $key => $value) {
        	$arr_role[$key]['id']= 'role_'.$value['id'];
        	$arr_role[$key]['name']= $value['role_name'];
		}

        $supportData = array_merge($arr_role,$arr_data);

        return View::make('report.report')
        				->with('listbox',$supportData);//->with('paginator',$purpose);
	}

	/**
	 * [getSearchReport description]
	 * @param  [type] $type    [description]
	 * @param  [type] $startdt [description]
	 * @param  [type] $enddt   [description]
	 * @return [type]          [description]
	 */
	public function getSearchReport($type,$startdt,$enddt)
	{
		$per_page = Config::get('nhc/site.ole_perpage');
		$logs = new Logs();
		$rs = $logs->getReport($type,$startdt,$enddt,$per_page);
		$this->result_log_report = $rs;
		return View::make('report.search')->with('paginator',$rs);
	}

	public function logsReport($type,$startdt,$enddt){
		$per_page = Config::get('nhc/site.ole_perpage');
		$logs = new Logs();
		$rs = $logs->getReportExport($type,$startdt,$enddt);
		$this->result_log_report = $rs;
		// return View::make('report.search')->with('paginator',$this->result_log_report);
		// var_dump($this->result_log_report);
		Excel::create('New file', function($excel){
		    $excel->sheet('New sheet', function($sheet) {
		        $sheet->loadView('report.search_export')->with('paginator',$this->result_log_report);
		    });
		})->download('csv');
	}

}