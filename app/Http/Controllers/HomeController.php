<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //$role = Role::create(['name' => 'admin']);
        //User::find(1)->assignRole('admin');
        //$role = Role::create(['name' => 'menaxher']);
        //User::find(10)->assignRole('menaxher');
        //$role = Role::create(['name' => 'kamarier']);
        //User::find(3)->assignRole('kamarier');
        //$role = Role::create(['name' => 'ekonomist']);
        //User::find(4)->assignRole('ekonomist');
        return view('home');
    }
}
