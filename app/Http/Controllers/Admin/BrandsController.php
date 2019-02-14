<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Brand\IndexBrand;
use App\Http\Requests\Admin\Brand\StoreBrand;
use App\Http\Requests\Admin\Brand\UpdateBrand;
use App\Http\Requests\Admin\Brand\DestroyBrand;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Brand;

class BrandsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexBrand $request
     * @return Response|array
     */
    public function index(IndexBrand $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Brand::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name'],

            // set columns to searchIn
            ['id', 'name']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.brand.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.brand.create');

        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBrand $request
     * @return Response|array
     */
    public function store(StoreBrand $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Brand
        $brand = Brand::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/brands'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/brands');
    }

    /**
     * Display the specified resource.
     *
     * @param  Brand $brand
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Brand $brand)
    {
        $this->authorize('admin.brand.show', $brand);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Brand $brand
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Brand $brand)
    {
        $this->authorize('admin.brand.edit', $brand);

        return view('admin.brand.edit', [
            'brand' => $brand,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateBrand $request
     * @param  Brand $brand
     * @return Response|array
     */
    public function update(UpdateBrand $request, Brand $brand)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Brand
        $brand->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/brands'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyBrand $request
     * @param  Brand $brand
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyBrand $request, Brand $brand)
    {
        $brand->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
