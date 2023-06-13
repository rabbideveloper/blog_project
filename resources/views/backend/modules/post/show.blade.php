@extends('backend.layouts.master')

@section('page_title','Post')
@section('page_sub_title','Details')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Post Details</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{$post->id}}</td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td>{{$post->title}}</td>
                        </tr>
                        <tr>
                            <th>Slug</th>
                            <td>{{$post->slug}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{$post->status == 1 ? 'Active' : 'Inactive'}}</td>
                        </tr>
                        <tr>
                            <th>Is Approved</th>
                            <td>{{$post->is_approved == 1 ? 'Approved' : 'Not Approved'}}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{!! $post->description !!}</td>
                        </tr>
                        <tr>
                            <th>Admin Comment</th>
                            <td>{!! $post->admin_comment !!}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{$post->created_at->toDayDateTimeString()}}</td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{$post->created_at != $post->updated_at ? $post->updated_at->toDayDateTimeString() : "Not updated yet"}}</td>
                        </tr>
                        <tr>
                            <th>Deleted At</th>
                            <td>{{$post->deleted_at != null ? $post->deleted_at->toDayDateTimeString() : "Not Deleted"}}</td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td><img class="img-thumbnail post_image" data-src="{{url('image/post/original/'.$post->photo)}}" src="{{url('image/post/thumbnail/'.$post->photo)}}" alt="{{$post->title}}"></td>
                        </tr>
                        <tr>
                            <th>Tags</th>
                            <td>
                                @php
                                    $classes = ['btn-success','btn-warning','btn-primary','btn-info','btn-danger','btn-dark'];
                                @endphp
                                @foreach($post->tag as $tag)
                                    <a href="{{route('tag.show',$tag->id)}}"><button class="btn btn-sm {{$classes[random_int(0,5)]}} mb-1">{{$tag->name}}</button></a>
                                @endforeach
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="{{route('post.index')}}"><button class="btn btn-sm btn-success mt-2">Back</button></a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Category Details</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover table-sm">
                        <tbody>
                            <tr>
                                <th>Id</th>
                                <td>{{$post->category?->id}}</td>
                            </tr>
                            <tr>
                                <th> Name</th>
                                <td>{{$post->category?->name}}</td>
                            </tr>
                            <tr>
                                <th> Slug</th>
                                <td>{{$post->category?->slug}}</td>
                            </tr>
                            <tr>
                                <th> Order By</th>
                                <td>{{$post->category?->order_by}}</td>
                            </tr>
                            <tr>
                                <th> Status </th>
                                <td>{{$post->category?->status == 1 ? "Active" : "Inactive"}}</td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{$post->category?->created_at->toDayDateTimeString()}}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>{{$post->category?->created_at != $post->category?->updated_at ? $post->category?->updated_at->toDayDateTimeString() : "Not updated yet"}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{route('category.show',$post->category_id)}}"><button class="btn btn-success btn-sm">Details</button></a>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                    <h4>Sub Category Details</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover table-sm">
                        <tbody>
                            <tr>
                                <th>Id</th>
                                <td>{{$post->sub_category?->id}}</td>
                            </tr>
                            <tr>
                                <th> Name</th>
                                <td>{{$post->sub_category?->name}}</td>
                            </tr>
                            <tr>
                                <th> Slug </th>
                                <td>{{$post->sub_category?->slug}}</td>
                            </tr>
                            <tr>
                                <th> Order By</th>
                                <td>{{$post->sub_category?->order_by}}</td>
                            </tr>
                            <tr>
                                <th> Status </th>
                                <td>{{$post->sub_category?->status == 1 ? "Active" : "Inactive"}}</td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{$post->sub_category?->created_at->toDayDateTimeString()}}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>{{$post->sub_category?->created_at != $post->sub_category?->updated_at ? $post->sub_category?->updated_at->toDayDateTimeString() : "Not updated yet"}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{route('sub-category.show',$post->sub_category_id)}}"><button class="btn btn-success btn-sm">Details</button></a>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                    <h4>User Details</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover table-sm">
                        <tbody>
                            <tr>
                                <th>Id</th>
                                <td>{{$post->user?->id}}</td>
                            </tr>
                            <tr>
                                <th> Name</th>
                                <td>{{$post->user?->name}}</td>
                            </tr>
                            <tr>
                                <th> Email</th>
                                <td>{{$post->user?->email}}</td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{$post->user?->created_at->toDayDateTimeString()}}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>{{$post->user?->created_at != $post->user?->user ? $post->user?->updated_at->toDayDateTimeString() : "Not updated yet"}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
