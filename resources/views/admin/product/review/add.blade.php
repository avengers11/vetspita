@extends('admin.layouts.master')
@section('master')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Reviews</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Review</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{keywords()->Create_Review ?? __('Create Review')}}</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.product.review.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->User ?? __('User')}} </label>
                        <select name="user_id" id="" class="form-control" required>
                            <option value="">Select a user</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Product ?? __('Product')}} </label>
                        <select name="product_id" id="" class="form-control" required>
                            <option value="">Select a Product</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="employees-name">{{keywords()->Title ?? __('Title')}} </label>
                        <input type="text" class="form-control" name="title" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="employees-name">{{keywords()->Description ?? __('Description')}} </label>
                        <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="employees-name">{{keywords()->Ratings ?? __('Ratings')}} </label>
                        <input type="number" class="form-control" name="ratings" />
                    </div>

                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection