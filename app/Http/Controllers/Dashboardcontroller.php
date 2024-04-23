<?php

namespace App\Http\Controllers;

use App\Mail\welcomEmail;
use App\Models\Idea;
use App\Models\idea as ModelsIdea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;

class Dashboardcontroller extends Controller
{
    public function index(){


        $idea=idea::when(request()->has('search'), function ($query) {
            $query->search(request('search', ''));
        })->orderBy('created_at', 'DESC')->paginate(3);


        return view('DashBoard', ['ideas' => $idea]);

    }


}
