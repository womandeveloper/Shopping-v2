<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
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
        $data = request()->only('product_name', 'price','slug', 'description');    
        if(!request()->filled('slug')){
            $data['slug'] = str_slug(request('product_name'));
            request()->merge(['slug' => $data['slug']]);
        }   
        $this->validate(request(), [
            'product_name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'slug' => (request('original_slug') != request('slug')) ? 'unique:category,slug' : ''
        ]); 
        if($id > 0){
            $entry = Product::where('id', $id)->firstOrFail();
            $entry->update($data);
        }else{
            $entry = Product::create($data);
        }
        
        $data_detail = request()->only('show_slider','show_today_chance','show_featured','show_bestseller','show_discount');
        $data_detail['product_image'] = '1.jpg';
        ProductDetail::updateOrCreate(
            ['product_id' => $entry->id],
            $data_detail
        );
        
        return redirect()
                ->route('admin.product.update', ['update',$entry->id])
                ->with('message', ($id>0 ? 'Güncellendi' : 'Kaydedildi'))
                ->with('message_type', 'success');
    }
    public function delete($id){
        Product::destroy($id);
        return redirect()->route('admin.product.list')->with('message', 'Kayıt Silindi')->with('message_type', 'success');
    }
}
