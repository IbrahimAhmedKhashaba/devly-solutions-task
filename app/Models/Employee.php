<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class Employee extends Model
{
    //
    use HasFactory;
    protected $fillable = ['name', 'email', 'salary', 'department_id'];

    public function department(){
        return $this->belongsTo(Department::class);
    }

    protected static function booted()
    {
        static::created(function (Employee $employee) {
            $context = [
                'action'      => 'created',
                'actor'       => static::actorInfo(),
                'employee'    => $employee->only(['id','name','email','salary','department_id']),
                'ip'          => app()->has('request') ? request()->ip() : null,
                'route'       => app()->has('request') ? optional(request()->route())->getName() : null,
            ];
            Log::channel('employee')->info('Employee created', $context);
        });

        static::updated(function (Employee $employee) {
            $changes = $employee->getChanges();
            $originals = [];
            foreach (array_keys($changes) as $key) {
                $originals[$key] = $employee->getOriginal($key);
            }

            $context = [
                'action'       => 'updated',
                'actor'        => static::actorInfo(),
                'employee_id'  => $employee->id,
                'changes'      => $changes,
                'originals'    => $originals,
                'ip'           => app()->has('request') ? request()->ip() : null,
                'route'        => app()->has('request') ? optional(request()->route())->getName() : null,
            ];
            Log::channel('employee')->info('Employee updated', $context);
        });

        static::deleted(function (Employee $employee) {
            $context = [
                'action'      => 'deleted',
                'actor'       => static::actorInfo(),
                'employee'    => $employee->only(['id','name','email','salary','department_id']),
                'ip'          => app()->has('request') ? request()->ip() : null,
                'route'       => app()->has('request') ? optional(request()->route())->getName() : null,
            ];
            Log::channel('employee')->warning('Employee deleted', $context);
        });
    }

    protected static function actorInfo(): array
    {
        $user = Auth::user() ?? Auth::guard('sanctum')->user();
        $guard = Auth::user() ? 'web': 'sanctum';

        if  (! $user) {
            return [
                'id'    => null,
                'name'  => 'system',
                'email' => null,
                'guard' => null,
            ];
        }

        return [
            'id'    => $user->id ?? null,
            'name'  => $user->name ??  'unknown',
            'email' => $user->email ?? null,
            'guard' => $guard,
        ];
    }
}
