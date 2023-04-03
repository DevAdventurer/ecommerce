

                   
    @foreach($matrix as $items)
    <div class="row g-2">
        <div class="variant-inner col">
            <div class="form-group{{ $errors->has('variant') ? ' has-error' : '' }}">
                {!! Form::label('variant', 'Variant') !!}
                {!! Form::text('variant[]', implode('/', $items), ['class' => 'form-control', 'required' => 'required', 'readonly'=>'readonly']) !!}
                <small class="text-danger">{{ $errors->first('variant') }}</small>
            </div>
        </div>

        <div class="variant-inner col">
            <div class="form-group{{ $errors->has('quantity_on_hand') ? ' has-error' : '' }}">
                {!! Form::label('quantity_on_hand', 'Quantity On Hand') !!}
                {!! Form::text('quantity_on_hand[]', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('quantity_on_hand') }}</small>
            </div>
        </div>


        <div class="variant-inner col">
            <div class="form-group{{ $errors->has('quantity_available') ? ' has-error' : '' }}">
                {!! Form::label('quantity_available', 'Quantity available') !!}
                {!! Form::text('quantity_available[]', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('quantity_available') }}</small>
            </div>
        </div>

        <div class="variant-inner col">
            <div class="form-group{{ $errors->has('sku') ? ' has-error' : '' }}">
                {!! Form::label('sku', 'SKU') !!}
                {!! Form::text('sku[]', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('sku') }}</small>
            </div>
        </div>

        <div class="variant-inner col">
            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                {!! Form::label('price', 'Price') !!}
                {!! Form::text('price', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('price') }}</small>
            </div>
        </div>

        <div class="variant-inner col">
            <div class="form-group{{ $errors->has('sale_price') ? ' has-error' : '' }}">
                {!! Form::label('sale_price', 'Sale Price') !!}
                {!! Form::text('sale_price', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('sale_price') }}</small>
            </div>
        </div>
    </div>
    @endforeach
                    
