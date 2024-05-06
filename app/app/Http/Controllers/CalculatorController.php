<?php

namespace App\Http\Controllers;

use App\Dto\CalculateDto;
use App\Dto\OrderDto;
use App\Http\Requests\CalculateRequest;
use App\Http\Requests\OrderSaveRequest;
use App\Models\Company;
use App\Services\Calculator;
use App\Services\OrderService;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    private Calculator $calculator;
    private OrderService $orderService;

    public function __construct(Calculator $calculator, OrderService $orderService)
    {
        $this->calculator = $calculator;
        $this->orderService = $orderService;
    }

    public function index(): View
    {
        return view('calculator.index')
            ->with('companies', $this->calculator->getCompanies());
    }

    public function calculate(CalculateRequest $request): JsonResponse
    {
        try {
            $calculateDto = new CalculateDto($request->validated());
            return response()
                ->json(['total' => $this->calculator->getTotalPrice($calculateDto)]);
        } catch (ModelNotFoundException $modelNotFoundException) {
            abort(500, 'Company not found');
        }
    }

    public function save(OrderSaveRequest $request)
    {
        $calculateDto = new CalculateDto($request->validated());
        $orderDto = new OrderDto($request->validated() + ['total' => $this->calculator->getTotalPrice($calculateDto)]);
        $id = $this->orderService->save($orderDto);
        return response()
            ->redirectToRoute('calculator.thanks', ['id' => $id]);
    }


    public function thanks(Request $request): View
    {
        return view('calculator.thanks')
            ->with('order', $this->orderService->getById($request->route('id')));
    }

}
