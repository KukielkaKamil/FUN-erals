<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePromoCodeRequest;
use App\Models\PromoCode;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PromoCodeController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', PromoCode::class);
        $promocodes = PromoCode::all();
        return view('dashboard.promocodes', ['promocodes' => $promocodes]);
    }
    public function add()
    {
        $this->authorize('create', PromoCode::class);
        return view('dashboard.add.promocode');
    }
    public function store(StorePromoCodeRequest $request, $clientId = null)
    {
        $this->authorize('create', PromoCode::class);
        $clientId = $clientId ?? null;
        $code = $request->input("code");
        $code = $code ?? Str::random(30);
        $discount = $request->input("discount") / 100.0;

        $promocode = new PromoCode;
        $promocode->code = $code;
        $promocode->discount = $discount;
        $promocode->exp_date = $request->input("date");
        $promocode->client_id = $clientId;
        $promocode->save();
        return redirect()->route('dashboard.promocodes');
    }
}
