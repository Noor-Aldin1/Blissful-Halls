@extends('layouts.master')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="stats">
        <div class="stat-box">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                <line x1="12" y1="1" x2="12" y2="23"></line>
                <path d="M17 5H9.5a4.5 4.5 0 0 0 0 9H15a4.5 4.5 0 0 1 0 9H7"></path>
            </svg>
            <p>Available Halls</p>
            <h2>{{ DB::table('properties')->where('availability', 1)->count() }}</h2>
        </div>
        <div class="stat-box">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                <line x1="12" y1="1" x2="12" y2="23"></line>
                <path d="M17 5H9.5a4.5 4.5 0 0 0 0 9H15a4.5 4.5 0 0 1 0 9H7"></path>
            </svg>
            <p>New Clients</p>
            <h2>
                <?php
                $newClients = DB::table('users')->count();
                echo $newClients;
                ?>
            </h2>
        </div>
        <div class="stat-box">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up">
                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                <polyline points="17 6 23 6 23 12"></polyline>
            </svg>
            <p>Cancellation Rate</p>
            <h2>
                <?php
                $totalBookings = DB::table('bookings')->count();
                $canceledBookings = DB::table('bookings')->where('status', 'canceled')->count();
                $cancellationRate = $totalBookings > 0 ? ($canceledBookings / $totalBookings) * 100 : 0;
                echo round($cancellationRate, 2) . '%';
                ?>
            </h2>
        </div>
        <div class="stat-box">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up">
                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                <polyline points="17 6 23 6 23 12"></polyline>
            </svg>
            <p>Total Revenue</p>
            <h2>
                <?php
                $totalRevenue = DB::table('bookings')->where('status', 'completed')->sum('total_price');
                echo '$' . number_format($totalRevenue, 2);
                ?>
            </h2>
        </div>
    </div>

    <?php
    $monthlyBookings = DB::table('bookings')
        ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as bookings'))
        ->groupBy('month')
        ->pluck('bookings', 'month');

    $monthlyRevenue = DB::table('bookings')
        ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(total_price) as revenue'))
        ->groupBy('month')
        ->pluck('revenue', 'month');
    ?>

<div class="charts">
    <div class="chart-box">
        <h3>Monthly Bookings</h3>
        <canvas id="worldwide-sales"></canvas>
    </div>
    <div class="chart-box">
        <h3>Revenue by Month</h3>
        <canvas id="sales-revenue"></canvas>
    </div>
</div>

<div class="bottom-section">
    <div class="calendar">
        <h3>Calendar</h3>
        <div id="calendar-widget"></div>
    </div>

    <div class="todo-list">
        <h3>To Do List</h3>
        <div class="todo-widget">
            <input type="text" id="task-input" placeholder="Enter task">
            <button id="add-task-btn">Add</button>
            <ul id="task-list"></ul>
            <button id="remove-all-btn" class="remove-all-btn">Remove All</button>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx1 = document.getElementById('worldwide-sales').getContext('2d');
    const monthlyBookings = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: 'Bookings',
                data: [
                    {{ $monthlyBookings->get(1, 0) }},
                    {{ $monthlyBookings->get(2, 0) }},
                    {{ $monthlyBookings->get(3, 0) }},
                    {{ $monthlyBookings->get(4, 0) }},
                    {{ $monthlyBookings->get(5, 0) }},
                    {{ $monthlyBookings->get(6, 0) }},
                    {{ $monthlyBookings->get(7, 0) }},
                    {{ $monthlyBookings->get(8, 0) }},
                    {{ $monthlyBookings->get(9, 0) }},
                    {{ $monthlyBookings->get(10, 0) }},
                    {{ $monthlyBookings->get(11, 0) }},
                    {{ $monthlyBookings->get(12, 0) }}
                ],
                backgroundColor: 'rgba(220, 167, 58, 0.2)'
            }]
        }
    });

    const ctx2 = document.getElementById('sales-revenue').getContext('2d');
    const monthlyRevenue = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: 'Revenue',
                data: [
                    {{ $monthlyRevenue->get(1, 0) }},
                    {{ $monthlyRevenue->get(2, 0) }},
                    {{ $monthlyRevenue->get(3, 0) }},
                    {{ $monthlyRevenue->get(4, 0) }},
                    {{ $monthlyRevenue->get(5, 0) }},
                    {{ $monthlyRevenue->get(6, 0) }},
                    {{ $monthlyRevenue->get(7, 0) }},
                    {{ $monthlyRevenue->get(8, 0) }},
                    {{ $monthlyRevenue->get(9, 0) }},
                    {{ $monthlyRevenue->get(10, 0) }},
                    {{ $monthlyRevenue->get(11, 0) }},
                    {{ $monthlyRevenue->get(12, 0) }}
                ],
                borderColor: 'rgba(220, 167, 58, 0.7)',
                fill: true,
                backgroundColor: 'rgba(220, 167, 58, 0.2)'
            }]
        }
    });

    document.getElementById('add-task-btn').addEventListener('click', function() {
    const taskInput = document.getElementById('task-input');
    const taskText = taskInput.value.trim();

    if (taskText !== '') {
        const taskList = document.getElementById('task-list');

        const listItem = document.createElement('li');

        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                listItem.style.textDecoration = 'line-through';
            } else {
                listItem.style.textDecoration = 'none';
            }
        });

        const removeBtn = document.createElement('button');
        removeBtn.innerHTML = 'Remove';
        removeBtn.style.float = 'right'; // Add margin to the left

        removeBtn.addEventListener('click', function() {
            taskList.removeChild(listItem);
        });

        listItem.appendChild(checkbox);
        listItem.appendChild(document.createTextNode(' ' + taskText));
        listItem.appendChild(removeBtn);
        taskList.appendChild(listItem);

        taskInput.value = '';
    }
});

    document.getElementById('remove-all-btn').addEventListener('click', function() {
        const taskList = document.getElementById('task-list');
        taskList.innerHTML = '';
    });

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar-widget');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            height: 300,
            contentHeight: '100%',
            expandRows: true,
            selectable: true,
            editable: true,
            events: []
        });

        calendar.render();
    });
</script>

@endpush
