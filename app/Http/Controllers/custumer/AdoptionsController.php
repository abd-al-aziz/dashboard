<?php
namespace App\Http\Controllers\custumer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adoption;

class AdoptionsController extends Controller
{
    // تأكد من أن المستخدم مسجل الدخول قبل الوصول إلى هذا الأكشن
    public function __construct()
    {
        $this->middleware('auth'); // هذا يضمن أن المستخدم مسجل دخول قبل الوصول
    }

    public function index()
    {
        // Fetch all adoptions from the database
        $adoptions = Adoption::where('is_adopted', '0')->paginate(8);

        // Pass the data to the view
        return view('custumer.adoptions', compact('adoptions'));
    }
}
