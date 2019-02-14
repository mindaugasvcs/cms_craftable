@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.product.actions.index'))

@section('body')

    <product-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/products') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.product.actions.index') }}
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/products/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.product.actions.create') }}</a>
                    </div>
                    <div class="card-body" v-cloak>
                        <form @submit.prevent="">
                            <div class="row justify-content-md-between">
                                <div class="col col-lg-7 col-xl-5 form-group">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-auto form-group ">
                                    <select class="form-control" v-model="pagination.state.per_page">
                                        
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>

                            </div>
                        </form>

                        <table class="table table-hover table-listing">
                            <thead>
                                <tr>
                                    <th is='sortable' :column="'id'">{{ trans('admin.product.columns.id') }}</th>
                                    <th is='sortable' :column="'brand_id'">{{ trans('admin.product.columns.brand_id') }}</th>
                                    <th is='sortable' :column="'sku'">{{ trans('admin.product.columns.sku') }}</th>
                                    <th is='sortable' :column="'name'">{{ trans('admin.product.columns.name') }}</th>
                                    <th is='sortable' :column="'msrp'">{{ trans('admin.product.columns.msrp') }}</th>
                                    <th is='sortable' :column="'price'">{{ trans('admin.product.columns.price') }}</th>
                                    <th is='sortable' :column="'wholesale_price'">{{ trans('admin.product.columns.wholesale_price') }}</th>
                                    <th is='sortable' :column="'discount_available'">{{ trans('admin.product.columns.discount_available') }}</th>
                                    <th is='sortable' :column="'discount'">{{ trans('admin.product.columns.discount') }}</th>
                                    <th is='sortable' :column="'enabled'">{{ trans('admin.product.columns.enabled') }}</th>
                                    <th is='sortable' :column="'available_date'">{{ trans('admin.product.columns.available_date') }}</th>
                                    <th is='sortable' :column="'units_in_stock'">{{ trans('admin.product.columns.units_in_stock') }}</th>
                                    <th is='sortable' :column="'units_on_order'">{{ trans('admin.product.columns.units_on_order') }}</th>
                                    <th is='sortable' :column="'minimal_quantity'">{{ trans('admin.product.columns.minimal_quantity') }}</th>
                                    <th is='sortable' :column="'width'">{{ trans('admin.product.columns.width') }}</th>
                                    <th is='sortable' :column="'height'">{{ trans('admin.product.columns.height') }}</th>
                                    <th is='sortable' :column="'depth'">{{ trans('admin.product.columns.depth') }}</th>
                                    <th is='sortable' :column="'weight'">{{ trans('admin.product.columns.weight') }}</th>
                                    <th is='sortable' :column="'note'">{{ trans('admin.product.columns.note') }}</th>
                                    
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in collection">
                                    <td>@{{ item.id }}</td>
                                    <td>@{{ item.brand_name }}</td>
                                    <td>@{{ item.sku }}</td>
                                    <td>@{{ item.name }}</td>
                                    <td>@{{ item.msrp }}</td>
                                    <td>@{{ item.price }}</td>
                                    <td>@{{ item.wholesale_price }}</td>
                                    <td>
                                        <label class="switch switch-3d switch-success">
                                            <input type="checkbox" class="switch-input" v-model="collection[index].discount_available" @change="toggleSwitch(item.resource_url, 'discount_available', collection[index])">
                                            <span class="switch-slider"></span>
                                        </label>
                                    </td>
                                    <td>@{{ item.discount }} %</td>
                                    <td>
                                        <label class="switch switch-3d switch-success">
                                            <input type="checkbox" class="switch-input" v-model="collection[index].enabled" @change="toggleSwitch(item.resource_url, 'enabled', collection[index])">
                                            <span class="switch-slider"></span>
                                        </label>
                                    </td>
                                    
                                    <td>@{{ item.available_date | date }}</td>
                                    <td>@{{ item.units_in_stock }}</td>
                                    <td>@{{ item.units_on_order }}</td>
                                    <td>@{{ item.minimal_quantity }}</td>
                                    <td>@{{ item.width }}</td>
                                    <td>@{{ item.height }}</td>
                                    <td>@{{ item.depth }}</td>
                                    <td>@{{ item.weight }}</td>
                                    <td>@{{ item.note }}</td>
                                    
                                    <td>
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                            </div>
                                            <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row" v-if="pagination.state.total > 0">
                            <div class="col-sm">
                                <span class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                            </div>
                            <div class="col-sm-auto">
                                <pagination></pagination>
                            </div>
                        </div>

	                    <div class="no-items-found" v-if="!collection.length > 0">
		                    <i class="icon-magnifier"></i>
		                    <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
		                    <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                            <a class="btn btn-primary btn-spinner" href="{{ url('admin/products/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.product.actions.create') }}</a>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
    </product-listing>

@endsection