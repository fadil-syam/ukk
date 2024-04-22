<?php

namespace App\Exports;

use App\Models\borrow;
// use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Illuminate\Contracts\View\View;

class ExportPeople implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $borrows = Borrow::all();

        return $borrows;
    }
}
// use App\Models\Borrow;
// use Illuminate\Contracts\View\View;
// use Maatwebsite\Excel\Concerns\FromView;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\View as FacadeView;

// class ExportPeople implements FromView
// {
//     public function view(): View
//     {
//         $user_id = Auth::id(); // Dapatkan user_id yang sedang login
//         $borrows = Borrow::where('user_id', $user_id)->with('book')->get();
//         return FacadeView::make('laporan.laporan', ['borrows' => $borrows, 'active' => 'borrowsAdmin']);
//     }
// }
