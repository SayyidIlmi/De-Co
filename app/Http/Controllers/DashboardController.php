<?php
namespace App\Http\Controllers;
use App\Models\Event;

class DashboardController extends Controller
{
    public function index() {
        $query = Event::with(['timelines', 'materials', 'documentations']);
        $semua_event = $query->orderBy('created_at', 'desc')->paginate(2);
        return view('dashboard', compact('semua_event'));
    }
}