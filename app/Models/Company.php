<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $name
 */
class Company extends Model
{
    use HasFactory;

    const COMPANY_NAME = 'name';

    protected $fillable = [
        self::COMPANY_NAME
    ];

    /**
     * @return BelongsToMany
     */
    public function clients(): BelongsToMany
    {
        return $this->belongsToMany(Client::class, 'company_client', 'company_id','client_id');
    }
}
