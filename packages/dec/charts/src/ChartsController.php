<?php

namespace Dec\Charts;

use App\Http\Controllers\Controller;
use App\User;
use DB;
//use Illuminate\Support\Facades\Request;
use Dec\Charts\ReportDaily;
use Illuminate\Http\Request;
use Carbon\Carbon;
use ;

class ChartsController extends Controller {

    public function __construct() {
        
    }

    public function index() {
        return view('dec/charts/linear');
    }

    public function indexang() {
        return view('dec/charts/column');
    }

//    public function getClients(){
//        $result = ReportDaily::all()->groupBy('client');
//        
//        return $result;
//    }

    public function getClients() {
        $results = DB::select('select client as name from report_daily group by client');
        return $results;
    }

    public function getPartners() {
        $client = $_GET['client'];
        $result = DB::select('select partner as partner_name from report_daily where(client=\'' . $client . '\') group by partner');
        return $result;
    }

    //http://localhost/laracast/public/charts/getchart?client=33&from=98&partner=12&to=23
    //http://localhost/laracast/public/charts/getchart?client=pls&from=2015-10-10&partner=bmc&to=2015-10-20
    //localhost/laracast/public/charts/getchart?from=undefined&to=undefined&client=clr&partner=bmc


    public function getDataEmailChart(Request $request) {
        $input = $request->all();

        $array['cols'][] = array('id' => '1', 'label' => 'label1', 'type' => 'string');
        $array['cols'][] = array('id' => '2', 'label' => 'Email Number', 'type' => 'number');

        $dateFrom = Carbon::today()->subMonth(1)->format('Y-m-d');
        $dateTo = Carbon::today()->format('Y-m-d');

        if (isset($input['from'])) {
            //default -> previous 30 days
            $dateFrom = $input['from'];
        }
        if (isset($input['to'])) {
            //defaul -> today
            $dateTo = $input['to'];
        }

        if (isset($input['client']) and isset($input['partner'])) {
            $client = $input['client'];
            $partner = $input['partner'];

            $result = DB::table('report_daily')
                    ->select(DB::raw('day, sum(email) as total'))
                    ->where('client', '=', $client)
                    ->where('partner', '=', $partner)
                    ->where('day', '>=', $dateFrom)
                    ->where('day', '<=', $dateTo)
                    ->groupBy('day')
                    ->orderBy('day')
                    ->get();
            //build chart rows
            foreach ($result as $line) {
                $array['rows'][] = array('c' => array(array('v' => $line->day), array('v' => $line->total)));
            }

            return $array;
        } else {
            $result = DB::table('report_daily')
                    ->select(DB::raw('day, sum(email) as total'))
                    ->where('day', '>=', $dateFrom)
                    ->where('day', '<=', $dateTo)
                    ->groupBy('day')
                    ->orderBy('day')
                    ->get();
            //build chart rows
            foreach ($result as $line) {
                $array['rows'][] = array('c' => array(array('v' => $line->day), array('v' => $line->total)));
            }
            return $array;
        }
    }

//    public function getDataEmailChart(){
//        $array['cols'][] = array('id'=> '1', 'label'=>'label1','type' => 'string');
//        $array['cols'][] = array('id'=> '2', 'label'=>'label2','type' => 'number');
//        
//        $results = DB::select('select day ,sum(email) as total from report_daily group by day order by day');
//       
//        foreach ($results as $line){
//             //dd($line);
//            $array['rows'][] = array('c' => array( array('v'=>$line->day), array('v'=> $line->total)) );
//        }
//        return $array;
//    }



    public function getDataEmailChartColumn() {
        $array['cols'][] = array('id' => '1', 'label' => 'Dia', 'type' => 'string');
        $array['cols'][] = array('id' => '2', 'label' => 'Total Open', 'type' => 'number');

        $results = DB::select('select day, sum(open) as total_open from report_daily group by day order by day');

        foreach ($results as $line) {
            $array['rows'][] = array('c' => array(array('v' => $line->day), array('v' => $line->total_open)));
        }
        return $array;
    }

    public function getDataEmailChartColumn2() {
        $array['cols'][] = array('id' => 'A', 'label' => 'Year', 'type' => 'string');
        $array['cols'][] = array('id' => 'B', 'label' => 'Sales', 'type' => 'number');
        $array['cols'][] = array('id' => 'C', 'label' => 'Expenses', 'type' => 'number');
        $array['cols'][] = array('id' => 'D', 'label' => 'Profit', 'type' => 'number');

        $array['rows'][] = array('c' => array(array('v' => '2014'), array('v' => 1000), array('v' => 400), array('v' => 200)));
        $array['rows'][] = array('c' => array(array('v' => '2014'), array('v' => 1170), array('v' => 460), array('v' => 250)));
        $array['rows'][] = array('c' => array(array('v' => '2014'), array('v' => 660), array('v' => 1120), array('v' => 250)));
        $array['rows'][] = array('c' => array(array('v' => '2014'), array('v' => 1170), array('v' => 460), array('v' => 250)));

        return $array;
    }

    public function getDataChart2() {
        $array['cols'][] = array('id' => 'A', 'label' => 'Column1', 'type' => 'string');
        $array['cols'][] = array('id' => 'B', 'label' => 'Column2', 'type' => 'number');
        $array['cols'][] = array('id' => 'C', 'label' => 'Column3', 'type' => 'number');

        $array['rows'][] = array('c' => array(array('v' => 'a'), array('v' => 22), array('v' => 22)));
        $array['rows'][] = array('c' => array(array('v' => 'b'), array('v' => 22), array('v' => 22)));
        $array['rows'][] = array('c' => array(array('v' => 'c'), array('v' => 22), array('v' => 22)));
        return $array;

        $result = DB::select('select day ,sum(email) from report_daily group by day order by day');
        return $result;
    }

    public function getDataChart() {
        $stocksTable = Lava::DataTable();
        $stocksTable = Lava::DataTable();
        $stocksTable->addDateColumn('Day of Month')
                ->addNumberColumn('Projected')
                ->addNumberColumn('Official');

        // Random Data For Example
        for ($a = 1; $a < 30; $a++) {
            $rowData = array(
                "2014-8-$a", rand(800, 1000), rand(800, 1000)
            );

            $stocksTable->addRow($rowData);
        }
        return 'dd';
    }

}
