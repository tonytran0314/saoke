<?php

namespace App\Http\Controllers;

use App\Models\AccountStatement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function search(Request $request) {
        $transactions = AccountStatement::where('transaction_details', 'like', '%' . $request->keyword . '%')->paginate(10);

        if(count($transactions) === 0) {
            return view('error404');
        }
        
        return view('search_result', [
            'transactions' => $transactions
        ]);
    }
}
