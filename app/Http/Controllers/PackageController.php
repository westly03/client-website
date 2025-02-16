<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Receiver;
use App\Models\Sender;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function store(Request $request) 
    {
    // dd($request->all());

    $validateData = $request->validate([
        'sender.first_name' => 'required|string|max:255',
        'sender.last_name' => 'required|string|max:255',
        'sender.mobile_number' => [
            'required',
            'regex:/^09\d{9}$/'
        ],
        'sender.drop_location' => 'required|in:Naga,Malabon,Legazpi',

        'receiver.first_name' => 'required|string|max:255',
        'receiver.last_name' => 'required|string|max:255',
        'receiver.mobile_number' => [
            'required',
            'regex:/^09\d{9}$/'
        ],
        'receiver.pick_up_branch' => 'required|in:Naga,Malabon,Legazpi',

        'package.name' => 'required|string|max:255',
        'package.height' => 'required|numeric|min:0.1',
        'package.width' => 'required|numeric|min:0.1',
        'package.weight' => 'required|numeric|min:0.1',
    ]);


    $sender = Sender::firstOrCreate(
        ['mobile_number' => $validateData['sender']['mobile_number']],
        [
            'first_name' => $validateData['sender']['first_name'],
            'last_name' => $validateData['sender']['last_name'],
            'drop_location' => $validateData['sender']['drop_location']
        ]
    );

    $receiver = Receiver::firstOrCreate(
        ['mobile_number' => $validateData['receiver']['mobile_number']],
        [
            'first_name' => $validateData['receiver']['first_name'],
            'last_name' => $validateData['receiver']['last_name'],
            'pick_up_branch' => $validateData['receiver']['pick_up_branch']
        ]
    );

 
    $package = Package::create([
        'sender_id' => $sender->id,
        'receiver_id' => $receiver->id,
        'package_name' => $validateData['package']['name'],
        'package_height' => $validateData['package']['height'],
        'package_width' => $validateData['package']['width'],
        'package_weight' => $validateData['package']['weight'],
        'drop_location' => $validateData['sender']['drop_location'],
        'pickup_branch' => $validateData['receiver']['pick_up_branch'],
    ]);

    return response()->json(['message' => 'Package created successfully', 'package' => $package], 201);
    }

}
