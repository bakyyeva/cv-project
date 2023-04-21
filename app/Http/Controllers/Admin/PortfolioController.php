<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioRequest;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::all();

        return view('admin.portfolio.list', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolio.create-update');
    }

    public function store(PortfolioRequest $request)
    {
        $data = $request->except(['_token']);

        $data['status'] = isset($data['status']) ? 1 : 0;

        try {
            Portfolio::create($data);
        }
        catch (\Exception $exception)
        {
            abort(404, $exception->getMessage());
        }
        alert()->success('Başarılı', 'Portfolio Kaydedildi')->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);
        return redirect()->route('portfolio.index');
    }

    public function edit(Request $request, int $id)
    {
        $portfolio = Portfolio::query()->where('id', $id)->first();

        if ($portfolio)
        {
            return view('admin.portfolio.create-update', compact('portfolio'));
        }
        alert()->error('Hata', 'Portfolio bulunamadı')->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);
        return redirect()->back();
    }

    public function update(Request $request, int $id)
    {
        $portfolio = Portfolio::query()->where('id', $id)->firstOrFail();

        $data = $request->except(['_token']);
        $data['status'] = isset($data['status']) ? 1 : 0;

        try {
            $portfolio->update($data);
        }
        catch (\Exception $exception)
        {
            abort(404, $exception->getMessage());
        }

        alert()->success('Başarılı', 'Portfolio güncellendi')->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);
        return redirect()->route('portfolio.index');
    }

    public function delete(Request $request)
    {
        $portfolio = Portfolio::query()->where('id', $request->id)->firstOrFail();

        $portfolio->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Başarılı'
        ])->setStatusCode(200);
    }

    public function changeStatus(Request $request)
    {
        $portfolio = Portfolio::query()->where('id', $request->id)->firstOrFail();

        $portfolio->status = $portfolio->status ? 0 : 1;
        $portfolio->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Başarılı',
            'portfolio_status' => $portfolio->status
        ])->setStatusCode(200);
    }
}
