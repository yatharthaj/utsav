<div class="row">
    <div class="col-sm-12">
        <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
            {{ Form::text('title', Request::old('title'), ['class' => 'form-control', 'placeholder' => 'Enter title here', 'required']) }}
            @if($errors->has('title'))
                <span class="help-block">{{ $errors->first('title') }}</span>
            @endif
            {{ Form::label('title', 'Title: ') }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group {{$errors->has('category_id') ? 'has-error' : ''}}">
            <select name="category_id" id="category" class="form-control">Page Category
                <option value="">None</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <label for="category" class="control-label">Page Category</label>
            @if($errors->has('title'))
                <span class="help-block">{{ $errors->first('category_id') }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group {{$errors->has('main') ? 'has-error' : ''}}">
            <label class="col-sm-6 control-label">Main or Sub</label>
            <div class="col-sm-6">
                <label class="radio-inline radio-styled radio-success">
                    <input type="radio" value="1" name="main" checked onclick="hidemenu()"><span>Main</span>
                </label>
                <label class="radio-inline radio-styled radio-info">
                    <input type="radio" value="0" name="main" onclick="showmenu()"><span>Sub</span>
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
                    <option value="{{$page->id}}">{{$page->title}}</option>
                @endforeach
            </select>
            <label class="control-label">Parent Page</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group  {{$errors->has('position') ? 'has-error' : ''}}">
            <input type="text" class="form-control input-md m-b-sm" name="position">
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
                    <input type="radio" value="1" name="status"><span>Publish</span>
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
<div class="col-md-12">
    <div class="form-group">
        <textarea name="page_content"> </textarea>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group {{$errors->has('mtitle') ? 'has-error' : ''}}">
            {{ Form::text('title', null, ['class' => 'form-control', 'id'=>'mtitle']) }}
            @if($errors->has('mtitle'))
                <span class="help-block">{{ $errors->first('mtitle') }}</span>
            @endif
            {{ Form::label('title', 'Meta Title ') }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12" id="desc">
        <div class="form-group  {{$errors->has('description') ? 'has-error' : ''}}">
						<textarea v-model="desc" class="form-control meta" maxlength="160" name="description"
                                  id="description {{$errors->has('description')? 'inputError' : ''}}" >
						</textarea>
            @if ($errors->has('description'))
                <span class="help-block">{{$errors->first('description')}}</span>
            @endif
            <label for="textarea2">Description</label>
        </div>
        <em class="text-caption"><span>@{{ descRemaining }}</span> characters remaining.</em>
    </div>
</div>