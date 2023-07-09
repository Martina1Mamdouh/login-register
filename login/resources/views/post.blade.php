@extends('layout')
@section('title','post')
@section('content')
<div class="container">
    <form action="{{route('post.post')}}" method="POST" class="ms-auto me-auto mt-auto" style="width: 500px" class="was-validated">
        <div class="mb-3">
            <label for="validationTextarea" class="form-label">quotes</label>
            <textarea class="form-control"  placeholder="Required example textarea" required name="text"></textarea>
            <textarea class="form-control"  placeholder="Required example textarea" required name="description"></textarea>
            <div class="invalid-feedback">
                Please enter a message in the textarea.
            </div>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit" >Submit form</button>

        </div>
    </form>
</div>
@endsection
