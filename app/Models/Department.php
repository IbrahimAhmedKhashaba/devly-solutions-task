<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class Department extends Model
{
    //
    use HasFactory;
    protected $fillable = ['name'];

    public function employees(){
        return $this->hasMany(Employee::class);
    }

    protected static function booted()
    {
        static::created(function (Department $department) {
            $context = [
                'action'      => 'created',
                'actor'       => static::actorInfo(),
                'department'    => $department->only(['id','name']),
                'ip'          => app()->has('request') ? request()->ip() : null,
                'route'       => app()->has('request') ? optional(request()->route())->getName() : null,
            ];
            Log::channel('department')->info('Department created', $context);
        });

        static::updated(function (Department $department) {
            $changes = $department->getChanges();
            $originals = [];
            foreach (array_keys($changes) as $key) {
                $originals[$key] = $department->getOriginal($key);
            }

            $context = [
                'action'       => 'updated',
                'actor'        => static::actorInfo(),
                'department_id'  => $department->id,
                'changes'      => $changes,
                'originals'    => $originals,
                'ip'           => app()->has('request') ? request()->ip() : null,
                'route'        => app()->has('request') ? optional(request()->route())->getName() : null,
            ];
            Log::channel('department')->info('Department updated', $context);
        });

        static::deleted(function (Department $department) {
            $context = [
                'action'      => 'deleted',
                'actor'       => static::actorInfo(),
                'department'    => $department->only(['id','name']),
                'ip'          => app()->has('request') ? request()->ip() : null,
                'route'       => app()->has('request') ? optional(request()->route())->getName() : null,
            ];
            Log::channel('department')->warning('Department deleted', $context);
        });
    }

    protected static function actorInfo(): array
    {
        $user = Auth::user() ?? Auth::guard('sanctum')->user();
        $guard = Auth::user() ? 'web': 'sanctum';

        if (! $user) {
            return [
                'id'    => null,
                'name'  => 'system',
                'email' => null,
                'guard' => null,
            ];
        }

        return [
            'id'    => $user->id ?? null,
            'name'  => $user->name ?? 'unknown',
            'email' => $user->email ?? null,
            'guard' => $guard,
        ];
    }
}
