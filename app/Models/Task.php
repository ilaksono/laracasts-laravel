<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public function project() {
      return $this -> belongsTo(Project::class);
    }

    protected $guarded = [

    ];

    public function complete($completed = true) {
      return $this -> update(compact('completed'));
    }

    public function incomplete() {
      return $this -> update(['completed' => false]);
    }

}
