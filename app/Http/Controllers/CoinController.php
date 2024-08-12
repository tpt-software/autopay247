<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CoinRequest;
use App\Models\Coin;
use App\Traits\UploadFileTrait;
use Illuminate\Support\Facades\Log;

class CoinController extends Controller
{
    use UploadFileTrait;
    public function index(Request $request){
        $items = Coin::get();
        return view('admin.coin.index',compact('items'));
    }
    public function create(){
        return view('admin.coin.create');
    }
    public function edit($id){
        $item = Coin::findOrfail($id);
        return view('admin.coin.edit',compact('item'));
    }
    public function store(CoinRequest $request){
        try {
            $data = $request->except('_method','_token');
            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadFile($request->file('image'), 'coins/'.$data['coin_name']);
            } 
            $item = Coin::create($data);
            return redirect()->route('admin.coin.index')->with('success', 'Thêm thành công');
        } catch (\Exception $e) {
            Log::error('Create Coin Bug : '.$e->getMessage());
            return redirect()->route('admin.coin.index')->with('error', 'Thêm thất bại');
        }
    }
    public function update(CoinRequest $request,String $id){
        try {
            $data = $request->except('_method','_token');
            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadFile($request->file('image'), 'coins/'.$data['coin_name']);
            } 
            $item = Coin::find($id)->update($data);
            return redirect()->route('admin.coin.index')->with('success', 'Cập nhập thành công');
        } catch (\Exception $e) {
            Log::error('Update Coin Bug : '.$e->getMessage());
            return redirect()->route('admin.coin.index')->with('error', 'Cập nhập thất bại');
        }
    }
    public function destroy($id){
        try {
            $item =  Coin::findOrfail($id);
            $this->deleteFile([$item->image]);
            $item->delete();
            return redirect()->route('admin.coin.index')->with('success', 'Xóa thành công');
        } catch (QueryException $e) {
            Log::error('Update Coin Bug :' . $e->getMessage());
            return redirect()->route('admin.coin.index')->with('error', 'Xóa thất bại');
        }
    }
}