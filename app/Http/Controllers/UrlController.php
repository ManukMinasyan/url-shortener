<?php

namespace App\Http\Controllers;

use App\Http\Requests\Url\UrlStoreRequest;
use App\Services\UrlService;

class UrlController extends Controller
{
    /**
     * @var UrlService
     */
    private $service;

    /**
     * UrlController constructor.
     *
     * @param  UrlService  $service
     */
    public function __construct(UrlService $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * @param  UrlStoreRequest  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(UrlStoreRequest $request)
    {
        $data = $request->validated();

        return view('index')->with(
            [
                'url' => $this->service->short($data)
            ]
        );
    }

    /**
     * @param $short_url
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function show($short_url) {
        $url = $this->service->getRedirectUrl($short_url);

        return $url ? redirect($url->long_url) : abort(404);
    }
}
