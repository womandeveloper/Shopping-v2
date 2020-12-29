<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function list(){
        $lists = Product::with('categories')->get();
        return view('backend.product.list', compact('lists'));
    }
    public function create(){
        return view('backend.product.create');
    }
    public function update($request = 'show',$id = 0){
        $data = new Product;
        if($id>0) $data = Product::find($id);
        return view('backend.product.update', compact('data', 'request'));
    }
    public function save($id = 0){
        $this->validate(request(), [
            'fullname' => 'required',
            'email' => 'required|email'
        ]);
        $data = request()->only('fullname', 'email');
        if(request()->filled('password')){
            $data['password'] = Hash::make(request('password'));
        }
        $data['is_active'] = (request()->has('is_active') && request('is_active')) ? 1 : 0;
        $data['is_admin'] = (request()->has('is_admin') && request('is_admin')) ? 1 : 0;
        if($id > 0){
            $entry = Product::where('id', $id)->firstOrFail();
            $entry->update($data);
        }else{
            $entry = Product::create($data);
        }

        $data_detail = request()->only('address','phone_number','mobile_number');
        UserDetail::updateOrCreate(
            ['user_id' => $entry->id],
            $data_detail
        );
        return redirect()
                ->route('admin.product.update', $entry->id)
                ->with('message', ($id>0 ? 'Güncellendi' : 'Kaydedildi'))
                ->with('message_type', 'success');
    }
    public function delete($id){
        Product::destroy($id);
        return redirect()->route('admin.product.list')->with('message', 'Kayıt Silindi')->with('message_type', 'success');
    }
}
