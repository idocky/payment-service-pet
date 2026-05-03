<?php

namespace App\Http\Controllers;


use App\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct(private PaymentService $paymentService)
    {

    }

    public function paymentSession(Request $request)
    {
        $session = $this->paymentService->createPaymentSession($request->all());

        return redirect()->to($session->url);
    }

    public function thanks()
    {

    }
}
