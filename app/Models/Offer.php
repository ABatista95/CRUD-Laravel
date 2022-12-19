<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      'creator',
      'object',
      'activity_id',
      'currency',
      'description',
      'budget',
      'start_date',
      'start_time ',
      'end_date',
      'end_time',
      'status_id',
      'created_at',
      'updated_at',
    ];

    /**
     * State relationship with offers of the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function statusOffer() {
        return $this->belongsTo(OfferStatus::class, "status_id", "status_id");
    }

    /**
     * Data related to the activities of the specified storage resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function activityOffer() {
        return $this->belongsTo(Product::class, "activity_id", "product_id");
    }
}
