<?php

namespace Modules\Payment\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Payment\Entities\PaymentMethod;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $payment_methods = PaymentMethod::all();

        return view('payment::admin.payment.payment_methods.index', ['payment_methods' => $payment_methods]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('payment::admin.payment.payment_methods.create');
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
    public function show($code)
    {
        $payment_method = PaymentMethod::findOrFail($code);

        return view('payment::admin.payment.payment_methods.show', ['payment_method' => $payment_method]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($code)
    {
        $payment_method = PaymentMethod::findOrFail($code);

        return view('payment::admin.payment.payment_methods.edit', ['payment_method' => $payment_method]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $code)
    {
        $request->validate([
            'name' => 'nullable|max:191',
            'data' => 'nullable',
            'enabled' => 'nullable|boolean'
        ]);

        $payment_method = PaymentMethod::findOrFail($code);

        if ($request->has('name')) {
            $payment_method->name = $request->input('name');
            $payment_method->save();
        }

        if ($request->has('data')) {
            $payment_method->data = $request->input('data');
            $payment_method->save();
        }

        if ($request->has('enabled')) {
            $payment_method->enabled = $request->input('enabled');
            $payment_method->save();
        }

        return response()->json($payment_method);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($code)
    {
        //
    }
}
