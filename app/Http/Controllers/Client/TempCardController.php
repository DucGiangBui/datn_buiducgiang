<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\TemplateCard;
use Illuminate\Http\Request;

class TempCardController extends Controller
{
    public function index()
    {
        $templateCards = TemplateCard::all();
        return view('client.homes.index', compact('templateCards'));
    }
    public function order_index()
    {
        $templateCards = TemplateCard::all();
        return view('client.homes.orders', compact('templateCards'));
    }
}
