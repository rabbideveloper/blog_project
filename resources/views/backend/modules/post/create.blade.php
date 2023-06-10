@extends('backend.layouts.master')

@section('page_title','Create Post')
@section('page_sub_title','Create')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Create Post</h4>
                </div>
                <div class="card-body">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {!! Form::open(['method' => 'post', 'route' => 'post.store','files' => true]) !!}
                        @include('backend.modules.post.form')
                    {!! Form::button('Create Post',['type'=>'submit','class'=>'btn btn-success btn-sm mt-3']) !!}
                    {!! Form::close() !!}

                        <a href="{{route('post.index')}}"><button class="btn btn-sm btn-success mt-2">Back</button></a>

                </div>
            </div>
        </div>
    </div>

@push('js')
    <script>
        // Slug formatting javascript
        $('#name').on('input', function(){
            let name = $(this).val();
            let slug = name.replaceAll(' ', '-');
            $('#slug').val(slug.toLowerCase());
        });
    </script>
@endpush
@endsection
