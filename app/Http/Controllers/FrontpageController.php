<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
use App\Property;
use App\Service;
use App\Slider;
use App\Post;
use App\partners;

class FrontpageController extends Controller
{
    
    public function index()
    {

        $cities     = Property::select('city','city_slug')->distinct('city_slug')->get();
        $regions     = Property::select('region','region_slug')->distinct('region_slug')->get();

        $sliders        = Slider::latest()->get();
        $partners        = partners::latest()->get();
        $properties     = Property::latest()->where('featured',1)->with('rating')->withCount('comments')->take(6)->get();
        $Normalproperties = Property::with('rating')->where('status','متاح')->withCount('comments')->take(6)->latest()->get();

        $services       = Service::orderBy('service_order')->get();
        $testimonials   = Testimonial::latest()->get();
        $posts          = Post::latest()->where('status',1)->take(6)->get();

        return view('frontend.index', compact('cities','regions','partners','sliders','properties','services','testimonials','posts','Normalproperties'));
    }


    public function search(Request $request)
    {

        $cities     = Property::select('city','city_slug')->distinct('city_slug')->get();
        $regions     = Property::select('region','region_slug')->distinct('region_slug')->get();

        $city     = strtolower($request->city);
        $region     = strtolower($request->region);
        $type     = $request->type;
        $purpose  = $request->purpose;
        $bedroom  = $request->bedroom;
        $bathroom = $request->bathroom;
        $minprice = $request->minprice;
        $maxprice = $request->maxprice;
        $minarea  = $request->minarea;
        $maxarea  = $request->maxarea;
        $featured = $request->featured;

        $properties = Property::latest()->withCount('comments')
                                ->when($city, function ($query, $city) {
                                    return $query->where('city', '=', $city);
                                })
                                ->when($region, function ($query, $region) {
                                    return $query->where('region', '=', $region);
                                })
                                ->when($type, function ($query, $type) {
                                    return $query->where('type', '=', $type);
                                })
                                ->when($purpose, function ($query, $purpose) {
                                    return $query->where('purpose', '=', $purpose);
                                })
                                ->when($bedroom, function ($query, $bedroom) {
                                    return $query->where('bedroom', '=', $bedroom);
                                })
                                ->when($bathroom, function ($query, $bathroom) {
                                    return $query->where('bathroom', '=', $bathroom);
                                })
                                ->when($minprice, function ($query, $minprice) {
                                    return $query->where('price', '>=', $minprice);
                                })
                                ->when($maxprice, function ($query, $maxprice) {
                                    return $query->where('price', '<=', $maxprice);
                                })
                                ->when($minarea, function ($query, $minarea) {
                                    return $query->where('area', '>=', $minarea);
                                })
                                ->when($maxarea, function ($query, $maxarea) {
                                    return $query->where('area', '<=', $maxarea);
                                })
                                ->when($featured, function ($query, $featured) {
                                    return $query->where('featured', '=', 1);
                                })
                                ->paginate(10); 

        return view('pages.search', compact('properties','regions','cities'));
    }

}
