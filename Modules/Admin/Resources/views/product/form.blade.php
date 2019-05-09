<form class="col-md-12" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="validationCustom03">Tên sản phẩm</label>
                <input type="text" class="form-control" placeholder="Tên sản phẩm" id="validationCustom03" value="{{ old('name',isset($product->pro_name) ? $product->pro_name : '') }}" name="pro_name">
                @if ($errors->has('pro_name'))
                    <p class="text-danger">{{ $errors->first('pro_name') }}</p>
                @endif
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Giá sản phẩm</label>
                    <input type="text" class="form-control" placeholder="Giá sản phẩm" id="validationCustom03" value="{{ old('pro_price',isset($product->pro_price) ? $product->pro_price : '') }}" name="pro_price">
                    @if ($errors->has('pro_price'))
                        <p class="text-danger">{{ $errors->first('pro_price') }}</p>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="">% Khuyến mãi</label>
                    <input type="text" class="form-control" placeholder="Khuyến mãi" id="validationCustom03" value="{{ old('pro_sale',isset($product->pro_sale) ? $product->pro_sale : '0') }}" name="pro_sale">
                </div>
            </div>
            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="number" class="form-control" placeholder="Số lượng" value="{{ old('pro_number',isset($product->pro_number) ? $product->pro_number : '') }}" name="pro_number">
                @if ($errors->has('pro_number'))
                    <p class="text-danger">{{ $errors->first('pro_number') }}</p>
                @endif
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <div class="form-check form-check-flat">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="sizeBox1" name="pro_size_xs[]" value="{{@(!empty($product->pro_size_xs) ? $product->pro_size_xs : "")}}" {{($product->pro_size_xs == 1 ? "checked='checked'": '')}}> Size XS
                            <i class="input-helper"></i>
                        </label>
                    </div>
                    <label for="">Số lượng</label>
                    <input type="number" class="form-control" id="sizeQty1" placeholder="Số lượng" value="{{ old('pro_qty_xs',isset($product->pro_qty_xs) ? $product->pro_qty_xs : '0') }}" name="pro_qty_xs" {{($product->pro_size_xs == 0 ? "disabled='disabled'": '')}}>
                </div>
                <div class="form-group col-md-4">
                    <div class="form-check form-check-flat">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="sizeBox2" name="pro_size_s[]" value="{{@(!empty($product->pro_size_s) ? $product->pro_size_s : "")}}" {{($product->pro_size_s == 1 ? "checked='checked'": '')}}> Size S
                            <i class="input-helper"></i>
                        </label>
                    </div>
                    <label for="">Số lượng</label>
                    <input type="number" class="form-control" id="sizeQty2" placeholder="Số lượng" value="{{ old('pro_qty_s',isset($product->pro_qty_s) ? $product->pro_qty_s : '0') }}" name="pro_qty_s" {{($product->pro_size_s == 0 ? "disabled='disabled'": '')}}>
                </div>
                <div class="form-group col-md-4">
                    <div class="form-check form-check-flat">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="sizeBox3" name="pro_size_m[]" value="{{@(!empty($product->pro_size_m) ? $product->pro_size_m : "")}}" {{($product->pro_size_m == 1 ? "checked='checked'": '')}}> Size M
                            <i class="input-helper"></i>
                        </label>
                    </div>
                    <label for="">Số lượng</label>
                    <input type="number" class="form-control" id="sizeQty3" placeholder="Số lượng" value="{{ old('pro_qty_m',isset($product->pro_qty_m) ? $product->pro_qty_m : '0') }}" name="pro_qty_m" {{($product->pro_size_m == 0 ? "disabled='disabled'": '')}}>
                </div>
                <div class="form-group col-md-4">
                    <div class="form-check form-check-flat">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="sizeBox4" name="pro_size_l[]" value="{{@(!empty($product->pro_size_l) ? $product->pro_size_l : "")}}" {{($product->pro_size_l == 1 ? "checked='checked'": '')}}> Size L
                            <i class="input-helper"></i>
                        </label>
                    </div>
                    <label for="">Số lượng</label>
                    <input type="number" class="form-control" id="sizeQty4" placeholder="Số lượng" value="{{ old('pro_qty_l',isset($product->pro_qty_l) ? $product->pro_qty_l : '0') }}" name="pro_qty_l" {{($product->pro_size_l == 0 ? "disabled='disabled'": '')}}>
                </div>
                <div class="form-group col-md-4">
                    <div class="form-check form-check-flat">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="sizeBox5" name="pro_size_xl[]" value="{{@(!empty($product->pro_size_xl) ? $product->pro_size_xl : "")}}" {{($product->pro_size_xl == 1 ? "checked='checked'": '')}}> Size XL
                            <i class="input-helper"></i>
                        </label>
                    </div>
                    <label for="">Số lượng</label>
                    <input type="number" class="form-control" id="sizeQty5" placeholder="Số lượng" value="{{ old('pro_qty_xl',isset($product->pro_qty_xl) ? $product->pro_qty_xl : '0') }}" name="pro_qty_xl" {{($product->pro_size_xl == 0 ? "disabled='disabled'": '')}}>
                </div>
                <div class="form-group col-md-4">
                    <div class="form-check form-check-flat">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="sizeBox6" name="pro_size_xxl[]" value="{{@(!empty($product->pro_size_xxl) ? $product->pro_size_xxl : "")}}" {{($product->pro_size_xxl == 1 ? "checked='checked'": '')}}> Size XXL
                            <i class="input-helper"></i>
                        </label>
                    </div>
                    <label for="">Số lượng</label>
                    <input type="number" class="form-control" id="sizeQty6" placeholder="Số lượng" value="{{ old('pro_qty_xxl',isset($product->pro_qty_xxl) ? $product->pro_qty_xxl : '0') }}" name="pro_qty_xxl" {{($product->pro_size_xxl == 0 ? "disabled='disabled'": '')}}>
                </div>
            </div>
            <div class="form-group">
                <label for="">Mô tả</label>
                <textarea class="form-control" id="exampleTextarea1" rows="3" placeholder="Mô tả ngắn cho sản phẩm" name="pro_description">{{ old('pro_description',isset($product->pro_description) ? $product->pro_description : '') }}</textarea>
                @if ($errors->has('pro_description'))
                    <p class="text-danger">{{ $errors->first('pro_description') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="">Title SEO</label>
                <input type="text" class="form-control" placeholder="Title SEO" value="{{ old('pro_title_seo',isset($product->pro_title_seo) ? $product->pro_title_seo : '') }}" name="pro_title_seo">
            </div>
            <div class="form-group">
                <label for="">Desription SEO</label>
                <input type="text" class="form-control" placeholder="Desription SEO" value="{{ old('pro_description_seo',isset($product->pro_description_seo) ? $product->pro_description_seo : '') }}" name="pro_description_seo">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleFormControlSelect2">Loại sản phẩm</label>
                <select class="form-control" id="exampleFormControlSelect2" name="pro_category_id">
                    <option value="">--Chọn loại sản phẩm--</option>
                    @if(isset($categories))
                        @foreach($categories as $category)
                            {{--<option value="{{ $category->id }}" {{ old('id' == $category->id ? 'selected' : '') }}>{{ $category->c_name }}</option>--}}
                            <option value="{{ $category->id }}" {{ old('pro_category_id',isset($product->pro_category_id) ? $product->pro_category_id : '') == $category->id ? "selected = 'selected'" : "" }}>{{ $category->c_name }}</option>
                        @endforeach
                    @endif
                </select>
                @if ($errors->has('pro_category_id'))
                    <p class="text-danger">{{ $errors->first('pro_category_id') }}</p>
                @endif
            </div>
            <div class="form-group position-relative">
                <label>Hình đại diện sản phẩm</label>
                <img id="output_img" src="{{ isset($product->pro_avatar) ? pare_url_file($product->pro_avatar) : asset('images/no_image.jpg') }}" alt="" width="100%"><div class="btn-choose-image">Chọn file</div></img>
                <input id="input_img" type="file" class="form-control file-upload-info" name="pro_avatar">
                @if ($errors->has('pro_avatar'))
                    <p class="text-danger">{{ $errors->first('pro_avatar') }}</p>
                @endif

            </div>
            {{--<div class="form-group">--}}
                {{--<input id="input_img" type="file" class="form-control file-upload-info" name="pro_avatar">--}}
                {{--@if ($errors->has('pro_avatar'))--}}
                    {{--<p class="text-danger">{{ $errors->first('pro_avatar') }}</p>--}}
                {{--@endif--}}
            {{--</div>--}}
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="hot"> Nổi bật
                    <i class="input-helper"></i>
                </label>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Nội dung</label>
                <textarea class="form-control" id="editor" rows="3" placeholder="Nội dung sản phẩm" name="pro_content">{{ old('pro_content',isset($product->pro_content) ? $product->pro_content : '') }}</textarea>
                {{--<div id="editor"></div>--}}
                @if ($errors->has('pro_content'))
                    <p class="text-danger">{{ $errors->first('pro_content') }}</p>
                @endif
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success mr-2">Lưu</button>
    <a class="btn btn-light" href="{{ route('admin.get.list.product') }}">Hủy</a>
</form>

@section('view.scripts')
    <script>
        document.getElementById('sizeBox1').onchange = function() {
            document.getElementById('sizeQty1').disabled = !this.checked;
        };
        document.getElementById('sizeBox2').onchange = function() {
            document.getElementById('sizeQty2').disabled = !this.checked;
        };
        document.getElementById('sizeBox3').onchange = function() {
            document.getElementById('sizeQty3').disabled = !this.checked;
        };
        document.getElementById('sizeBox4').onchange = function() {
            document.getElementById('sizeQty4').disabled = !this.checked;
        };
        document.getElementById('sizeBox5').onchange = function() {
            document.getElementById('sizeQty5').disabled = !this.checked;
        };
        document.getElementById('sizeBox6').onchange = function() {
            document.getElementById('sizeQty6').disabled = !this.checked;
        };
    </script>
@endsection