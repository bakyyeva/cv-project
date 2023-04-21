<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExperienceRequest;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::all();

        return view('admin.experience.list', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experience.create-update');
    }

    public function store(ExperienceRequest $request)
    {
        $experience = new Experience();

        $experience->profession = $request->profession;
        $experience->task = $request->task;
        $experience->description = $request->description;
        $experience->year = $request->year;
        $experience->order = $request->order;
        $experience->status = $request->status ? 1 : 0;

        try {
            $experience->save();
        }
        catch (\Exception $exception)
        {
            abort(404, $exception->getMessage());
        }

        alert()->success('Başarılı', 'Deneyim Bilgileri eklendi')->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);
        return redirect()->route('experience.index');
    }

    public function edit(Request $request, int $id)
    {
        $experience = Experience::query()->where('id', $id)->firstOrFail();

        return view('admin.experience.create-update', compact('experience'));
    }

    public function update(Request $request, int $id)
    {
        $experience = Experience::query()->where('id', $id)->firstOrFail();

        try {
            $experience->profession = $request->profession;
            $experience->task = $request->task;
            $experience->description = $request->description;
            $experience->year = $request->year;
            $experience->order = $request->order;
            $experience->status = $request->status ? 1 : 0;

            $experience->save();
        }
        catch (\Exception $exception)
        {
            abort(404, $exception->getMessage());
        }

        alert()->success('Başarılı', 'Deneyim Bilgileri güncellendi')->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);
        return redirect()->route('experience.index');
    }

    public function delete(Request $request)
    {
        $experience = Experience::query()->where('id', $request->id)->firstOrFail();

        $experience->delete();

        return response()->json(['status' => 'success', 'message' => 'Başarılı'])->setStatusCode(200);
    }

    public function changeStatus(Request $request)
    {
        $experience = Experience::query()->where('id', $request->id)->firstOrFail();

        $experience->status = $experience->status ? 0 : 1;

        $experience->save();

        return response()->json(['status' => 'success', 'message' => 'Başarılı', 'profStatus' => $experience->status])->setStatusCode(200);
    }
}
