<?php

namespace INRTracker;

use Illuminate\Database\Eloquent\Model;

class INRBounds extends Model
{
  //Use custom table  
  protected $table = 'INR_Bounds';
  public $timestamps = false;
  protected $primaryKey = 'UserId';
  
  /* Add the fillable property into the INBounds Model */
  protected $fillable = ['UserId','UpperBound','LowerBound'];
}
