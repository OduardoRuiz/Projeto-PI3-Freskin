<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function profile()
    {


        return view('user.profile')->with(['address' => Address::where('user_id', Auth()->user()->id)->get()]);
    }

    public function create(Request $request)
    {
        $a = Address::where('user_id', '=', Auth()->user()->id)->first();
        

        if ($a == null) {

            Address::create([
                'user_id' => $request->user_id,
                'contact' => $request->contact,
                'address' => $request->address,
                'address_number' => $request->address_number,
                'address_city' => $request->address_city,
                'address_state' => $request->address_state,
                'neighborhood' => $request->neighborhood,
                'complement' => $request->complement,
                'cep' => $request->cep

            ]);
            return redirect(route('cart.show'));
        } 
        if($a != null){
            $atualizar = Address::where('user_id', '=', Auth()->user()->id)->first();

            $atualizar->update([
                'user_id' => $request->user_id,
                'contact' => $request->contact,
                'address' => $request->address,
                'address_number' => $request->address_number,
                'address_city' => $request->address_city,
                'address_state' => $request->address_state,
                'neighborhood' => $request->neighborhood,
                'complement' => $request->complement,
                'cep' => $request->cep
            ]);
            return redirect(route('cart.show'));
        }
    }
}
