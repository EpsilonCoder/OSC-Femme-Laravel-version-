<?php

namespace App\Http\Controllers;

use App\Models\doctor;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_doctor');
    }

    public function upload(Request $request)
    {
        $doctor = new doctor;
        $image = $request->file;
        $imagename = time() . '.' . $image->getClientOriginalExtension();

        $request->file->move('doctorimage', $imagename);
        $doctor->file = $imagename;
        $doctor->name = $request->name;
        $doctor->speciality = $request->speciality;
        $doctor->Telephone = $request->Telephone;
        $doctor->file = $request->file;
        $doctor->save();

        return redirect()->back();
    }

    public function index()
    {
        $contacts = Contact::all();
        return view('admin.home')->with('contacts', $contacts);
    }
}
