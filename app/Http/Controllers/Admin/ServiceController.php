<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;


class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('admin.service.list', compact('services'));
    }

    public function create()
    {
        return view('admin.service.create-update');
    }

    public function store(ServiceRequest $request)
    {
        $data = $request->except(['_token']);

        $data['status'] = isset($data['status']) ? 1 : 0;

        try {
            Service::create($data);
        }
        catch (\Exception $exception)
        {
            abort(404, $exception->getMessage());
        }
        alert()->success('Başarılı', 'Beceri Bilgileri Kaydedildi')->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);
        return redirect()->route('service.index');
    }

    public function edit(Request $request, int $id)
    {
        $service = Service::query()->where('id', $id)->first();

        if ($service)
        {
            return view('admin.service.create-update', compact('service'));
        }
        alert()->error('Hata', 'Beceri bulunamadı')->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);
        return redirect()->back();
    }

    public function update(Request $request, int $id)
    {
        $service = Service::query()->where('id', $id)->firstOrFail();

        $data = $request->except(['_token']);
        $data['status'] = isset($data['status']) ? 1 : 0;

        try {
            $service->update($data);
        }
        catch (\Exception $exception)
        {
            abort(404, $exception->getMessage());
        }

        alert()->success('Başarılı', 'Bilgiler güncellendi')->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);
        return redirect()->route('service.index');
    }

    public function delete(Request $request)
    {
        $service = Service::query()->where('id', $request->id)->firstOrFail();

        $service->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Başarılı'
        ])->setStatusCode(200);
    }

    public function changeStatus(Request $request)
    {
        $service = Service::query()->where('id', $request->id)->firstOrFail();

        $service->status = $service->status ? 0 : 1;
        $service->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Başarılı',
            'service_status' => $service->status
        ])->setStatusCode(200);
    }

}
