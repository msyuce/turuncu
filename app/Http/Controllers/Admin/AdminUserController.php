<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    /**
     * Kullanıcıların listesini admin panelde gösterir.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = User::query();

        // Arama filtresi (isim veya email)
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Rol filtresi
        if ($role = $request->input('role')) {
            $query->where('role', $role);
        }

        // Son oluşturulan önce gösterilir, pagination ile 10'ar kayıt
        $users = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.user.index', compact('users'));
    }
}
