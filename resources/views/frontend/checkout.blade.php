@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')

    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0"> 
                <a href="{{ url('/')}}">
                    Home
                </a> /
                <a href="{{ url('checkout') }}">
                    Checkout
                </a>
            </h6>
        </div>
    </div>

    <div class="container mt-3">
        <form action="{{url('place-order')}}" method="POST">
            {{csrf_field()}}
            <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="f">First Name</label>
                                <input type="text" required class="form-control firstname" value="{{Auth::user()->name }}" name="fname" placeholder="Enter First Name">
                                <span id="fname_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="f">Last Name</label>
                                <input type="text" required class="form-control lastname" value="{{Auth::user()->lname }}" name="lname" placeholder="Enter Last Name">
                                <span id="lname_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="f">Email</label>
                                <input type="text"  required class="form-control email" value="{{Auth::user()->email }}" name="email" placeholder="Enter Email">
                                <span id="email_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="f">Phone Number</label>
                                <input type="text" required class="form-control phone" value="{{Auth::user()->phone }}" name="phone" placeholder="Enter Phone Number">
                                <span id="phone_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="f">Address 1</label>
                                <input type="text" required class="form-control address1" value="{{Auth::user()->address1 }}" name="address1" placeholder="Enter Address 1">
                                <span id="address1_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="f">Address 2</label>
                                <input type="text" required class="form-control address2" value="{{Auth::user()->address2 }}" name="address2" placeholder="Enter Address 2">
                                <span id="address2_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="f">City</label>
                                <input type="text" required class="form-control city" value="{{Auth::user()->city }}" name="city" placeholder="Enter City">
                                <span id="city_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="f">State</label>
                                <input type="text" required class="form-control state" value="{{Auth::user()->state }}" name="state" placeholder="Enter State">
                                <span id="state_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="f">Country</label>
                                <input type="text" required class="form-control country" value="{{Auth::user()->country }}" name="country" placeholder="Enter County">
                                <span id="country_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="f">Pin Code</label>
                                <input type="text" required class="form-control pincode" value="{{Auth::user()->pincode }}" name="pincode" placeholder="Enter Pin Code">
                                <span id="pincode_error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>
                        @if($old_cartitems->count() > 0)
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0; @endphp
                                    @foreach($old_cartitems as $item)
                                    <tr>
                                        @php $total += ($item->products->selling_price * $item->prod_qty) @endphp
                                        <td>{{$item->products->name}}</td>
                                        <td>{{$item->prod_qty}}</td>
                                        <td>{{$item->products->selling_price}}</td>
                                    </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                            <h6 class="px-2">Grand Total <span class="float-end"> € {{ $total }}</span></h6>
                            <hr>
                            <button type="submit" class="btn btn-success w-100 ">Place Order</button>
                            
                            <!--<button type = "submit" href="{{ url('/stripe') }}" class="btn btn-primary w-100 pay_btn mt-3">Pay</button>-->

                            <button type="submit" class="btn btn-outline-success">
                                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="{{ env('STRIPE_KEY') }}"
                                data-name="Payment of {{ $total }}€" data-amount="{{ $total * 100 }}"
                                data-currency="EUR"
                                data-description="Insert your card information"></script>
                            </button>
                            
                        @else
                            <h4 class="text-center">No products in cart</h4>
                        @endif    
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
@endsection