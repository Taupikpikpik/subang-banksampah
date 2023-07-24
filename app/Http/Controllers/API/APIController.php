<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\MatchSchedule;
use App\Models\MatchGroup;
use App\Models\KnockoutMatch;
use App\Models\Venue;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class APIController extends Controller
{
    public function getHighlightArticle(Request $request) {
        $region = Region::where('slug', $request->region)->first();
        $highlightArticle = Event::where('region_id', $region->id)->where('publish_status', 'Published')->orderBy('order', 'ASC')->where('is_highlight', 1)->select('title', 'subtitle','slug', 'category', 'key_visual', 'key_visual_mobile', 'created_at', 'order')->get();

        return response()->json([
            'status' => 1,
            'data' => $highlightArticle
        ]);
    } 

    public function getGalleryArticle(Request $request) {
        $region = Region::where('slug', $request->region)->first();
        $galleryArticle = Event::where('region_id', $region->id)->where('category', 'Gallery')->select('title', 'category', 'key_visual', 'key_visual_mobile', 'gallery_date', 'drive_url')->get();

        return response()->json([
            'status' => 1,
            'data' => $galleryArticle
        ]);
    } 

    public function getLatestArticle(Request $request) {
        $region = Region::where('slug', $request->region)->first();
        $latestArticle = Event::where('region_id', $region->id)->where('publish_status', 'Published')->orderBy('order', 'ASC')->where('is_highlight', 0)->where('category', 'Article')->select('title', 'subtitle','slug', 'category', 'key_visual', 'key_visual_mobile', 'created_at', 'order')->latest()->take(2)->get();

        return response()->json([
            'status' => 1,
            'data' => $latestArticle
        ]);
    } 

    public function getArticleDetail(Request $request) {
        $region = Region::where('slug', $request->region)->first();
        $slug = $request->slug;
        $article = Event::where('region_id', $region->id)->where('slug', $slug)->first();

        return response()->json([
            'status' => 1,
            'data' => $article
        ]);
    }

    public function getMatchSchedule(Request $request) {
        $category = explode(',', $request->category);
        $region = Region::where('slug', $request->region)->first();
        foreach($category as $item) {
            $data[Str::lower(str_replace(' ', '', $item)).'Schedule'] = MatchSchedule::where('region_id', $region->id)->where('category', $item)->get()->groupBy('match_date');
        }
        return response()->json([
            'status' => 1,
            'data' => $data
        ]);
    }

    public function getMatchGroup(Request $request) {
        $category = explode(',', $request->category);
        $region = Region::where('slug', $request->region)->first();
        foreach($category as $item) {
            $data[Str::lower(str_replace(' ', '', $item)).'Group'] = MatchGroup::where('region_id', $region->id)->where('category', $item)->get();
        }

        return response()->json([
            'status' => 1,
            'data' => $data
        ]);
    }

    public function getKnockOutMatch(Request $request) {
        $category = explode(',', $request->category);
        $region = Region::where('slug', $request->region)->first();
        foreach($category as $item) {
            $data[Str::lower(str_replace(' ', '', $item)).'KO'] = KnockoutMatch::where('region_id', $region->id)->where('category', $item)->get();
        }

        return response()->json([
            'status' => 1,
            'data' => $data
        ]);
    }

    public function getVenue(Request $request) {
        $region = Region::where('slug', $request->region)->first();
        $data['venue'] = Venue::where('region_id', $region->id)->first();

        return response()->json([
            'status' => 1,
            'data' => $data
        ]);
    }
}
