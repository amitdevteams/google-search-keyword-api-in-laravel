<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    public function index(){
        return view('search');
    }

    public function search(Request $request)
    {
        $getting = $request->keywords;
        Log::info('getting me kya aa rha hai' . $getting);
        $ch = curl_init();
        $searchword = $_POST['keywords'];
        $url = "http://suggestqueries.google.com/complete/search?output=chrome&q=";
        $finalurl = $url . $searchword;
        log::info('final url me kya aa rha hai' . $finalurl);
        curl_setopt($ch, CURLOPT_URL, $finalurl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resp = curl_exec($ch);
        $decoded = json_decode($resp);
        $response = [
            'success' => $decoded[1],
            'data' => 'success',
            'message' => 'search response me kya aa rha hai.',
        ];
        return response()->json($response, 200);
    }


}
