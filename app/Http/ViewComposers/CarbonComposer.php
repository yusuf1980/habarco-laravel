<?php

namespace App\Http\ViewComposers;

use Carbon;
use Illuminate\Contracts\View\View;

class CarbonComposer
{
    
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $bulan = array('','Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September','Oktober','Nopember','Desember');
        $hari = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');

        $carbon = new Carbon\Carbon();
        $carbon::setLocale('id'); 
        setLocale(LC_TIME, 'IND'); 
        $view->with(['carbon'=> $carbon, 'hari' => $hari, 'bulan'=> $bulan]);
    }
}