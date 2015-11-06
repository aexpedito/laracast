<?php namespace Dec\Charts;

use App\Http\Controllers\Controller;
use App\User;
use DB;
use Illuminate\Support\Facades\Request;

class ChartsController extends Controller{
    
    public function __construct() {
        
    }
        
    public function index(){
        return view('dec/charts/linear');
    }
    
    public function getDataEmailChart(){
        $array['cols'][] = array('id'=> '1', 'label'=>'label1','type' => 'string');
        $array['cols'][] = array('id'=> '2', 'label'=>'label2','type' => 'number');
        
        $results = DB::select('select day ,sum(email) as total from report_daily group by day order by day');
       
        foreach ($results as $line){
             //dd($line);
            $array['rows'][] = array('c' => array( array('v'=>$line->day), array('v'=> $line->total)) );
        }
        return $array;
    }
    
    public function getDataEmailChartColumn(){
        $array['cols'][] = array('id'=> '1', 'label'=>'Dia','type' => 'string');
        $array['cols'][] = array('id'=> '2', 'label'=>'Total Open', 'type'=>'number');
        
        $results = DB::select('select day, sum(open) as total_open from report_daily group by day order by day');
        
        foreach ($results as $line){
            $array['rows'][] = array('c' => array(array('v'=>$line->day), array('v'=>$line->total_open)) );
        }
        return $array;
    }
    
    public function getDataEmailChartColumn2(){
        $array['cols'][] = array('id'=> 'A', 'label'=>'Year','type' => 'string');
        $array['cols'][] = array('id'=> 'B', 'label'=>'Sales','type' => 'number');
        $array['cols'][] = array('id'=> 'C', 'label'=>'Expenses','type' => 'number');
        $array['cols'][] = array('id'=> 'D', 'label'=>'Profit','type' => 'number');
        
        $array['rows'][] = array('c' => array( array('v'=>'2014'), array('v'=>1000), array('v'=>400), array('v'=>200)) );
        $array['rows'][] = array('c' => array( array('v'=>'2014'), array('v'=>1170), array('v'=>460), array('v'=>250)) );
        $array['rows'][] = array('c' => array( array('v'=>'2014'), array('v'=>660), array('v'=>1120), array('v'=>250)) );
        $array['rows'][] = array('c' => array( array('v'=>'2014'), array('v'=>1170), array('v'=>460), array('v'=>250)) );
        
        return $array;
    }
    
    public function getDataChart2()
    {
        $array['cols'][] = array('id'=> 'A', 'label'=>'Column1','type' => 'string');
        $array['cols'][] = array('id'=> 'B', 'label'=>'Column2','type' => 'number');
        $array['cols'][] = array('id'=> 'C', 'label'=>'Column3','type' => 'number');
        
        $array['rows'][] = array('c' => array( array('v'=>'a'), array('v'=>22), array('v'=>22)) );
        $array['rows'][] = array('c' => array( array('v'=>'b'), array('v'=>22), array('v'=>22)) );
        $array['rows'][] = array('c' => array( array('v'=>'c'), array('v'=>22), array('v'=>22)) );
        return $array;
        
        $result = DB::select('select day ,sum(email) from report_daily group by day order by day');
        return $result;
    }
    
    public function getDataChart()
    {
        $array['cols'][] = array('id'=> 'A', 'label'=>'Column1','type' => 'string');
        $array['cols'][] = array('id'=> 'B', 'label'=>'Column2','type' => 'number');
        $array['cols'][] = array('id'=> 'C', 'label'=>'Column3','type' => 'number');
        
        $array['rows'][] = array('c' => array( array('v'=>'a'), array('v'=>22), array('v'=>23)) );
        $array['rows'][] = array('c' => array( array('v'=>'b'), array('v'=>24), array('v'=>25)) );
        $array['rows'][] = array('c' => array( array('v'=>'c'), array('v'=>26), array('v'=>27)) );
        return $array;
    }
}
