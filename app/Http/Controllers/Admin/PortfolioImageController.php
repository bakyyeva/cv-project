<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioImageRequest;
use App\Models\Portfolio;
use App\Models\PortfolioImage;
use Illuminate\Http\Request;

class PortfolioImageController extends Controller
{
    public function index()
    {
        $portfolios = PortfolioImage::all();

        return view('admin.portfolio.list-image', compact('portfolios'));
    }

    public function create()
    {
        $portfolios = Portfolio::all();
        return view('admin.portfolio.create-update-image', compact('portfolios'));
    }

    public function store(PortfolioImageRequest $request)
    {
        $data = $request->except(['_token']);

        $data['feature_status'] = isset($data['feature_status']) ? 1 : 0;
        $data['status'] = isset($data['status']) ? 1 : 0;

        try {
            PortfolioImage::create($data);
        }
        catch (\Exception $exception)
        {
            abort(404, $exception->getMessage());
        }
        alert()->success('Başarılı', 'Portfolio Resmi Kaydedildi')->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);
        return redirect()->route('portfolio-image.index');
    }

    public function edit(Request $request, int $id)
    {
        $portfolios = Portfolio::all();

        $portfolio = PortfolioImage::query()->where('id', $id)->firstOrFail();

        return view('admin.portfolio.create-update-image', compact('portfolio', 'portfolios'));
    }

    public function update(Request $request, int $id)
    {
        $portfolio = PortfolioImage::query()->where('id', $id)->firstOrFail();

        $data = $request->except(['_token']);
        $data['feature_status'] = isset($data['feature_status']) ? 1 : 0;
        $data['status'] = isset($data['status']) ? 1 : 0;

        try {
            $portfolio->update($data);
        }
        catch (\Exception $exception)
        {
            abort(404, $exception->getMessage());
        }

        alert()->success('Başarılı', 'Portfolio Resim güncellendi')->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);
        return redirect()->route('portfolio-image.index');
    }

    public function delete(Request $request)
    {
        $portfolio = PortfolioImage::query()->where('id', $request->id)->firstOrFail();

        $portfolio->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Başarılı'
        ])->setStatusCode(200);
    }

    public function changeStatus(Request $request)
    {
        $portfolio = PortfolioImage::query()->where('id', $request->id)->firstOrFail();

        $portfolio->status = $portfolio->status ? 0 : 1;
        $portfolio->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Başarılı',
            'portfolio_status' => $portfolio->status
        ])->setStatusCode(200);
    }

    public function changeFeatureStatus(Request $request)
    {
        $portfolio = PortfolioImage::query()->where('id', $request->id)->firstOrFail();

        $portfolio->feature_status = $portfolio->feature_status ? 0 : 1;
        $portfolio->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Başarılı',
            'portfolio_feature_status' => $portfolio->feature_status
        ])->setStatusCode(200);
    }
}
