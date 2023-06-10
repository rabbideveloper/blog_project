@extends('backend.layouts.master')

@section('page_title','Sub Category')
@section('page_sub_title','Details')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Sub Category Details</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{$subCategory->id}}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{$subCategory->name}}</td>
                        </tr>
                        <tr>
                            <th>Slug</th>
                            <td>{{$subCategory->slug}}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{$subCategory->category->name}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{$subCategory->status == 1 ? 'Active' : 'Inactive'}}</td>
                        </tr>
                        <tr>
                            <th>Order By</th>
                            <td>{{$subCategory->order_by}}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{$subCategory->created_at->toDayDateTimeString()}}</td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{$subCategory->created_at != $subCategory->updated_at ? $subCategory->updated_at->toDayDateTimeString() : "Not updated yet"}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="{{route('sub-category.index')}}"><button class="btn btn-sm btn-success mt-2">Back</button></a>
                </div>
            </div>
        </div>
    </div>

@endsection
