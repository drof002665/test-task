<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortLink\RedirectRequest;
use App\Http\Requests\ShortLink\ShowRequest;
use App\Http\Requests\ShortLink\StoreRequest;
use App\Http\Resources\ShortLinkResource;
use App\Services\ShortLinkService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class ShortLinkController extends Controller
{
    private ShortLinkService $shortLinkService;

    /**
     * ShortLinkController constructor.
     * @param ShortLinkService $shortLinkService
     */
    public function __construct(ShortLinkService $shortLinkService)
    {
        $this->shortLinkService = $shortLinkService;
    }

    /**
     * @param RedirectRequest $request
     * @return Application|RedirectResponse|Redirector
     * @throws Exception
     */
    public function redirect(RedirectRequest $request)
    {
        $shortLink = $this->shortLinkService->findOrFailByToken($request->getToken());

        return redirect($shortLink->url);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('short-link.create');
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $shortLink = $this->shortLinkService->create($request->getUrl());

        return redirect()->route('shortLink.show', ['token' => $shortLink->token]);
    }

    /**
     * @param ShowRequest $request
     * @return Application|Factory|View
     * @throws Exception
     */
    public function show(ShowRequest $request)
    {
        $shortLink = new ShortLinkResource($this->shortLinkService->findOrFailByToken($request->getToken()));

        return view('short-link.show', $shortLink->toArray($request));
    }
}
