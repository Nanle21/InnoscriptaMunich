<?php

namespace App;
//namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use App\results;
use App\User;
class ResultExcel implements FromView
{
    //
    use Exportable;


    // public function __construct(int $user_id)
    // {
    //     $this->company_id = $company_id;
    // }


    // public function query()
    // {
    //     return results::query()->where('company_id', $this->company_id);
    // }

    public function view(): View
    {
    	$assets = results::join('users', 'results.user_id', '=', 'users.id')->get();	
        return view('layout.excel', [
            'assets' => $assets
        ]);
    }
}

