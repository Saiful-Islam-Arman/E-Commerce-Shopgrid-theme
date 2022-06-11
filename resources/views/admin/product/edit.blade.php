@extends('master.admin.master')

@section('title')
    Add Product
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Edit Product Form</h4>
                    <p class="text-center text-success">{{Session::get('message')}}</p>
                    <form action="{{route('product.update', ['id' => $product->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product category Name</label>
                            <div class="col-sm-9">
                               <select class="form-control" name="category_id" onchange="getProductSubCategory(this.value)">
                                   <option value="">------ Select product category ------</option>
                                   @foreach ($categories as $category)
                                   <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'Selected' : ' '}}>{{$category->name}}</option>
                                   @endforeach
                               </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product sub category Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="sub_category_id" id="subCategoryId">
                                   <option value="">------ Select product sub category ------</option>
                                   @foreach ($sub_categories as $sub_category)
                                   <option value="{{$sub_category->id}}" {{$sub_category->id == $product->sub_category_id ? 'Selected' : ' '}} >{{$sub_category->name}}</option>
                                   @endforeach
                               </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product Brand Name</label>
                            <div class="col-sm-9">
                               <select class="form-control" name="brand_id">
                                   <option value="">------ Select product Brand Name ------</option>
                                   @foreach ($brands as $brand)
                                   <option value="{{$brand->id}}" {{$brand->id == $product->brand_id ? 'Selected' : ' '}}>{{$brand->name}}</option>
                                   @endforeach
                               </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product unit</label>
                            <div class="col-sm-9">
                               <select class="form-control" name="unit_id">
                                   <option value="">------ Select product unit ------</option>
                                   @foreach ($units as $unit)
                                   <option value="{{$unit->id}}" {{$unit->id == $product->unit_id ? 'Selected' : ' '}}>{{$unit->name}}</option>
                                   @endforeach
                               </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" value="{{$product->name}}" class="form-control" id="horizontal-firstname-input">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product code</label>
                            <div class="col-sm-9">
                                <input type="text" name="code" value="{{$product->code}}" class="form-control" id="horizontal-firstname-input">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Regular price</label>
                            <div class="col-sm-9">
                                <input type="number" name="regular_price" value="{{$product->regular_price}}" class="form-control" id="horizontal-firstname-input">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Selling price</label>
                            <div class="col-sm-9">
                                <input type="number" name="selling_price" value="{{$product->selling_price}}" class="form-control" id="horizontal-firstname-input">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Stock Amount</label>
                            <div class="col-sm-9">
                                <input type="number" name="stock_amount" value="{{$product->stock_amount}}" class="form-control" id="horizontal-firstname-input">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Short Description</label>
                            <div class="col-sm-9">
                                <textarea name="short_description" value="{{$product->short_description}}" class="form-control" id="horizontal-email-input"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Long Description</label>
                            <div class="col-sm-9">
                                <textarea name="long_description" class="form-control summernote" value="{{$product->long_description}}" id="horizontal-email-input"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Product Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control-file" value="{{$product->regular_price}}" id="horizontal-password-input">
                                <img src="{{asset($product->image)}}" width="50" height="50" alt="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Product Other Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="other_image[]" class="form-control-file" multiple id="horizontal-password-input">
                                <img src="{{asset($product->otherImagesimage->image)}}" width="50" height="50" alt="">
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update Product Info</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

  
@endsection


