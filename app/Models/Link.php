<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Link extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [

    ];

    private function move($to){
        $order = $this->order;
        $newOrder = $this->order + $to;
        $swapWith = auth()->user()->links()->where('order', '=', $newOrder)->first();
        
        $this->order = $newOrder;
        $this->save();
        $swapWith->order = $order;
        $swapWith->save();

        return back();
    }

    public function moveUp(){
        $this->move(-1);
    }

    public function moveDown(){
        $this->move(+1);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
    
}
