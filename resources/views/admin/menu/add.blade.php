@extends('admin.main')

@section('head')
<script src="/ckeditor/ckeditor.js"></script>

@endsection

@section('content')

<form action="" method="POST">
    <div class="card-body">
        <div class="form-group">
            <label for="menu">Category name</label>
            <input type="text" name="menu" class="form-control" id="menu" placeholder="Enter name">
        </div>

        <div class="form-group">
            <label>Category </label>
            <select class="form-control" name="parent_id" id="">
                <option value="0">Parent Category</option>
            </select>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label>Detailed Description</label>
            <textarea name="content" id="editor" class="form-control"></textarea>
        </div>


        <div class="form-group">
            <label>Active</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                <label for="active" class="custom-control-label">Yes</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                <label for="no_active" class="custom-control-label">No</label>
            </div>
        </div>


        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create Categories</button>
        </div>
</form>

@endsection


@section('footer')
    <script>
        CKEDITOR.replace('editor');
    </script>
@endsection
