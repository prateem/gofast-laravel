<div class="row">
  <div class="row">
    <div class="large-4 columns">
      <h1>Request a Quote!</h1>
    </div>
    <div class="large-8 columns">
      <h1><small>We'll get back to you as soon as we can.</small></h1>
    </div>
  </div>

  {{ Form::open(['action' => 'QuoteController@index']) }}

  <div class="row">
    <div class="small-12 columns">
      {{ Form::label('companyName', 'Company Name') }}
      {{ Form::text('companyName', null, ['placeholder' => 'John and Jane Smith Inc.']) }}
    </div>
  </div>

  <div class="row">
    <div class="large-4 columns">
      {{ Form::label('contactName', 'Contact Name') }}
      {{ Form::text('contactName', null, ['placeholder' => 'John Smith']) }}
    </div>
    <div class="medium-6 large-4 columns">
      {{ Form::label('phone', 'Phone Number (No seperators)') }}
      {{ Form::input('tel', 'phone', null, ['placeholder' => '0123456789', 'maxlength' => '10']) }}
    </div>
    <div class="medium-6 large-4 columns">
      {{ Form::label('email', 'E-mail Address') }}
      {{ Form::email('email', null, ['placeholder' => 'you@example.com']) }}
    </div>
  </div>

  <br/>

  <div class="row">
    <div class="medium-4 columns">
      {{ Form::label('pickupDate', 'Pick-up Date (mm/dd/yyyy)') }}
      {{ Form::text('pickupDate', null, ['placeholder' => '05/22/1992', 'class' => 'datepicker']) }}
    </div>
    <div class="medium-8 columns">
      {{ Form::label('pickupStreet', 'Pick-up Street') }}
      {{ Form::text('pickupStreet', null, ['placeholder' => '123 East St.']) }}
    </div>
  </div>

  <div class="row">
    <div class="medium-6 columns">
      {{ Form::label('pickupCity', 'Pick-up City') }}
      {{ Form::text('pickupCity', null, ['placeholder' => 'Ottawa']) }}
    </div>
    <div class="medium-3 columns">
      {{ Form::label('pickupRegion', 'Province/Territory/State') }}
      {{ Form::text('pickupRegion', null, ['placeholder' => 'ON']) }}
    </div>
    <div class="medium-3 columns">
      {{ Form::label('pickupCode', 'Postal/Zip Code') }}
      {{ Form::text('pickupCode', null, ['placeholder' => 'L3Z 1E8']) }}
    </div>
  </div>

  <br/>

  <div class="row">
    <div class="medium-4 columns">
      {{ Form::label('deliveryDate', 'Delivery Date (mm/dd/yyyy)') }}
      {{ Form::text('deliveryDate', null, ['placeholder' => '12/25/1992', 'class' => 'datepicker']) }}
    </div>
    <div class="medium-8 columns">
      {{ Form::label('deliveryStreet', 'Delivery Street') }}
      {{ Form::text('deliveryStreet', null, ['placeholder' => '456 West Blvd.']) }}
    </div>
  </div>
  
  <div class="row">
    <div class="medium-6 columns">
      {{ Form::label('deliveryCity', 'Delivery City') }}
      {{ Form::text('deliveryCity', null, ['placeholder' => 'Victoria']) }}
    </div>
    <div class="medium-3 columns">
      {{ Form::label('deliveryRegion', 'Province/Territory/State') }}
      {{ Form::text('deliveryRegion', null, ['placeholder' => 'BC']) }}
    </div>
    <div class="medium-3 columns">
      {{ Form::label('deliveryCode', 'Postal/Zip Code') }}
      {{ Form::text('deliveryCode', null, ['placeholder' => 'L1R 9M2']) }}
    </div>
  </div>

  <br/>

  <div class="row">
    <div class="medium-3 columns">
      {{ Form::label('skids', 'Skid Count') }}
      {{ Form::input('number', 'skids', null, ['placeholder' => '12', 'min' => '1']) }}
    </div>
    <div class="medium-3 columns">
      {{ Form::label('weight', 'Weight') }}
      {{ Form::input('number', 'weight', null, ['placeholder' => '34', 'min' => '1']) }}
    </div>
    <div class="medium-6 columns">
      {{ Form::label(null, 'Units') }}<br/>
      {{ Form::radio('weightUnits', 'pounds', true, ['id' => 'pounds']) }}
      {{ Form::label('pounds', 'lbs') }}

      {{ Form::radio('weightUnits', 'kilos', false, ['id' => 'kilos']) }}
      {{ Form::label('kilos', 'kgs') }}
    </div>
  </div>

  <br/>

  <div class="row">
    <div class="small-12 columns">
      {{ Form::label('details', 'Additional Details') }}
      {{ Form::textarea('details', null, ['placeholder' => "Anything you'd like us to know?"]) }}
    </div>
  </div>

  <div class="row">
    <div class="small-12 columns">
      {{ Form::submit('Submit', ['class' => 'button']) }}
    </div>
  </div>

  {{ Form::close() }}
</div>