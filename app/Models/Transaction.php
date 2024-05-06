<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaction
 *
 * @property int $id
 * @property int|null $student_id
 * @property string|null $type
 * @property string|null $category
 * @property int|null $amount_idr
 * @property Carbon|null $date
 * @property string|null $notes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Student|null $student
 *
 * @package App\Models
 */
class Transaction extends Model
{
	protected $table = 'transactions';

	protected $casts = [
		'student_id' => 'int',
		'amount_idr' => 'int',
		'date' => 'datetime'
	];

	protected $fillable = [
		'student_id',
		'type',
		'category',
		'amount_idr',
		'date',
		'notes'
	];

	public function student()
	{
		return $this->belongsTo(Student::class);
	}
}
