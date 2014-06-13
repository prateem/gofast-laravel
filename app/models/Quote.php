<?php

class Quote extends Eloquent {
  public $rules = [
    'companyName' => 'required',
    'contactName' => 'required',
    'phone' => 'required|digits:10',
    'email' => 'required|email',
    'pickupDate' => 'date_format:Y-m-d',
    'pickupStreet' => 'required',
    'pickupCity' => 'required',
    'pickupRegion' => 'required',
    'pickupCode' => 'required|postcode',
    'deliveryDate' => 'date_format:Y-m-d',
    'deliveryStreet' => 'required',
    'deliveryCity' => 'required',
    'deliveryRegion' => 'required',
    'deliveryCode' => 'required|postcode',
    'skids' => 'required|integer',
    'weight' => 'integer',
    'weightUnits' => 'in:pounds,kilos',
    'details' => '',
  ];
}