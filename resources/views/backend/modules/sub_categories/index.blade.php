@extends('backend.layouts.master')

@section('page_title','Sub Category')
@section('page_sub_title','List')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="mb-0">Sub Category List</h4>
                        <a href="{{route('sub-category.create')}}"><button class="btn btn-sm btn-success">Add</button></a>
                    </div>
                </div>
                <div class="card-body">
                    {{--                    @if(session('msg'))--}}
                    {{--                        <div class="alert alert-{{session('cls')}}">--}}
                    {{--                            {!! session('msg') !!}--}}
                    {{--                        </div>--}}
                    {{--                    @endif--}}
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Order By</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $sl = 1;
                        @endphp
                        @foreach($sub_categories as $sub_category)
                            <tr>
                                <td>{{$sl++}}</td>
                                <td>{{$sub_category->name}}</td>
                                <td>{{$sub_category->slug}}</td>
                                <td>{{$sub_category->category->name}}</td>
                                <td>{{$sub_category->status == 1 ? 'Active' : 'Inactive'}}</td>
                                <td>{{$sub_category->order_by}}</td>
                                <td>{{$sub_category->created_at->toDayDateTimeString()}}</td>
                                <td>{{$sub_category->created_at != $sub_category->updated_at ? $sub_category->updated_at->toDayDateTimeString() : 'Not Updated Yet'}}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{route('sub-category.show',$sub_category->id)}}"><button class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></button></a>
                                        <a href="{{route('sub-category.edit',$sub_category->id)}}"><button class="btn btn-warning btn-sm mx-1"><i class="fa-solid fa-edit"></i></button></a>

                                        {!! Form::open(['method' => 'delete','id' => 'form_'.$sub_category->id, 'route' => ['sub-category.destroy', $sub_category->id]]) !!}
                                        {!! Form::button('<i class="fa-solid fa-trash"></i>',['type' => 'button','data-id' =>$sub_category->id, 'class' => 'delete btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    @if(session('msg'))
        @push('js')
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: '{{session('cls') == 'danger' ? 'error' : session('cls')}}',
                    toast: true,
                    title: '{{session('msg')}}',
                    showConfirmButton: false,
                    timer: 3000
                })
            </script>
        @endpush
    @endif

    @push('js')
        <script>

            $('.delete').on('click',function (){
                let id = $(this).attr('data-id');
                Swal.fire({
                    title: 'Are you sure to delete?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(`#form_${id}`).submit();
                    }
                });

            })



        </script>
    @endpush
@endsection





