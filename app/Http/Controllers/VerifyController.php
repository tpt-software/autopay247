<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Verify;
use App\Models\IdImage;
use App\Models\Transaction;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator;

class VerifyController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('key_word');
        $perPage = 25;
        $verifies = Verify::where(function ($query) use ($search) {
            $query->where('account_number', 'LIKE', '%' . $search . '%')
                ->orWhere('account_name', 'LIKE', '%' . $search . '%')
                ->orWhere('bank_name', 'LIKE', '%' . $search . '%');
        })->latest()->paginate($perPage);
        return view('admin.verify.index', compact('verifies'));
    }
    public function UpdateInfoVerify(Request $request)
    {

        $fontImage = $request->file('font_image');
        $backImage = $request->file('back_image');
        $avatarImage = $request->file('avatar_image');

        $fontImagePath = $fontImage ? $fontImage->store('public/images') : null;
        $backImagePath = $backImage ? $backImage->store('public/images') : null;
        $avatarImagePath = $avatarImage ? $avatarImage->store('public/images') : null;

        $fontImageUrl = $fontImagePath ? Str::replaceFirst('public', 'storage', $fontImagePath) : null;
        $backImageUrl = $backImagePath ? Str::replaceFirst('public', 'storage', $backImagePath) : null;
        $avatarImageUrl = $avatarImagePath ? Str::replaceFirst('public', 'storage', $avatarImagePath) : null;

        $verify = Verify::where('account_number', $request->bank_number)->first();
        $infoVerify = InfoVerify::where('verify_id', $verify->id)->first();
        $infoVerify->name_user = $request->name_user;
        $infoVerify->id_document = $request->id_document;
        $infoVerify->type_document = $request->id_proof_passport;
        $infoVerify->font_image = $fontImageUrl;
        $infoVerify->back_image = $backImageUrl;
        $infoVerify->avatar_image = $avatarImageUrl;
        $infoVerify->verify_id = $verify->id;
        $infoVerify->save();
        return Redirect::route('verify-cccd');
    }

    public function show($id)
    {
        $IdImage = IdImage::where('verify_id', $id)->first();
        return view('admin.verify.show', compact('IdImage'));
    }

    public function activeStatus(Request $request, $id)
    {
        $IdImage = IdImage::findOrFail($id);
        $verify = Verify::where('id', $IdImage->verify_id)->first();
        $verify->status = $request->status;
        // $verify->message_type = Verify::VERIFY_CCCD;
        $verify->save();
        Session::flash('success', 'Đã Cập Nhật Trạng Thái!');
        return Redirect::route('admin.verify.index');
    }


    public function message(Request $request, $id)
    {
        $verify = Verify::find($id);
        if ($request->message_type == 1) {
            $verify->update(['status' => 1]);
        }
        $verify->update(['message_type' => $request->message_type]);
        return response()->json(['success' => true]);
    }

    // public function transaction(Request $request,$user_id){
    //     $transactions = Transaction::where('user_uuid',$user_id)->paginate(25);
    //     $orders = Order::where('verify_id',$user_id)->paginate(25);
    //     return view('admin.verify.transaction',compact('transactions','orders'));
    // }


    public function transaction(Request $request, $user_id)
    {
        // Lấy dữ liệu từ bảng transactions và thêm cột type
        $transactions = Transaction::where('user_uuid', $user_id)->get()->map(function ($item) {
            $item->type = 'mua';
            return $item;
        });

        // Lấy dữ liệu từ bảng orders và thêm cột type
        $orders = Order::where('verify_id', $user_id)->get()->map(function ($item) {
            $item->type = 'bán';
            return $item;
        });

        // Hợp nhất hai tập dữ liệu
        $history = $transactions->merge($orders);

        // Sắp xếp theo thời gian (created_at)
        $sortedHistory = $history->sortByDesc('created_at');
        $perPage = 25;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $sortedHistory->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedHistory = new LengthAwarePaginator($currentItems, $sortedHistory->count(), $perPage, $currentPage, [
            'path' => url()->current(),
            'query' => $request->query(),
        ]);

        return view('admin.verify.transaction', compact('paginatedHistory'));
    }


}