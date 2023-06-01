@extends('layouts.app-master')

@section('title', 'Subscription Plans')

@section('content')
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Subscription Plans</h1>
        <p class="fs-5 text-body-secondary">Choose the plan that fits your needs.</p>
    </div>

    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        @foreach ($subscriptionPlans as $plan)
            <div class="col mb-4">
                <div class="card mb-4 rounded-3 shadow-sm h-100">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">{{ $plan->name }}</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">${{ $plan->price }}<small class="text-body-secondary fw-light">/mo</small></h1>
                        <p>{{ $plan->description }}</p>
                        <ul class="list-unstyled mt-3 mb-4">
                            @if ($plan->features()->get()->count() > 0)
                                @foreach ($plan->features()->get() as $feature)
                                    <li>{{ $feature->name }}</li>
                                @endforeach
                            @else
                                <li>No features</li>
                            @endif
                        </ul>
                        @if (auth()->user()->subscription_plan_id == $plan->id)
                            <button type="button" class="w-100 btn btn-lg btn-outline-success" disabled>Current plan</button>
                        @elseif ($plan->price == 0)
                            <a type="button" class="w-100 btn btn-lg btn-outline-primary" href="{{ route('register.show') }}">Sign up for free</a>
                        @else
                            <button type="button" class="w-100 btn btn-lg btn-primary">Get started</button>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <h2 class="display-6 text-center mb-4">Compare plans</h2>
    
    <div class="table-responsive mb-4">
        <table class="table text-center">
            <thead>
                <tr>
                    <th style="width: 34%;"></th>
                    @foreach ($subscriptionPlans as $plan)
                        <th style="width: 22%;" class="text-center">
                            <h4 class="fw-normal">{{ $plan->name }}</h4>
                            <span class="text-body-secondary">${{ $plan->price }}<small class="text-body-secondary fw-light">/mo</small></span>
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($features as $feature) 
                    <tr>
                        <th scope="row" class="text-start">{{ $feature->name }}</th>
                        @foreach ($subscriptionPlans as $plan)
                            @if ($plan->features()->get()->contains($feature))
                                <td><i class="bi bi-check" style="font-size: 2rem;"></i></td>
                            @else
                                <td></td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection