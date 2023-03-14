<?php

namespace App\Repository;
use Illuminate\Support\Facades\Hash;
use App\Models\Teacher;

use App\Models\Specialization;
use App\Models\Gender;


class TeacherRepository implements TeacherRepositoryInterface {

    public function GetAllTeachers(): \Illuminate\Database\Eloquent\Collection
    {
        return Teacher::all();
    }

    public function Getspecialization(): \Illuminate\Database\Eloquent\Collection
    {
        return Specialization::all();
    }

    public function GetGender(): \Illuminate\Database\Eloquent\Collection
    {
        return Gender::all();
    }

    public function StoreTeachers($request): \Illuminate\Http\RedirectResponse
    {
        try {
            Teacher::create([
                'Name' => [
                    'ar' => $request->Name_ar,
                    'en' => $request->Name_en,
                ],

                'Email' => $request->Email,
                'Password' => Hash::make($request->Password),
                'Specialization_id' => $request->Specialization_id,
                'Gender_id' => $request->Gender_id,
                'Joining_Date' => $request->Joining_Date,
                'Address' => $request->Address,
            ]);


            // toastr()->success(trans('messages.success'));
            session()->flash('add', trans('main_trans.add_alert'));
            return redirect()->route('Teachers');

        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function EditTeachers($id){
        return Teacher::findOrFail($id);
    }

    public function UpdateTeachers($request){
        try {
            $Teachers = Teacher::findOrFail($request->id);
            $Teachers->Email = $request->Email;
            $Teachers->Password =  Hash::make($request->Password);
            $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers->Specialization_id = $request->Specialization_id;
            $Teachers->Gender_id = $request->Gender_id;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->Address = $request->Address;
            $Teachers->save();
            // toastr()->success(trans('messages.Update'));
            session()->flash('edit', trans('main_trans.edit_alert'));
            return redirect()->route('Teachers.index');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function DeleteTeachers($request)
    {
        Teacher::findOrFail($request->id)->delete();
        session()->flash('delete', trans('main_trans.delete_alert'));
        return redirect()->route('Teachers.index');
    }

}
