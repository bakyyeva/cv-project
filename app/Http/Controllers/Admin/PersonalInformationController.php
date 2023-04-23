<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonalInformationRequest;
use App\Models\PersonalInformation;

class PersonalInformationController extends Controller
{
    public function create()
    {
        $data = PersonalInformation::query()->first();
        return view('admin.personal-information.create-update', compact('data'));
    }

    public function store(PersonalInformationRequest $request)
    {
        $data = $request->except(['_token']);

        $data['birthday'] = !is_null($data['birthday']) ? $data['birthday'] : '';
        $data['website'] = !is_null($data['website']) ? $data['website'] : '';
        $data['languages'] = !is_null($data['languages']) ? $data['languages'] : '';
        $data['interests'] = !is_null($data['interests']) ? $data['interests'] : '';

//        dd($data);

//        try {
            PersonalInformation::create($data);
//        }
//        catch (\Exception $exception)
//        {
//            abort(404, $exception->getMessage());
//        }
        alert()->success('Başarılı', 'Kişisel Bilgiler kaydedildi')->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);
        return redirect()->back();
    }

}
