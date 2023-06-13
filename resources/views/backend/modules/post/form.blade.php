{!! Form::label('title', 'Title') !!}
{!! Form::text('title', null, [ 'id' => 'title','class' => 'form-control', 'placeholder' => 'Enter post title']) !!}
{!! Form::label('slug', 'Slug',['class' => 'mt-2']) !!}
{!! Form::text('slug', null, ['id' => 'slug','class' => 'form-control', 'placeholder' => 'Enter post slug']) !!}
{!! Form::label('status', 'Post Status',['class' => 'mt-2']) !!}
{!! Form::select('status', ['1'=>'Active','0'=>'Inactive'],null,['class' => 'form-select', 'placeholder' => 'Select post status']) !!}
<div class="row">
    <div class="col-md-6">
        {!! Form::label('category_id', 'Select Category',['class' => 'mt-2']) !!}
        {!! Form::select('category_id',$categories, null, ['id' => 'category_id','class' => 'form-select','placeholder' => 'Select Category']) !!}
    </div>
    <div class="col-md-6">
        {!! Form::label('sub_category_id', 'Select Sub Category',['class' => 'mt-2']) !!}
        <select name="sub_category_id" id="sub_category_id" class="form-control">
            <option selected="selected">Selected Sub Category</option>
        </select>
    </div>
</div>

{!! Form::label('description', 'Description',['class' => 'mt-2']) !!}
{!! Form::textarea('description',null,['id' =>'description', 'class' => 'form-control', 'placeholder' => 'Description']) !!}
{!! Form::label('tag_id', 'Select Tag',['class' => 'mt-2']) !!}
<br>
<div class="row">
    @foreach($tags as $tag)
        <div class="col-md-2">
            {!! Form::checkbox('tag_ids[]',$tag->id, false) !!} <span>{{$tag->name}}</span>
        </div>
    @endforeach
</div>

{!! Form::label('photo', 'Select Photo',['class' => 'mt-2']) !!}
{!! Form::file('photo', ['class' => 'form-control']) !!}



@push('css')
    <style>
        .ck.ck-editor__main > .ck-editor__editable {
            min-height: 250px;
        }
    </style>
@endpush

@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"
            integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        const get_sub_categories = (category_id) => {
            let route_name = '{{Route::currentRouteName()}}'
            let sub_category_element = $("#sub_category_id")
            sub_category_element.empty()
            let sub_category_select = ''
            if(route_name != 'post.edit')
            {
                sub_category_select = 'selected'
            }
            sub_category_element.append(`<option ${sub_category_select}>Selected Sub Category</option`)
            axios.get(window.location.origin + '/dashboard/get-subcategory/' + category_id).then(res => {
                let sub_categories = res.data
                sub_categories.map((sub_category, index) => {
                    let selected = ''
                    if (route_name == 'post.edit')
                    {
                        let sub_category_id = '{{$post->sub_category_id ?? null}}'
                        if (sub_category_id == sub_category.id)
                        {
                            selected = 'selected'
                        }
                    }
                   return sub_category_element.append(`<option ${selected} value="${sub_category.id}" > ${sub_category.name} </option>`)
                })
            })
        }

        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });

        $("#category_id").on('change', function () {
            let category_id = $("#category_id").val()
            get_sub_categories(category_id)
        })

        $('#title').on('input', function () {
            let name = $(this).val();
            let slug = name.replaceAll(' ', '-');
            $('#slug').val(slug.toLowerCase());
        });
    </script>
    @if(Route::currentRouteName() == 'post.edit')
        <script>
            get_sub_categories('{{$post->category_id}}')
        </script>
    @endif

@endpush
