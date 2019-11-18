<?php

namespace Modules\Car\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Content;
use App\Entities\TaxonomyManager;

class CarWishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $contents = Content::where('type', 'wanna-buy');
        $manufacturers = TaxonomyManager::collection('car-manufacturer');

        if ($request->has('markName') && $request->input('markName')) {
            $contents = $contents->whereHas('metas', function ($query) use ($request) {
                $query->where('key', 'markName');
                $query->where('value', $request->input('markName'));
            });
        }

        if ($request->has('modelName') && $request->input('modelName') != '') {
            $contents = $contents->whereHas('metas', function ($query) use ($request) {
                $query->where('key', 'modelName');
                $query->where('value', $request->input('modelName'));
            });
        }

        if ($request->has('priceAmount') && $request->input('priceAmount')) {
            $contents = $contents->whereHas('metas', function ($query) use ($request) {
                $query->where('key', 'priceAmountStart');
                $query->where('value', '>=', $request->input('priceAmount'));
            });
        }

        $contents = $contents->get();

        return view('car::admin.car.wishlist.index', [
            'contents' => $contents,
            'manufacturers' => $manufacturers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        return view('car::admin.car.wishlist.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $content = Content::findOrFail($id);

        $published = Content::where('type', 'car')->where('status', Content::STATUS_PUBLISHED)->whereHas('metas', function ($query) use ($content) {
            $query->where('key', 'markName');
            $query->where('value', $content->metaValue('markName'));
        })->whereHas('metas', function ($query) use ($content) {
            $query->where('key', 'modelName');
            $query->where('value', $content->metaValue('modelName'));
        })->whereHas('metas', function ($query) use ($content) {
            $query->where('key', 'priceAmount');
            $query->where('value', '>=', intval($content->metaValue('priceAmountStart')));
        })->whereHas('metas', function ($query) use ($content) {
            $query->where('key', 'priceAmount');
            $query->where('value', '<=', intval($content->metaValue('priceAmountEnd')));
        })->whereHas('metas', function ($query) {
            $query->where('key', 'isAuction');
            $query->where('value', '0');
        })->orderBy('visibility', 'desc')->get();

        $pending = Content::where('type', 'car')->where('status', Content::STATUS_DRAFT)->whereHas('metas', function ($query) use ($content) {
            $query->where('key', 'markName');
            $query->where('value', $content->metaValue('markName'));
        })->whereHas('metas', function ($query) use ($content) {
            $query->where('key', 'modelName');
            $query->where('value', $content->metaValue('modelName'));
        })->whereHas('metas', function ($query) use ($content) {
            $query->where('key', 'priceAmount');
            $query->where('value', '>=', intval($content->metaValue('priceAmountStart')));
        })->whereHas('metas', function ($query) use ($content) {
            $query->where('key', 'priceAmount');
            $query->where('value', '<=', intval($content->metaValue('priceAmountEnd')));
        })->whereHas('metas', function ($query) {
            $query->where('key', 'isAuction');
            $query->where('value', '0');
        })->orderBy('visibility', 'desc')->get();

        $draft = Content::where('type', 'car')->where('status', Content::STATUS_PUBLISHED)->whereHas('metas', function ($query) use ($content) {
            $query->where('key', 'markName');
            $query->where('value', $content->metaValue('markName'));
        })->whereHas('metas', function ($query) use ($content) {
            $query->where('key', 'modelName');
            $query->where('value', $content->metaValue('modelName'));
        })->whereHas('metas', function ($query) use ($content) {
            $query->where('key', 'priceAmount');
            $query->where('value', '>=', intval($content->metaValue('priceAmountStart')));
        })->whereHas('metas', function ($query) use ($content) {
            $query->where('key', 'priceAmount');
            $query->where('value', '<=', intval($content->metaValue('priceAmountEnd')));
        })->whereHas('metas', function ($query) {
            $query->where('key', 'isAuction');
            $query->where('value', '0');
        })->orderBy('visibility', 'desc')->get();

        $relatedCars = [
            Content::STATUS_PUBLISHED => $published,
            Content::STATUS_PENDING => $pending,
            Content::STATUS_DRAFT => $draft,
        ];

        return view('car::admin.car.wishlist.show', ['content' => $content, 'relatedCars' => $relatedCars]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('car::admin.car.wishlist.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
