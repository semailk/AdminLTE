<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $name
 * @property string $email
 * @property string $phone
 */
class Client extends Model
{
    use HasFactory;

    const CLIENT_NAME = 'name';
    const CLIENT_EMAIL = 'email';
    const CLIENT_PHONE = 'phone';

    protected $fillable = [
      self::CLIENT_EMAIL,
      self::CLIENT_NAME,
      self::CLIENT_PHONE
    ];

    /**
     * @return BelongsToMany
     */
    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class, 'company_client', 'client_id','company_id');
    }
}
