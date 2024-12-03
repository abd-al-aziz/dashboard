<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Booking;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * عرض جميع المراجعات مع دعم البحث.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // استلام كلمة البحث من المستخدم
        $search = $request->input('search');
        
        // استعلام لجلب المراجعات مع دعم البحث في user, booking_id, rating, status
        $reviews = Review::query()
            ->when($search, function ($query, $search) {
                $query->whereHas('user', function($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                })
                ->orWhere('booking_id', 'like', '%' . $search . '%')
                ->orWhere('rating', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%');
            })
            ->with(['user', 'booking']) // للتأكد من تحميل علاقة المستخدم والحجز
            ->paginate(5); // التصفح عبر الصفحات

        // إرجاع العرض مع البيانات
        return view('reviews.index', compact('reviews', 'search'));
    }

    /**
     * عرض نموذج إضافة مراجعة.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $bookings = Booking::all();
    
        // تمرير الحجوزات إلى الـView
        return view('reviews.create', compact('bookings'));
    }

    /**
     * تخزين المراجعة.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'booking_id' => $request->booking_id,
            'rating' => $request->rating,
            'status' => 'Reject',  // Default status
            'comment' => $request->comment,
        ]);

        return redirect()->route('reviews.index')->with('success', 'Review submitted successfully!');
    }

    /**
     * تحديث حالة المراجعة (قبول/رفض).
     *
     * @param \App\Models\Review $review
     * @param string $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus($reviewId, $status)
    {
        $review = Review::findOrFail($reviewId);
        $review->status = $status;
        $review->save();

        return redirect()->route('reviews.index')->with('success', 'Review status updated successfully!');
    }
}
