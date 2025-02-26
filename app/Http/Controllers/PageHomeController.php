<?php

namespace App\Http\Controllers;

use App\Actions\CollectTimezones;
use App\Actions\PrepareStreams;
use App\Models\Stream;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PageHomeController extends Controller
{
    public function __invoke(Request $request): Factory|View|Application
    {
        $streamsByDate = app(PrepareStreams::class)
            ->handle(Stream::upcoming()->get());

        return view('pages.home', [
            'streamsByDate' => $streamsByDate,
        ]);
    }
}
