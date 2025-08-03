<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{

    

    public function privacy() {
        $page_title = "Wiser Capital Website Privacy Policy";
        $page_description = '';

        return view('about.privacy', compact('page_title', 'page_description'));
    }

}
