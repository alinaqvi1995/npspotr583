<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\VehicleMakeModel;
use App\Models\Blog;
use App\Models\Service;
use App\Models\State;

class HomeController extends Controller
{
    public function index()
    {
        // Get states with only the fields needed for the map and listing
        $states = State::select('id', 'state_name', 'slug', 'short_title', 'banner_image', 'description_one')
            ->latest()
            ->get();

        $services = Service::where('status', 1)
            ->whereRaw('id % 2 = 1') 
            ->latest()
            ->get();

        $blogs = Blog::latest()->take(3)->get();

        $makes = VehicleMakeModel::select('make')
            ->distinct()
            ->orderBy('make')
            ->pluck('make');

        return view('site.home', compact('services','makes','blogs','states'));
    }

    public function state($slug)
    {
        $services = Service::where('status', 1)
            ->whereRaw('id % 2 = 1')
            ->latest()
            ->get();

        $blogs = Blog::latest()->take(3)->get();

        $makes = VehicleMakeModel::select('make')
            ->distinct()
            ->orderBy('make')
            ->pluck('make');

        // Fetch the state record dynamically
        $state = State::where('slug', $slug)->firstOrFail();

        return view('site.state', compact('services', 'makes', 'blogs', 'state'));
    }


    public function about()
    {
        $services = Service::where('status', 1)->latest()->take(3)->get();
        $blogs = Blog::latest()->take(3)->get();
        $makes = VehicleMakeModel::select('make')
            ->distinct()
            ->orderBy('make')
            ->pluck('make');

        return view('site.about', compact('services','makes','blogs'));
    }
    public function openTransport()
    {
        $services = Service::where('status', 1)->latest()->take(3)->get();
        $blogs = Blog::latest()->take(3)->get();
        $makes = VehicleMakeModel::select('make')->distinct()->orderBy('make')->pluck('make');

        return view('site.services.open-transport', compact('services','makes','blogs'));
    }

    public function enclosedTransport()
    {
        $services = Service::where('status', 1)->latest()->take(3)->get();
        $blogs = Blog::latest()->take(3)->get();
        $makes = VehicleMakeModel::select('make')->distinct()->orderBy('make')->pluck('make');

        return view('site.services.enclosed-transport', compact('services','makes','blogs'));
    }

    public function towAway()
    {
        $services = Service::where('status', 1)->latest()->take(3)->get();
        $blogs = Blog::latest()->take(3)->get();
        $makes = VehicleMakeModel::select('make')->distinct()->orderBy('make')->pluck('make');

        return view('site.services.tow-away', compact('services','makes','blogs'));
    }

    public function driveAway()
    {
        $services = Service::where('status', 1)->latest()->take(3)->get();
        $blogs = Blog::latest()->take(3)->get();
        $makes = VehicleMakeModel::select('make')->distinct()->orderBy('make')->pluck('make');

        return view('site.services.driveaway', compact('services','makes','blogs'));
    }

    public function multiform()
    {
        $makes = VehicleMakeModel::select('make')
            ->distinct()
            ->orderBy('make')
            ->pluck('make');
        return view('site.quote', compact('makes'));
    }
    public function getModels(Request $request)
    {
        $make = $request->query('make');
        if (!$make) {
            return response()->json([]);
        }

        $models = VehicleMakeModel::where('make', $make)
            ->distinct()
            ->orderBy('model')
            ->pluck('model');

        return response()->json($models);
    }
    public function getMakes($year = null)
    {
        $makes = VehicleMakeModel::select('make')
            ->distinct()
            ->orderBy('make')
            ->pluck('make');

        return response()->json($makes);
    }

    public function trackOrder(Request $request)
    {
        $query = DB::table('quotes');

        if ($request->filled('orderNumber')) {
            $orderNumber = trim($request->get('orderNumber'));

            $quote = DB::table('quotes')
                ->where('id', $orderNumber)
                ->orWhere('customer_name', 'like', "%{$orderNumber}%")
                ->orWhere('customer_email', 'like', "%{$orderNumber}%")
                ->orWhere('customer_phone', 'like', "%{$orderNumber}%")
                ->first();

            if ($quote) {
                return view('site.track-order', compact('quote'));
            } else {
                return back()->with('status', 'No order found for the provided information.');
            }
        }

        return view('site.track-order');
    }
    public function fetchOrder(Request $request)
    {
        $orderNumber = trim($request->get('orderNumber'));

        $quote = DB::table('quotes')
            ->where('id', $orderNumber)
            ->orWhere('customer_name', 'like', "%{$orderNumber}%")
            ->orWhere('customer_email', 'like', "%{$orderNumber}%")
            ->orWhere('customer_phone', 'like', "%{$orderNumber}%")
            ->first();

        if ($quote) {
            return response()->json([
                'success' => true,
                'data' => [
                    'order_id' => $quote->id,
                    'name' => $quote->customer_name,
                    'email' => $quote->customer_email,
                    'phone' => $quote->customer_phone,
                    'status' => $quote->status,
                    'pickup_date' => $quote->pickup_date,
                    'delivery_date' => $quote->delivery_date,
                    'created_at' => date('d M Y', strtotime($quote->created_at)),
                ]
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No order found. Please check your details and try again.'
            ]);
        }
    }

    public function privacy()
    {
        return view('site.privacy');
    }
        public function trems()
    {
        return view('site.trems');
    }
        public function faq()
    {
        return view('site.faq');
    }

    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'first_name'  => 'required|string|max:255',
            'last_name'   => 'required|string|max:255',
            'phone'       => 'required|string|max:50',
            'email'       => 'required|email|max:255',
            'subject'     => 'required|string|max:255',
            'message'     => 'required|string|max:5000',
            'sms_consent' => 'nullable|boolean',
        ]);

        $validated['sms_consent'] = $request->boolean('sms_consent');

        try {
            Mail::send('emails.contactMessage', ['data' => $validated], function ($message) use ($validated) {
                $message->to('bridgewayuship@gmail.com')
                    ->replyTo($validated['email'], $validated['first_name'].' '.$validated['last_name'])
                    ->subject('New Contact Enquiry: '.$validated['subject']);
            });
        } catch (\Throwable $e) {
            Log::error('Contact form mail failed: '.$e->getMessage(), $validated);

            return back()
                ->withInput()
                ->with('error', 'Sorry, we could not send your message right now. Please call us at +1 (713) 470-6157.');
        }

        return back()->with('success', 'Thank you! Your message has been sent. We will get back to you shortly.');
    }
}
