<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CampaignController extends Controller
{
        public function index(Request $request)
    {
        $campaigns = User::all();

      #  return view('pages.index', compact('drivers'));
        return view('pages.campaign_page');
    }
}
