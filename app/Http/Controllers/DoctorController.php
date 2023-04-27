<?php

namespace App\Http\Controllers;

use App\Models\DonationsModel;
use App\Models\Specialities;
use App\Models\PatientModel;
use App\Models\RservationModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DoctorController extends Controller
{
   public function dashboard(){
            $specialities=Specialities::get();
            $patients = DB::table('patient')
            ->join('users', 'patient.id', '=', 'users.id')
            ->select('patient.*', 'users.name', 'users.email')
            ->get();
            $reservation = DB::table('reservation')
            ->join('patient', 'reservation.patient', '=', 'patient.id')
            ->join('specialities', 'reservation.type_reservation', '=', 'specialities.id')
            ->select('reservation.*', 'patient.cin', 'patient.id','specialities.specialities')
            ->get();
            // $Donateur = DB::table('donations')
            // ->join('users', 'donations.donateur', '=', 'users.id')
            // ->select('donations.*', 'users.name', 'users.email')
            // ->get();
            return view('dashboard',[
                'specialities' => $specialities,
                'patients'=>$patients,
                'reservation'=>$reservation,
                // 'Donateur'=>$Donateur
            ]);

   }
   public function AddSpecialitie(Request $request){


    $formFields = $request->validate([
        'specialities' => 'required',

    ]);

    Specialities::create($formFields);

    return redirect()->route('dashboard')->with('message', 'specialitie created successfully');


   }
   public function deletepatient($id){
    $patient = PatientModel::findOrFail($id);

        $patient->delete();

        return redirect()->route('dashboard');
   }

   public function deleteReservations($id){
    $Reservation = RservationModel::findOrFail($id);

        $Reservation->delete();

        return redirect()->route('dashboard');
   }

   public function deleteSpecialities($id){
    $Specialitie = Specialities::findOrFail($id);

        $Specialitie->delete();

        return redirect()->route('dashboard');
   }

//    public function deleteDonations($id){
//     $Donations = DonationsModel::findOrFail($id);

//         $Donations->delete();

//         return redirect()->route('dashboard');
//    }

   public function updatepatient(Request $request, $id){
    $patient = PatientModel::findOrFail($id);
    $formFields =  $request->validate(['situation' => 'required']);

    $patient->update($formFields);

    return redirect()->route('dashboard')->with('message', 'patient updated successfully');
   }
   public function updateSpecialities(Request $request, $id){
    $Specialitie = Specialities::findOrFail($id);
    $formFields =  $request->validate(['specialities' => 'required']);

    $Specialitie->update($formFields);

    return redirect()->route('dashboard')->with('message', 'patient updated successfully');
   }


//  probleme
   public function updateDonations(Request $request, $id){
    $donations = DonationsModel::findOrFail($id);
    $formFields = $request->validate(['situtation' => 'required']);
    $donations->update($formFields);
    return redirect()->route('dashboard')->with('message', 'donation updated successfully');
}
// public function updatedonateur(Request $request, $id){
//             $donateur = DonationsModel::find($id);
//             if (!$donateur) {
//                return response()->json(['message' => 'Donateur non trouvé'], 404);
//             }
//             $formFields = $request->validate(['situtation' => 'required']);
//             $donateur->update($formFields);
//             return response()->json(['message' => 'Donateur mis à jour avec succès']);
//         }
}


// In this example, we've created a Doctor controller with six methods:
// index() displays a list of all doctors.
// create() displays a form to create a new doctor.
// store() creates a new doctor in the database.
// edit() displays a form to edit an existing doctor.
// update() updates an existing doctor in the database.
// destroy() deletes an existing doctor from the database.




