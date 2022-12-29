<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use App\Traits\EloquentHelper;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, EloquentHelper;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'user_image',
        'phone',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function add(array $req)
    {
        $user = self::create([
            'first_name' => $req['first_name'],
            'last_name' => $req['last_name'],
            'email' => $req['email'],
            'password' => Hash::make($req['password']),
            'phone' => $req['phone'] ?? null,
            'is_active' => filter_var($req['is_active'] ?? 'false', FILTER_VALIDATE_BOOLEAN),
        ]);

        $user->coverFile($req);
    }

    public function edit(array $req)
    {
        $this->updateColumn($req, 'first_name');
        $this->updateColumn($req, 'last_name');
        $this->updateColumn($req, 'email');
        $this->updateColumn($req, 'phone');
        $this->password = Hash::make($req['password']);
        $this->is_active = filter_var($req['is_active'] ?? 'false', FILTER_VALIDATE_BOOLEAN);
        $this->save();

        $this->coverFile($req);
    }

    public function remove()
    {
        deleteFile($this->user_image);
        $this->delete();
        return $this->id;
    }

    public function coverFile(array $req)
    {
        if (Arr::has($req, 'user_image')) {
            if (!filled($this->user_image)) {
                $userImage = uploadFile($req['user_image'], 'User', $this->id);
                $this->update(['user_image' => $userImage]);
            } else {
                deleteFile($this->user_image);
                $userImage = uploadFile($req['user_image'], 'Product/Cover', $this->id);
                $this->update(['user_image' => $userImage]);
            }
        }

        if (Arr::has($req, 'user_image_delete')) {
            deleteFile($this->user_image);
            $this->update(['user_image' => null]);
        }
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function adminlte_image()
    {
        return 'https://picsum.photos/300/300';
    }

    public function adminlte_desc()
    {
        return 'That\'s a nice guy';
    }

    public function adminlte_profile_url()
    {
        return 'admin/profile';
    }
}
