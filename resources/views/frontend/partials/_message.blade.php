@if(Session::has('success'))
    <script>
        M.toast({html: '{{ Session::get('success')}}', classes: 'rounded amber darken-2'});
    </script>
@endif
@if(Session::has('error'))
    <script>
        M.toast({html: '{{ Session::get('error')}}', classes: 'rounded'});
    </script>
@endif
@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <script>M.toast({html: '{{$error}}', classes: 'rounded'});</script>
    @endforeach
@endif
