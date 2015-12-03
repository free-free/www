<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eloquent extends Model
{
    //
    protected $table='user';
    protected $primaryKey='id';
    public    $timestamps=false;
    protected $dates=['create_time'];
    protected $dateFormat='Y/m/d H:i:s';
    /*
	$guarded and $fillable can't be used at the same time
    */
   // protected $guarded=['email']; //database table black list
    protected $fillable=['email','user_name'];//database table white list

    
    /*The $casts property on your model provides a convenient 
      method of converting attributes to common data types.*/
    protected $casts=['is_admin' => 'boolean',];


    /**
	  *
	  *@desc Query Scope,hot data query scope with no params
	  *
	  *
      */
    public function scopeHot($query){
    	return $query->where('id','<=','2');
    }
    /**
	  *
	  *@desc Query Scope,cold data query scope with params
	  *
	  *
      */
    public function scopeCold($query,$id){
    	return $query->where('id','>',$id);
    }


    /**
	  *
	  *@desc One To One relationships, Get thblese phone ta associated with the user table.
	  *
	  *
      */
    public function phone(){
    	return $this->hasOne('App\Phone','user_id');
    }
    public function phones(){
        return $this->hasMany('App\Phone','user_id');
    }



    /**
      *
      *@desc Accessors & Mutators
      *Accessors and mutators allow you to format Eloquent 
      *attributes when retrieving them from a model or setting
      * their value. For example, you may want to use the 
      *Laravel encrypter to encrypt a value while it is stored 
      *in the database, and then automatically decrypt the 
      *attribute when you access it on an Eloquent model.
      *
      */
    public function getUserNameAttribute($value){
        return strtoupper($value);
    }
    public function setUserNameAttribute($value){
        $this->attributes['user_name']=strtolower($value);
    }
    /**
      *
      *
      *Appending Values To JSON
      *Occasionally, you may need to add array attributes 
      *that do not have a corresponding column in your database.
      *To do so, first define an accessor for the value:
      *
      *
      */

    /*
    Hiding Attributes From JSON:
        Sometimes you may wish to limit the attributes, such as passwords,
        that are included in your model's array or JSON representation. 
        To do so, add a $hidden property definition to your model:
    */

    //protected $hidden=['email'];
    protected $visible=['user_name','email','is_admin'];
    /*Attributes in the appends array will also respect 
    the visible and hidden settings configured on the model.*/
    protected $appends=['is_admin'];
    public function getIsAdminAttribute(){
        return $this->attributes['id']==1;
    }
}
