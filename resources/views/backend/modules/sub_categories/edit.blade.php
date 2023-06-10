@extends('backend.layouts.master')

@section('page_title','Edit Sub Category')
@section('page_sub_title','Edit')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Edit Sub Category</h4>
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

                    {!! Form::model($subCategory,['method' => 'put', 'route' => ['sub-category.update',$subCategory->id]]) !!}
                        @include('backend.modules.sub_categories.form')
                    {!! Form::button('Update Sub Category',['type'=>'submit','class'=>'btn btn-success btn-sm mt-3']) !!}
                    {!! Form::close() !!}

                        <a href="{{route('sub-category.index')}}"><button class="btn btn-sm btn-success mt-2">Back</button></a>
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
