@extends('layouts.app')

@section('content')
@section('style')
    <style>
        body{
            background: #202020
        }
        .title-custom>p{
            letter-spacing: 0.16px;
            color: #666;
            font-size: 18px;
            text-align: center;
        }
        .title-custom.p-white>p{
            color: #fff
        }
        .d-flex{
            display: flex !important;
        }
        .justify-content-start{
            justify-content: start;
        }
        .justify-content-between{
            justify-content: space-between;
        }
        .name p{
            line-height: 65px;
            min-width: 125px;
            max-width: 200px;
            text-align: center;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }
        .quantity p{
            line-height: 65px;
            width: 80px;
            text-align: center;
        }
        .line-65, .line-65 p{
            line-height: 65px;
        }
    </style>
@endsection

<div id="gallery" class="gallery-main pad-top-100 pad-bottom-100">
    <div class="container"  style="margin-top: 80px;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2 class="block-title text-center">{{ $user->name }}</h2>
                    <div class="title-custom p-white"><p>{{ $user->email ." | ". $user->phone }}</p></div>
                </div>
                <div class="team-box">

                    <div class="row">
                       <div class="col-md-6">
                           <div class="content" style="background: #232222; padding:20px;border-radius: 5px;">
                                <form action="{{ route('edit.profile') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>{{ __('Name') }}</label>
                                        <input type="text" value="{{ old('name')??$user->name }}" class="form-control" name="name" required />
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>   
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('Email') }}</label>
                                        <input type="email" value="{{ old('email')??$user->email }}" class="form-control" name="email" required />
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>   
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('Phone') }}</label>
                                        <input type="phone" value="{{ old('phone')??$user->phone }}" class="form-control" name="phone" required />
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>   
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="oldpassword" class="control-label">{{ __('Old Password') }}</label>
                                        <input type="password" class="form-control" value="{{ old('oldpassword') }}" name="oldpassword" id="oldpassword" required placeholder="Your Old Password">
                                        @error('oldpassword')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="control-label">{{ __('New Password') }}</label>
                                        <input type="password" class="form-control" value="{{ old('password') }}" name="password" id="password"  placeholder="Change User Password">
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                        
                                    <div class="form-group ">
                                        <label for="confirm" class="control-label">{{ __('Confirm Password') }}</label>
                                        <input type="password" class="form-control" name="password_confirmation" id="confirm"  placeholder="Confirm Password">
                                    </div>

                                    <div class="form-group ">
                                        <button class="btn btn-primary">{{ __('Process') }}</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                       <div class="col-md-6">
                           <div class="content" style="background: #333333; padding:20px;border-radius: 5px; height: 563px;overflow-y: auto;">
                                <h4 class="block-title text-center" style="font-size: 30px;">Cart Products</h4>
                                <ul class="list-unstyled">
                                    @forelse ($items as $item)
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div class="image">
                                            <img src="{{ url($item->attributes->image) }}" style="width: 65px; height:65px; border-radius: 100%; padding: 5px; background: #fff" />
                                        </div>
                                        <div class="name">
                                            <p>{{ $item->name }}</p>
                                        </div>
                                        <div class="quantity">
                                            <p>Quantity: {{ $item->quantity }}</p>
                                        </div>
                                        <div class="line-65">
                                            <p>Price: {{ $item->price . ' $' }}</p>
                                        </div>
                                    </li>
                                    @empty
                                    <li class="list-group-item">Sorry, You do not has Any product in you cart</li>
                                    @endforelse
                                    @if (count($items) > 0 )
                                    <li class="list-group-item d-flex justify-content-start">
                                        <p style="text-align: center; color:#f27">Shipping: {{ optional($setting->where('key', 'shipping')->first())->value }} $</p>
                                    </li>
                                    <li class="list-group-item">
                                        <form action="{{ route('create.order') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="shipping" value="{{ optional($setting->where('key', 'shipping')->first())->value }}" />
                                            <input type="hidden" name="total" value="{{ $total }}" />
                                            <button type="submit" class="btn btn-primary btn-block" id="order-btn">Order Now - {{ $total + (double)optional($setting->where('key', 'shipping')->first())->value }} $</button>
                                        </form>
                                    </li>
                                    @endif
                                </ul>
                           
                           </div>
                       </div>
                            
                    </div>
                    <!-- end row -->

                    <div class="row" style="margin-top: 30px;">
                       <div class="col-md-12">
                            <div class="content" style="background: #2f2f2f; padding:20px;border-radius: 5px;">
                                <table id="table" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Last Update') }}</th>
                                            <th>{{ __('Total') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Content') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $order)
                                            <tr>
                                                <td>{{ $order->updated_at->diffForHumans() }}</td>
                                                <td>{{ (double)$order->price + (double)$order->shipping }}</td> 
                                                <td><span>{{ $order->status }}</span></td>
                                                <td>
                                                    <ul class="list-unstyled">
                                                        @foreach (Facades\App\Repository\Product::all('created_at')->whereIn('id', $order->items) as $item)
                                                        <li class="list-group-item d-flex justify-content-start">
                                                            <div class="image">
                                                                <img src="{{ url($item->image) }}" style="width: 65px; height:65px; border-radius: 100%; padding: 5px; background: #fff" />
                                                            </div>
                                                            <div class="name">
                                                                <p>{{ $item->name }}</p>
                                                            </div>
                                                            <div class="line-65">
                                                                <p>{{ $item->price . ' $' }}</p>
                                                            </div>
                                                        </li>
                                                        @endforeach    
                                                    </ul>    
                                                </td>   
                                            </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" style="text-align: center; padding:10px;">Sorry, You Dont Have Any Orders Yet</td>
                                        </tr>
                                            
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                       </div>
                    </div>
                     <!-- end row 2 -->

                </div>
                <!-- end gal-container -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end gallery-main -->

@endsection
@section('script')
    <script>
        $(function() {
            $('#table').DataTable();
        });
    </script>
@endsection