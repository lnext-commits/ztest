<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\School
 *
 * @property int $id
 * @property string $company_name
 * @property string $email
 * @property string $website
 * @property string $logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Teacher[] $teacher
 * @property-read int|null $teacher_count
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereSchoolName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereWebsite($value)
 * @mixin \Eloquent
 */
class Company extends Model
{
    protected $fillable = [
        'company_name',
        'email',
        'website',
        'logo',
    ];

    public function employee()
    {
        return $this->hasMany(\App\Employee::class);
    }
}
