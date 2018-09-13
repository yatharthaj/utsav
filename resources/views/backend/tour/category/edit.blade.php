@extends('layouts.backend')
@section('content')
<div class="col-lg-10 col-lg-offset-1">
    {!! Form::model($category,array('route'=> array('tour-category.update',$category->id ),'class'=>'form form-validate','method' => 'PUT', 'files'=>true))!!}
    <input type="hidden" name="id" value="{{ $category->id }}">
        <div class="card">
            <div class="card-head style-primary">
                <header>Edit category</header>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::text('name', null, ['class' => 'form-control', 'id'=>'name']) }}
                                @if($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                                {{ Form::label('name', 'Name ') }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group floating-label {{$errors->has('image') ? 'has-error' : ''}}">
                            <input name="image" type="file"
                            id="image {{$errors->has('image')? 'inputError' : ''}}"
                            value="{{ old('image') }}" required/>
                            {{ Form::label('image', 'Featured Image') }}
                            @if ($errors->has('image'))
                            <span class="help-block">{{$errors->first('image')}}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <button type="submit" class="btn btn-block btn-success ink-reaction">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@stop