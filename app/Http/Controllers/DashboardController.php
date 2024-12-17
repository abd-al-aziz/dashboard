<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Pet;
use App\Models\User;
use App\Models\Room;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // بيانات الحجوزات القادمة
        $upcomingBookings = Booking::whereDate('end_date', '>=', now())
            ->whereDate('end_date', '<=', now()->addWeek())
            ->count();

        // عدد الحيوانات الأليفة النشطة
        $activePets = Pet::all()->count();

        // عدد الزوار هذا الشهر
        $monthlyVisitors = Booking::whereMonth('created_at', now()->month)->count();

        // عدد الغرف المحجوزة حالياً
        $occupiedRooms = Room::where('is_available', '0')->count();

        // الخدمات المكتملة هذا الأسبوع
        $completedServices = Booking::where('status', 'completed')
            ->whereBetween('end_date', [now()->startOfWeek(), now()->endOfWeek()])
            ->count();

        // إجمالي الأرباح هذا الشهر
        $monthlyEarnings = Booking::whereMonth('start_date', now()->month)
            ->where('status', 'confirmed')
            ->sum('total_price');

        // الرسائل الجديدة غير المقروءة
        

        // نسبة النمو الشهري
        $lastMonthEarnings = Booking::whereMonth('created_at', now()->subMonth()->month)
            ->where('status', 'confirmed')
            ->sum('total_price');
        
        $currentMonthEarnings = Booking::whereMonth('created_at', now()->month)
            ->where('status', 'confirmed')
            ->sum('total_price');
        
        $monthlyGrowth = $lastMonthEarnings > 0 
            ? (($currentMonthEarnings - $lastMonthEarnings) / $lastMonthEarnings) * 100 
            : 0;

        // الحجوزات الأخيرة
        $recentBookings = Booking::with(['pet', 'user'])
            ->latest()
            ->take(10)
            ->get();

        return view('admin.dashboard', compact(
            'upcomingBookings',
            'activePets',
            'monthlyVisitors',
            'occupiedRooms',
            'completedServices',
            'monthlyEarnings',
            'monthlyGrowth',
            'recentBookings'
        ));
    }
}