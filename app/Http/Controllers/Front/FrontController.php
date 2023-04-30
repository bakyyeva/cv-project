<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $educations = Education::query()->orderBy('order', 'DESC')->get();
        $experiences = Experience::query()->orderBy('order', 'DESC')->get();
        $services = Service::query()->orderBy('order')->get();

        return view('front.index', compact('educations', 'experiences', 'services'));
    }

    public function resume()
    {
        $educations = Education::query()->orderBy('order', 'DESC')->get();
        $experiences = Experience::query()->orderBy('order', 'DESC')->get();
        $services = Service::query()->orderBy('order')->get();

        return view('front.resume', compact('educations', 'experiences', 'services'));
    }

    public function portfolios()
    {
        $portfolios = Portfolio::query()->with('featureImage')->orderBy('order')->get();
//      dd($portfolios);
        return view('front.portfolios', compact('portfolios'));
    }

    public function portfolioDetail(Request $request, int $id)
    {
        $portfolio = Portfolio::query()
            ->where('id', $id)
            ->with('portfolioImage')
            ->whereHas('portfolioImage', function ($q){
                $q->where('status', 1);
            })
            ->firstOrFail();
        dd($portfolio->portfolioImage[0]->image);

        return view('front.portfolio-detail', compact('portfolio'));
    }

    public function blog()
    {
        return view('front.index');
    }

    public function contact()
    {
        return view('front.index');
    }
}
