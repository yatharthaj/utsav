@extends('layouts.backend')
@section('styles')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
@stop
@section('content')
    <div class="row">
        <div class="col-lg-offset-1 col-md-10">
            {!! Form::model($page,array('route'=> array('pages.update',$page->id ),'class'=>'form form-validate','method' => 'PUT', 'files'=>true))!!}
            <div class="card">
                <div class="card-head style-primary">
                    <header>Edit Page</header>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                                {{ Form::text('title', Request::old('title'), ['class' => 'form-control', 'placeholder' => 'Enter title here', 'required']) }}
                                @if($errors->has('title'))
                                    <span class="help-block">{{ $errors->first('title') }}</span>
                                @endif
                                {{ Form::label('title', 'Title ') }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group  {{$errors->has('category_id') ? 'has-error' : ''}}">
                                <select id="category_id {{$errors->has('category_id')? 'inputError' : ''}}"
                                        name="category_id" class="form-control">
                                    <option value="">&nbsp;</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{($category->id == $page->category->id)?"selected":"" }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="help-block">{{$errors->first('category_id')}}</span>
                                @endif
                                <label for="category">Category</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group {{$errors->has('main') ? 'has-error' : ''}}">
                                <label class="col-sm-6 control-label">Main or Sub</label>
                                <div class="col-sm-6">
                                    <label class="radio-inline radio-styled radio-success">
                                        <input type="radio" value="1" name="main"
                                               {{$page->main ? 'checked' : ' '}} onclick="hidemenu()"><span>Main</span>
                                    </label>
                                    <label class="radio-inline radio-styled radio-info">
                                        <input type="radio" value="0" name="main"
                                               {{$page->main ?  : 'checked'}}onclick="showmenu()"><span>Sub</span>
                                    </label>
                                </div>
                                @if($errors->has('status'))
                                    <span class="help-block">{{ $errors->first('main') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" id="parent">
                            <div class="form-group  {{$errors->has('parent_id') ? 'has-error' : ''}}">
                                <select class="form-control m-b-sm" name="parent_id" id="name">
                                    @foreach($pages as $page)
                                        @if(!$page->main)
                                            <option value="{{ $page->id }}" {{($page->id == $page->parent->id)?"selected":"" }}>{{ $page->name }}</option>
                                        @endif
                                        <option value="{{$page->id}}">{{$page->title}}</option>
                                    @endforeach
                                </select>
                                <label class="control-label">Parent Page</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group  {{$errors->has('position') ? 'has-error' : ''}}">
                                {{ Form::text('position', null, ['class' => 'form-control input-md m-b-sm', 'id'=>'position']) }}
                                <label for="position">Position</label>
                                @if ($errors->has('position'))
                                    <span class="help-block">{{$errors->first('position')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label class=" control-label">Banner:</label>
                            <input type="file" name="banner">
                            @if ($errors->has('banner'))
                                <span class="help-block">{{$errors->first('banner')}}</span>
                            @endif<br>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group {{$errors->has('status') ? 'has-error' : ''}}">
                                <label class="col-sm-6 control-label">Status</label>
                                <div class="col-sm-6">
                                    <label class="radio-inline radio-styled radio-success">
                                        <input type="radio" value="1" name="status" checked><span>Publish</span>
                                    </label>
                                    <label class="radio-inline radio-styled radio-warning">
                                        <input type="radio" value="0" name="status"><span>Draft</span>
                                    </label>
                                </div>
                                @if($errors->has('status'))
                                    <span class="help-block">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            {{ Form::textarea('page_content',null) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group {{$errors->has('mtitle') ? 'has-error' : ''}}">
                                {{ Form::text('mtitle', null, ['class' => 'form-control', 'id'=>'mtitle']) }}
                                @if($errors->has('mtitle'))
                                    <span class="help-block">{{ $errors->first('mtitle') }}</span>
                                @endif
                                {{ Form::label('mtitle', 'Meta Title ') }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12" id="desc">
                            <div class="form-group  {{$errors->has('description') ? 'has-error' : ''}}">
						<textarea v-model="desc" class="form-control meta" maxlength="160" name="description"
                                  id="description {{$errors->has('description')? 'inputError' : ''}}"
                                  value="{{$page->description}}">
						</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">{{$errors->first('description')}}</span>
                                @endif
                                <label for="textarea2">Description</label>
                            </div>
                            <em class="text-caption"><span>@{{ descRemaining }}</span> characters remaining.</em>
                        </div>
                    </div>
                </div><!--end .card body-->
                <div class="card-actionbar">
                    <div class="card-actionbar-row">
                        {{ Form::submit('Edit', ['class' => 'btn btn-lg btn-flat btn-primary ink-reaction'] )}}
                    </div>
                </div>
                {!! Form::close() !!}
            </div><!--end .col -->
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/core/demo/DemoFormComponents.js') }}"></script>
    <script src="{{ asset('js/libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/libs/ckeditor/adapters/jquery.js') }}"></script>
    <script src="{{ asset('js/core/demo/DemoFormEditors.js') }}"></script>
    <script>
        CKEDITOR.replace('page_content', options);
        @if (!$page->main)
        $("#parent").show();
        @else
        $("#parent").hide();
        document.getElementById("name").disabled = true;

        @endif
        function showmenu() {
            document.getElementById('parent').style.display = 'block';
            document.getElementById("name").disabled = false;
        }

        function hidemenu() {
            document.getElementById('parent').style.display = 'none';
            document.getElementById("name").disabled = true;
        }
    </script>
    <script>
        var keywordcount = new Vue({
            el: "#desc",
            data: {
                maxdesc: 160,
                desc: '{{$page->description}}'
            },
            computed: {
                descRemaining: function () {
                    return this.maxdesc - this.desc.length;
                }
            }
        });

    </script>
@stop
