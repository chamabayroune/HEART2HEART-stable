<?php

namespace App\Http\Controllers;

use App\Models\PatientModel;
use App\Models\RservationModel;
use App\Models\Specialities;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home (){
        $specialities=Specialities::get();

        return view('home',[
            'Specialities'=>$specialities,
        ]);
    }
    public function AddAppointment(Request $request){

        $formFields = $request->validate([
            'cin' => 'required',
            'phone' => 'required',

        ]);

        // Check if patient already exists with ID or CIN
        $patient = PatientModel::where('id', auth()->id())->orWhere('cin', $formFields['cin'])->first();

        if ($patient) {
            // Patient already exists, do not create a new one
            $lastId = $patient->id;
        } else {
            // Create new patient
            $formFields['id'] = auth()->id();
            $formFields["situation"] = "En attente";
            $patient = PatientModel::create($formFields);
            $lastId = $patient->id;
        }

        $formFields1 = $request->validate([
            'date_reservation' => 'required',
            'type_reservation' => 'required'
        ]);
        $formFields1['patient'] = $lastId;

        $reservations = RservationModel::whereDate('date_reservation', $formFields1['date_reservation'])->get();

        if ($reservations->count() >= 10) {
            return redirect()->back()->with('error', 'Sorry, the limit of 10 reservations for this day has been reached.');
        }

        RservationModel::create($formFields1);

        return redirect()->route('home');
    }


}
