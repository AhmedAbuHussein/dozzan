@extends('layouts.admin')
@section('content')
<style>
    #label-img {
        padding: 20px;
        border: 1px solid #ddd;
        display: inline-block;
        width: 100%;
        text-align: center;
    }
    #label-img img{
        max-width: 100%;
    }
        #label-img+input[type='file']{
        width: 0;
        height: 0;
        border: none;
        opacity: 0;
    }

</style>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">{{ __('Setting') }}</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}">{{ __('Home') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Setting') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
    <div class="container-fluid mt-4">

        <div class="row mt-3">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.setting.edit', ['setting'=>$setting, 'type'=> $type]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if ($type == 'image')

                            <div class="form-group col-md-6 offset-md-3 mb-3">
                                <label for="img" id="label-img">
                                    <img style="cursor: pointer;" class="preview" src="{{ url($setting->value) }}" title="Choose image" />
                                </label>
                    
                                <input type="file" class="form-control-file" name="value" id="img" accept="image/*" >
                                @error('value')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                            </div>
                            @elseif ($type == 'words')
                            <div class="form-group col-md-6 offset-md-3">
                                <label for="value">{{ __('First Word') }}</label>
                                <input type="text" name="value[]" id="value" value="{{ old('value[0]')??explode(':', $setting->value)[0] }}" class="form-control" placeholder="banner change words" required>
                                @error('value[0]')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                            </div>

                            <div class="form-group col-md-6 offset-md-3">
                                <label for="value1">{{ __('Second Word') }}</label>
                                <input type="text" name="value[]" id="value1" value="{{ old('value[1]')??explode(':', $setting->value)[1] }}" class="form-control" placeholder="banner change words" required>
                                @error('value[1]')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                            </div>

                            <div class="form-group col-md-6 offset-md-3">
                                <label for="value2">{{ __('Third Word') }}</label>
                                <input type="text" name="value[]" id="value2" value="{{ old('value[2]')??explode(':', $setting->value)[2] }}" class="form-control" placeholder="banner change words" required>
                                @error('value[2]')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                            </div>
                            @elseif($type == 'social')

                            <div class="form-group col-md-6 offset-md-3">
                                <label for="facebook">{{ __('Facebook') }}</label>
                                <input type="url" name="value[facebook]" id="facebook" value="{{ old('value.facebook')??json_decode($setting->value)->facebook }}" class="form-control" placeholder="Facebook URL" required>
                                @error('value.facebook')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                            </div>

                            <div class="form-group col-md-6 offset-md-3">
                                <label for="twitter">{{ __('Twitter') }}</label>
                                <input type="url" name="value[twitter]" id="twitter" value="{{ old('value.twitter')??json_decode($setting->value)->twitter }}" class="form-control" placeholder="twitter URL" required>
                                @error('value.twitter')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                            </div>

                            <div class="form-group col-md-6 offset-md-3">
                                <label for="google">{{ __('Google Plus') }}</label>
                                <input type="url" name="value[google]" id="google" value="{{ old('value.google')??json_decode($setting->value)->google }}" class="form-control" placeholder="google URL" required>
                                @error('value.google')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                            </div>
                            

                            <div class="form-group col-md-6 offset-md-3">
                                <label for="pinterest">{{ __('Pinterest') }}</label>
                                <input type="url" name="value[pinterest]" id="pinterest" value="{{ old('value.pinterest')??json_decode($setting->value)->pinterest }}" class="form-control" placeholder="pinterest URL" required>
                                @error('value.pinterest')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                            </div>

                            <div class="form-group col-md-6 offset-md-3">
                                <label for="linkedin">{{ __('Linkedin') }}</label>
                                <input type="url" name="value[linkedin]" id="linkedin" value="{{ old('value.linkedin')??json_decode($setting->value)->linkedin }}" class="form-control" placeholder="linkedin URL" required>
                                @error('value.linkedin')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                            </div>
                            
                            @elseif($type == 'shipping')
                                <div class="form-group col-md-6 offset-md-3">
                                    <label for="value">{{ __('Value') }}</label>
                                    <input type="number" min="0" name="value" id="value" value="{{ old('value')??$setting->value }}" class="form-control" placeholder="Shipping cost" required>
                                    @error('value')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            @elseif($type == 'footer')
                                <div class="form-group col-md-6 offset-md-3">
                                    <label for="value">{{ __('Value') }}</label>
                                    <input type="text" name="value" id="value" value="{{ old('value')??$setting->value }}" class="form-control" placeholder="Contacted Email" required>
                                    @error('value')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            @else
                                <div class="form-group col-md-6 offset-md-3">
                                    <label for="txt-editor">{{ __('Value') }}</label>
                                    <textarea name="value" id="txt-editor" class="form-control" placeholder="Value">{{ old('value')??$setting->value }}</textarea>
                                    @error('value')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            @endif

                            <div class="form-group col-md-6 offset-md-3">
                                <button class="btn btn-primary btn-block"><i class="fa fa-send"></i> {{ __('Process') }}</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        

    </div>
@endsection

@section('script')
    <script>
        $(function() {
    var $preview, editor, mobileToolbar, toolbar;
    Simditor.locale = 'en-US';
    toolbar = ['title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale', 'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|', 'link', 'hr', '|', 'indent', 'outdent', 'alignment'];
   
    editor = new Simditor({
      textarea: $('#txt-editor'),
      placeholder: 'Text editor',
      toolbar: toolbar,
      pasteImage: false,
    });
    $preview = $('#editor');
    if ($preview.length > 0) {
      return editor.on('valuechanged', function(e) {
        return $preview.val(editor.getValue());
      });
    }
  });
    </script>
@endsection