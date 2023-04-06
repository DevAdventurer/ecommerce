

    @php
        $count = 0; 
    @endphp  
<div class="variant-container">
    @foreach($matrix as $items)
    <div class="row g-2">

       
        <div class="variant-inner col">
            <div class="form-group{{ $errors->has('variant') ? ' has-error' : '' }}">
                {!! Form::label('variant', 'Variant') !!}
                {!! Form::text('variants['.$count.'][value]', implode('/', $items), ['class' => 'form-control', 'required' => 'required', 'readonly'=>'readonly']) !!}
                <small class="text-danger">{{ $errors->first('variant') }}</small>
            </div>
        </div>

        <div class="variant-inner col">
            <div class="form-group{{ $errors->has('quantity_on_hand') ? ' has-error' : '' }}">
                {!! Form::label('quantity_on_hand', 'Quantity On Hand') !!}
                {!! Form::text('variants['.$count.'][quantity_on_hand]', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Quantity On Hand']) !!}
                <small class="text-danger">{{ $errors->first('quantity_on_hand') }}</small>
            </div>
        </div>


        <div class="variant-inner col">
            <div class="form-group{{ $errors->has('quantity_available') ? ' has-error' : '' }}">
                {!! Form::label('quantity_available', 'Quantity Available') !!}
                {!! Form::text('variants['.$count.'][quantity_available]', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Quantity Available']) !!}
                <small class="text-danger">{{ $errors->first('quantity_available') }}</small>
            </div>
        </div>

        <div class="variant-inner col">
            <div class="form-group{{ $errors->has('sku') ? ' has-error' : '' }}">
                {!! Form::label('sku', 'SKU') !!}
                {!! Form::text('variants['.$count.'][sku]', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'SKU']) !!}
                <small class="text-danger">{{ $errors->first('sku') }}</small>
            </div>
        </div>

        <div class="variant-inner col">
            <div class="form-group{{ $errors->has('variant_price') ? ' has-error' : '' }}">
                {!! Form::label('variant_price', 'Variant Price') !!}
                {!! Form::text('variants['.$count.'][variant_price]', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Variant Price']) !!}
                <small class="text-danger">{{ $errors->first('variant_price') }}</small>
            </div>
        </div>

        <div class="variant-inner col">
            <div class="form-group{{ $errors->has('variant_sale_price') ? ' has-error' : '' }}">
                {!! Form::label('variant_sale_price', 'Variant Sale Price') !!}
                {!! Form::text('variants['.$count.'][variant_sale_price]', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Variant Sale Price']) !!}
                <small class="text-danger">{{ $errors->first('variant_sale_price') }}</small>
            </div>
        </div>
    </div>
    @php
        $count++; 
    @endphp
    @endforeach
                    
</div>