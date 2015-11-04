<?php namespace Dec\Charts;

use App\Http\Controllers\Controller;
use App\User;
use DB;

class ChartsController extends Controller{
    
    public function __construct() {
        
    }
        
    public function index(){
        return view('dec/charts/linear');
    }
    
    public function getDataChart()
    {
        $array['cols'][] = array('id'=> 'A', 'label'=>'Column1','type' => 'string');
        $array['cols'][] = array('id'=> 'B', 'label'=>'Column2','type' => 'number');
        $array['cols'][] = array('id'=> 'C', 'label'=>'Column3','type' => 'number');
        
        $array['rows'][] = array('c' => array( array('v'=>'a'), array('v'=>22), array('v'=>22)) );
        $array['rows'][] = array('c' => array( array('v'=>'b'), array('v'=>22), array('v'=>22)) );
        $array['rows'][] = array('c' => array( array('v'=>'c'), array('v'=>22), array('v'=>22)) );
        return $array;
    }
    
    public function getDataChart()
    {
        $result = DB::select('select day ,sum(email) from report_daily group by day order by day');
        return $result;
    }
}
