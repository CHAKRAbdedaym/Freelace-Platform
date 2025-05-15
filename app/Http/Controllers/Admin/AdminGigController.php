<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gig;
use Illuminate\Http\Request;

class AdminGigController extends Controller
{
    public function index()
    {
        $gigs = Gig::with('user')->latest()->paginate(10);
        return view('admin.gigs.index', compact('gigs'));
    }

    public function destroy(Gig $gig)
    {
        $gig->delete();
        return redirect()->route('admin.gigs.index')->with('success', 'Gig deleted.');
    }
}
