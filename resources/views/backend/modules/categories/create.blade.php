@extends('backend.layouts.master')

@section('page_title','Create Category')
@section('page_sub_title','Create');


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Create Category</h4>
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

                    {!! Form::open(['method' => 'post', 'route' => 'category.store']) !!}
                        @include('backend.modules.categories.form')
                    {!! Form::button('Create Category',['type'=>'submit','class'=>'btn btn-success btn-sm mt-3']) !!}
                    {!! Form::close() !!}

                        <a href="{{route('category.index')}}"><button class="btn btn-sm btn-success mt-2">Back</button></a>

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
