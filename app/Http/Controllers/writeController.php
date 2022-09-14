<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\writeModel;

class writeController extends Controller
{
    //
    public function ret(){

        
        return view('welcome');
    }

    public function saveToDatabase(){

        $writeModel = new writeModel;

        $data = \Storage::disk('local')->get('public/challenge.json');

        
        
        $data = json_decode($data, true);
        
        //Pick up where we left off
        //$i = $writeModel::all()->count();
        $i = 0;

        for($i; $i < sizeof($data); $i++){

            $entry = $data[$i];

            
            $writeModel->name = $entry['name'];
            $writeModel->address = $entry['address'];
            $writeModel->checked = $entry['checked'];
            $writeModel->description = $entry['description'];

            $writeModel->interest = $entry['interest'];
            $writeModel->dateOfBirth = $entry['date_of_birth'];
            $writeModel->email = $entry['email'];
            $writeModel->account = $entry['account'];
       
            //To grab credit card details from
            $tmpModel = $entry['credit_card'];
    
            $writeModel->ccType = $tmpModel['type'];
            $writeModel->ccNumber = $tmpModel['number'];
            $writeModel->ccName = $tmpModel['name'];
            $writeModel->ccExpires = $tmpModel['expirationDate'];

            //Save entries one line at a time
            $writeModel->save();
            

            
        }

        
        $arrsize = "";
        /*$desc = Array();
        foreach($data as $obj){
             array_push($desc, $obj['checked']);
        }*/
        //$desc = Array(strlen("Voluptatibus nihil dolor quaerat. Reprehenderit est molestias quia nihil consectetur voluptatum et.<br>Ea officiis ex ea suscipit dolorem. Ut ab vero fuga.<br>Quam ipsum nisi debitis repudiandae quibusdam. Sint quisquam vitae rerum nobis."));

        return view('welcome', ['entry' => $arrsize]);
    }
}
