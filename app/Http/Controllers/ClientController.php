<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $vendor_role = Role::where('name','vendor')->first();
        return view('client.home', [
            'vendors' => $vendor_role->users
        ]);
    }
}
