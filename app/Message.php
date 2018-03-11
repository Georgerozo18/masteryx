<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Laravel\Scout\Searchable;

class Message extends Model
{
  use Searchable;
    protected $guarded = [];

    public function user(){
      return $this->belongsTo(User::class);
    }
    public function getImageAttribute($image){
      if (!$image || starts_with($image, 'http')) {
        return $image;
      }
      return \Storage::disk('public')->url($image);
    }
    // Metodo para buscar personas y no solo mensajes
    public function toSearchableArray(){
      $this->load('user');

      return $this->toArray();
    }

    public function responses(){

      return
      // reto para ver el nombre del usuario
      $this->hasMany(Response::class)->with('user')->latest();
      //listar solo el mensaje
      $this->hasMany(Response::class)->latest();


    }
}
