<div class="form-group row align-items-center" :class="{'has-danger': errors.has('brand_id'), 'has-success': this.fields.brand_id && this.fields.brand_id.valid }">
    <label for="brand_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.product.columns.brand_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select name="brand_id" v-model="form.brand_id">
            <option value="">{{ trans('brackets/admin-ui::admin.forms.select_an_option') }}</option>
    @foreach ($brands as $brand)
        @if (empty($product) || $product->brand->id != $brand->id)
            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
        @else
            <option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
        @endif
    @endforeach
        </select>
        <div v-if="errors.has('brand_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('brand_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('units_on_order'), 'has-success': this.fields.units_on_order && this.fields.units_on_order.valid }">
    <label for="units_on_order" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.product.columns.units_on_order') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.units_on_order" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('units_on_order'), 'form-control-success': this.fields.units_on_order && this.fields.units_on_order.valid}" id="units_on_order" name="units_on_order" placeholder="{{ trans('admin.product.columns.units_on_order') }}">
        <div v-if="errors.has('units_on_order')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('units_on_order') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('images'), 'has-success': this.fields.images && this.fields.images.valid }">
    <label for="images" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.product.columns.images') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.images" v-validate="''" id="images" name="images" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('images')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('images') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': this.fields.description && this.fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.product.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="'required'" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('weight'), 'has-success': this.fields.weight && this.fields.weight.valid }">
    <label for="weight" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.product.columns.weight') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.weight" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('weight'), 'form-control-success': this.fields.weight && this.fields.weight.valid}" id="weight" name="weight" placeholder="{{ trans('admin.product.columns.weight') }}">
        <div v-if="errors.has('weight')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('weight') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('depth'), 'has-success': this.fields.depth && this.fields.depth.valid }">
    <label for="depth" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.product.columns.depth') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.depth" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('depth'), 'form-control-success': this.fields.depth && this.fields.depth.valid}" id="depth" name="depth" placeholder="{{ trans('admin.product.columns.depth') }}">
        <div v-if="errors.has('depth')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('depth') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('height'), 'has-success': this.fields.height && this.fields.height.valid }">
    <label for="height" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.product.columns.height') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.height" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('height'), 'form-control-success': this.fields.height && this.fields.height.valid}" id="height" name="height" placeholder="{{ trans('admin.product.columns.height') }}">
        <div v-if="errors.has('height')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('height') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('width'), 'has-success': this.fields.width && this.fields.width.valid }">
    <label for="width" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.product.columns.width') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.width" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('width'), 'form-control-success': this.fields.width && this.fields.width.valid}" id="width" name="width" placeholder="{{ trans('admin.product.columns.width') }}">
        <div v-if="errors.has('width')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('width') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('minimal_quantity'), 'has-success': this.fields.minimal_quantity && this.fields.minimal_quantity.valid }">
    <label for="minimal_quantity" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.product.columns.minimal_quantity') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.minimal_quantity" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('minimal_quantity'), 'form-control-success': this.fields.minimal_quantity && this.fields.minimal_quantity.valid}" id="minimal_quantity" name="minimal_quantity" placeholder="{{ trans('admin.product.columns.minimal_quantity') }}">
        <div v-if="errors.has('minimal_quantity')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('minimal_quantity') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('units_in_stock'), 'has-success': this.fields.units_in_stock && this.fields.units_in_stock.valid }">
    <label for="units_in_stock" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.product.columns.units_in_stock') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.units_in_stock" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('units_in_stock'), 'form-control-success': this.fields.units_in_stock && this.fields.units_in_stock.valid}" id="units_in_stock" name="units_in_stock" placeholder="{{ trans('admin.product.columns.units_in_stock') }}">
        <div v-if="errors.has('units_in_stock')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('units_in_stock') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sku'), 'has-success': this.fields.sku && this.fields.sku.valid }">
    <label for="sku" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.product.columns.sku') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sku" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sku'), 'form-control-success': this.fields.sku && this.fields.sku.valid}" id="sku" name="sku" placeholder="{{ trans('admin.product.columns.sku') }}">
        <div v-if="errors.has('sku')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sku') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('available_date'), 'has-success': this.fields.available_date && this.fields.available_date.valid }">
    <label for="available_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.product.columns.available_date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.available_date" :config="datePickerConfig" v-validate="'date_format:YYYY-MM-DD HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('available_date'), 'form-control-success': this.fields.available_date && this.fields.available_date.valid}" id="available_date" name="available_date" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('available_date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('available_date') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': this.fields.enabled && this.fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.product.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('discount'), 'has-success': this.fields.discount && this.fields.discount.valid }">
    <label for="discount" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.product.columns.discount') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.discount" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('discount'), 'form-control-success': this.fields.discount && this.fields.discount.valid}" id="discount" name="discount" placeholder="{{ trans('admin.product.columns.discount') }}">
        <div v-if="errors.has('discount')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('discount') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('discount_available'), 'has-success': this.fields.discount_available && this.fields.discount_available.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="discount_available" type="checkbox" v-model="form.discount_available" v-validate="''" data-vv-name="discount_available"  name="discount_available_fake_element">
        <label class="form-check-label" for="discount_available">
            {{ trans('admin.product.columns.discount_available') }}
        </label>
        <input type="hidden" name="discount_available" :value="form.discount_available">
        <div v-if="errors.has('discount_available')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('discount_available') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('wholesale_price'), 'has-success': this.fields.wholesale_price && this.fields.wholesale_price.valid }">
    <label for="wholesale_price" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.product.columns.wholesale_price') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.wholesale_price" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('wholesale_price'), 'form-control-success': this.fields.wholesale_price && this.fields.wholesale_price.valid}" id="wholesale_price" name="wholesale_price" placeholder="{{ trans('admin.product.columns.wholesale_price') }}">
        <div v-if="errors.has('wholesale_price')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('wholesale_price') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('price'), 'has-success': this.fields.price && this.fields.price.valid }">
    <label for="price" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.product.columns.price') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.price" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('price'), 'form-control-success': this.fields.price && this.fields.price.valid}" id="price" name="price" placeholder="{{ trans('admin.product.columns.price') }}">
        <div v-if="errors.has('price')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('price') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('msrp'), 'has-success': this.fields.msrp && this.fields.msrp.valid }">
    <label for="msrp" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.product.columns.msrp') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.msrp" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('msrp'), 'form-control-success': this.fields.msrp && this.fields.msrp.valid}" id="msrp" name="msrp" placeholder="{{ trans('admin.product.columns.msrp') }}">
        <div v-if="errors.has('msrp')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('msrp') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': this.fields.name && this.fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.product.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': this.fields.name && this.fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.product.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('note'), 'has-success': this.fields.note && this.fields.note.valid }">
    <label for="note" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.product.columns.note') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.note" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('note'), 'form-control-success': this.fields.note && this.fields.note.valid}" id="note" name="note" placeholder="{{ trans('admin.product.columns.note') }}">
        <div v-if="errors.has('note')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('note') }}</div>
    </div>
</div>


