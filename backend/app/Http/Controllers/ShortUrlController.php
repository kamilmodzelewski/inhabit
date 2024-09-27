<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShortUrlRequest;
use App\Http\Requests\UpdateShortUrlRequest;
use App\Models\ShortUrl;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class ShortUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShortUrlRequest $request)
    {
        // TODO cache the original_url
        $shortUrlFactory = ShortUrl::factory()->make($request->validated());
        $shortUrl = ShortUrl::firstOrCreate($shortUrlFactory->toArray());
        return response()->json($shortUrl->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug, ShortUrl $shortUrl)
    {
        // TODO cache the original_url
        $shortUrl = ShortUrl::where('slug', $slug)->firstOrFail();
        return response()->json($shortUrl->original_url);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShortUrl $shortUrl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreShortUrlRequest $request, ShortUrl $shortUrl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShortUrl $shortUrl)
    {
        //
    }
}
