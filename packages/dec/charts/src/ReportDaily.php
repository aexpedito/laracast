<?php namespace Dec\Charts;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ReportDaily extends Model
{
    protected $table ='report_daily';
    public $timestamps = false;
    protected $primaryKey = [
        'day',
        'client',
        'channel',
        'partner',
    ];
    
    protected $fillable = [
        'day',
        'client',
        
    ];
    
    public function scopeDefaultRange($query){
        $query->whereBetween('day', array(Carbon::today()->subMonth(1),  Carbon::today()));
    }
    
}
