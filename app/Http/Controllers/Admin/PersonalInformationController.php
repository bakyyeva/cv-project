<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonalInformationRequest;
use App\Models\PersonalInformation;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class PersonalInformationController extends Controller
{
    public function create()
    {
        $data = PersonalInformation::query()->first();
        return view('admin.personal-information.create-update', compact('data'));
    }

    public function update(PersonalInformationRequest $request)
    {
        $personalInfo = PersonalInformation::first();

        if (!is_null($request->cv)){

            $cv = $request->file('cv');
            $originalName = $cv->getClientOriginalName();
            $originalExtension = $cv->getClientOriginalExtension();
            $explodeName = explode('.', $originalName)[0];
            $fileName = Str::slug($explodeName) . '.' . $originalExtension;

            $folder = 'document';
            $publicPath = 'storage/' . $folder . '/';

            if (file_exists(public_path($personalInfo->cv)))
            {
                File::delete(public_path($personalInfo->cv));
            }

            $cv->storeAs($folder, $fileName, 'public');
        }

        $personalInfo->full_name = $request->full_name;
        $personalInfo->image = $request->image;
        $personalInfo->profession = $request->profession;
        $personalInfo->birthday = !is_null($request->birthday) ? $request->birthday : null;
        $personalInfo->website = !is_null($request->website) ? $request->website : null;
        $personalInfo->phone = $request->phone;
        $personalInfo->email = $request->email;
        $personalInfo->address = $request->address;
        $personalInfo->languages = !is_null($request->languages) ? $request->languages : null;
        $personalInfo->interests = !is_null($request->interests) ? $request->interests : null;
        $personalInfo->main_title = $request->main_title;
        $personalInfo->about = $request->about;
        $personalInfo->btn_contact_text = $request->btn_contact_text;
        $personalInfo->btn_contact_link = $request->btn_contact_link;
        $personalInfo->sub_title_left = $request->sub_title_left;
        $personalInfo->small_title_left = $request->small_title_left;
        $personalInfo->sub_title_right = $request->sub_title_right;
        $personalInfo->small_title_right = $request->small_title_right;
        $personalInfo->sub_title_bottom = $request->sub_title_bottom;
        $personalInfo->small_title_bottom = $request->small_title_bottom;
        $personalInfo->cv = $publicPath . $fileName;

        try {
            $personalInfo->save();
        }
        catch (\Exception $exception)
        {
            abort(404, $exception->getMessage());
        }
        alert()->success('Başarılı', 'Kişisel Bilgiler güncellendi')->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);
        return redirect()->back();
    }

}
