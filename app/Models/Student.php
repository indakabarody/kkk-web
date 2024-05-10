<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 *
 * @property int $id
 * @property string|null $nim
 * @property string|null $name
 * @property string|null $email
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Transaction[] $transactions
 *
 * @package App\Models
 */
class Student extends Model
{
    use HasFactory;

	protected $table = 'students';

	protected $fillable = [
		'nim',
		'name',
		'email'
	];

	public function transactions()
	{
		return $this->hasMany(Transaction::class);
	}
}
