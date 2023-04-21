<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocailMediaRequest;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index()
    {
        $list = SocialMedia::all();

        return view('admin.social-media.list', compact('list'));
    }

    public function create()
    {
        return view('admin.social-media.create-update');
    }

    public function store(SocailMediaRequest $request)
    {
        $data = $request->except(['_token']);

        $data['status'] = isset($data['status']) ? 1 : 0;

        try {
            SocialMedia::create($data);
        }
        catch (\Exception $exception)
        {
            abort(404, $exception->getMessage());
        }
        alert()->success('Başarılı', 'Sosyal Medya Bilgileri Kaydedildi')->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);
        return redirect()->route('social-media.index');
    }

    public function edit(Request $request, int $id)
    {
        $socialMedia = SocialMedia::query()->where('id', $id)->first();

        if ($socialMedia)
        {
            return view('admin.social-media.create-update', compact('socialMedia'));
        }
        alert()->error('Hata', 'Sosyal Medaya  bulunamadı')->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);
        return redirect()->back();
    }

    public function update(Request $request, int $id)
    {
        $socialMedia = SocialMedia::query()->where('id', $id)->firstOrFail();

        $data = $request->except(['_token']);
        $data['status'] = isset($data['status']) ? 1 : 0;

        try {
            $socialMedia->update($data);
        }
        catch (\Exception $exception)
        {
            abort(404, $exception->getMessage());
        }

        alert()->success('Başarılı', 'Bilgiler güncellendi')->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);
        return redirect()->route('social-media.index');
    }

    public function delete(Request $request)
    {
        $socialMedia = SocialMedia::query()->where('id', $request->id)->firstOrFail();

        $socialMedia->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Başarılı'
        ])->setStatusCode(200);
    }

    public function changeStatus(Request $request)
    {
        $socialMedia = SocialMedia::query()->where('id', $request->id)->firstOrFail();

        $socialMedia->status = $socialMedia->status ? 0 : 1;
        $socialMedia->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Başarılı',
            'socailMedia_status' => $socialMedia->status
        ])->setStatusCode(200);
    }
}
