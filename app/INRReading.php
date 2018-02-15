<?php

namespace INRTracker;

use Illuminate\Database\Eloquent\Model;

class INRReading extends Model
{
  //Use custom table  
  protected $table = 'INR_Reading';
  public $timestamps = false;
  
  /* Add the fillable property into the INRReading Model */
  protected $fillable = ['UserId','INR_Reading','Reading_Date'];
  
  
}
