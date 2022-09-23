<?php

namespace App\Http\Controllers\Dashboard;

use App\Enum\PaymentForEnum;
use App\Enum\RoleEnum;
use App\Enum\SubscriptionStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\BA;
use App\Models\Customer;
use App\Models\Freelancer;
use App\Models\Mentor;
use App\Models\PaymentReceipt;
use App\Models\Subscription;
use App\Services\PaymentReceiptService;
use App\Services\PersonService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentReceiptController extends Controller
{
    public function __construct(
        private PaymentReceiptService $receiptService
    )
    {
        $this->middleware('auth');
    }

    public function index(Request $request): Factory|View|Application
    {
        $type = $request->query('type');
        $records = $this->receiptService->findByPagination();
        $params = [
            'pageTitle' => __('general.receipts'),
            'records' => $records,
            'type' => $type
        ];
        return view('dashboard.payment-receipts.index', $params);
    }

    public function logs($subscription_id): Factory|View|Application
    {

        $records = PaymentReceipt::with('package_subscription', 'plan_subscription', 'subscribed');
        if ($subscription_id) {
            $records = $records->where('subscription_id',$subscription_id);
        }
        if (
            PersonService::hasRole(RoleEnum::BUSINESS_ACCELERATOR)
            ||
            PersonService::hasRole(RoleEnum::FREELANCER)
            ||
            PersonService::hasRole(RoleEnum::MENTOR)
        ) {
            $records = $records->where('subscribed_id', Auth::id());
        }
        $records = $records->get();
        $params = [
            'pageTitle' => __('general.receipts'),
            'records' => $records,
        ];
        return view('dashboard.payment-receipts.logs', $params);
    }

    public function download($id): Factory|View|Application
    {
        $pageTitle = 'Download Payment Receipt';
        $subscription = Subscription::with('subscribed')->find($id);
        if ($subscription->subscribed->hasRole(RoleEnum::BUSINESS_ACCELERATOR)) {
            $model = BA::where('user_id', $subscription->subscribed->id)->first();
        } else if ($subscription->subscribed->hasRole(RoleEnum::MENTOR)) {
            $model = Mentor::where('user_id', $subscription->subscribed->id)->first();
        } else if ($subscription->subscribed->hasRole(RoleEnum::FREELANCER)) {
            $model = Freelancer::where('user_id', $subscription->subscribed->id)->first();
        } else if ($subscription->subscribed->hasRole(RoleEnum::CUSTOMER)) {
            $model = Customer::where('user_id', $subscription->subscribed->id)->first();
        }
        $receipt = PaymentReceipt::where('subscription_id', $subscription->id)->first();
        return view('dashboard.payment-receipts.download', compact(
            'pageTitle',
            'subscription',
            'receipt',
            'model'
        ));
    }
}
