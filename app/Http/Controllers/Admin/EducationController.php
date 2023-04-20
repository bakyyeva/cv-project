<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EducationRequest;
use App\Models\Education;
use Illuminate\Http\Request;


class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::all();
        return view('admin.education.list', compact('educations'));
    }

    public function create()
    {
        return view('admin.education.create-update');
    }

    public function store(EducationRequest $request)
    {
        try {
            Education::create([
                'unv_name' => $request->unv_name,
                'degree' => $request->degree,
                'branch' => $request->branch,
                'year' => $request->year,
                'order' => $request->order,
                'status' => $request->status ? 1 : 0
            ]);
        }
        catch (\Exception $exception)
        {
            abort(404, $exception->getMessage());
        }

        alert()->success('Başarılı', 'Eğitim Bilgileri Kaydedildi')->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);
        return redirect()->route('education-list');
    }

    public function edit(Request $request, int $id)
    {
        $education = Education::query()->where('id', $id)->firstOrFail();

        return view('admin.education.create-update', compact('education'));
    }

    public function update(Request $request, int $id)
    {
        $education = Education::query()->where('id', $id)->firstOrFail();

        try {
            $education->unv_name = $request->unv_name;
            $education->degree = $request->degree;
            $education->branch = $request->branch;
            $education->year = $request->year;
            $education->order = $request->order;
            $education->status = $request->status ? 1 : 0;

            $education->save();
        }
        catch (\Exception $exception)
        {
            abort(404, $exception->getMessage());
        }

        alert()->success('Başarılı', "Eğitim Bilgileri Güncellendi")->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);
        return redirect()->route("education-list");
    }

    public function delete(Request $request)
    {
//        dd($request->id);
        $education = Education::query()->where('id', $request->id)->firstOrFail();

        $education->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Başarılı'
        ])->setStatusCode(200);
    }

    public function changeStatus(Request $request)
    {
        $education = Education::query()->where('id', $request->id)->firstOrFail();

        $education->status = $education->status ? 0 : 1;
        $education->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Başarılı',
            'eduStatus' => $education->status
        ])->setStatusCode(200);
    }
}
