<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Verify;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('key_word');
        $perPage = 25;
        $orders = Order::where(function ($query) use ($search) {
            $query->where('state_sell', 'LIKE', '%' . $search . '%')
            ->orWhere('type', 'LIKE', '%' . $search . '%');
        })->latest()->paginate($perPage);
        return view('admin.order.index',compact('orders'));
    }

    public function success() 
    {
        return view('frontend.success-sell');
    }

    public function verification(string $id) {
        $order = Order::findOrFail($id);
        return view('admin.order.verification',compact('order'));
    }

    public function active(Request $request,$id) {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        $transfer_sell = session('transfer_sell', []);
        $transfer_sell['order_status'] = 1;
        session(['transfer_sell' => $transfer_sell]);
        
        Session::flash('success', 'Đã Cập Nhật Trạng Thái!');
        return Redirect::route('admin.order.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    
    function sendMessageToTelegram($payload)
    {
        $botToken = env('TELEGRAM_BOT_TOKEN');
        $apiUrl = "https://api.telegram.org/bot" . $botToken . "/sendMessage";
        $response = Http::accept('application/json')->withBody(json_encode($payload))->post($apiUrl);
        return $response->json();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transfer_sell = session()->get('transfer_sell');

        $input = $request->all();
        $input['verify_id'] = intval($input['verify_id']);
        $verify = Verify::findOrfail($input['verify_id']);
        $input['uuid'] = $transfer_sell['uuid'];
        $input['status'] = 2;
        $order = Order::create($input);
        if($order){
$text = "
<b>🆕Mua coin</b>\n
<b>✅Tên tài khoản: $verify->account_name</b>\n
<b>✅Số tài khoản: $verify->account_number</b>\n
<b>✅Ngân hàng: $verify->bank_name</b>\n
<b>✅Coin: $order->state_sell</b>\n
<b>✅Mạng lưới: $order->network</b>\n
<b>✅Địa chỉ ví: $order->address_wallet</b>\n
<b>✅Tiền cần chuyển khoản: $order->total_payment</b>\n
<b>✅Số tiền chuyển khoản: $order->want_to_buy</b>\n
";
        }
        $channelChatId = env('TELEGRAM_CHANEL_SELL_ID');
        $payload = [
            "chat_id" =>$channelChatId,
            "text"=> $text,
            "parse_mode"=> 'html'
        ];
        $this->sendMessageToTelegram($payload);

        $transfer_sell = session('transfer_sell', []);
        $transfer_sell['order_status'] = 2;
        $transfer_sell['order_id'] = $order->id;
        $transfer_sell['order_created'] = $order->created_at;

        session(['transfer_sell' => $transfer_sell]);

        return redirect()->route('transfer.sell',$order->uuid)->with('success', 'Đã gửi lệnh bán thành công, Vui lòng đợi xác nhận!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Order::find($id);
        $return = [
            'success'   => $item ? true : false,
            'item'      => $item
        ];
        return response()->json($return);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Order::find($id);
        $item->status = 2;
        $item->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}