<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionDetail;

class TransactionDetailController extends Controller
{
    
    public function showDetail($id){
        $items = TransactionDetail::with(['transaction'])->findOrFail($id);
        
        return view('pages.admin.transaction.detail', compact('items'));
    }

}
