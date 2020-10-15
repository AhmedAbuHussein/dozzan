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
                                        <label>{{ __('file.Name') }}</label>
                                        <input type="text" value="{{ old('name')??$user->name }}" class="form-control" name="name" required />
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>   
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('file.Email') }}</label>
                                        <input type="email" value="{{ old('email')??$user->email }}" class="form-control" name="email" required />
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>   
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('file.Phone') }}</label>
                                        <input type="phone" value="{{ old('phone')??$user->phone }}" class="form-control" name="phone" required />
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>   
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="oldpassword" class="control-label">{{ __('file.Old Password') }}</label>
                                        <input type="password" class="form-control" value="{{ old('oldpassword') }}" name="oldpassword" id="oldpassword" required placeholder="{{ __('file.Old Password') }}">
                                        @error('oldpassword')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="control-label">{{ __('file.New Password') }}</label>
                                        <input type="password" class="form-control" value="{{ old('password') }}" name="password" id="password"  placeholder="{{ __('file.New Password') }}">
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                        
                                    <div class="form-group ">
                                        <label for="confirm" class="control-label">{{ __('file.Confirm Password') }}</label>
                                        <input type="password" class="form-control" name="password_confirmation" id="confirm"  placeholder="{{ __('file.Confirm Password') }}">
                                    </div>

                                    <div class="form-group ">
                                        <button class="btn btn-primary">{{ __('file.Process') }}</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                       <div class="col-md-6">
                           <div class="content" style="background: #333333; padding:20px;border-radius: 5px; height: 563px;overflow-y: auto;">
                                <h4 class="block-title text-center" style="font-size: 30px;">{{ __('file.Cart Products') }}</h4>
                                <ul class="list-unstyled">
                                    @forelse ($items as $item)
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div class="image">
                                            <img src="{{ url($item->attributes->image) }}" style="width: 65px; height:65px; border-radius: 100%; padding: 5px; background: #fff" />
                                        </div>
                                        <div class="name">
                                            <p>{{ $item->name }}</p>
                                        </div>
                                        <div class="line-65">
                                            <p>Price: {{ $item->price . ' $' }}</p>
                                        </div>
                                        <div class="line-65">
                                            <a href="{{ route('delete.item', ['item'=>$item->id]) }}" class="btn btn-danger">{{ __('Del') }}</a>
                                        </div>

                                    </li>
                                    @empty
                                    <li class="list-group-item">{{ __('file.Sorry, You do not has Any product in you cart') }}</li>
                                    @endforelse
                                    @if (count($items) > 0 )
                                    <li class="list-group-item d-flex justify-content-start">
                                        <p style="text-align: center; color:#f27">{{ __('file.Shipping') }}: {{ optional($setting->where('key', 'shipping')->first())->value_lang }} SAR</p>
                                    </li>
                                    <li class="list-group-item">
                                        <form action="{{ route('create.order') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="shipping" value="{{ optional($setting->where('key', 'shipping')->first())->value_lang }}" />
                                            <input type="hidden" name="total" value="{{ $total }}" />
                                            <button type="submit" class="btn btn-primary btn-block" id="order-btn">{{ __('file.Order Now') }} - {{ $total + (double)optional($setting->where('key', 'shipping')->first())->value_value }} $</button>
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
                                            <th>{{ __('file.Last Update') }}</th>
                                            <th>{{ __('file.Total') }}</th>
                                            <th>{{ __('file.Status') }}</th>
                                            <th>{{ __('file.Content') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $order)
                                            <tr>
                                                <td>{{ $order->updated_at->diffForHumans() }}</td>
                                                <td>{{ (double)$order->price + (double)$order->shipping }}</td> 
                                                <td><span>{{ $order->status }}</span></td>
                                                <td>
                                                    @foreach ($order->items as $id)
                                                    <?php $item = Facades\App\Repository\Product::all('created_at')->where('id', $id)->first();  ?>
                                                    <img src="{{ url($item->image) }}" style="width: 50px; height:50px; border-radius: 100%; padding: 5px; background: #fff" title="{{ $item->name_name ." | ". $item->price." $"}}" />
                                                    @endforeach    
                                                </td>   
                                            </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" style="text-align: center; padding:10px;">{{ __('file.Sorry, You Dont Have Any Orders Yet') }}</td>
                                        </tr>
                                            
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                       </div>
                    </div>
                     <!-- end row 2 -->


                     <div class="row" style="margin-top: 30px;">
                        <div class="col-md-12">
                             <div class="content" style="background: #2f2f2f; padding:20px;border-radius: 5px;">
                                 <table id="table2" class="table table-striped table-hover">
                                     <thead>
                                         <tr>
                                             <th>{{ __('file.Date Time') }}</th>
                                             <th>{{ __('file.Reservation Name') }}</th>
                                             <th>{{ __('file.Persons No.') }}</th>
                                             <th>{{ __('file.Reservation Type') }}</th>
                                             <th>{{ __('file.Reservation Status') }}</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @forelse ($reservation as $item)
                                             <tr>
                                                 <td>{{ $item->date . ' - '. $item->time }}</td>
                                                 <td>{{ $item->name }}</td>
                                                 <td>{{ $item->persons }}</td>
                                                 <td>{{ $item->type }}</td>
                                                 <td>{{ $item->status }}</td>
                                             </tr>
                                         @empty
                                         <tr>
                                             <td colspan="4" style="text-align: center; padding:10px;">{{ __('file.Sorry, You Dont Have Any Reservation Yet') }}</td>
                                         </tr>
                                             
                                         @endforelse
                                     </tbody>
                                 </table>
                             </div>
                        </div>
                     </div>
                      <!-- end row 3 -->

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
            try {
                $('#table').DataTable();
            } catch (error) {}
            
            try {
                $('#table2').DataTable();
            } catch (error) {
                
            }
        });

    </script>
@endsection