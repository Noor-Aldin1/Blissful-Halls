<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class DaBookingController extends Controller
{
    //  بتعرض كل الحجوزات اللي موجودة مع العقار واليوزر المرتبطين فيه
    public function index()
    {
        $bookings = Booking::with(['property', 'user'])->latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    //  عشان تجيب البيانات اللي مطلوبة لإنشاء حجز جديد
    public function create(Request $request)
    {
        // بجلب كل العقارات والمستخدمين
        $properties = Property::all();
        $users = User::where('role_id', 1)->get();  // بفترض ان المستخدمين اللي عندهم `role_id = 1` هم اللي مطلوبين

        // الفترات الزمنية المتاحة بشكل افتراضي
        $availableSlots = ['afternoon', 'night', 'full day'];

        // لو الـ `property_id` والـ `date` موجودين في الطلب
        if ($request->has('property_id') && $request->has('date')) {
            // بجلب الفترات اللي تم حجزها للعقار بنفس اليوم
            $bookedSlots = Booking::where('property_id', $request->property_id)
                ->where('date', $request->date)
                ->pluck('time_slot')
                ->toArray();

            // بشيل الفترات المحجوزة من الفترات المتاحة
            if (!empty($bookedSlots)) {
                // لو أي فترة محجوزة، بعمل استثناء لـ "full day"
                if (in_array('afternoon', $bookedSlots) || in_array('night', $bookedSlots)) {
                    $availableSlots = array_diff($availableSlots, ['full day']);
                }

                // بشيل الفترات المحجوزة (مثل afternoon, night)
                $availableSlots = array_diff($availableSlots, $bookedSlots);
            }
        }

        // برجع المستخدم لصفحة إنشاء الحجز
        return view('admin.bookings.create', compact('properties', 'users', 'availableSlots'));
    }

    //  عشان تنشئ الحجز وتحسب السعر
    public function store(Request $request)
    {
        // بعمل فاليديشن على البيانات المدخلة
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'property_id' => 'required|exists:properties,id',
            'date' => 'required|date|after_or_equal:today',
            'time_slot' => 'required|string|in:afternoon,night,full day',
        ]);

        // بشيك إذا الفترة الزمنية المطلوبة متاحة أو لا
        if (!$this->isTimeSlotAvailable($request->property_id, $request->date, $request->time_slot)) {
            return back()->with('error', 'الفترة الزمنية المختارة غير متاحة.');
        }

        // بجلب العقار وبحسب السعر بناءً على الفترة المختارة
        $property = Property::find($request->property_id);
        $totalPrice = $this->calculateTotalPrice($request->time_slot, $property->price);

        if (is_null($totalPrice)) {
            return back()->with('error', 'صار في مشكلة بحساب السعر.');
        }

        // بعمل إنشاء للحجز وبخزن البيانات في الداتابيس
        Booking::create([
            'user_id' => $request->user_id,
            'property_id' => $request->property_id,
            'date' => $request->date,
            'time_slot' => $request->time_slot,
            'status' => 'pending',
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('bookings.index')->with('success', 'تم إنشاء الحجز بنجاح.');
    }

    // هي عشان تعديل الحجز
    public function edit(Request $request, $id)
    {
        // بجلب الحجز الحالي
        $booking = Booking::findOrFail($id);

        // بجلب العقارات والمستخدمين اللي ممكن أعدل عليهم
        $properties = Property::all();
        $users = User::where('role_id', 1)->get();

        // الفترات المتاحة بشكل افتراضي
        $availableSlots = ['afternoon', 'night', 'full day'];

        // إذا كان العقار والتاريخ موجودين، بجيب الفترات المتاحة بناءً على الحجوزات الموجودة
        if ($request->has('property_id') && $request->has('date')) {
            $bookedSlots = Booking::where('property_id', $request->property_id)
                ->where('date', $request->date)
                ->where('id', '!=', $id) // باستثناء الحجز الحالي
                ->pluck('time_slot')
                ->toArray();

            // بشيل الفترات اللي تم حجزها
            if ((in_array('afternoon', $bookedSlots) || in_array('night', $bookedSlots)) && $booking->time_slot != 'full day') {
                $availableSlots = array_diff($availableSlots, ['full day']);
            }

            $availableSlots = array_diff($availableSlots, $bookedSlots);
        }

        // برجع المستخدم لصفحة التعديل مع البيانات
        return view('admin.bookings.edit', compact('booking', 'properties', 'users', 'availableSlots'));
    }

    //  عشان تعمل تحديث للحجز
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        // بشيك إذا الفترة الزمنية متاحة أو لا للحجز اللي بدنا نعدله
        if (!$this->isTimeSlotAvailable($request->property_id, $request->date, $request->time_slot, $id)) {
            return back()->with('error', 'الفترة الزمنية المختارة غير متاحة.');
        }

        // بحسب السعر بناءً على الفترة الزمنية الجديدة
        $property = Property::find($request->property_id);
        $totalPrice = $this->calculateTotalPrice($request->time_slot, $property->price);

        if (is_null($totalPrice)) {
            return back()->with('error', 'صار في مشكلة بحساب السعر.');
        }

        // بعمل تحديث للحجز في الداتابيس
        $booking->update([
            'user_id' => $request->user_id,
            'property_id' => $request->property_id,
            'date' => $request->date,
            'time_slot' => $request->time_slot,
            'total_price' => $totalPrice,
            'status' => $request->status,
        ]);

        return redirect()->route('bookings.index')->with('success', 'تم تعديل الحجز بنجاح.');
    }

    //  بتفحص إذا الفترة الزمنية متاحة أو لا
    private function isTimeSlotAvailable($propertyId, $date, $timeSlot, $bookingId = null)
    {
        $existingBookings = Booking::where('property_id', $propertyId)
            ->where('date', $date)
            ->when($bookingId, function ($query, $bookingId) {
                return $query->where('id', '!=', $bookingId);
            })
            ->pluck('time_slot')
            ->toArray();

        if ($timeSlot == 'full day' && (in_array('afternoon', $existingBookings) || in_array('night', $existingBookings))) {
            return false;
        }

        if (in_array('full day', $existingBookings) && ($timeSlot == 'afternoon' || $timeSlot == 'night')) {
            return false;
        }

        return !in_array($timeSlot, $existingBookings);
    }

    //  بتحسب السعر بناءً على الفترة الزمنية المختارة
    private function calculateTotalPrice($timeSlot, $propertyPrice)
    {
        switch ($timeSlot) {
            case 'afternoon':
                return $propertyPrice * 1;
            case 'night':
                return $propertyPrice * 2;
            case 'full day':
                return $propertyPrice * 2.5;
            default:
                return $propertyPrice;
        }
    }

    // هعشان أحذف الحجز
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'تم حذف الحجز بنجاح.');
    }

    //  عشان أجيب الفترات الزمنية المتاحة لحجز معين
    public function fetchAvailableSlots(Request $request)
    {
        $propertyId = $request->input('property_id');
        $date = $request->input('date');

        // الفترات المتاحة بشكل افتراضي
        $availableSlots = ['afternoon', 'night', 'full day'];

        // بشوف إذا فيه فترات محجوزة للعقار في نفس اليوم
        $bookedSlots = Booking::where('property_id', $propertyId)
            ->where('date', $date)
            ->pluck('time_slot')
            ->toArray();

        // بشيل الفترات المحجوزة من المتاحة
        if (!empty($bookedSlots)) {
            if (in_array('afternoon', $bookedSlots) || in_array('night', $bookedSlots)) {
                $availableSlots = array_diff($availableSlots, ['full day']);
            }

            $availableSlots = array_diff($availableSlots, $bookedSlots);
        }

        // إذا كانت كل الفترات محجوزة
        if (empty($availableSlots)) {
            $availableSlots = [];  // ما في فترات متاحة
        }

        // بحسب السعر بناءً على أول فترة متاحة أو باستخدام قيمة افتراضية
        $property = Property::find($propertyId);
        $totalPrice = $this->calculateTotalPrice($availableSlots[0] ?? '', $property->price);

        // برجع الفترات المتاحة والسعر
        return response()->json([
            'availableSlots' => $availableSlots,
            'totalPrice' => $totalPrice
        ]);
    }
}
