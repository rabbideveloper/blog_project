{!! Form::label('name', 'Name') !!}
{!! Form::text('name', null, [ 'id' => 'name','class' => 'form-control', 'placeholder' => 'Enter category name']) !!}
{!! Form::label('slug', 'Slug',['class' => 'mt-2']) !!}
{!! Form::text('slug', null, ['id' => 'slug','class' => 'form-control', 'placeholder' => 'Enter category slug']) !!}
{!! Form::label('order_by', 'Tag Serial',['class' => 'mt-2']) !!}
{!! Form::number('order_by', null, ['class' => 'form-control', 'placeholder' => 'Enter category serial']) !!}
{!! Form::label('status', 'Tag Status',['class' => 'mt-2']) !!}
{!! Form::select('status', ['1'=>'Active','0'=>'Inactive'],null,['class' => 'form-select', 'placeholder' => 'Select category status']) !!}
