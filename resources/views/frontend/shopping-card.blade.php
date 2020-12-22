@extends('frontend.layouts.master')
@section('title', 'Siparişler')
@section('content')
<div class="Shopping-cart-area pt-30 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @include('frontend.layouts.partials.alert')
                @if (count(Cart::content())>0) 
                <form action="#">
                    <div class="table-content table-responsive">                                                   
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="li-product-remove">Sil</th>
                                        <th class="li-product-thumbnail">Resim</th>
                                        <th class="cart-product-name">Ürün</th>
                                        <th class="li-product-price">Fiyat</th>
                                        <th class="li-product-quantity">Adet</th>
                                        <th class="li-product-subtotal">Tutar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Cart::content() as $product_cart)
                                        <tr>
                                            <td class="li-product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                                            <td class="li-product-thumbnail" style="width: 120px;"><a href="{{ route('product', $product_cart->options->slug) }}"><img src="/frontend/images/product/small-size/5.jpg" alt="Li's Product Image"></a></td>
                                            <td class="li-product-name"><a href="{{ route('product', $product_cart->options->slug) }}">{{ $product_cart->name }}</a></td>
                                            <td class="li-product-price"><span class="amount">{{ $product_cart->price }} ₺</span></td>
                                            <td class="quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" value="{{ $product_cart->qty }}" type="text">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </td>
                                            <td class="product-subtotal"><span class="amount">{{ $product_cart->subtotal }} ₺</span></td>
                                        </tr> 
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                    <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                </div>
                                <div class="coupon2">
                                    <input class="button" name="update_cart" value="Update cart" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Alışveriş Toplamı</h2>
                                <ul>
                                    <li>KDV <span>{{ Cart::tax() }} ₺</span></li>
                                    <li>Tutar <span>{{ Cart::subtotal() }} ₺</span></li>
                                    <li>Toplan Tutar <span>{{ Cart::total() }} ₺</span></li>
                                </ul>
                                <a href="{{ route('payment') }}">Satın Al</a>
                            </div>
                        </div>
                    </div>
                </form>
                @else
                    <h1>Sepetim</h1>
                    <p>Sepetinizde Ürün Bulunmamaktadır</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection