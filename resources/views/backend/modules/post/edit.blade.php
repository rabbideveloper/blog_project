@extends('backend.layouts.master')

@section('page_title','Post')
@section('page_sub_title','Edit')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0"> Post Edit</h4>
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

                    {!! Form::model($post,['method' => 'put', 'route' => ['post.update',$post->id],'files' => true]) !!}
                        @include('backend.modules.post.form')
                    {!! Form::button('Update Post',['type'=>'submit','class'=>'btn btn-success btn-sm mt-3']) !!}
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
